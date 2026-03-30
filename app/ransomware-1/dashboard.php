<?php
session_start();

include "crypto.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 10px;
            color: #ff4d4d;
        }

        .alert {
            color: #ff4d4d;
            font-weight: bold;
        }

        button {
            display: block;    
            width: 200px;
            padding: 10px;
            margin: 20px auto;
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

        #pay-button {
            display: block;    
            width: 200px;
            padding: 10px;
            margin: 20px auto;
            background: #ff4d4d;
            color: white;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .flag {
            margin-top: 20px;
            padding: 15px;
            background: #f4f4f4;
            border-radius: 5px;
            font-family: monospace;
            font-size: 16px;
        }

        input {
            width: 80%;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            text-align: center;
        }

        input:focus {
            border-color: #444;
        }

        .crypto-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .crypto-buttons button {
            margin: 10px 0;
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
    </style>
</head>

<body>

<div class="container">
    <h2>AVISO</h2>
    <p class="alert">Criptografamos seus dados e exigimos 101 bananas para restaurá-los!</p>

    <form method="POST">
        <button id="pay-button" type="submit" name="pay">Realizar pagamento</button>
    </form>

    <?php
    if (isset($_POST['pay'])) {
        echo "<p>Obrigado pelo pagamento, mas não vamos descriptografar!</p>";
    }
    ?>

    <div class="flag">
        <?php
        $conteudo = file_get_contents($arquivo);
        echo ($conteudo)
        ?>
    </div>

    <form method="POST">
        <input name="tipo" placeholder="Digite o tipo (ex: base64)">

        <div class="crypto-buttons">
            <button name="descriptografar">Descriptografar</button>
            <button name="criptografar">Reiniciar</button>
        </div>
    </form>

    <?php if ($mensagem != ""): ?>
        <p class="msg <?php echo $tipo_msg; ?>">
            <?php echo $mensagem; ?>
        </p>
    <?php endif; ?>

    <div class="back">
        <a href="/">Voltar</a>
    </div>
</div>

<!-- Base64 -->

</body>
</html>