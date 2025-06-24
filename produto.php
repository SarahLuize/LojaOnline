<?php
require("conexao.php");

if(isset($_POST['btnApagar'])){
    $id = $_POST['btnApagar'];

    $sql = "DELETE FROM Produto_Caracteristica WHERE id_produto = $id";
    $result = $conexao->query($sql);

    $sql = "DELETE FROM Estoque WHERE id_produto = $id";
    $result = $conexao->query($sql);

    $sql = "DELETE FROM Produto WHERE id = $id";
    $result = $conexao->query($sql);
}

if(isset($_POST['btnBuscar'])){
    if(isset($_POST['select'])){
        $ordem = $_POST['select'];
        $sql = "SELECT * FROM Produto ORDER BY $ordem";
        $resultado = $conexao->query($sql);
        $conexao->close();
    }else{
        $texto = $_POST['txtPesq'];
        $sql = "SELECT * FROM Produto WHERE nome LIKE '%$texto%'";
        $resultado = $conexao->query($sql);
        $conexao->close();
    }
}else{
    $sql = "SELECT * FROM Produto";
    $resultado = $conexao->query($sql);
    $conexao->close();
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

    <form method="POST" action="">
        <select name="select">
            <option value="preco">Preço</option>
            <option value="nome">Nome</option>
        </select>
        <button type="submit" name="btnBuscar">Ordenar</button>
    </form>

    <form method="POST" action="">
        <input type="text" id="txtPesq" name="txtPesq" placeholder="Digite o nome do produto...">
        <button type="submit" name="btnBuscar">Buscar</button>
    </form>

    <table border=1 >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>
        <?php while($linha = $resultado->fetch_assoc()):?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo "R$ " . $linha ['preco'] ?></td>
            <td>Editar</td>
            <td><form action="" method="POST">
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