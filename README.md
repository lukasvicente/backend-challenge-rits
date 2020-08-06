# Challenge Rits Tecnologia

Desafio para desenvolvedor backend para Rits Tecnologia.


<https://github.com/rits-tecnologia/backend-challenge>

## Sobre o projeto
### Desafio:
Por esse desafio, o desenvolvedor deverá mostrar ser capaz de desenvolver uma API RESTFul, utilizando Laravel para criar pedidos de uma lanchonete, e um painel administrativo para cadastrar os produtos e gerenciar os pedidos.

O projeto foi desenvolvido no framework PHP [Laravel](https://laravel.com/) em conjunto com o template [Bootstrap AdminLTE](https://adminlte.io/).

## Solução do problema
Foi apresentado um cenário em que uma lanchonete precisa administrar seus pedidos e produtos. A solução encotrada foi com o framework Laravel em que sua arquitetura definida, ajuda a desenvolver um produto conciso e estável, com padrões de projeto bem definidos. 

## Getting Started Guide
Guia de instalação da aplicação, Documentação: <https://laravel.com/docs/7.x/installation>

### Pré-requisitos
 
- Composer
- PHP >= 7.1.3

### Instalação
- Clonar repositorio 
```sh 
$ git clone https://github.com/lukasvicente/backend-challenge-rits.git
```
- Ir até a pasta da api-laravel
```sh 
$ cd backend-challenge-rits/api-laravel/
```
 - Instalar o composer
 ```sh 
$ composer install
```
- Renomear ou Copiar .env.example arquivo para .env #editar campos com credenciais do banco
```sh 
$ cp .env.example .env 
```
- Gerar key

```sh 
$ php artisan key:generate
```
- Gerar migrate da aplicação

```sh 
$ php artisan migrate
```
- Aplicação em execulção

```sh 
$ php artisan serve
```


