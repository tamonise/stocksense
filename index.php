<?php

require 'constants.php';

require 'vendor/autoload.php';

require 'config/database.php';

require 'app/migrations/CreateUsuariosTable.php';

if(RUN_MIGRATIONS) {
    $createUsuariosTable = new CreateUsuariosTable();
    $createUsuariosTable->up();
}

require 'rotes.php';
