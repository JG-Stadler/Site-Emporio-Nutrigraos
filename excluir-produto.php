<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <?php
        include('conection.php');
        $idProdutoExcluido = filter_input(INPUT_POST,'idExcluir', FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM produtos WHERE cod_produto = $idProdutoExcluido";
        
        if(mysqli_query($mysqli,$sql)){
            echo "<div class='produto-excluido'><h1>Exclusão do produto</h1><h2>Executada com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
        else{
            echo "<div class='erro-excluir'><h1>Erro ao excluir</h1><p>$mysqli->error</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
    ?>
</body>
</html>