<?php

require_once("../global/global.php");
require_once("../global/db.php");
require_once("../data/DB_fotos.php");
require_once("../data/DB_fabricantes.php");
require_once("../data/DB_modelos.php");


$ID = (int) $_POST["id"];
$nome = $_POST["nome"];
$tipo = $_POST["tipo"];

$_SESSION["valida_nome"] = $nome;


// PARA EXCLUIR FABRICANTES 
if($tipo === "fabricantes") {

    // CHECA SE TEM ALGUM MODELO VINCULADO,
    // CASO TENHA, RETORNA COM ERRO
    foreach($modelosNovo as $modelo) {
        if($modelo["fabricante_id"] === $ID) {

            $checado = false;
            break;

        } else {
            $checado = true;
        }
    }


    if(!$checado) {
        $_SESSION["msg"] = "Não é possivel excluir <b>" . $_SESSION["valida_nome"] . "</b>, pois há modelos vinculados.";
        $_SESSION["msg-type"] = "msg-erro";

        $_SESSION["valida_nome"] = "";
        header("location: ../dashboard.php");

    } else {

        foreach($fabricanteID as $fabrcante) {
            if($fabrcante["ID"] === $ID) {
                unlink("../assets/img/fabricantes/" . $fabrcante["logo"]);
                break;
            }
        }
        
        excluiDado("fabricante_fundador", $ID, "fabricante_id", $conn);
        excluiDado("fabricante_sede", $ID, "fabricante_id", $conn);
        excluiDado("fabricante_proprietario", $ID, "fabricante_id", $conn);
        excluiDado("fabricante_produto", $ID, "fabricante_id", $conn);
        excluiDado("fabricantes", $ID, "ID", $conn);

        // RETORNA AO DASH COM MENSAGEM DE SUCESSO
        $_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> excluido com sucesso";
        $_SESSION["msg-type"] = "msg-sucesso";

        $_SESSION["valida_nome"] = "";
        header("location: ../dashboard.php");
    }
    
// PARA EXCLUIR MODELOS
} else {

    foreach($fotos as $foto) {
        if($foto["modelo_id"] === $ID) {
            unlink("../assets/img/modelos/" . $foto["foto"]);
        }
    }

    excluiDado("fotos", $ID, "modelo_id", $conn);
    excluiDado("modelos", $ID, "ID", $conn);

    // RETORNA AO DASH COM MENSAGEM DE SUCESSO
    $_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> excluido com sucesso";
    $_SESSION["msg-type"] = "msg-sucesso";

    $_SESSION["valida_nome"] = "";
    header("location: ../dashboard.php");

}



// FUNCAO PARA EXCLUIR DO BANCO
function excluiDado($tabela, $dado, $coluna, $conn) {

    $stmt = $conn->prepare("DELETE FROM $tabela WHERE $coluna = :$coluna");
    
    $stmt->bindParam(":$coluna", $dado);
    $stmt->execute();

}












