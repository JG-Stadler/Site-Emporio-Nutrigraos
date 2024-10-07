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
const confirmarExclusao = document.getElementById("confirmarExclu");
function JanelaDeExclusao(buttonElement){
    document.querySelector('.excluir-produto').style.display = "block";
    idProdutoExcluido = buttonElement.parentElement.id;
}
function FecharJanelaDeExclusao(){
    document.querySelector('.excluir-produto').style.display = "none";    
}
confirmarExclusao.addEventListener('click',()=>{
    document.getElementById('idExcluir').value = idProdutoExcluido;
    document.getElementById('solicitarExclusao').click();
});

// Abrir formulário de edição
let idProdutoEdit;

function JanelaDeEdicao(buttonElement){
    document.getElementById('editar-produto-form').style.display = "flex";
    idProdutoEdit = buttonElement.parentElement.id;
    document.getElementById("IdProdutoEdit").value = idProdutoEdit;
}
function FecharJanelaDeEdicao(){
    document.getElementById('editar-produto-form').style.display = "none";
}