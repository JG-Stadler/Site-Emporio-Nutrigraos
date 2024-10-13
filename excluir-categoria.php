<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cadastro-edicao-exclusao.css">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <title>Excluir categoria</title>
</head>
<body>
    <?php
        include('conection.php');
        $nomeCategExclu = filter_input(INPUT_POST,'nome-categ-excluir', FILTER_SANITIZE_STRING);
        $sql = "DELETE FROM categoria WHERE nome_categ = '$nomeCategExclu';";
        
        if(mysqli_query($mysqli,$sql)){
            echo "<div class='excluido'><h1>Exclusão da categoria</h1><h2>Executada com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
        else{
            echo "<div class='erro-excluir'><h1>Erro ao excluir</h1><p>$mysqli->error</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
        }
    ?>
</body>
</html>