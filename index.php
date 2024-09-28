<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" media="(max-width:700px)" href="styles/adaptar-tela-index.css">
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
    <section class="filtragem-pesquisa d-flex align-items-end">
        <div class="filtros d-flex">
            <div class="filtro-de-pesquisa d-flex flex-column categ">
                <label for="categ">Categoria</label>
                <select name="categoria" id="categ">
                    <option value="todas">Todas as categorias</option>
                    <option value="temperos">Temperos</option>
                    <option value="cha">Chás</option>
                    <option value="graos">Grãos</option>
                    <option value="doces">Doces</option>
                </select>
            </div>
            <div class="filtro-de-pesquisa d-flex flex-column ordem">
                <label for="ordenar">Ordenar por</label>
                <select name="ordenar" id="ordenar">
                    <option value="qualquer-v">Qualquer valor valor</option>
                    <option value="menor-v">Menor valor</option>
                    <option value="maior-v">Maior valor</option>
                </select>
            </div>
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
            include_once('conection.php');
            $sql = "SELECT * FROM produtos ORDER BY nome";
            $result = $mysqli->query($sql);

            // Verifica se a consulta retornou resultados
            if ($result->num_rows > 0) {
                // Percorre os resultados e exibe
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="produto" id="<?php echo $row["categoria"]?>">
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
    <script src="js/script.js"></script>
</body>
</html>