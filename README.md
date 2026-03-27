# CTF-Escondidito

Em construção

CTF (Capture The Flag) é um desafio onde o usuário tem como objetivo invadir um sistema e obter informações secretas (flags).

Este é um CTF de nível iniciante com o intuito de introduzir como é realizado invasões de páginas Web utilizando o método brute-force.

Brute-force: é um método de invasão que testa várias senhas até encontrar uma que funcione.

Para isso será necessário ter algumas ferramentas intaladas:
- Docker: para executar o ambiente que será invadido, permitindo acessar a página Web em seu computador local.
- Hydra: ferramenta de automatização de brute-force.
- WSL: forma prática de utilizar os comandos Linux direto no Windows, caso não tenha o Linux.

## Instalar o WSL ou Linux

Veja como instalar o WSL nesse link: https://learn.microsoft.com/pt-br/windows/wsl/install?utm_source=chatgpt.com

## Instalar Docker

apt install docker

## Instalar Hydra

apt install hydra

## Levantar o Docker

## Acessar a página

## Passo a passo do desafio 1

hydra -l <usuário> -P <lista-de-senhas> <IP-ou-URL-do-site> -s <porta> http-post-form "/<página>:user=^USER^&pass=^PASS^:<mensagem-de-erro>"
- usuário: nome de usuário que será utilizado para realizar o login. Exemplo: admin
- lista-de-senhas: arquivo .txt que contém as senhas que serão testadas. Exemplo: uma lista contendo: 123, abc123, qwert, etc.
- IP-ou-URL-do-site: endereço da página alvo. Exemplo: 127.0.0.1
- porta: porta do site caso tenha. Exemplo: 8080
- página: o diretório da página alvo. Exemplo: login.php
- mensagem-de-erro: mensagem exibida ao tentar realizar o login com as credenciais erradas. Exemplo: "Senha errada"

hydra -l user -P password-list.txt 127.0.0.1 -s 8080 http-post-form "/desafio1/login.php:user=^USER^&pass=^PASS^:Credenciais inválidas"
