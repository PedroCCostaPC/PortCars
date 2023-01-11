// FUNCAO PARA SLIDE
function slide() {
    $('#slide').slick({
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000
    });
}


// FUNCAO PARA EFEITO DOS POST RECENTES
function animeRecentes(lado, titulo, dataPublic, imagem, texto, botao) {
    
    const row = document.querySelector("#modelos-recentes");
    const telaAltura = $(window).innerHeight(); // Pegando altura da tela


    for(let i of row.querySelectorAll(lado)) {

        let animeTitulo = i.querySelector(titulo);
        let animeData = i.querySelector(dataPublic);
        let img = i.querySelector(imagem);
        let text = i.querySelector(texto);
        let bot = i.querySelector(botao);


        $(window).on("scroll load",function(){

            let divAltura = i.clientHeight; // Pegando altura da div
            let divTopo = $(i).offset().top; // Pegando distancia da div ao topo do documento
            let scrollTopo = $(window).scrollTop(); // Pegando o quanto o scroll foi rolado
            let distancia = divTopo-scrollTopo; // Pegando distancia da div ao topo da tela
            

            if (distancia <= telaAltura-(divAltura*(50/100))) {
                i.classList.remove("anime");
                
                setTimeout(() => {
                    animeTitulo.classList.remove("anime");
                    animeData.classList.remove("anime");
                    img.classList.remove("anime");
                }, 500);

                setTimeout(() => {
                    text.classList.remove("anime");
                }, 1000);

                setTimeout(() => {
                    bot.classList.remove("anime");
                }, 1700);
            
            }

        });

    }

}


// FUNCAO PARA CAROUSEL FABVRICANTES
function carouselFabrica() {

    $('#fabricantes-home').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplaySpeed: 1000,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
          {
            breakpoint: 920,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 620,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplaySpeed: 3000,
            }
          }
        ]
      });

}


// FUNCAO PARA COLOCAR ALTURA NAS DIV DO CAROUSEL
function alturaFab() {

    const main = document.querySelector("#fabricantes-home"); 

    for(let box of main.querySelectorAll("a .col")) {

        let altura = box.clientWidth;
        box.style.height = altura + "px";

    }

}


// FUNCAO PARA EFEITO DO CAROUSEL DE FABRICANTES
function animeFab() {

    const box = document.querySelector("#fabricantes-home");
    const telaAltura = $(window).innerHeight(); // Pegando altura da tela
    
    $(window).on("scroll load",function(){

        let divAltura = box.clientHeight; // Pegando altura da div
        let divTopo = $(box).offset().top; // Pegando distancia da div ao topo do documento
        let scrollTopo = $(window).scrollTop(); // Pegando o quanto o scroll foi rolado
        let distancia = divTopo-scrollTopo; // Pegando distancia da div ao topo da tela
            

        if (distancia <= telaAltura-(divAltura*(50/100))) {
            box.classList.remove("anime");            
        }

    });

}






