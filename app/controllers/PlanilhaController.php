<?php
require_once __DIR__ . '/../../constants.php';
use App\Models\Usuario;
use App\Models\Produto;


class PlanilhaController {

    public function salvar() {

        $parametros = [
            'erro' => false,
            'mensagem' => ''
        ];
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData, true);
            
            $usuario = new Usuario();
                $usuario->nome = $nome;
                
                $usuario->save();
                $parametros['mensagem'] = "Cadastro efetuado com sucesso!";
                $urlStr = 'app/views/login.php?';

            exit;
        }

        exit;
    }
}
?>
