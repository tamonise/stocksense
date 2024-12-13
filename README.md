# **StockSense**

Repositório destinado ao desenvolvimento de um MVP para um sistema de **Estoque Preditivo**, criado como parte da disciplina de **TAI II (Trabalho Acadêmico Integrado II)** do curso de **Ciência da Computação**.

---

## **Descrição do Projeto**

O **StockSense** é um sistema projetado para auxiliar no gerenciamento e na previsão de estoques de forma eficiente e automatizada. O objetivo principal é oferecer uma solução simples e acessível para pequenos e médios negócios, permitindo o controle inteligente de produtos, fornecedores, compras e outros itens relacionados.

O sistema foi desenvolvido utilizando tecnologias web e segue os princípios de boas práticas de desenvolvimento de software.

---

## **Funcionalidades**

- **Dashboard interativo**: Visualização organizada e navegação por abas para os principais módulos:
  - Produtos
  - Fornecedores
  - Aquisições
  - Clientes
  - Compras
  - Itens da Compra
  - Estoque
  - Itens do Estoque

- **Importação de planilhas**: Possibilidade de carregar dados diretamente de arquivos no formato `.xlsx`, distribuindo automaticamente as informações para as abas correspondentes.

- **Controle centralizado**: Gerenciamento simplificado das operações relacionadas ao estoque e fornecedores.

---

## **Tecnologias Utilizadas**

- **Frontend**: HTML, CSS e JavaScript.
- **Bibliotecas**: 
  - [XLSX.js](https://github.com/SheetJS/sheetjs) para leitura e processamento de planilhas.
- **Servidor local**: [XAMPP](https://www.apachefriends.org/).
- **Controle de versão**: Git e GitHub.

---

## **Como Executar o Projeto**

1. Clone este repositório em seu ambiente local:
   ```bash
   git clone https://github.com/tamonise/stocksense.git
   ```

2. Certifique-se de que você possui o **XAMPP** incluindo o **Apache** e **MySQL**
   
3. Certifique-se também de ter o **Workbench MySQL**
   
4. Acesse o localhost com seu usuário e senha (definidos no MySQL padrão:usuário:"root" senha:"")
   
5. No seu navegador acesse o localhost\login com seu usuário e senha
   
6. Crie um schema no Workbanch nomeado "stocksense"

7. Acesse C:/xampp/htdocs remova todos arquivos da pasta, EXCETO a pasta xampp

8. Coloque os arquivos do projeto na pasta **htdocs** do XAMPP:
   ```bash
   C:\xampp\htdocs\stocksense
   ```
9.Instale o composer https://getcomposer.org/download/

10. Inicie o servidor local no XAMPP.
    
11. Abra o terminar na raiz do projeto C:/xampp/htdocs e execute os seguintes comandos:
	- composer install
	- composer dump-autoload

12.Abra o projeto, no arquivo config/database.php altere o usuário e senha para o seu usuário e senha

13.Abra o arquivo de constants.php e altere a constante RUN_MIGRATIONS para true

14. Pelo navegador, acesse localhost/login

15.O acesso dessa rota constrói as tabelas no banco, abra o Workbanch e verifique se as tabelas foram criadas

16.No último passo, retorne no arquivo constants.php e altere a constante RUN_MIGRATIONS para false, para impedir que a rota programada limpe o banco


## **Estrutura do Projeto**



## **Contribuição**

Como este é um projeto acadêmico, contribuições externas estão restritas. No entanto, se você tiver sugestões, sinta-se à vontade para abrir uma _issue_ no repositório.

---

## **Autores**

Este projeto foi desenvolvido por Alana Silva Barbosa, Tamoni Monise Ferreira da Silva, Mateus Boletta Gonçalves  e Stella Maris Gonçalves do Bem como parte das atividades do curso de Ciência da Computação na **PUC Minas - Poços de Caldas**.

---

## **Licença**

Este projeto é de uso acadêmico e não possui uma licença aberta. Seu uso está restrito a fins educacionais.
