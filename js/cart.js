// Array de objetos | carrinho de compras
const Cart = [];
let valores = [];
const MensagemItemAdicionado = document.querySelector(".adicionado");

function AddToCart(nomeProduto,quantidade,ValorProduto){
    const produto = {
        valor:ValorProduto,
        nome: nomeProduto,
        quantidade: quantidade
    };
    Cart.push(produto);
    LoadCart();
    MensagemItemAdicionado.classList.add("adicionado-ativo");
    setTimeout(()=>{
        MensagemItemAdicionado.classList.remove("adicionado-ativo");
    },1500);
}
const quantidadeItensNoCarrinho = document.getElementById("quant-itens-carrinho");
const ListaProdutosCarrinho = document.getElementById("cart-prods");
const PsubTotal = document.querySelector(".sub-total-cart");
const subTotal = document.getElementById("sub-total-compra");

function LoadCart(){
    valores = [];
    quantidadeItensNoCarrinho.innerText = Cart.length;
    ListaProdutosCarrinho.innerHTML = '';
    for(let i=0;i<Cart.length;i++){
        valores.push(Cart[i].quantidade*(Cart[i].valor/100));
        ListaProdutosCarrinho.innerHTML += `
        <div class="produto-no-carrinho">
            <h1>${Cart[i].nome}</h1>
            <p class="m-0 quant-cart">${Cart[i].quantidade}g</p>
            <p class="m-0 sub-total-cart">R$${valores[i]}</p>
            <button id="remover-do-carrinho"
            title="Remover do Carrinho" onclick="RemoverDoCarrinho(this)">X</button>
        </div>`
    }
    const total = valores.reduce((acumulador,valorAtual)=>acumulador + valorAtual,0);
    console.log(valores)
    subTotal.innerText = total;
}

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
let pedido = "";
let mensagem = "";
botaoFinalizarCompra.addEventListener("click",()=> FinalizarCompra());
const ConfirmarCompra = document.querySelector(".comfirmar-finalizacao");

function FinalizarCompra(){
    if(Cart.length === 0){
        alert("Adicione itens ao carrinho para poder finalizar sua compra");
    }else{
        for(let i = 0; i<Cart.length;i++){
            pedido += `${Cart[i].quantidade}g de ${Cart[i].nome}, `;
        }
        GerarMensagem();
        carrinhoDeCompras.style.display = "none";
        ConfirmarCompra.style.display = "block";
    }
}
function FecharJanelaFinalizar(){
    ConfirmarCompra.style.display = "none";
}
function GerarMensagem(){
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
    
    mensagem = `Olá, ${saudacao}.\nEu gostaria de ${pedido}`;
}
function EncaminharMensagem(){
    ConfirmarCompra.style.display= "none";
    const mensagemFormatada = encodeURI(mensagem);
    const urlZAP = `https://wa.me/5522998624140?text=${mensagemFormatada}`;
    window.open(urlZAP);
}

// Remoção de itens do carrinho 

function RemoverDoCarrinho(ButtonElement){
    const ProdutoNoCarrinho = ButtonElement.parentElement;
    const NomeProdutoNoCarrinho = ProdutoNoCarrinho.getElementsByTagName("h1")[0].innerText;
    for(let i =0; i<Cart.length;i++){
        if(Cart[i].nome === NomeProdutoNoCarrinho){
            Cart.splice(i,1)
            LoadCart();
        }else{
            console.log("Erro de remoção");
        }
    }
}