<?php

$host = "localhost";
$db = "loja";
$user = "root";
$pass = "";
$conexao = mysqli_connect($host, $user, $pass, $db);

if($conexao->connect_error) {
    die("Erro ao conectar" . $conexao->connect_error);
}
?>