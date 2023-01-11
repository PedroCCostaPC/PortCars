<?php


// Funcao para formatar data
function formataDataPub($data) {

    $dia = substr($data, 8, 2);
    $mes = substr($data, 5, 2);
    $ano = substr($data, 0, 4);

    // Funcao para formatar mes
    if($mes == 1) {
        
        $mes = "Janeiro";
            
    } else if($mes == 2) {
            
        $mes = "Fevereiro";
            
    } else if($mes == 3) {
            
        $mes = "Março";
            
    } else if($mes == 4) {
            
        $mes = "Abril";
            
    } else if($mes == 5) {
            
        $mes = "Maio";
            
    } else if($mes == 6) {
            
        $mes = "Junho";
            
    } else if($mes == 7) {
            
        $mes = "Julho";
            
    } else if($mes == 8) {
            
        $mes = "Agosto";
            
    } else if($mes == 9) {
            
        $mes = "Setembro";
            
    } else if($mes == 10) {
            
        $mes = "Outubro";
            
    } else if($mes == 11) {
            
        $mes = "Novembro";
            
    } else if($mes == 12) {
            
        $mes = "Dezembro";
            
    }
    

    
    $data = $dia . " de " . $mes . " de " . $ano;

    return $data;

}


// Funcao para formatar data para o dashboard
function formataDataDash($data) {

    $dia = substr($data, 8, 2);
    $mes = substr($data, 5, 2);
    $ano = substr($data, 0, 4);

    $data = $dia . "/" . $mes . "/" . $ano;
    return $data;

}