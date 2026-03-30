<?php
$arquivo = "flag.txt";
$mensagem = "";
$tipo_msg = "";

function criptografar($conteudo) {
    if ($conteudo === "flag{L4-KUK4R4CH4-V0L4D0R4}") {
        return str_rot13($conteudo);
    }
    return false;
}

function descriptografar($conteudo, $tipo) {
    if ($conteudo !== "flag{L4-KUK4R4CH4-V0L4D0R4}" && $tipo === "rot13") {
        return str_rot13($conteudo);
    }
    return false;
}

if (isset($_POST['criptografar'])) {
    $tipo = $_POST['tipo'];

    $conteudo = file_get_contents($arquivo);
    $novo = criptografar($conteudo);

    if ($novo !== false) {
        file_put_contents($arquivo, $novo);
        $mensagem = "Desafio reiniciado";
        $tipo_msg = "info";
    }
}

if (isset($_POST['descriptografar'])) {
    $tipo = strtolower($_POST['tipo']);

    $conteudo = file_get_contents($arquivo);
    $novo = descriptografar($conteudo, $tipo);

    if ($novo !== false) {
        file_put_contents($arquivo, $novo);
        $mensagem = "Dados descriptografados com sucesso!";
        $tipo_msg = "success";
    } else {
        $mensagem = "Tipo de criptografia incorreto.";
        $tipo_msg = "error";
    }
}
?>