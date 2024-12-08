<?php
require_once __DIR__ . '/../../constants.php';
use App\Models\Usuario;

class LoginController {
    public function index() {
        header('Location: ' . URL_BASE . 'app/views/login.php');
        exit();
    }

    public function registrar() {
        header('Location: ' .  URL_BASE . 'app/views/registrar.php');
        exit();
    }

    public function login() {
        $parametros = [
            'erro' => false,
            'mensagem' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $usuarioBanco = Usuario::where('email', $email)->where('senha', $senha)->first();

            if($usuarioBanco) {
                $parametros['mensagem'] = "Seja bem vindo " . $usuarioBanco->nome . "!";
                $parametros['erro'] = false;
                $urlStr = 'app/views/dashboard.php?';
            } else {
                $parametros['mensagem'] = "Usuário não encontrado!";
                $parametros['erro'] = true;
                $urlStr = 'app/views/login.php?';
            }
        }
        $query = http_build_query($parametros);
        $url = URL_BASE . $urlStr . $query;
        header('Location: ' .  $url);
        exit();
    }
}
?>
