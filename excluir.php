<?php
require("conexao.php");
    $id = $_POST['btnApagar'];

    $resultado = $pdo->prepare("DELETE FROM produto_caracteristica WHERE id_produto = ?");
    $resultado->execute([$id]);

    $resultado = $pdo->prepare("DELETE FROM estoque WHERE id_produto = ?");
    $resultado->execute([$id]);

    $resultado = $pdo->prepare("DELETE FROM produto WHERE id = ?");
    $resultado->execute([$id]);
    header("Location: produto.php");
?>