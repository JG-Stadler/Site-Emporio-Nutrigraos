<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" media="(max-width:700px)" href="styles/adaptar-tela-index.css">
    <script src="js/cart.js" defer></script>
    <script src="js/menu-main-page.js" defer></script>
    <script src="js/produto-info.js" defer></script>
    <title>Nutrigrãos</title>
</head>
<body>
    <header class="menu-principal d-flex align-items-center justify-content-around">
        <figure class="logo">
            <img src="images/logo-nutrigraos-branca.png" id="logo-nutrigraos" alt="logo-nutrigrãos">
        </figure>
        <nav class="navbar" id="menu">
            <ul class="nav-list d-flex align-items-center m-0 p-0">
                <li class="nav-item"><a href="#" class="nav-link">Instagran</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
            </ul>
        </nav>
        <div class="botao-abrir-menu d-flex flex-column justify-content-between d-none"
        onclick="AbrirMenu()" id="botao-menu">
            <div class="barra-do-menu" id="barra1"></div>
            <div class="barra-do-menu" id="barra2"></div>
            <div class="barra-do-menu" id="barra3"></div>
        </div>
    </header>

    <!-- Sistemas de pesquisa e filtragem de produtos -->
    <section class="filtragem-pesquisa d-flex">
            <div class="filtro-de-pesquisa d-flex flex-column categ">
                <label for="categ">Categoria</label>
                <select name="categoria" id="categ">
                    <option value="todas">Todas as categorias</option>
                    <?php
                        include_once('conection.php');
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
        </div>

        <label for="input-pesquisa" class="barra-de-pesquisa d-flex align-items-center">
            <input type="search" id="input-pesquisa" placeholder="Buscar">
            <button id="pesquisar">
                <img class="lupa" src="images/icone-lupa.png">
            </button>
        </label>
    </section>
    
    <div class="barra-separar-conteudo"></div>

    <main class="produtos" id="container-produtos">
        <?php
            $sql = "SELECT * FROM produtos ORDER BY nome";
            $result = $mysqli->query($sql);

            // Verifica se a consulta retornou resultados
            if ($result->num_rows > 0) {
                // Percorre os resultados e exibe
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="produto" id="<?php echo $row["categoria"]?>"
                    onclick="OpenInfoWindow(this)">
                        <div class="foto-produto">
                            <img src="<?php echo $row["url_imagem"]?>" alt="foto do produto">
                        </div>
                        <h1 class="nome-produto"><?php echo $row['nome']?></h1>
                        <p class="descri-produto"><?php echo $row['descri']?></p>
                        <h2 class="valor">R$<?php echo $row['valor']?></h2>
                    </div>
                <?php
                }
            } else {
                echo "Nenhum produto encontrado.";
            }
        ?>
    </main>
    
    <div class="info-produto align-items-center flex-column text-center" id="info-produto">
        <button id="close-info-window">X</button>
        <h1 id="nome-produto-selecionado"></h1>
        <p id="descri-produto-selecionado"></p>
        <p class="m-0">Valor 100g</p>
        <h3 id="valor-produto-selecionado"></h3>
        <label for="peso-desejado">Selecione a quantidade desejada em gramas:</label>
        <div class="d-flex align-items-flex-start peso"><input step="50" placeholder="0" type="number" name="peso-desejado" id="peso-desejado"><p class="m-0">g</p></div>
        <button id="addToCart">Adicionar ao carrinho</button>
    </div>

    <footer class="rodape">
        <img src="images/logo-nutrigraos-preta.png">
        <nav class="nav-footer">
            <a href="#" class="link-rede-social">
                <img src="images/icone-whatsapp.png" alt="whatsapp">
            </a>
            <a href="#" class="link-rede-social">
                <img src="images/icone-instagran.png" alt="instagran">
            </a>
        </nav>
        <a href="#" class="saiba-mais">Saiba mais
            <img src="images/link-icone.png" class="link-icon">
        </a>
    </footer>

    <div class="carrinho-de-compras" id="cart">
        <button id="fecharCarrinho">X</button>
        <h1>Meu carrinho</h1>
        <div id="cart-prods" class="d-flex flex-column align-items-center">
        </div>
        <button id="finalizar">Finalizar compra</button>
    </div>

    <div class="comfirmar-finalizacao">
        <h1>Deseja Finalizar a compra?</h1>
        <p>Ao finalizar a compra você será
            redirecionado para o whatsapp
            e uma mensagem automatica será
            enviada para um de nossos atendentes.
        </p>
        <button onclick="FecharJanelaFinalizar()">Não</button>
        <button onclick="EncaminharMensagem()">Sim</button>
    </div>

    <div id="quant-itens-carrinho">0</div>
    <button id="abrirCarrinho">
        <img src="./images/icone-carrinho.jpg" alt="Abrir Carrinho">
    </button>

    <div class="adicionado">Item adicionado ao carrinho</div>
</body>
</html>