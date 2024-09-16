<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <link rel="stylesheet" href="styles/index.css">
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
    <section class="filtragem d-flex align-items-center">
        <div class="filtro-de-pesquisa">
            <label for="categ">Categoria</label>
            <select name="categoria" id="categ">

            </select>
        </div>

        <div class="filtro-de-pesquisa">
            <label for="ordenar">Ordenar por</label>
            <select name="ordenar" id="ordenar"></select>
        </div>

        <label for="input-pesquisa" class="barra-de-pesquisa d-flex align-items-center">
            <input type="search" id="input-pesquisa" placeholder="Buscar">
            <button id="pesquisar">
                <img class="lupa" src="images/icone-lupa.png">
            </button>
        </label>
    </section>
    <script src="js/script.js"></script>
</body>
</html>