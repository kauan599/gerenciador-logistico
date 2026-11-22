# LogiControl — Gerenciador Logístico

Projeto acadêmico desenvolvido para a disciplina **Fundamentos de Programação para Internet**. A aplicação permite organizar produtos, endereços, transportadores e fretes.

## Tecnologias
- PHP 8+ (backend e processamento dos dados)
- MySQL / MariaDB
- HTML5, CSS3 e JavaScript
- Bootstrap 5.3
- Git e GitHub para versionamento

## Funcionalidades
- Painel com indicadores e fretes recentes.
- Cadastro, edição e exclusão de produtos, endereços e transportadores.
- Geração de fretes relacionando origem, destino e transportador.
- Associação de vários produtos a um mesmo frete (relação 1:N por meio da tabela `frete_produtos`).
- Consulta de fretes e relatório filtrado por dia, com exportação CSV.

## Como executar no XAMPP
1. Copie a pasta `gerenciador_logistico` para `C:\xampp\htdocs\`.
2. Abra o painel do XAMPP e inicie **Apache** e **MySQL**.
3. Acesse `http://localhost/phpmyadmin`.
4. Importe o arquivo `database.sql` para criar o banco e as tabelas.
5. Confira as credenciais em `includes/db.php` (padrão XAMPP: usuário `root` e senha vazia).
6. Acesse `http://localhost/gerenciador_logistico/`.
7. Cadastre primeiro produtos, dois ou mais endereços e um transportador. Depois gere um frete.

## Estrutura
- `index.php`: painel inicial.
- `produtos.php`, `enderecos.php`, `transportadores.php`: listagens.
- `*_form.php`: formulários de cadastro e edição.
- `save.php`: processamento dos cadastros com PHP e PDO.
- `frete_form.php` / `frete_save.php`: criação de fretes e associação de produtos.
- `relatorios.php` / `relatorio_csv.php`: consulta e exportação por data.
- `includes/`: conexão, funções comuns, cabeçalho e rodapé.
- `assets/`: CSS e JavaScript.
- `database.sql`: estrutura do banco de dados.

## Versionamento Git
Na pasta do projeto, execute:
```bash
git init
git add .
git commit -m "Versão inicial do gerenciador logístico"
git branch -M main
git remote add origin https://github.com/SEU-USUARIO/gerenciador-logistico.git
git push -u origin main
```
Substitua `SEU-USUARIO` pelo seu usuário do GitHub. Faça novos commits a cada alteração relevante.

## Observação acadêmica
O sistema é uma implementação didática. Antes da apresentação, teste o cadastro, edição, exclusão, criação de frete com mais de um produto e exportação CSV no ambiente XAMPP.
