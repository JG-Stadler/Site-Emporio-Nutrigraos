<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cadastro-edicao-exclusao.css">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <title>Edição de Produtos</title>
</head>
<body>
    <?php
        include('conection.php');
        $idProdutoEdit = filter_input(INPUT_POST,'idProdutoEdit', FILTER_SANITIZE_NUMBER_INT);        
        $novo_nome = filter_input(INPUT_POST,'novo-nome-produto', FILTER_SANITIZE_STRING);
        $novo_valor = filter_input(INPUT_POST,'novo-valor-produto', FILTER_VALIDATE_FLOAT);
        $nova_descri = filter_input(INPUT_POST,'nova-descri-produto', FILTER_SANITIZE_STRING);
        // $nova_categ = filter_input(INPUT_POST,'nova-categoria-produto', FILTER_SANITIZE_STRING);

        $sqlUpdate = "UPDATE produtos SET nome = '$novo_nome',valor = $novo_valor, descri = '$nova_descri' WHERE cod_produto = $idProdutoEdit;";

        if(mysqli_query($mysqli,$sqlUpdate)){
            echo "<div class='cadastro-feito'><h1>Produto editado</h1><h2>com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
        else{
            echo "<div class='erro-cadastro'><h1>Erro ao editar</h1><p>$mysqli->error</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
    ?>
</body>
</html>