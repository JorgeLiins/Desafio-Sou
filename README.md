# Desafio Sou

Olá, eu me chamo Jorge Lins e venho apresentar o meu desafio para sou energy

## Sumário

- [Instalação](#autor)
- [Desafio](#desafio)
  - [Screenshots](#screenshots)
- [Features](#features)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Instalação](#instalacao)
- [Uso](#compile-and-minify-for-production)


## Instalação



## Desafio

```
Requisitos Funcionais:
1. Desenvolver um módulo responsável pela exibição do modal de notificação,
contendo:
    ○ Um botão para ativar/desativar a exibição da notificação.

2. O sistema deve verificar se o usuário já aceitou os termos da política de privacidade
previamente, para evitar múltiplas notificações.

3. No painel administrativo, na grid de clientes, deve ser possível visualizar se o cliente
já aceitou ou não os termos de privacidade.
```

## Explicação de como realizei os requisitos

1. Desenvolver um módulo responsável pela exibição do modal de notificação,
contendo: Um botão para ativar/desativar a exibição da notificação:

- Eu fiz uma notificação que aparece sempre na primeira vez que o cliente entra no site, a resposta da notificação fica salva nos cookies do navegador, então caso o cliente opte por não receber notificações, não vai mais aparecer(ah não ser que o cliente resete os coookies do navegador).

- Prints: 

![](./img/Modal1)
![](./img/Modal2)

2. O sistema deve verificar se o usuário já aceitou os termos da política de privacidade
previamente, para evitar múltiplas notificações.

- Quando o cliente for realizar o cadastro, surge um modal com os temos da politica de privacidade para aceitar ou recusar, fica salvo em uma tabela no banco de dados.


3. No painel administrativo, na grid de clientes, deve ser possível visualizar se o cliente
já aceitou ou não os termos de privacidade.

- Eu consegui criar uma coluna na pagina de costumers do admin que deveria aparecer se o cliente aceitou ou recusou, porém não consegui fazer a integração para puxar a resposta

