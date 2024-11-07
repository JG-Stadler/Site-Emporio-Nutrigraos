<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos-globais.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" media="(max-width: 600px)" href="../styles/adaptar-tela-admin.css">

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
        <h1>Olá administrador</h1>
        <p class="m-0">Aqui está a listagem de produtos da loja:</p>
    </section>
    <section class="controles d-flex align-items-center justify-content-around">
        <button class="add-prod btn"
        onclick="AbrirFurmularioProd()">Adicionar produto</button>
        <button class="add-categ btn"
        onclick="AbrirFurmularioCateg()">Adicionar categoria</button>

        <section class="controle-de-categorias">
        <button id="mostrar-categorias" class="btn">Ver Categorias</button>
        <div class="vizualizar-categ">
            <?php
                include('../conection.php');
                $sqlCateg = "SELECT nome_categ FROM categoria;";
                $res = $mysqli -> query($sqlCateg);
                if($res->num_rows > 0){
                    if ($res->num_rows > 0) {
                        while($row = $res->fetch_assoc()) {
                            echo '<div class="op_categoria d-flex align-items-center"><p class="m-0">' . $row["nome_categ"] . '</p>
                            <img src="../images/icone-lixeira.png" onclick="DeletarCateg(this)"/>
                            </div>';
                        }
                    } else {
                        echo '<option value="">Nenhuma categoria encontrada</option>';
                    }
                }
                ?>
            </div>
        </section>

        <label for="input-pesquisa" class="barra-de-pesquisa d-flex align-items-center">
            <input type="search" id="input-pesquisa" placeholder="Buscar">
            <button id="pesquisar">
                <img class="lupa" src="../images/icone-lupa.png">
            </button>
        </label>
    </section>


    <main class="lista-produtos" id="lista-produtos">
    <?php
        $sql = "SELECT * FROM produtos ORDER BY nome";
        $result = $mysqli -> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){?>
            <div class="produto" id="<?php echo $row["cod_produto"]?>">
            <img class="foto-prod" src='<?php 
                        if($row['url_imagem'] != ''){
                            echo '.'.$row["url_imagem"];
                        }else{
                            echo '../images/imagem-nao-encontrada.jpg';
                        }
            ?>'>
            <h1 class="nome m-0"><?php echo $row["nome"]?></h1>
            <p class="categ m-0"><?php echo $row["categoria"]?></p>
            <p class="descri m-0"><?php echo $row["descri"]?></p>
            <p class="valor m-0">R$<?php echo $row["valor"]?></p>

            <div class="controles-produto d-flex">
                    <button id="editar-produto" class="btn p-0" onclick="JanelaDeEdicao(this)">
                        <img src="../images/icone-lapis.png" alt="editar produto"  title="Editar Produto">
                    </button>
                    
                    <button id="excluir-produto" class="btn p-0" onclick="JanelaDeExclusao(this)">
                        <img src="../images/icone-lixeira.png" alt="Excluir produto" title="Excluir Produto"/>
                    </button>
                </div>
            </div>
        </div>
        <?php }
        }else{
            echo "Não há produtos no banco de dados";
        }
    ?>
    </main>
    <form method="post" action="../addProd.php" id="novo-produto"
    class="flex-column" enctype="multipart/form-data">
        <span class="align-self-end" onclick="CloseFormProd()">X</span>
        <h1>Adicionar um novo produto</h1>
        <label for="nome-novo-produto">Nome:</label>
        <input type="text" name="nome-novo-produto" id="nome-novo-produto" required>
        <label for="descri-novo-produto">Descrição:</label>
        <textarea name="descri-novo-produto" id="descri-novo-produto"></textarea>
        <label for="">Valor:</label>
        <input type="number" step="0.01" name="valor-novo-produto" id="valor-novo-produto" required>
        <label for="ategoria-novo-produto">Categoria:</label>
        <select name="categoria-novo-produto" id="categoria-novo-produto">
        <?php
            $sql = "SELECT nome_categ FROM categoria";
            $result = $mysqli->query($sql);
            // Gerar dinamicamente as opções do select
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['nome_categ'] . '">' . $row['nome_categ'] . '</option>';
                }
            } else {
                echo '<option value="">Nenhuma categoria encontrada</option>';
            }
        ?>
        </select>
        <label for="foto-novo-produto">Foto do Produto:</label>
        <input type="file" name="foto-novo-produto" id="foto-novo-produto"
         accept="image/*">
        <input type="submit" value="Adicionar" class="add-prod-btn">
    </form>

    <form method="get" action="../addCateg.php" id="nova-categoria" class="flex-column">
        <span class="align-self-end" onclick="CloseFormCateg()">X</span>
        <label for="nome-categoria">Nome da categoria</label>
        <input type="text" id="nome-categoria" name="nome-categoria" required>
        <input type="submit" value="Adicionar" class="add-categ-btn">
    </form>

    <div class="excluir-produto">
        <h1>Tem certeza que deseja excluir esse produto?</h1>
        <button id="confirmarExclu">Sim</button>
        <button onclick="FecharJanelaDeExclusao()">Não</button>
    </div>

    <form action="../excluir-produto.php" class="excluir-prod-form" id="excluir-prod-form" method="post">
        <input type="number" id="idExcluir" name="idExcluir">
        <input type="submit" id="solicitarExclusao">
    </form>
    <form action="../excluir-categoria.php" class="excluir-categ-form"
    method="post" id="excluir-categ-form">
        <input type="text" id="nome-categ-excluir" name="nome-categ-excluir">
        <input type="submit" id="solicitar-exclusao">
    </form>

    <form method="post" action="../editProd.php" id="editar-produto-form"
    class="flex-column" enctype="multipart/form-data">
        <span class="align-self-end" onclick="FecharJanelaDeEdicao()">X</span>
        <h1 class="align-self-center">Editar produto</h1>
        <input type="number" name="idProdutoEdit" id="IdProdutoEdit">
        <label for="novo-nome-produto">Nome:</label>
        <input type="text" name="novo-nome-produto" id="novo-nome-produto" required>
        <label for="nova-descri-produto">Descrição:</label>
        <textarea name="nova-descri-produto" id="nova-descri-produto"></textarea>
        <label for="novo-valor-produto">Valor:</label>
        <input type="number" step="0.01" name="novo-valor-produto" id="novo-valor-produto" required>
        <label for="nova-categoria-produto">Categoria:</label>
        <select name="nova-categoria-produto" id="nova-categoria-produto">
        <?php
            $sql = "SELECT nome_categ FROM categoria";
            $result = $mysqli->query($sql);
            // Gerar dinamicamente as opções do select
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['nome_categ'] . '">' . $row['nome_categ'] . '</option>';
                }
            } else {
                echo '<option value="">Nenhuma categoria encontrada</option>';
            }
        ?>
        </select>
        <label for="nova-foto-produto">Foto do Produto:</label>
        <input type="file" name="nova-foto-produto" id="nova-foto-produto" accept="image/*">
    

        <input type="submit" value="Salvar Alterações" class="edit-prod-btn">
    </form>
    <script src="../js/script-admin.js"></script>
</body>
</html>