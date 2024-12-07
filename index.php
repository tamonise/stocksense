<?php

require 'vendor/autoload.php'; // Carregar o Eloquent e outras dependências

use Illuminate\Database\Capsule\Manager as CapsuleManager;

// Configuração do Eloquent
$capsuleManager = new CapsuleManager;
$capsuleManager->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'stocksense',
    'username' => 'root',
    'password' => 'thelastofus1',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);
$capsuleManager->bootEloquent();

function routeHandler($controller, $method, $params = []) {
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerFile = __DIR__ . "/app/controllers/$controllerClass.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $method)) {
                return call_user_func_array([$controllerInstance, $method], $params);
            } else {
                http_response_code(404);
                echo "Método '$method' não encontrado no controlador '$controllerClass'.";
            }
        } else {
            http_response_code(404);
            echo "Classe do controlador '$controllerClass' não encontrada.";
        }
    } else {
        http_response_code(404);
        echo "Controlador '$controllerClass' não encontrado.";
    }
}

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $url);

$controller = $segments[0] ?? 'home';
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

routeHandler($controller, $method, $params);
