<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>StockSense - Login</title>
    <!-- Link para o arquivo de estilos externo -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <!-- Cabeçalho com a imagem do logo -->
    <header>
        <img src="logofundoazul.png" alt="StockSense">
    </header>

    <!-- Conteúdo principal da página com a caixa de login -->
    <main>
        <div class="login-box">
            <h2>Faça o seu Login</h2>
            <!-- Formulário de login com JavaScript para redirecionamento -->
            <form onsubmit="return fazerLogin()">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <input type="submit" value="Entrar">
            </form>
        </div>
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
