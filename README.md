# Desafio Sou

Olá, eu me chamo Jorge Lins e venho apresentar o meu desafio para sou energy

## Sumário

- [Instalação](#instalacao)
- [Desafio](#desafio)
- [Explicação](#Explicação-de-como-realizei-os-requisitos)


## Instalação


```
Dê clone no meu git:
- git clone https://github.com/JorgeLiins/Desafio-Sou.git

após o clone, suba o docker usando:
- docker compose up -d

Depois disso use os seguintes comandos:

bin/start

bin/setup magento.test

Você abre o projeto na ide de preferencia, pega as pastas code e design que estão no zip e extrai elas para dentro de src/app

Depois de fazer isso, você precisa rodar alguns comandos

bin/magento module:disable Magento_TwoFactorAuth

bin/magento module:enable Modal_Promotion Terms_Conditions

bin/magento setup:upgrade

bin/magento setup:di:compile

bin/magento cache:flush

Pronto, o seu projeto deve estar online com os modulos criados para o desafio

Você pode ver o login original do admin dentro do arquivo: /env/magento.env



```


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

- Estrutura do modulo:

```
app/code/Modal/Promotion/
├── etc/
│   ├── module.xml
│   └── frontend/
│       └── routes.xml
├── registration.php
├── view/
│   └── frontend/
│       ├── layout/
│       │   └── default.xml
│       ├── templates/
│       │   └── modal.phtml
│       └── web/
│           ├── css/
│           │   └── styles.css
│           └── js/
│               └── modal.js
```

- Prints: 

![](./img/Modal1)
![](./img/Modal2)

2. O sistema deve verificar se o usuário já aceitou os termos da política de privacidade
previamente, para evitar múltiplas notificações.

- Quando o cliente for realizar o cadastro, surge um modal com os temos da politica de privacidade para aceitar ou recusar, fica salvo em uma tabela no banco de dados.


3. No painel administrativo, na grid de clientes, deve ser possível visualizar se o cliente
já aceitou ou não os termos de privacidade.

- Eu consegui criar uma coluna na pagina de costumers do admin que deveria aparecer se o cliente aceitou ou recusou, porém não consegui fazer a integração para puxar a resposta

