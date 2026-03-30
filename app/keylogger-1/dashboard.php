<?php
session_start();

if (!isset($_SESSION['keylogger1_logado'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acesso Negado</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #ff4d4d;
        }
    </style>
</head>

<body>
    <h2>Acesso negado</h2>
</body>
</html>
<?php
exit;
}
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
        }

        .flag {
            margin-top: 20px;
            padding: 15px;
            background: #f4f4f4;
            border-radius: 5px;
            font-family: monospace;
            font-size: 16px;
        }

        .logout {
            margin-top: 20px;
        }

        .logout a {
            display: block;
            width: 200px;
            text-decoration: none;
            background: #444;
            color: white;
            font-weight: bold;
            margin: 20px auto;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
        }

        .logout a:hover {
            background: #333;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Login realizado com sucesso!</h2>

    <div class="flag">
        <?php
        $flag_codificada = "ZmxhZ3tMNC1LVUs0UjRDSDQtTDREUjBONH0=";
        echo base64_decode($flag_codificada);
        ?>
    </div>

    <div class="logout">
        <a href="logout.php">Sair</a>
    </div>
</div>

</body>
</html>