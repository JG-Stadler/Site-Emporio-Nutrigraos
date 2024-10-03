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
    $nome = filter_input(INPUT_GET,"nome-novo-produto",FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_GET,"valor-novo-produto",FILTER_VALIDATE_FLOAT);
    $descri = filter_input(INPUT_GET,"descri-novo-produto",FILTER_SANITIZE_STRING);
    $categ = filter_input(INPUT_GET,"categoria-novo-produto",FILTER_SANITIZE_STRING);

    $result = "INSERT INTO categoria (nome,valor,descri,categ) VALUES ('$nome','$valor','$descri','$categ');";
    if(mysqli_query($mysqli,$result)){
         echo "<div class='cadastro-feito'><h1>Cadastro do produto</h1><h2>Executado com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
    }
    else{
        echo "<div class='erro-cadastro'><h1>Erro ao cadastrar</h1><p>Volte à pagina inicial e tente novamente</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
    }
?>
</body>
</html>