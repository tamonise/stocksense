<?php

class LoginController {
    public function index() {
        header('Location: /login.php');
        exit();
    }
}