<?php
require_once __DIR__ . '/../../constants.php';
use App\Models\Usuario;

class UsuarioController {

    public function salvar() {

        $parametros = [
            'erro' => false,
            'mensagem' => ''
        ];
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioBanco = Usuario::where('email', $email)->first();
            if($usuarioBanco) {
                $urlStr = 'app/views/registrar.php?';
                $parametros['mensagem'] = "E-mail já cadastrado!";
                $parametros['erro'] = true;
            } else {
                $usuario = new Usuario();
                $usuario->nome = $nome;
                $usuario->email = $email;
                $usuario->senha = $senha;
                $usuario->save();
                $parametros['mensagem'] = "Cadastro efetuado com sucesso!";
                $urlStr = 'app/views/login.php?';
            }

        }
        $query = http_build_query($parametros);
        $url = URL_BASE . $urlStr . $query;
        header('Location: ' . $url);
        exit;
    }
}
?>
