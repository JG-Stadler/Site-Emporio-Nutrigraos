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
// Barra de pesquisa
const inputPesquisa = document.getElementById("input-pesquisa");
const containerProdutos = document.getElementById("lista-produtos");
const BotaoDePesquisa = document.getElementById("pesquisar");

BotaoDePesquisa.addEventListener('click',()=> Pesquisar());
inputPesquisa.addEventListener('change',()=> Pesquisar());

function Pesquisar(){
    console.log(inputPesquisa)
    const produtos = containerProdutos.getElementsByClassName("produto");
    const pesquisa = inputPesquisa.value.toLowerCase(); 

    for (let i = 0; i < produtos.length; i++) {
        let itemTitle = produtos[i].getElementsByTagName('h1')[0].innerText.toLowerCase();
        console.log(itemTitle)
        if (itemTitle.includes(pesquisa)) {
            produtos[i].style.display = '';
        } else {
            produtos[i].style.display = 'none';
        }
    }
}

// Botão para exibir as categorias existentes

const botaoCateg = document.getElementById("mostrar-categorias");
const containerCateg = document.querySelector(".vizualizar-categ");

botaoCateg.addEventListener("click",()=>{
    if(containerCateg.style.display === "none"){
        containerCateg.style.display = "block"
    }
    else{
        containerCateg.style.display = "none"
    }
});

// Deletar Categoria

const InputNomeCategExcluir = document.getElementById("nome-categ-excluir");
const solicitarExclu = document.getElementById("solicitar-exclusao");

function DeletarCateg(buttonElement){
    let categoriaSelecionada = buttonElement.parentElement.innerText;
    console.log(categoriaSelecionada);
    InputNomeCategExcluir.value = categoriaSelecionada;
    solicitarExclu.click(); 
}