
// FUNCAO PARA ABRIR BOX DE CONFIRMACAO
function confirmPost(openBot, closeBot, boxPai, boxFilho) {

    const bot = document.querySelector(openBot);
    const close = document.querySelector(closeBot);
    const boxFundo = document.querySelector(boxPai);
    const box = document.querySelector(boxFilho);

    bot.addEventListener("click", function() {
        boxFundo.style.width = "100%";
        boxFundo.style.height = "100%";
        box.classList.remove("anime");
    });

    close.addEventListener("click", function() {
        box.classList.add("anime");

        setTimeout(() => {
            boxFundo.style.width = 0;
            boxFundo.style.height = 0;
        }, 200);
        
    });
    
}


// FUNCAO PARA BOX DO FILTRO
function filtro() {
    const bot = document.querySelector("#publicacoes .filtro .bot-ordem");
    const box = document.querySelector("#publicacoes .filtro .opcoes");

    bot.addEventListener("click", function() {
        box.style.width = "auto";
        box.style.height = "auto";
    });

    document.addEventListener("mouseup", function(e) {
        if (!box.contains(e.target)) {
            box.style.width = 0;
            box.style.height = 0;
        }  
    });
}

// FUNCAO PARA EXCLUIR POST 
function excluiPost() {
    const pai = document.querySelector("#publicacoes");

    for(let post of pai.querySelectorAll(".row .col-3 .botoes ul")) {
        
        bot = post.querySelector(".excluir-post .bot-excluir");
        

        bot.addEventListener("click", function() {
            fundo = $(this).siblings();
            father = this.parentNode;
            ul = father.parentNode;
            grandmother = ul.parentNode;
            cancelar = fundo[1].querySelector(".box .confirma-botoes .cancela");

            rascunho = grandmother.parentNode;
            rascunhoPai = rascunho.parentNode;

            fundo[1].style.width = "100%";
            fundo[1].style.height = "100%";
            rascunhoPai.classList.add("rascunho-anime");
            grandmother.classList.add("anime");

            box = fundo[1].querySelector(".box");

            document.addEventListener("mouseup", function(e) {
                if (!box.contains(e.target)) {
                    fundo[1].style.width = 0;
                    fundo[1].style.height = 0;
                    rascunhoPai.classList.remove("rascunho-anime");
                    grandmother.classList.remove("anime");
                }  
            });

            cancelar.addEventListener("click", function() {
                fundo[1].style.width = 0;
                fundo[1].style.height = 0;
                rascunhoPai.classList.remove("rascunho-anime");
                grandmother.classList.remove("anime");
            });
            

            console.log(rascunhoPai);


        });

    }
}






// #publicacoes .row:hover .col-3 .botoes {
//     display: block;
// }