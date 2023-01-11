
// FUNCAO PARA COLOCA PADDING ESQUERDO NOS INPUT PADRAO
function paddingLeft(tagCampo, taglabel, tagInput) {

    const campo = document.querySelector(tagCampo);
    let larguras = [];
    let contador = 0;

    // Pegando largura das label
    for(let label of campo.querySelectorAll(taglabel)) {

        larguras[contador] = label.clientWidth + 35;
        contador++;
        
    }

    // Aplicando padding nos input
    contador = 0;
    for(let input of campo.querySelectorAll(tagInput)) {

        input.style.paddingLeft = larguras[contador] + "px";
        contador++;

    }
    
}


// FUNCAO PARA SANFONA DOS CHECKBOX
function sanfonaCheckbox(botSet, boxSet, botBlockUm, boxBlockUm, botBlockDois, boxBlockDois, botBlockTres, boxBlockTres) {

    const bot = document.querySelector(botSet);
    const box = document.querySelector(boxSet);
    const botUm = document.querySelector(botBlockUm);
    const BoxUm = document.querySelector(boxBlockUm);
    const botDois = document.querySelector(botBlockDois);
    const BoxDois = document.querySelector(boxBlockDois);
    const botTres = document.querySelector(botBlockTres);
    const BoxTres = document.querySelector(boxBlockTres);


    bot.addEventListener('click', function() {

        if(!bot.classList.contains("bot-setado")) {
            bot.classList.add("bot-setado");
            botUm.classList.remove("bot-setado");
            botDois.classList.remove("bot-setado");
            botTres.classList.remove("bot-setado");

            box.classList.remove("anime");
            BoxUm.classList.add("anime");
            BoxDois.classList.add("anime");
            BoxTres.classList.add("anime");

        } else {
            bot.classList.remove("bot-setado");
            box.classList.add("anime");
        }

    });
}


// FUNCAO PARA ADICIONAR -> FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
function adiciona(idBot, idCampo, nome) {

    const botao = document.querySelector(`#${idBot}`);
    const campo = document.querySelector(`#${idCampo}`);

    botao.addEventListener('click', function() {

        const divRow = document.createElement("div");
        divRow.classList.add("row");
        campo.appendChild(divRow);

        const label = document.createElement("label");
        label.innerHTML = "Nome:";
        divRow.appendChild(label);

        
        const input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", `${nome}[]`);
        divRow.appendChild(input);


        console.log(input);
    });

}


// FUNCAO PARA PREVIEW DA LOGO AO FAZER UPLOAD
function previewLogo(inputImg, LabelImg, icone) {

    const inputFile = document.querySelector(inputImg);
    const campoImg = document.querySelector(LabelImg);
    const icon = document.querySelector(icone);

    inputFile.addEventListener('change', function(e) {

        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if(file) {
            const reader = new FileReader();

            reader.addEventListener('load', function(e) {
                icon.style.display = "none";

                const readerTarget = e.target;

                const img = document.createElement('img');
                img.src = readerTarget.result;
                img.classList.add('input-img');

                campoImg.innerHTML = "";
                campoImg.appendChild(img);

            });


            reader.readAsDataURL(file);

        }

    });

}

