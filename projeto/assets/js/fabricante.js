
// FUNCAO PARA CAROUSEL DE MODELOS RECENTES
function modeloRecente() {
    $('.recentes .carousel').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 920,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 620,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
}


// FUNCAO PARA ESOLHER ENTRE HISTORIA E MODELOS
function bioModel() {

    const botHistoria = document.querySelector("#bot-historia");
    const botModel = document.querySelector("#bot-model");

    const historia = document.querySelector("#historia");
    const model = document.querySelector("#modelos");

    botHistoria.addEventListener("click", function() {
        botHistoria.classList.add("bot-atual");
        botModel.classList.remove("bot-atual");

        historia.style.display = "block";
        model.style.display = "none";

    });

    botModel.addEventListener("click", function() {
        botModel.classList.add("bot-atual");
        botHistoria.classList.remove("bot-atual");

        model.style.display = "block";
        historia.style.display = "none";
    });

    
}