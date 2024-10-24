// Sistema de abertura do menu 

const botaoDoMenu = document.getElementById("botao-menu");
const menu = document.getElementById("menu");

function AbrirMenu(){
    botaoDoMenu.classList.toggle("botao-ativado");
    menu.classList.toggle("menu-aberto")
}
// barra de pesquisa

const inputPesquisa = document.getElementById("input-pesquisa");
const botaoPesquisar = document.getElementById("pesquisar");
const containerProdutos = document.getElementById("container-produtos");

inputPesquisa.addEventListener('change',()=>Pesquisar());
botaoPesquisar.addEventListener("click",()=>Pesquisar());

function Pesquisar(){
    const produtos = containerProdutos.getElementsByClassName("produto");
    const pesquisa = inputPesquisa.value.toLowerCase(); 

    for (let i = 0; i < produtos.length; i++) {
        let itemTitle = produtos[i].getElementsByTagName('h1')[0].innerText.toLowerCase();
        if (itemTitle.includes(pesquisa)) {
            produtos[i].style.display = '';
        } else {
            produtos[i].style.display = 'none';
        }
    }
}

// Filtro de categoria

const SelectCategoria = document.getElementById("categ");
SelectCategoria.addEventListener("change",()=>{
    const categoriaSelecionada = SelectCategoria.value;
    const produtos = containerProdutos.getElementsByClassName('produto');
    let IdProduto;
    console.log("categoria selecionada")
    for(let i=0; i<produtos.length;i++){
        IdProduto = produtos[i].id;
        if(categoriaSelecionada === "todas"){
            produtos[i].style.display = "";    
        }
        else if(IdProduto === categoriaSelecionada){
            produtos[i].style.display = "";
        }else{
            produtos[i].style.display = "none";
        }
    }
});

// Ordenar por valor

const SelectOrdem = document.getElementById("ordenar");
SelectOrdem.addEventListener("change",()=>{
    const OrdemSelecionada = SelectOrdem.value;
    const produtos = containerProdutos.getElementsByClassName('produto'); 
    const valores = containerProdutos.getElementsByClassName("valor"); 
    console.log(valores[1].innerText.replace('R$',""))
});

// Caixa Informaçoes do produto
const ButtonCloseInfoWindow = document.getElementById("close-info-window");
const JanelaInfoProdutos = document.getElementById("info-produto");

ButtonCloseInfoWindow.addEventListener("click",()=>{
    JanelaInfoProdutos.style.display = "none";
});

function OpenInfoWindow(produto){
    JanelaInfoProdutos.style.display = "flex";
    const nome = produto.getElementsByTagName("h1")[0].innerText;
    const descri = produto.getElementsByTagName("p")[0].innerText;
    const valor = produto.getElementsByTagName("h2")[0].innerText;

    const nomeInfoWindow = document.getElementById("nome-produto-selecionado");
    const valorInfoWindow = document.getElementById("valor-produto-selecionado");
    const descriInfoWindow = document.getElementById("descri-produto-selecionado");

    nomeInfoWindow.innerText = nome;
    descriInfoWindow.innerText = descri;
    valorInfoWindow.innerText = valor;
}
const Cart = [];
function GetInfo(){
    const nome = document.getElementById("nome-produto-selecionado").innerText;
    const quant = document.getElementById("peso-desejado").value;
    if(quant < 0 || quant == 0 || quant == null || quant == undefined){
        alert("Digite um valor maior que zero");
    }else{
        JanelaInfoProdutos.style.display = "none";
        AddToCart(nome,quant);
    }
}
function AddToCart(nomeProduto,quantidade){
    const produto = {
        nome: nomeProduto,
        quantidade: quantidade
    };
    Cart.push(produto);
    LoadCart();
}
const ListaProdutosCarrinho = document.getElementById("cart-prods");
function LoadCart(){
    ListaProdutosCarrinho.innerHTML = '';
    for(let i=0;i<Cart.length;i++){
        ListaProdutosCarrinho.innerHTML += `
        <div class="produto-no-carrinho">
            <h1>${Cart[i].nome}</h1>
            <p class="m-0">${Cart[i].quantidade}g</p>
        </div>`
    }
}
document.getElementById("addToCart").addEventListener("click",()=>{
    GetInfo();
});

// Abrir e fechar carrinho

const carrinhoDeCompras = document.getElementById("cart");
const BotaoAbrirCarrinho = document.getElementById("abrirCarrinho");
const BotaoFecharCarrinho = document.getElementById("fecharCarrinho");

BotaoAbrirCarrinho.addEventListener("click",()=>{
    carrinhoDeCompras.style.display = "flex";
});
BotaoFecharCarrinho.addEventListener("click",()=>{
    carrinhoDeCompras.style.display = "none";
});

// Finalização de compra

const botaoFinalizarCompra = document.getElementById("finalizar");
botaoFinalizarCompra.addEventListener("click",()=> FinalizarCompra());
let pedido = ""

function FinalizarCompra(){
    for(let i = 0; i<Cart.length;i++){
        pedido += `${Cart[i].quantidade}g de ${Cart[i].nome}, `;
        console.log(pedido);
    }
    EnviarPedido(pedido);
}
function EnviarPedido(pedido){
    const Data = new Date();
    const HoraAtual = Data.getHours();
    let saudacao;
    HoraAtual
    if (HoraAtual >= 0 && HoraAtual < 12) {
        saudacao = "Bom dia";
    } else if (HoraAtual >= 12 && HoraAtual < 18) {
        saudacao = "Boa tarde";
    } else {
        saudacao = "Boa noite";
    }
    
    const mensagem = `Olá, ${saudacao}.\nEu gostaria de ${pedido}`;
    console.log(mensagem);
}