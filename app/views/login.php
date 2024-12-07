<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>StockSense - Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php include "header.php"; ?>

    <!-- Conteúdo principal da página com a caixa de login -->
    <main>
        <section class="login-container">
            <div class="login-box">
                <h2>Faça o seu Login</h2>
                <!-- Formulário de login -->
                <form onsubmit="return fazerLogin()">
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
         <!-- Informações adicionais de contato -->
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

    <!-- Rodapé da página -->
    <?php include 'footer.php'; ?>

    <!-- Script JavaScript para redirecionar ao pressionar "Entrar" -->
    <script>
        function fazerLogin() {
            // Aqui você pode adicionar validações adicionais, se necessário

            // Redireciona para a página desejada
            window.location.href = "dashboard.php";
            // Retorna false para evitar o envio real do formulário
            return false;
        }
    </script>
</body>
</html>
