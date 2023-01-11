<?php

// Funcao para formatar numero com "." a cada 3 numeros
function formatNumber($valor) {

    $caracteres = (int) strlen($valor);
    $casa = 1;
    $result = "";


    for($i = 0; $i < $caracteres; $i++) {

        if($i > 0 && $i % 3 === 0) {
            $result = substr($valor, -$casa, 1) . "." . $result;
        } else {
            $result = substr($valor, -$casa, 1) . $result;
        }

        $casa++;
    }


    return $result;

}