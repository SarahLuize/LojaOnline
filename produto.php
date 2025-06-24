<?php
require("conexao.php");

if(isset($_POST['btnApagar'])){
    $id = $_POST['btnApagar'];
    $sql = "DELETE FROM Produto WHERE id = $id";
    $result = $conexao->query($sql);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Produtos</title>
</head>
<body>
    <h1>Listagem de produtos</h1>

    <table border=1 >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>
        <?php 
        $resultado = $pdo->query("SELECT * FROM produto");
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo "R$ " . $linha ['preco'] ?></td>
            <td>Editar</td>
            <td>
                <form action="excluir.php" method="POST">
                <button type="submit" name="btnApagar" value="<?php echo $linha['id'] ?>">Apagar</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <form action="cadProduto.php" method="">
    <button type="submit">Novo Produto</button>
    </form>

</body>
</html>