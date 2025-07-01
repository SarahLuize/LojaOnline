<?php
    include 'conexao.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $resultado = $pdo->prepare("UPDATE produto SET nome = ?, preco = ? WHERE id = ?");

    $resultado->execute([$nome, $preco, $id]);
    header("Location: produto.php");

?>