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
                <button class="tab-button" onclick="showTab('intensdacompra')">Itens da Compra</button>
                <button class="tab-button" onclick="showTab('estoque')">Estoque</button>
                <button class="tab-button" onclick="showTab('itensdoestoque')">Itens do Estoque</button>
                <button class="tab-button" onclick="showTab('empresas')">Empresas</button>
            </div>

            <div class="file-upload" style="text-align: center; margin-top: 20px;">
                <input type="file" id="fileInput" accept=".xlsx, .xls, .csv" onchange="handleFileUpload(event)">
                <button class="tab-button" onclick="clickEnviarBanco()">Enviar para banco</button>
                <button class="tab-button" onclick="clickGerarPrevisao()">Gerar previsão</button>
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

            <div id="intensdacompra" class="tab-content">
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
            
            <div id="empresas" class="tab-content">
                <h2>Empresas</h2>
                 <p>Conteúdo sobre empresas.</p>
            </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    let jsonPlanilha = {
        produtos: [],
        fornecedores: [],
        aquisicoes: [],
        clientes: [],
        compras: [],
        itensCompra: [],
        estoque: [],
        itensEstoque: [],
        empresas: []
    };
    let jsonPopulado = false;
    let totalNaoDefinido = 0;
    function normalizeName(name) {
        return name
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .replace(/\s+/g, "")
            .replace(/[^\w]/g, "")
            .toLowerCase();
    }

    function clickEnviarBanco() {
        if(totalNaoDefinido > 0 || !jsonPopulado) {
            alert("Resolva todas as inconsistências do arquivo antes de enviar!");
        } else {
            axios.post('<?php echo URL_BASE; ?>planilha/salvar', jsonPlanilha)
            .then(response => {
                console.log('Resposta do servidor:', response.data);
            })
            .catch(error => {
                console.error('Erro ao enviar os dados:', error);
            });
        }
    }
    
    function clickGerarPrevisao() {
        axios.post('<?php echo URL_BASE; ?>planilha/executarPython', {})
        .then(response => {
            console.log('Resposta do servidor:', response.data);
        })
        .catch(error => {
            console.error('Erro ao enviar os dados:', error);
        });
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
                
                for (let index = 0; index < rows.length; index++) {
                    if(index > 0) {
                        switch (normalizeName(sheetName)) {
                            case 'produtos':
                                let produto = {};
                                produto.id = rows[index][0];
                                produto.nome = rows[index][1];
                                produto.descricao = rows[index][2];
                                produto.categoria = rows[index][3];
                                produto.precoCompra = rows[index][4];
                                produto.precoVenda = rows[index][5];
                                jsonPlanilha.produtos.push(produto);
                                break;
                            case 'fornecedores':
                                let fornecedores = {}
                                fornecedores.id = rows[index][0];
                                fornecedores.nome = rows[index][1];
                                fornecedores.cnpj = rows[index][2];
                                fornecedores.endereco = rows[index][3];
                                fornecedores.telefone = rows[index][4];
                                fornecedores.email = rows[index][5];
                                fornecedores.contato = rows[index][6];
                                fornecedores.prazoEntrega = rows[index][7];
                                jsonPlanilha.fornecedores.push(fornecedores);
                                break;
                            case 'aquisicoes':
                                let aquisicoes = {}
                                aquisicoes.id = rows[index][0];
                                aquisicoes.dataCompra = rows[index][1];
                                aquisicoes.quantidade = rows[index][2];
                                aquisicoes.total = rows[index][3];
                                aquisicoes.dataRecebimento = rows[index][4];
                                aquisicoes.fornecedor_id = rows[index][5];
                                aquisicoes.produto_id = rows[index][6];
                                jsonPlanilha.aquisicoes.push(aquisicoes);
                                break;
                            case 'clientes':
                                let clientes = {};
                                clientes.id = rows[index][0];
                                clientes.nome = rows[index][1];
                                clientes.cpf = rows[index][2];
                                clientes.endereco = rows[index][3];
                                clientes.telefone = rows[index][4];
                                clientes.email = rows[index][5];
                                clientes.empresa_id = rows[index][6];
                                jsonPlanilha.clientes.push(clientes);
                                break;
                            case 'compras':
                                let compras = {};
                                compras.id = rows[index][0];
                                compras.data = rows[index][1];
                                compras.formaPagamento = rows[index][2];
                                compras.quantidade = rows[index][3];
                                compras.total = rows[index][4];
                                compras.cliente_id = rows[index][5];
                                compras.status = rows[index][6];
                                jsonPlanilha.compras.push(compras);
                                break;
                            case 'intensdacompra':
                                let intensdacompra = {};
                                intensdacompra.compra_id = rows[index][0];
                                intensdacompra.estoque_id = rows[index][1];
                                intensdacompra.produto_id = rows[index][2];
                                intensdacompra.quantidade = rows[index][3];
                                jsonPlanilha.itensCompra.push(intensdacompra);
                                break;
                            case 'estoque':
                                let estoque = {};
                                estoque.id = rows[index][0];
                                estoque.nome = rows[index][1];
                                estoque.empresa_id = rows[index][2];
                                jsonPlanilha.estoque.push(estoque);
                                break;
                            case 'itensdoestoque':
                                let itensCompra = {};
                                itensCompra.estoque_id = rows[index][0];
                                itensCompra.produto_id = rows[index][1];
                                itensCompra.quantidadeAtual = rows[index][2];
                                itensCompra.quantidadeMinima = rows[index][3];
                                jsonPlanilha.itensEstoque.push(itensCompra);
                                break;
                            case 'empresas':
                                let itensEmpresa = {};
                                itensEmpresa.id = rows[index][0];
                                itensEmpresa.nome = rows[index][1];
                                itensEmpresa.cnpj = rows[index][2];
                                jsonPlanilha.empresas.push(itensEmpresa);
                                break;
                            default:
                                break;
                        }
                    }
                    tableHTML += '<tr>';
                    for (let indexCel = 0; indexCel < rows[index].length; indexCel++) {
                        if(rows[index][indexCel] != undefined) {
                            tableHTML += `<td>${rows[index][indexCel]}</td>`;
                        } else {
                            totalNaoDefinido++;
                            tableHTML += `<td style="background-color: red;color: yellow;">NÂO DEFINIDO</td>`;
                        }
                        
                    }
                    tableHTML += '</tr>';
                    
                }
                tableHTML += '</table>';

                const normalizedTabId = normalizeName(sheetName);
                const tabElement = document.getElementById(normalizedTabId);

                if (tabElement) {
                    tabElement.innerHTML = tableHTML;
                    jsonPopulado = true;
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
