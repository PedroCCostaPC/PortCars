<?php

require_once("../global/global.php");
require_once("../global/db.php");

$situacao = (int) $_POST["situacao"];
$ID = (int) $_POST["ID"];
$tabela = $_POST["tipo"];
$nome = $_POST["nome"];



if($situacao === 0) {
    $sit = true;

    if($tabela === "fabricantes" || $tabela === "modelos") {
        $_SESSION["msg"] = "<b class='nome'>$nome</b> publicado com sucesso";
        $_SESSION["msg-type"] = "msg-sucesso";
    }
    
} else {
    $sit = false;

    if($tabela === "fabricantes" || $tabela === "modelos") {
        $_SESSION["msg"] = "<b class='nome'>$nome</b> revertido para <b class='msg-rascunho'>rascunho</b>";
        $_SESSION["msg-type"] = "msg-sucesso";
    }
}



$query = "UPDATE $tabela SET situacao = :situacao WHERE ID = :ID";

$stmt = $conn->prepare($query);

$stmt->bindParam(":situacao", $sit);
$stmt->bindParam(":ID", $ID);
$stmt->execute();

header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

