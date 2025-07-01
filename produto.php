<?php
    require("conexao.php");
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

    <table border=1 id="tblProdutos" class="display" style="width:100%">
        <thead>    
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $resultado = $pdo->query("SELECT * FROM produto");
            while($linha = $resultado->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha['nome'] ?></td>
                <td><?php echo "R$ " . $linha ['preco'] ?></td>
                <td>
                    <form action="editar.php" method="POST">
                    <button type="submit" name="btnEditar" value="<?php echo $linha['id'] ?>">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="excluir.php" method="POST">
                    <button type="submit" name="btnApagar" value="<?php echo $linha['id'] ?>">Apagar</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <form action="cadProduto.php" method="">
    <button type="submit">Novo Produto</button>
    </form>

    <!-- jQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
    <script>
    $(document).ready(function() {
        $('#tblProdutos').DataTable({
            "paging": true,       // Desativamos porque já usamos paginação PHP
            "searching": true,    // Desativamos porque já temos um campo próprio de busca
            "info": true,          // Oculta informações de exibição
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            }
        });
    });
    </script>

</body>
</html>