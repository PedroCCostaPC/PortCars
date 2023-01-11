
// Funcao para menu mobile
function menuMobile() {

    const botnav = document.querySelector("header .bot-nav-moile");
    const darkNav = document.querySelector("header .dark-nav");
    const menu = document.querySelector("header .container .nav");
    const close = document.querySelector("header .container .nav .close");

    // Evento para abrir menu
    botnav.addEventListener('click', function() {
        darkNav.style.width = "100%";
        botnav.style.opacity = 0;

        setTimeout(() => {
            menu.style.left = 0;
        }, 300);
    });


    // funcao para evento de fechar menu
    function closeNav(metodo) {
        metodo.addEventListener('click', function() {
            menu.style.left = "-100%";
    
            
            setTimeout(() => {
                darkNav.style.width = 0;
                botnav.style.opacity = 1;
            }, 300);
        });
    }

    closeNav(darkNav);
    closeNav(close);
    
}

// FUNCAO PARA LOAD DA PAGINA
function load() {
    $(window).on("load", function(){
        document.getElementById("loading").style.display = "none";
    });
}



// FUNCAO PARA SUMIR MENSAGEM
function closeMensagem() {
    const box = document.querySelector("#mensagem");
    const trueBox = document.body.contains(box);

    if(trueBox === true) {
        setTimeout(() => {
            box.style.top = "-100px";
        }, 3000);
    }

}



closeMensagem();
load();
menuMobile();