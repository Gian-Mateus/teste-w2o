# Controle de Estoque

Este é um projeto de controle de estoque simples desenvolvido com o Laravel 11.

## Iniciando a aplicação

Para iniciar a aplicação, siga os seguintes passos:

1. Baixe o projeto e extraia-o para uma pasta.
2. Abra o terminal e navegue até a pasta do projeto.
3. Execute o comando `composer install` para instalar as dependências do projeto.
4. Execute o comando `php artisan migrate --seed` para criar as tabelas do banco de dados e semear com alguns dados fakes.
(Usei MySQL para o banco de dados)
5. Execute o comando `php artisan key:generate` para gerar uma chave de segurança para a aplicação.
6. Execute o comando `npm run dev` e `php artisan serve` para iniciar o servidor web da aplicação.
7. Acesse a URL `http://localhost:8000` no seu navegador para acessar a aplicação.

## Não esqueça de rodar o servidor SQL no caso de testar com MySQL

## Observações

Não há todos os dados para testar toda a aplicação, então deve cadastrar algumas movimentações e inserir algumas imagens para ver o há tudo pronto.
Dos requisitos do teste mantive a maioria, não consegui (tempo hábil devido a rotina) trabalhar com todas as tratativas de erro do projeto, somente as principais validações dos inputs e integridade dos dados.

Este projeto foi desenvolvido com o Laravel 11 e utiliza as seguintes tecnologias:

* Bootstrap 5
* JavaScript
* MySQL

O projeto foi desenvolvido para fins de estudo e não é recomendado para uso em produção.