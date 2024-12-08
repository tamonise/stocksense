<?php

require 'constants.php';

require 'vendor/autoload.php';

require 'config/database.php';

require 'app/migrations/CreateAquisicoesTable.php';
require 'app/migrations/CreateClientesTable.php';
require 'app/migrations/CreateComprasTable.php';
require 'app/migrations/CreateEmpresasTable.php';
require 'app/migrations/CreateEstoqueTable.php';
require 'app/migrations/CreateFornecedoresTable.php';
require 'app/migrations/CreateItensCompraTable.php';
require 'app/migrations/CreateItensEstoque.php';
require 'app/migrations/CreateProdutosTable.php';
require 'app/migrations/CreateUsuariosTable.php';

if(RUN_MIGRATIONS) {
    $createEmpresasTable = new CreateEmpresasTable();
    $createAquisicoesTable = new CreateAquisicoesTable();
    $createClientesTable = new CreateClientesTable();
    $createComprasTable = new CreateComprasTable();
    $createEstoqueTable = new CreateEstoqueTable();
    $createFornecedoresTable = new CreateFornecedoresTable();
    $createItensCompraTable = new CreateItensCompraTable();
    $createItensEstoque = new CreateItensEstoque();
    $createProdutosTable = new CreateProdutosTable();
    $createUsuariosTable = new createUsuariosTable();

    $createItensEstoque->down();
    $createItensCompraTable->down();
    $createAquisicoesTable->down();
    $createComprasTable->down();
    $createClientesTable->down();
    $createEstoqueTable->down();
    $createProdutosTable->down();
    $createFornecedoresTable->down();
    $createEmpresasTable->down();
    $createUsuariosTable->down();

    
    $createProdutosTable->up();
    $createFornecedoresTable->up();
    $createAquisicoesTable->up();
    $createEmpresasTable->up();
    $createClientesTable->up();
    $createComprasTable->up();
    $createEstoqueTable->up();
    $createItensCompraTable->up();
    $createItensEstoque->up();
    $createUsuariosTable->up();


}

require 'rotes.php';
