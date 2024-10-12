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
    const buttonParent = buttonElement.parentElement
    document.querySelector('.excluir-produto').style.display = "block";
    idProdutoExcluido = buttonParent.parentElement.id;
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
    const buttonParent = buttonElement.parentElement
    document.getElementById('editar-produto-form').style.display = "flex";
    idProdutoEdit = buttonParent.parentElement.id;
    document.getElementById("IdProdutoEdit").value = idProdutoEdit;
    CarregarDadosAtuais(idProdutoEdit);
}
function FecharJanelaDeEdicao(){
    document.getElementById('editar-produto-form').style.display = "none";
}

function CarregarDadosAtuais(idProdutoEdit){
    const inputNome = document.getElementById("novo-nome-produto");
    const inputDescri = document.getElementById("nova-descri-produto");
    const inputValor = document.getElementById("novo-valor-produto");
    const inputCategoria = document.getElementById("nova-categoria-produto");

    const produtoSelecionado = document.getElementById(idProdutoEdit);

    const NomeAtual = produtoSelecionado.getElementsByClassName("nome")[0].innerHTML;
    const descriAtual = produtoSelecionado.getElementsByClassName("descri")[0].innerHTML;
    const valorAtual = produtoSelecionado.getElementsByClassName("valor")[0].innerHTML.replace('R$',"");
    const categAtual = produtoSelecionado.getElementsByClassName("categ")[0].innerHTML;
    inputNome.value = NomeAtual;
    inputDescri.value = descriAtual;
    inputValor.value = valorAtual;
    inputCategoria.value = categAtual;
}