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

$idProdutoEdit = filter_input(INPUT_POST, 'idProdutoEdit', FILTER_SANITIZE_NUMBER_INT);
$novo_nome = filter_input(INPUT_POST, 'novo-nome-produto', FILTER_SANITIZE_STRING);
$novo_valor = filter_input(INPUT_POST, 'novo-valor-produto', FILTER_VALIDATE_FLOAT);
$nova_descri = filter_input(INPUT_POST, 'nova-descri-produto', FILTER_SANITIZE_STRING);
$nova_categ = filter_input(INPUT_POST, 'nova-categoria-produto', FILTER_SANITIZE_STRING);

$url = null;
if (isset($_FILES["nova-foto-produto"])) {
    $arquivo_foto_produto = $_FILES["nova-foto-produto"];
    $pasta = "./Fotos-produtos/";
    $novo_nome_arquivo = uniqid();
    $nome_arquivo = $arquivo_foto_produto['name'];
    $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

    if ($extensao != 'jpg' && $extensao != 'png') {
        die("Tipo de arquivo inválido");
    } else {
        $url = $pasta . $novo_nome_arquivo . '.' . $extensao;
        $upload_aprovado = move_uploaded_file($arquivo_foto_produto['tmp_name'], $url);
        if (!$upload_aprovado) {
            die("Erro ao fazer upload do arquivo");
        }
    }
}

$sqlUpdate = "UPDATE produtos SET nome = '$novo_nome', valor = $novo_valor, categoria = '$nova_categ', descri = '$nova_descri'";
if (isset($url)) {
    $sqlUpdate .= ", url_imagem = '$url'";
}
$sqlUpdate .= " WHERE cod_produto = $idProdutoEdit";

if (mysqli_query($mysqli, $sqlUpdate)) {
    echo "<div class='cadastro-feito'><h1>Produto editado</h1><h2>com sucesso</h2><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
} else {
    echo "<div class='erro-cadastro'><h1>Erro ao editar</h1><p>{$mysqli->error}</p><a href='./pages/admin.php'>Voltar ao inicio</a></div>";
}
?>

</body>
</html>