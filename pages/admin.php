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
        <p>Aqui está a listagem de produtos da loja:</p>
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
</body>
</html>