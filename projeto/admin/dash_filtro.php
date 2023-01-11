<?php

$arrayPublicado = [];
$arrayRascunho = [];
$arrayAutor = [];
$arraysetado = [];

// PEGANDO PUBLICADOS
foreach($allPosts as $i) {

    if($i["situacao"]) {
        $arrayPublicado[] = $i;
    }

    // PEGANDO RASCUNHOS
    else if(!$i["situacao"]) {

        $arrayRascunho[] = $i;
    }

} 

// PEGANDO POST DO AUTOR DA SESSAO
foreach($allPosts as $i) {
    if($i["autor"] == $_SESSION["ID"]) {

        $arrayAutor[] = $i;

    }
}


// FILTRANDO OS GET
if(isset($_GET["filtro"])) {

    if($_GET["filtro"] === "publicados") {

        $arraysetado = $arrayPublicado;
        $textoFiltro = "Publicados";
        $quantidade = "(" . count($arraysetado) . ")";

    //  FILTRANDO RASCUNHO
    } else if($_GET["filtro"] === "rascunho") {

        $arraysetado = $arrayRascunho;
        $textoFiltro = "Rascunhos";
        $quantidade = "(" . count($arraysetado) . ")";

    // FILTRANDO POST DO AUTOR
    } else if($_GET["filtro"] === "meus") {

        $arraysetado = $arrayAutor;
        $textoFiltro = "Minhas publicações";
        $quantidade = "(" . count($arraysetado) . ")";
        
    // FILTRANDO MAIS ANTIGO
    } else if($_GET["filtro"] === "antigos") {

        $arraysetado = $allPosts;

        foreach($arraysetado as $key => $row) {
            $auxi[$key] = $row["data"];
        }
        array_multisort($auxi, SORT_ASC, $arraysetado);
        $textoFiltro = "Mais antigos";
        $quantidade = "";
    

    // FILTRANDO MAIS NOVOS
    } else if($_GET["filtro"] === "novos") {

        $arraysetado = $allPosts;
        $textoFiltro = "Mais novos";
        $quantidade = "";

    // FILTRANDO TODOS
    } else {
        $arraysetado = $allPosts;
        $textoFiltro = "Todos";
        $quantidade = "(" . count($arraysetado) . ")";
    }

} else {
    $arraysetado = $allPosts;
    $textoFiltro = "Todos";
    $quantidade = "(" . count($arraysetado) . ")";
}








