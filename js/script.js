// Sistema de abertura do menu 

const botaoDoMenu = document.getElementById("botao-menu");
const menu = document.getElementById("menu");

function AbrirMenu(){
    botaoDoMenu.classList.toggle("botao-ativado");
    menu.classList.toggle("menu-aberto")
}