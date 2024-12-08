<?php
require_once '../../constants.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="<?php echo URL_BASE; ?>css/estilo.css">
</head>
<body>
    <?php include "header.php"; ?>

    <main>
        <section class="container contato-section">
            
            <form action="<?php echo URL_BASE; ?>usuario/salvar" method="post" class="form-contato">
                <h2>Formulário de Cadastro</h2>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                
                <button type="submit" class="botao-enviar">Cadastrar</button>
            </form>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 StockSense. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
