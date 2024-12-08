<?php
require_once '../../constants.php';
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - StockSense</title>
    <link rel="stylesheet" href="../../css/estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
</head>

<body>
    <header>
        <img src="../../img/logopng.png" alt="StockSense">
    </header>

    <main>
        <div class="dashboard">
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
            <div class="tabs">
                <button class="tab-button" onclick="showTab('produtos')">Produtos</button>
                <button class="tab-button" onclick="showTab('fornecedores')">Fornecedores</button>
                <button class="tab-button" onclick="showTab('aquisicoes')">Aquisições</button>
                <button class="tab-button" onclick="showTab('clientes')">Clientes</button>
                <button class="tab-button" onclick="showTab('compras')">Compras</button>
                <button class="tab-button" onclick="showTab('itensdacompra')">Itens da Compra</button>
                <button class="tab-button" onclick="showTab('estoque')">Estoque</button>
                <button class="tab-button" onclick="showTab('itensdoestoque')">Itens do Estoque</button>
            </div>

            <div class="file-upload" style="text-align: center; margin-top: 20px;">
                <input type="file" id="fileInput" accept=".xlsx, .xls, .csv" onchange="handleFileUpload(event)">
            </div>

            <div id="produtos" class="tab-content">
                <h2>Produtos</h2>
                <p>Conteúdo sobre produtos.</p>
            </div>

            <div id="fornecedores" class="tab-content">
                <h2>Fornecedores</h2>
                <p>Conteúdo sobre fornecedores.</p>
            </div>

            <div id="aquisicoes" class="tab-content">
                <h2>Aquisições</h2>
                <p>Conteúdo sobre aquisições.</p>
            </div>

            <div id="clientes" class="tab-content">
                <h2>Clientes</h2>
                <p>Conteúdo sobre clientes.</p>
            </div>

            <div id="compras" class="tab-content">
                <h2>Compras</h2>
                <p>Conteúdo sobre compras.</p>
            </div>

            <div id="itensdacompra" class="tab-content">
                <h2>Itens da Compra</h2>
              <p>Conteúdo sobre itens da compra.</p>
            </div>

            <div id="estoque" class="tab-content">
                <h2>Estoque</h2>
                <p>Conteúdo sobre estoque.</p>
            </div>

            <div id="itensdoestoque" class="tab-content">
                <h2>Itens do Estoque</h2>
                 <p>Conteúdo sobre itens do estoque.</p>
            </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
    function normalizeName(name) {
        return name
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .replace(/\s+/g, "")
            .replace(/[^\w]/g, "")
            .toLowerCase();
    }

    function showTab(tabName) {
        let tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => {
            tab.style.display = 'none';
        });

        let selectedTab = document.getElementById(tabName);
        if (selectedTab) {
            selectedTab.style.display = 'block';
        }
    }

    showTab('produtos');

    function handleFileUpload(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const data = e.target.result;
            const workbook = XLSX.read(data, { type: 'binary' });

            workbook.SheetNames.forEach(sheetName => {
                const worksheet = workbook.Sheets[sheetName];
                const rows = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

                let tableHTML = '<table border="1" style="width: 100%; margin-top: 10px;">';
                rows.forEach(cel => {
                    tableHTML += '<tr>';
                    for (let index = 0; index < cel.length; index++) {
                        if(cel[index] != undefined) {
                            tableHTML += `<td>${cel[index]}</td>`;
                        } else {
                            tableHTML += `<td style="background-color: red;color: yellow;">NÂO DEFINIDO</td>`;
                        }
                        
                    }
                    tableHTML += '</tr>';
                });
                tableHTML += '</table>';

                const normalizedTabId = normalizeName(sheetName);
                const tabElement = document.getElementById(normalizedTabId);

                if (tabElement) {
                    tabElement.innerHTML = tableHTML;
                } else {
                    console.log(`Aba não encontrada no HTML: ${sheetName}`);
                }
            });
        };

        reader.readAsBinaryString(file);
    }
</script>
</body>
</html>
