// Abertura dos formulários de criação

const formCriarProduto = document.getElementById("novo-produto");
const formCriarCategoria = document.getElementById("nova-categoria");

function AbrirFurmularioProd(){
    formCriarProduto.style.display = "flex";
}
function CloseFormProd(){
    formCriarProduto.style.display = "none";
}
function AbrirFurmularioCateg(){
    formCriarCategoria.style.display = "flex";
}
function CloseFormCateg(){
    formCriarCategoria.style.display = "none";
}