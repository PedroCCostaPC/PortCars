<?php

require_once("../global/global.php");
require_once("../global/db.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cargo = $_POST["cargo"];


$_SESSION["valida_nome"] = $nome;
$_SESSION["valida_sobrenome"] = $sobrenome;
$_SESSION["valida_email"] = $email;
$_SESSION["valida_cargo"] = $cargo;


// CHECANDO SE CAMPOS FORAM PREENCHIDOS
if($nome === "" || $sobrenome === "" || $email === "" || $senha === "" || !isset($cargo)) {

    // VALIDANDO NOME
    if($nome === "") {
        $_SESSION["classNome"] = "invalido";
    }

    // VALIDANDO SOBRENOME
    if($sobrenome === "") {
        $_SESSION["classSobrenome"] = "invalido";
    }

    // VALIDANDO EMAIL
    if($email === "") {
        $_SESSION["classEmail"] = "invalido";
    }

    // VALIDANDO SENHA
    if($senha === "") {
        $_SESSION["classSenha"] = "invalido";
    }

    // VALIDANDO CARGO
    if(!isset($cargo)) {
        $_SESSION["classCargo"] = "radio-invalido";
    }

    $validado = false;

} else {
    $validado = true;
}





// CASO VALIDADO SEJA FALSE RETORNA AO FORMULARIO
if(!$validado) {

    $_SESSION["msg"] = "Preencha Todos os campos obrigatórios";
    $_SESSION["msg-type"] = "msg-erro";
        
    header("location: ../cadastro_funcionario.php");


// TODOS OS CAMPOS FORAM PREENCHIDOS
} else {

    $situacao = true;
    $senha = sha1($senha);

    // ADICIONANDO funcionario AO BD
    $stmt = $conn->prepare(
        "INSERT INTO funcionarios 
            (
                nome, 
                sobrenome, 
                email, 
                senha, 
                situacao, 
                cargo_id
            ) VALUES ( 
                :nome, 
                :sobrenome, 
                :email, 
                :senha, 
                :situacao, 
                :cargo_id
            )
        "
    );

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":sobrenome", $sobrenome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":situacao", $situacao);
    $stmt->bindParam(":cargo_id", $cargo);

    $stmt->execute();



    // RETORNA AO DASH COM MENSAGEM DE SUCESSO
    $_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . " " . $_SESSION["valida_sobrenome"] . "</b> cadastrado com sucesso";
    $_SESSION["msg-type"] = "msg-sucesso";

    // LIMPANDO SESSIONS
    $_SESSION["valida_nome"] = "";
    $_SESSION["valida_sobrenome"] = "";
    $_SESSION["valida_email"] = "";
    $_SESSION["valida_cargo"] = "";

    header("location: ../dash_funcionarios.php");


}










