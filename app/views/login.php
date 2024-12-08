<?php
require_once '../../constants.php';
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>StockSense - Login</title>
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
    <?php include "header.php"; ?>
    
    <main>
        <section class="login-container">
            <div class="login-box">
                <?php 
                    if (isset($_GET['erro'])) {
                        $mensagem = $_GET['mensagem'];
                        if(!$_GET['erro']) {
                            echo "<p style='color: blue;text-align: center;'>$mensagem</p>";
                        } else {
                            echo "<p style='color: red;'>$mensagem</p>";
                        }
                    }
                ?>
                
                <h2>Faça o seu Login</h2>
                <form action="<?php echo URL_BASE; ?>login/login" method="post">
                    <div class="input-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="input-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>

                    <input type="submit" value="Entrar" class="btn-login">
                </form>
            </div>
        </section>
        
         <section class="container contact-info">
            <h2>Informações de Contato</h2>
            <p>Você também pode nos contatar diretamente através dos seguintes meios:</p>
            <div class="contact-details">
                <h3>Email</h3>
                <p><a href="mailto:contato@stocksense.com">contato@stocksense.com</a></p>
                
                <h3>Telefone</h3>
                <p>(35) 3729-3729</p>
                
                <h3>Endereço</h3>
                <p>Av. Padre Cletus Francis Cox, 1661 - Jardim Country Club, Poços de Caldas</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
