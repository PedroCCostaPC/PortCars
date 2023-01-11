<?php

require_once("../global/global.php");
require_once("../global/db.php");

$email = $_POST["email"];
$senha = sha1($_POST["senha"]);


// CHECANDO SE CAMPOS FORAM PREENCHIDOS
if($email == "" || $senha == "") {

    $_SESSION["msg"] = "E-mail e senha devem ser preenchidos!";
    $_SESSION["msg-type"] = "msg-erro";

    header("location: ../login.php");

    
// CAMPOS FORAM PREENCHIDOS
} else {

    // BUSCANDO FUNCIONARIO NO BANCO DE DADOS
    $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE email = :email AND senha = :senha");

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->execute();

    $logado = $stmt->fetch(PDO::FETCH_ASSOC);


    // VERIFICANDO SE USUARIO EXISTE NO BANCO
    if($logado["email"] !== $email || $logado["senha"] !== $senha) {

        $_SESSION["msg"] = "E-mail ou senha incorretos!";
        $_SESSION["msg-type"] = "msg-erro";
    
        header("location: ../login.php");

    
    } else {
        
        $_SESSION["ID"] = $logado["ID"];
        $_SESSION["nome"] = $logado["nome"];
        $_SESSION["sobrenome"] = $logado["sobrenome"];
        $_SESSION["email"] = $logado["email"];
        $_SESSION["senha"] = $logado["senha"];
        $_SESSION["situacao"] = $logado["situacao"];
        $_SESSION["cargo_id"] = $logado["cargo_id"];

        
        // CHECANDO SE FUNCIONARIO ESTA ATIVO
        if(!$_SESSION["situacao"]) {

            $_SESSION["msg"] = "Acesso negado!";
            $_SESSION["msg-type"] = "msg-erro";
        
            header("location: ../login.php");

        // TUDO VALIDADO
        } else {
            header("location: ../dashboard.php");
        }


    }


}

