<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Suporte - StockSense</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include "header.php";?>

    <main>
        <section class="suporte">
            <h2>Suporte ao Cliente</h2>
            <p>
                Se você estiver enfrentando problemas ou tiver dúvidas sobre o nosso sistema de estoque inteligente preditivo,
                nossa equipe de suporte está pronta para ajudar. Verifique abaixo as opções de contato e as soluções comuns para 
                os problemas mais frequentes.
            </p>

            <h3>Problemas Comuns</h3>
            <ul>
                <li><strong>Erro ao acessar o sistema:</strong> Certifique-se de que sua conexão com a internet está estável e que você está usando as credenciais corretas.</li>
                <li><strong>Problemas de atualização de inventário:</strong> Verifique se a sincronização automática está ativada em suas configurações ou entre em contato com nossa equipe para assistência.</li>
                <li><strong>Pedidos não sendo realizados automaticamente:</strong> Confirme se você configurou os parâmetros corretos para automação de pedidos no painel de administração.</li>
            </ul>

            <h3>Formulário de Contato</h3>
            <p>
                Se os problemas persistirem ou se você precisar de ajuda personalizada, preencha o formulário abaixo para entrar em contato com nossa equipe de suporte.
            </p>

            <form action="enviar_suporte.php" method="POST">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="problema">Descrição do Problema</label>
                <textarea id="problema" name="problema" rows="5" required></textarea>

                <input type="submit" value="Enviar Solicitação">
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
