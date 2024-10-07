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

// Exclusão de produtos
let idProdutoExcluido;
function JanelaDeExclusao(bottunElement){
    document.querySelector('.excluir-produto').style.display = "block";
    idProdutoExcluido = bottunElement.parentElement.id;
}
function FecharJanelaDeExclusao(){
    document.querySelector('.excluir-produto').style.display = "none";    
}