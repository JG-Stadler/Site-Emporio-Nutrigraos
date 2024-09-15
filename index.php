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
    <script src="js/script.js"></script>
</body>
</html>