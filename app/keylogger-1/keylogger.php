<!DOCTYPE html>
<html>
<head>
    <title>Keylogger</title>

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
    <div class="logger-view">
        <h3>Interceptando dados...</h3>
        <pre id="output"></pre>
    </div>

    <div class="back">
        <a href="login.php">Voltar</a>
    </div>
</div>

<script>
let lastText = "";
let currentIndex = 0;

function typeEffect(text) {
    let output = document.getElementById("output");

    function escrever() {
        if (currentIndex < text.length) {
            output.innerText += text[currentIndex];
            currentIndex++;
            setTimeout(escrever, 150); // velocidade da digitação
        }
    }

    escrever();
}

setInterval(() => {
    fetch("read_logs.php")
        .then(res => res.text())
        .then(data => {
            if (data !== lastText) {
                typeEffect(data.substring(lastText.length));
                lastText = data;
            }
        });
}, 500);
</script>

</body>
</html>