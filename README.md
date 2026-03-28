# CTF-Escondidito

Um CTF de nível iniciante focado em brute-force em aplicações web.

- **CTF (Capture The Flag)** é um tipo de desafio onde o objetivo é encontrar informações secretas (flags) explorando vulnerabilidades.
- **Brute-force** é um método de invasão que testa várias senhas até encontrar a correta.

## Preparando o Ambiente

Para realizar o desafio, será necessário instalar:
- WSL
- Hydra
- Docker

### WSL (Linux do Windows)

O WSL é uma forma prática de utilizar os comandos Linux direto no Windows, caso não tenha o Linux.

Siga as instruções do guia oficial para instalar o WSL: https://learn.microsoft.com/pt-br/windows/wsl/install

### Hydra

O Hydra é uma ferramenta de brute-force automatizado.

Na interface de comando do WSL, instale o Hydra executando o seguinte comando:

```
sudo apt update
apt install hydra
```

### Docker

O Docker será necessário para executar o ambiente que será invadido, permitindo acessar a página Web em seu computador local.

Instale o Docker executando o seguinte comando:

```
apt install docker
```

Baixe ou clone esse repositório e na pasta do projeto execute o seguinte comando para iniciar o ambiente:

```
docker compose up
```

Mantenha o terminal aberto e abra outro para realizar as próximas tarefas.

Após iniciar o ambiente, acesse a página http://localhost:8080

## Guia do Desafio 1

O objetivo é descobrir as credenciais de login usando brute-force.

Na página inicial, acesse o desafio 1. Será aberta uma página de login, mas não sabemos qual é o usuário, nem a senha.

O nome de usuário está escondido no código fonte da tela de login. Clique com o botão direito do mouse na página e pressione em "Ver código-fonte". Veja se consegue encontrar o nome de usuário.

<details>
<summary><strong>Mostrar resposta</strong></summary>
O usuário é "user".
</details>

Agora que sabemos o nome de usuário, podemos utilizar o seguinte comando Hydra:
```
hydra -l <usuário> -P <lista-de-senhas> <IP-ou-URL-do-site> -s <porta> http-post-form "/<página>:user=^USER^&pass=^PASS^:<mensagem-de-erro>"
```
### Parâmetros
- usuário: usuário do login. Nesse caso é user.
- lista-de-senhas: arquivo .txt com várias senhas. Usaremos o password-list.txt que já está preparado.
- IP-ou-URL-do-site: endereço do alvo. Como a página está sendo executada localmente, usaremos 127.0.0.1
- porta: porta do site. Aqui usaremos a porta configurada no Docker: 8080
- página: endpoint de login. Para o desafio 1 é /desafio1/login.php
- mensagem-de-erro: mensagem exibida ao tentar realizar o login com as credenciais erradas.

Tente realizar o login com uma senha qualquer. Qual a mensagem de erro exibida?

<details>
<summary><strong>Mostrar resposta</strong></summary>
A mensagem de erro é "Credenciais inválidas". Essa é a mensagem que será utilizada no comando do Hydra.
</details>

O comando completo é:

```
hydra -l user -P password-list.txt 127.0.0.1 -s 8080 http-post-form "/desafio1/login.php:user=^USER^&pass=^PASS^:Credenciais inválidas"
```

Execute o comando no terminal e aguarde o processo finalizar.

Se tudo ocorrer bem e for encontrada uma credencial válida, será exibido o usuário e a senha. Agora podemos testá-las na página de login.

Qual a flag encontrada?
<details>
<summary><strong>Mostrar resposta</strong></summary>
flag{F3-3N-L4S-L0C4S}
</details>

Parabéns! Agora tente fazer o mesmo nos outros desafios.

## Aviso

Este projeto foi desenvolvido apenas para fins educacionais. As técnicas demonstradas simulam ataques em aplicações web dentro de um ambiente controlado. Não utilize essas práticas em sistemas reais sem autorização.
