<?php
require_once __DIR__ . '/../../constants.php';
use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Aquisicao;
use App\Models\Fornecedor;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Estoque;
use App\Models\ItemCompra;
use App\Models\ItemEstoque;
use Illuminate\Database\Capsule\Manager as DB;


class PlanilhaController {

    public function salvar() {
        header('Content-Type: application/json');
        $parametros = [
            'erro' => false,
            'mensagens' => []
        ];
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData, true);
            foreach ($data["produtos"] as $key => $value) {
                if($value) {
                    $produto = new Produto;
                    $produto->nome = $value["nome"];
                    $produto->descricao = $value["descricao"];
                    $produto->categoria = $value["categoria"];
                    $produto->preco_compra = $value["precoCompra"];
                    $produto->preco_venda = $value["precoVenda"];
                    $produto->save();
                } 
            }
            
            foreach ($data["fornecedores"] as $key => $value) {
                if($value) {
                    $fornecedor = new Fornecedor;
                    $fornecedor->nome = $value["nome"];
                    $fornecedor->cnpj = $value["cnpj"];
                    $fornecedor->endereco = $value["endereco"];
                    $fornecedor->email = $value["email"];
                    $fornecedor->telefone = $value["telefone"];
                    $fornecedor->contato = $value["contato"];
                    $fornecedor->prazo_entrega = $value["prazoEntrega"];
                    $fornecedor->save();
                } 
            }

            foreach ($data["aquisicoes"] as $key => $value) {
                if ($value) {
                    $fornecedor = Fornecedor::find($value["fornecedor_id"]);
                    if (!$fornecedor) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Fornecedor com ID: " . $value['fornecedor_id'] . " não encontrado.");
                        continue;
                    }

                    $produto = Produto::find($value["produto_id"]);
                    if (!$produto) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Produto com ID: " . $value['produto_id'] . " não encontrado.");
                        continue;
                    }
                    $dataFormatada = date('Y-m-d', strtotime($value["dataCompra"]));
                    $dataRecebimentoFormatada = date('Y-m-d', strtotime($value["dataRecebimento"]));
                    $aquisicao = new Aquisicao([
                        'data_compra' => $dataFormatada,
                        'quantidade' => $value["quantidade"],
                        'total' => intval($value["quantidade"]) * $produto->preco_compra,
                        'data_recebimento' => $dataRecebimentoFormatada,
                    ]);
            
                    $aquisicao->fornecedor()->associate($fornecedor);
                    $aquisicao->produto()->associate($produto);
                    $aquisicao->save();
                }
            }

            foreach ($data["empresas"] as $key => $value) {
                if($value) {
                    $empresa = new Empresa;
                    $empresa->nome = $value["nome"];
                    $empresa->cnpj = $value["cnpj"];
                    $empresa->save();
                } 
            }

            foreach ($data["clientes"] as $key => $value) {
                if ($value) {
                    $empresa = Empresa::find($value["empresa_id"]);
                    if (!$empresa) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Empresa com ID: " . $value['empresa_id'] . " não encontrada.");
                        continue;
                    }
                    $cliente = new Cliente([
                        'nome' => $value["nome"],
                        'cpf' => $value["cpf"],
                        'endereco' => $value["endereco"],
                        'telefone' => $value["telefone"],
                        'email' => $value["email"],
                        'empresa_id' => $empresa->id
                    ]);
            
                    $cliente->save();
                } 
            }

            foreach ($data["compras"] as $key => $value) {
                if ($value) {
                    $cliente = Cliente::find($value["cliente_id"]);
                    if (!$cliente) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Cliente com ID: " . $value['cliente_id'] . " não encontrado.");
                        continue;
                    }
                    $dataFormatada = date('Y-m-d', strtotime($value["data"]));
                    $compra = new Compra([
                        'data' => $dataFormatada,
                        'forma_pagamento' => $value["formaPagamento"],
                        'total' => 0,
                        'status' => $value["status"],
                        'cliente_id' => $cliente->id
                    ]);
            
                    $compra->save();
                }
            }

            foreach ($data["estoque"] as $key => $value) {
                if ($value) {
                    $empresa = Empresa::find($value["empresa_id"]);
                    if (!$empresa) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Empresa com ID: " . $value['empresa_id'] . " não encontrada.");
                        continue;
                    }
    
                    $estoque = new Estoque([
                        'nome' => $value["nome"],
                        'empresa_id' => $empresa->id
                    ]);
            
                    $estoque->save();
                }
            }


            foreach ($data["itensCompra"] as $key => $value) {
                if ($value) {
                    $estoque = Estoque::find($value["estoque_id"]);
                    if (!$estoque) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Estoque com ID: " . $value['estoque_id'] . " não encontrado.");
                        continue;
                    }
                    $produto = Produto::find($value["produto_id"]);
                    if (!$produto) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Produto com ID: " . $value['produto_id'] . " não encontrado.");
                        continue;
                    }
            
                    $compra = Compra::find($value["compra_id"]);
                    if (!$compra) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Compra com ID: " . $value['compra_id'] . " não encontrada.");
                        continue; 
                    }
                    $compra->total = $compra->total + intval($value["quantidade"]) * $produto->preco_venda;
                    $compra->save();
            
                    $itemCompra = new ItemCompra([
                        'quantidade' => $value["quantidade"],
                        'estoque_id' => $estoque->id,
                        'produto_id' => $produto->id,
                        'compra_id' => $compra->id
                    ]);
            
                    $itemCompra->save();
                }
            }

            
            foreach ($data["itensEstoque"] as $key => $value) {
                if ($value) {
                    $produto = Produto::find($value["produto_id"]);
                    if (!$produto) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Produto com ID: " . $value['produto_id'] . " não encontrado.");
                        continue;
                    }
        
                    $estoque = Estoque::find($value["estoque_id"]);
                    if (!$estoque) {
                        $parametros["erro"] = true;
                        array_push($parametros["mensagens"], "Estoque com ID: " . $value['estoque_id'] . " não encontrado.");
                        continue;
                    }
            
                    $itemEstoque = new ItemEstoque([
                        'quantidade_atual' => $value["quantidadeAtual"],
                        'quantidade_minima' => $value["quantidadeMinima"],
                        'produto_id' => $produto->id,
                        'estoque_id' => $estoque->id
                    ]);
            
                    $itemEstoque->save();
                } 
            }

        }

        echo json_encode($parametros);
    }

    function executarPython() {
        $saida = [];
        $status = 0;
        $vendas = [];
        $estoque = [];

        header('Content-Type: application/json');
        $parametros = [
            'erro' => false,
            'mensagem' => ""
        ];
    
        if(DB::table('compras')->count() === 0 ||  DB::table('aquisicoes')->count() === 0) {
            $parametros["erro"] = true;
            $parametros["mensagem"] = "Tabela compras ou aquisições está vazia!";
        } else {
            $somatorioMesCompras = DB::table('compras')
                ->selectRaw('YEAR(data) as ano, MONTH(data) as mes, SUM(total) as total')
                ->groupByRaw('YEAR(data), MONTH(data)')
                ->orderByRaw('YEAR(data), MONTH(data)')
                ->get();
            
            $somatorioMesAquisicoes = DB::table('aquisicoes')
                ->selectRaw('YEAR(data_compra) as ano, MONTH(data_compra) as mes, SUM(total) as total')
                ->groupByRaw('YEAR(data_compra), MONTH(data_compra)')
                ->orderByRaw('YEAR(data_compra), MONTH(data_compra)')
                ->get();
            
            foreach ($somatorioMesCompras as $key => $value) {
                array_push($vendas, $value->total);
            }
            
            foreach ($somatorioMesAquisicoes as $key => $value) {
                array_push($estoque, $value->total);
            }
            $data = [
                'Data' => ['2024-01', '2024-02', '2024-03', '2024-04', '2024-05', '2024-06', '2024-07', '2024-08', '2024-09', '2024-10', '2024-11', '2024-12'],
                'Estoque' => $estoque,
                'Vendas' => $vendas
            ];
            
            $tempFile = tempnam(sys_get_temp_dir(), 'data');
            file_put_contents($tempFile, json_encode($data));
        
            $comando = "python " . __DIR__ . "../../../Previsao.py " . escapeshellarg($tempFile);
            exec($comando, $saida, $status);
        
            unlink($tempFile);
        
            if ($status === 0) {
                $parametros["erro"] = false;
                $parametros["mensagem"] = "Script executado com sucesso!";
            } else {
                $parametros["erro"] = true;
                $parametros["mensagem"] = "Erro ao executar o script Python.";
            }
        }
        echo json_encode($parametros);
    }
}
?>
