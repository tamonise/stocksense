<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockSense | Gestão de Estoques Inteligente</title>
    <link rel="stylesheet" href="css/estilo.css"> <!-- Link para o arquivo de estilo -->
</head>
<body>
    <!-- Cabeçalho -->
    <?php include "header.php"; ?>

    <!-- Banner Principal -->
    <section class="banner">
        <div class="banner-overlay">
            <div class="banner-conteudo">
                <h1>Transforme seu Estoque com Inteligência</h1>
                <p>
                    Controle total do seu inventário com tecnologia de ponta. Reduza custos, evite desperdícios e otimize a reposição com previsões precisas.
                </p>
                <a href="contato.php" class="botao-destaque">Entre em Contato</a>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main>
        <!-- Seção "Quem Somos" -->
        <section class="quem-somos fundo-azul">
            <h2>Quem Somos?</h2>
            <p>
                Somos um time de inovação e tecnologia, dedicados a desenvolver soluções inteligentes que
                transformam a gestão de estoques. Nossa missão é simplificar processos, reduzir custos e otimizar a eficiência.
            </p>
            <p>
                Com a aplicação de algoritmos de Machine Learning e Big Data, ajudamos empresas a antecipar demandas, 
                automatizar reabastecimentos e maximizar os recursos. Junte-se a nós para uma gestão de estoques eficiente e moderna.
            </p>
            <a href="contato.php" class="botao">Saiba Mais</a>
        </section>

        <!-- Seção "Nossos Serviços" -->
        <section id="servicos" class="servicos fundo-cinza">
            <h2>Nossos Serviços</h2>
            <div class="servicos-grid">
                <div class="servico">
                    <h3>Monitoramento em Tempo Real</h3>
                    <p>Controle total do seu estoque com atualizações instantâneas.</p>
                </div>
                <div class="servico">
                    <h3>Previsão de Demanda</h3>
                    <p>Antecipe necessidades e tome decisões estratégicas com confiança.</p>
                </div>
                <div class="servico">
                    <h3>Automação de Pedidos</h3>
                    <p>Automatize reposições para evitar rupturas e otimizar a logística.</p>
                </div>
                <div class="servico">
                    <h3>Redução de Custos</h3>
                    <p>Elimine desperdícios e maximize a eficiência operacional.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <?php include 'footer.php'; ?>
</body>
</html>
