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

botaoPesquisar.addEventListener("click",()=>{
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
});

// Filtro de categoria

const SelectCategoria = document.getElementById("categ");
SelectCategoria.addEventListener("change",()=>{
    const categoriaSelecionada = SelectCategoria.value;
    const produtos = containerProdutos.getElementsByClassName('produto');
    for(let i=0; i<produtos.length;i++){
        if(categoriaSelecionada === "todas"){
            produtos[i].style.display = "";    
        }
        else if(produtos[i].classList === categoriaSelecionada){
            produtos[i].style.display = "";
        }else{
            produtos[i].style.display = "none";
        }
    }
});