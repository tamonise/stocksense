<?php

class ProdutoController {
    public function index() {
        echo "Listando todos os produtos.";
    }

    public function show($id) {
        echo "Exibindo detalhes do produto com ID: $id";
    }

    public function teste($teste, $id) {
        echo $teste + $id;
    }
}