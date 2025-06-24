<?php
require("conexao.php");

if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['txtNome'];
    $preco = $_POST['txtPreco'];

    $resultado = $pdo->prepare("INSERT INTO Produto (nome, preco, categoria) VALUES(?, ?, ?)");
    $resultado->execute([$nome, $preco, 'Informatica']);

    header("Location: produto.php");

    //$sql = "INSERT INTO Produto (nome, preco, categoria) VALUES('$nome', $preco, 'Informatica')";
    //$resultado = $conexao->query($sql);
    //header("Location: produto.php");
    //$conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de produto</title>
</head>

<body>
        <h1>Cadastro de produto</h1>
        <br>

        <form action="" method="POST">
            <p>Informe o nome do produto:
            <input type="text" name="txtNome">
            </p>
            <p>Preço: R$
                <input type="text" name="txtPreco">
            </p>
            <input type="submit" name="btnSalvar" value="cadastrar">
        </form>
</body>

</html>