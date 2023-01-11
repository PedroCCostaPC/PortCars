<?php

require_once("../global/global.php");
require_once("../global/db.php");
require_once("../data/DB_funcionarios.php");

$ID = $_POST["id"];
$situacao = $_POST["situacao"];
$nome = $_POST["nome"];


// PARA DEMITIR
if($situacao) {

    $situ = false;
    $mensagem = "foi chutado <i class='fa-solid fa-skull-crossbones'></i>";
    
// PARA CONTRATAR
} else {
    
    $situ = true;
    $mensagem = "foi recontratado <i class='fa-regular fa-face-smile'></i>";

}


$query = "UPDATE funcionarios SET situacao = :situacao WHERE ID = :ID";

$stmt = $conn->prepare($query);

$stmt->bindParam(":situacao", $situ);
$stmt->bindParam(":ID", $ID);
$stmt->execute();


$_SESSION["msg"] = "<span>" . $nome . "</span> " . $mensagem;
$_SESSION["msg-type"] = "msg-sucesso";

$_SESSION["valida_nome"] = "";
header("location: ../dash_funcionarios.php");