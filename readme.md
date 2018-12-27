# Crawler

## Especificações

- PHP 7.1.9
- Laravel 5.5
- MySQL 5.7.19

## Como testar

1. Baixe o código deste repositório, extraia os arquivos e mova-os para onde desejar
2. Abra o terminal de comandos, aponte para a pasta escolhida e rode o comando [composer install]
3. Crie o Schema no banco de dados myslq com o nome de  "crawler"
4. Rode o comando [php artisan serve] para que o servidor de desenvolvimento do Laravel seja iniciado
Se estiver em algum servidor ou ferramentas como o Wamp, crie um host e aponte para a pasta public na raiz do projeto.

## Rotas

### [GET] /
Rota padrão para execução

### [GET] laravel/artisan/migrate
Para execução da criação da tabela nescessaria dentro do Schema.
pode ser execultado via linha de com [php artisan migrate]


## Autor
Mateus Martins <mateusmrj@gmailcom>
