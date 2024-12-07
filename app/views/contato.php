<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockSense - Contato</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include "header.php"; ?>

    <main>
        <!-- Conteúdo principal da página de contato -->
        <section class="container contato-section">
            <h1>Fale Conosco</h1>
            <p>Se você tiver alguma dúvida, sugestão ou precisar de suporte, entre em contato conosco através do formulário abaixo.</p>
            
            <form action="enviar_mensagem.php" method="post" class="form-contato">
                <h2>Formulário de Contato</h2>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="6" required></textarea>
                
                <button type="submit" class="botao-enviar">Enviar Mensagem</button>
            </form>
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
        
        <div class="spacer"></div>
    </main>
    
    <footer>
        <p>&copy; 2024 StockSense. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
