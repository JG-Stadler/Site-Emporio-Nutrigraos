// Abertura dos formulários de criação

const formCriarProduto = document.getElementById("novo-produto");

function AbrirFurmularioProd(){
    formCriarProduto.style.display = "flex";
}
function CloseFormProd(){
    formCriarProduto.style.display = "none";
}