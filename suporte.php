<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte - StockSense</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include "header.php"; ?>

    <main>
        <section class="suporte container">
            <h2>Suporte ao Cliente</h2>
            <p>
                Se você estiver enfrentando problemas ou tiver dúvidas sobre o nosso sistema de estoque inteligente preditivo,
                nossa equipe de suporte está pronta para ajudar. Verifique abaixo as opções de contato e as soluções comuns para 
                os problemas mais frequentes.
            </p>

            <h3>Problemas Comuns</h3>
<div class="problemas-grid">
    <div class="problema-item">
        <strong>Erro ao acessar o sistema:</strong>
        <p>Certifique-se de que sua conexão com a internet está estável e que você está usando as credenciais corretas.</p>
    </div>
    <div class="problema-item">
        <strong>Problemas de atualização de inventário:</strong>
        <p>Verifique se a sincronização automática está ativada em suas configurações ou entre em contato com nossa equipe para assistência.</p>
    </div>
    <div class="problema-item">
        <strong>Pedidos não sendo realizados automaticamente:</strong>
        <p>Confirme se você configurou os parâmetros corretos para automação de pedidos no painel de administração.</p>
    </div>
</div>

            <h3>Formulário de Contato</h3>
            <p>
                Se os problemas persistirem ou se você precisar de ajuda personalizada, preencha o formulário abaixo para entrar em contato com nossa equipe de suporte.
            </p>

            <form action="enviar_suporte.php" method="POST" class="form-suporte">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="problema">Descrição do Problema</label>
                <textarea id="problema" name="problema" rows="5" required></textarea>

                <button type="submit" class="botao-enviar">Enviar Solicitação</button>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
