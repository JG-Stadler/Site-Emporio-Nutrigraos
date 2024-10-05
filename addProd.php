<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cadastro.css">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <title>Cadastro Produto</title>
</head>
<body>
<?php
    include("conection.php");

    $query = "SELECT MAX(cod_produto) AS max_cod_prod FROM produtos";
    $result = $mysqli->query($query);

    if ($result) {
        $row = $result->fetch_assoc(); // Obtendo o resultado
        $cod_produto = $row["max_cod_prod"]+1;
    }
    $nome = filter_input(INPUT_POST,"nome-novo-produto",FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST,"valor-novo-produto",FILTER_VALIDATE_FLOAT);
    $descri = filter_input(INPUT_POST,"descri-novo-produto",FILTER_SANITIZE_STRING);
    $categ = filter_input(INPUT_POST,"categoria-novo-produto",FILTER_SANITIZE_STRING);

    $sql_insert = "INSERT INTO produtos (cod_produto,nome,valor,descri,categoria) VALUES ('$cod_produto','$nome','$valor','$descri','$categ');";
    if(mysqli_query($mysqli,$sql_insert)){
         echo "<div class='cadastro-feito'><h1>Cadastro do produto</h1><h2>Executado com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
    }
    else{
        echo "<div class='erro-cadastro'><h1>Erro ao cadastrar</h1><p>$mysqli->error</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
    }
?>
</body>
</html>