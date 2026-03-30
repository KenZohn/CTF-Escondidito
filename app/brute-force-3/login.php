<?php
session_start();

$user_decoded = base64_decode("bGFrdWth");
$password_hash = '$2y$12$wevYj9w72qMWD6TW.fJfruFzsDT46rLRj9FwoVKWsEfUbQ3Gso.2W';

if ($_POST) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == $user_decoded && password_verify($pass, $password_hash)) {
        $_SESSION['bruteforce3_logado'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Credenciais inválidas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 26px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 95%;
            padding: 10px;
            margin-top: 4px;
            background: #444;
            color: white;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #333;
        }

        .back a {
            display: block;
            width: 40%;
            margin: 10px auto;
            padding: 5px;
            background: #888;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 12px;
        }

        .back a:hover {
            background: #666;
        }

        .erro {
            color: #ff4d4d;
            font-weight: bold;
            margin-top: 10px;
            height: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST">
        <input name="user" placeholder="Usuário" required>
        <input type="password" name="pass" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <div class="back">
        <a href="/">Voltar</a>
    </div>

    <div class="erro">
        <?php
        if (isset($erro)) {
            echo $erro;
        }
        ?>
    </div>
</div>

<!-- lakuka -->

</body>
</html>