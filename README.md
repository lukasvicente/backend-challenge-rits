
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
- Seed no banco

```sh 
$ php artisan db:seed
```

- Aplicação em execulção

```sh 
$ php artisan serve
```


### User Padrão
Login   | Senha
------- | ------
admin@admin.com | 321

## API RESTFul
 
### Criar cliente

**Method:** [![Badge](https://img.shields.io/badge/-POST-red)](#)  
```sh 
 http://localhost:8000/api/cliente/register
```
**Parâmetros** Body

Field   | Type  | Description
------- | ------|---------
nome | String | Required
email | String | Required, Unique
telefone | String | Required, Unique
endereco | String | Required

Response:
```sh 
{
  "created": {
    "nome": "Lucas",
    "email": "lucas@user.com",
    "telefone": "8838111",
    "endereco": "av das flores",
    "updated_at": "2020-08-06T07:28:49.000000Z",
    "created_at": "2020-08-06T07:28:49.000000Z",
    "id": 1
  }
}
```


### Listar Produto

**Method:** [![Badge](https://img.shields.io/badge/-GET-blue)](#)
```sh 
http://localhost:8000/api/produto/list
```
### Criar Pedido

**Method:** [![Badge](https://img.shields.io/badge/-POST-red)](#)
```sh 
 http://localhost:8000/api/cliente/pedido/create
```
**Parâmetros**

Field   | Type  | Description
------- | ------|---------
cliente_id | Int | Required
produto_id | Array | Required 
 
Ex.:: Body
```sh 
{
	"cliente_id":1 ,
	"produto_id": [1,2,3]
}
```
Response:
```sh 
{
  "created": {
    "cliente_id": 1,
    "status": "pendente",
    "updated_at": "2020-08-06T07:44:06.000000Z",
    "created_at": "2020-08-06T07:44:06.000000Z",
    "id": 1
  }
}
```

### Listar Pedidos do cliente

**Method:** [![Badge](https://img.shields.io/badge/-GET-blue)](#)
```sh 
http://localhost:8000/api/cliente/pedido/list
```
**Parâmetros**

Field   | Type  | Description
------- | ------|---------
cliente_id | Int | Required
 
 
Ex.:: Body
```sh 
{
	"cliente_id":1 
 
}
```
Response:
```sh 
  "Pedidos": [
    {
      "id": 1,
      "nome": "Lucas",
      "email": "lucas@user.com",
      "telefone": "8838111",
      "endereco": "av das flores",
      "created_at": "2020-08-06T07:28:49.000000Z",
      "updated_at": "2020-08-06T07:28:49.000000Z",
      "pedido": [
        {
          "id": 1,
          "cliente_id": 1,
          "status": "pendente",
          "created_at": "2020-08-06T07:44:06.000000Z",
          "updated_at": "2020-08-06T07:44:06.000000Z"
        }
      ]
    }
  ]
}
```
### Listar Produtos do Pedidos

**Method:** [![Badge](https://img.shields.io/badge/-GET-blue)](#)
```sh 
http://localhost:8000/api/cliente/pedido/detail/{pedido_id}
```
**Parâmetros**

Field   | Type  | Description
------- | ------|---------
cliente_id | Int | Required
 
 
Ex.:: Body

```sh 
{
	"cliente_id":1 
 
}
```
Response:
```sh 
  [
  {
    "id": 22,
    "cliente_id": 20,
    "status": "pendente",
    "created_at": null,
    "updated_at": null,
    "produto": [
      {
        "id": 17,
        "nome": "Hamburguer Queijo",
        "preco": "25.00",
        "created_at": "2020-08-03T17:55:29.000000Z",
        "updated_at": "2020-08-03T17:55:29.000000Z",
        "pivot": {
          "pedido_id": 22,
          "produto_id": 17
        }
      },
      {
        "id": 25,
        "nome": "Hamburguer Frango",
        "preco": "15.00",
        "created_at": "2020-08-04T13:19:56.000000Z",
        "updated_at": "2020-08-04T13:19:56.000000Z",
        "pivot": {
          "pedido_id": 22,
          "produto_id": 25
        }
      },
      {
        "id": 26,
        "nome": "Hamburguer Carne",
        "preco": "12.00",
        "created_at": "2020-08-04T13:20:07.000000Z",
        "updated_at": "2020-08-04T13:20:07.000000Z",
        "pivot": {
          "pedido_id": 22,
          "produto_id": 26
        }
      }
    ]
  }
]
```

### Deletar Pedidos do cliente

**Method:** [![Badge](https://img.shields.io/badge/-DELETE-green)](#)
```sh 
http://localhost:8000/api/cliente/pedido/delete/{pedido_id}
```
**Parâmetros**

Field   | Type  | Description
------- | ------|---------
cliente_id | Int | Required
 
 
Ex.:: Body
```sh 
{
	"cliente_id":1 
 
}
```
Response:
```sh 
 "Delete Sucess"
```


