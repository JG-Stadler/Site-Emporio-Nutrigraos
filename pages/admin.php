<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos-globais.css">
    <link rel="stylesheet" href="../styles/admin.css">

    <title>Admin nutrigãos</title>
</head>
<body>
    <header class="cabecalho d-flex align-items-center">
        <div>
            <img src="../images/logo-nutrigraos-branca.png" class="logo" alt="Logo">
            <p>admin</p>
        </div>
    </header>
    <section class="boas-vindas">
        <h1>Olá usuário</h1>
        <p class="m-0">Aqui está a listagem de produtos da loja:</p>
    </section>
    <section class="controles d-flex align-items-center justify-content-around">
        <button class="add-prod btn">Adicionar produto</button>
        <button class="add-categ btn">Adicionar categoria</button>
        <label for="input-pesquisa" class="barra-de-pesquisa d-flex align-items-center">
            <input type="search" id="input-pesquisa" placeholder="Buscar">
            <button id="pesquisar">
                <img class="lupa" src="../images/icone-lupa.png">
            </button>
        </label>
    </section>
    <div class="barra-separar-conteudo"></div>
    <main class="lista-produtos">
    <?php
        include_once('../conection.php');
        $sql = "SELECT * FROM produtos ORDER BY nome";
        $result = $mysqli -> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){?>
            <div class="produto" id="<?php echo $row["cod_produto"]?>">
                <img src="<?php echo $row["url_imagem"]?>" alt="ft-produto" class="foto-prod">
                <p class="nome m-0"><?php echo $row["nome"]?></p>
                <p class="descri m-0"><?php echo $row["descri"]?></p>
                <p class="valor m-0">R$<?php echo $row["valor"]?></p>

                <button id="editar-produto" class="btn p-0">
                    <img src="../images/icone-lapis.png" alt="editar produto"  title="Editar Produto">
                </button>
                
                <button id="excluir-produto" class="btn p-0">
                    <img src="../images/icone-lixeira.png" alt="Excluir produto" title="Excluir Produto"/>
                </button>
            </div>
        <?php }
        }else{
            echo "Não há produtos no banco de dados";
        }
    ?>
    </main>
    <form action="addProd.php" id="novo-produto" class="d-flex flex-column">
        <h1>Adicionar um novo produto</h1>
        <label for="nome-novo-produto">Nome:</label>
        <input type="text" name="nome-novo-produto" id="nome-novo-produto">
        <label for="descri-novo-produto">Descrição:</label>
        <textarea name="descri-novo-produto" id="descri-novo-produto"></textarea>
        <label for="">Valor:</label>
        <input type="number" name="valor-novo-produto" id="valor-novo-produto">
        <label for="ategoria-novo-produto">Categoria:</label>
        <select name="categoria-novo-produto" id="categoria-novo-produto">
            <option value="graos">Grãos</option>
        </select>
    </form>
</body>
</html>