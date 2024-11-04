// Caixa Informaçoes do produto
const ButtonCloseInfoWindow = document.getElementById("close-info-window");
const JanelaInfoProdutos = document.getElementById("info-produto");

ButtonCloseInfoWindow.addEventListener("click",()=>{
    JanelaInfoProdutos.style.display = "none";
});

function OpenInfoWindow(produto){
    JanelaInfoProdutos.style.display = "grid";
    const nome = produto.getElementsByTagName("h1")[0].innerText;
    const descri = produto.getElementsByTagName("p")[0].innerText;
    const valor = produto.getElementsByTagName("h2")[0].innerText;
    const foto = produto.getElementsByTagName("div")[0];
    const estilo = window.getComputedStyle(foto);
    const imagemFundo = estilo.backgroundImage;
    const urlFoto = imagemFundo.slice(5,-2);

    console.log(urlFoto)
    const nomeInfoWindow = document.getElementById("nome-produto-selecionado");
    const valorInfoWindow = document.getElementById("valor-produto-selecionado");
    const descriInfoWindow = document.getElementById("descri-produto-selecionado");
    const imgInfoWindow = document.getElementById("img-produto-selecionado");

    nomeInfoWindow.innerText = nome;
    descriInfoWindow.innerText = descri;
    valorInfoWindow.innerText = valor;
    imgInfoWindow.style.backgroundImage = `url("${urlFoto}")`;
}
document.getElementById("addToCart").addEventListener("click",()=>{
    GetInfo();
});

function GetInfo(){
    const nome = document.getElementById("nome-produto-selecionado").innerText;
    const quant = document.getElementById("peso-desejado").value;
    const ValorProduto = document.getElementById("valor-produto-selecionado").innerText.replace("R$","");
    if(quant < 0 || quant == 0 || quant == null || quant == undefined){
        alert("Digite um valor maior que zero");
    }else{
        JanelaInfoProdutos.style.display = "none";
        AddToCart(nome,quant,ValorProduto);
    }
}