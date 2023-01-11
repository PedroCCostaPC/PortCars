<?php

require_once("../global/global.php");
require_once("../global/db.php");

$ID = (int) $_POST["id"];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$tipo = $_POST["tipo"];

if(isset($_POST["cargo"])) {
    $cargo = $_POST["cargo"];
}



$_SESSION["valida_nome"] = $nome;
$_SESSION["valida_sobrenome"] = $sobrenome;



// ALTERANDO NOME
if($nome !== "") {
    alteraCol("nome", $nome, $ID, $conn);
}

// ALTERANDO SOBRENOME
if($sobrenome !== "") {
    alteraCol("sobrenome", $sobrenome, $ID, $conn);
}

// ALTERANDO EMAIL
if($email !== "") {
    alteraCol("email", $email, $ID, $conn);
}

// ALTERANDO SENHA
if($senha !== "") {
    $senha = sha1($senha);
    alteraCol("senha", $senha, $ID, $conn);
}

// ALTERANDO CARGO
if(isset($cargo) && $cargo !== "" && is_numeric($cargo)) {
    alteraCol("cargo_id", $cargo, $ID, $conn);
}


// RETORNA AO DASH COM MENSAGEM DE SUCESSO
if($tipo === "minha_conta") {
    $retornaMensagem = "Seus dados foram alterado com sucesso";
    $voltaLink = "location: ../dashboard.php";

} else {
    $retornaMensagem = "<span>" . $_SESSION["valida_nome"] . " " . $_SESSION["valida_sobrenome"] . "</span> alterado com sucesso";
    $voltaLink = "location: ../dash_funcionarios.php";
}

$_SESSION["msg"] = $retornaMensagem;
$_SESSION["msg-type"] = "msg-sucesso";

$_SESSION["valida_nome"] = "";
$_SESSION["valida_sobrenome"] = "";
header($voltaLink);





// FUNCAO PARA ALTERAR BD DOS INPUT PADRAO 
function alteraCol($coluna, $var, $id, $conn) {
    $stmt = $conn->prepare("UPDATE funcionarios SET $coluna = :$coluna WHERE ID = :ID");

    $stmt->bindParam(":$coluna", $var);
    $stmt->bindParam(":ID", $id);

    $stmt->execute();
}




