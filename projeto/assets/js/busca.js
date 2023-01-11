
// FUNCAO PARA MENU DE FILTRO
function menuFilter() {
    
    const openFilter = document.querySelector("#titulo-busca .filtro-mobile button");
    const closeFilter = document.querySelector("#filtro .row .close-filter");
    const box = document.querySelector("#filtro");

    openFilter.addEventListener("click", function() {
        box.style.right = 0;
    });

    closeFilter.addEventListener("click", function() {
        box.style.right = "-100%";
    });

}