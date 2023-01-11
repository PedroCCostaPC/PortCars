
// FUNCAO PARA COLOCAR ALTURA NOS BOX DAS LOGO
function altura() {

    const box = document.querySelector("#fabricantes .row");
    const altura = document.querySelector("#fabricantes .row a").clientWidth;

    for(let i of box.querySelectorAll("a")) {
        
        i.style.height = altura + "px";

    }
    
}

// FUNCAO PARA EFEITO DO H2
function efeitoH2() {

    const textoH2 = document.querySelector("#fabricantes h2").innerText; 
    const h2 = document.querySelector("#fabricantes h2");
    const array = textoH2.split("");
    let tempo = 0;

    h2.innerHTML = "";

    for(let i = 0; i < array.length; i++) {

        setTimeout(() => {
            h2.innerHTML += array[i];
        }, tempo);
    
        tempo = tempo + 50;
    }

}

// FUNCAO PARA ANIMACAO DOS BLOCO
function animeBox() {

    const box = document.querySelector("#fabricantes .row");
    const telaAltura = $(window).innerHeight(); // Pegando altura da tela
    let tempo = 0;


    $(window).on("scroll load",function(){

        let divAltura = box.clientHeight; // Pegando altura da div
        let divTopo = $(box).offset().top; // Pegando distancia da div ao topo do documento
        let scrollTopo = $(window).scrollTop(); // Pegando o quanto o scroll foi rolado
        let distancia = divTopo-scrollTopo; // Pegando distancia da div ao topo da tela
            

        if (distancia <= telaAltura-(divAltura*(50/100))) {
            for(let i of box.querySelectorAll("a")) {

                setTimeout(() => {
                    i.classList.remove("anime");
                }, tempo);
            
                tempo = tempo + 300;
        
            }           
        }

    });


}


