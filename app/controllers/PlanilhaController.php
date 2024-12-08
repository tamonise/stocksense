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


class PlanilhaController {

    public function salvar() {
       
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
                    $aquisicao = new Aquisicao([
                        'data_compra' => $value["dataCompra"],
                        'quantidade' => $value["quantidade"],
                        'total' => $value["total"],
                        'data_recebimento' => $value["dataRecebimento"],
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
                    $compra = new Compra([
                        'data' => $value["data"],
                        'forma_pagamento' => $value["formaPagamento"],
                        'quantidade' => $value["quantidade"],
                        'total' => $value["total"],
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

        return json_encode($parametros);
    }

    function executarPython() {
        
        $saida = [];
        $status = 0;

        $comando = "python C:\Users\samue\Downloads\TAI\Previsao.py";
        exec($comando, $saida, $status);

        if ($status === 0) {
            return json_encode([
                'success' => true,
                'data' => $saida,
                'message' => 'Script executado com sucesso!'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Erro ao executar o script Python.',
                'status_code' => $status
            ]);
        }

    }
}
?>
