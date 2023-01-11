<?php

require_once("../global/global.php");
require_once("../global/db.php");
require_once("../data/DB_fotos.php");


$ID = (int) $_POST["id"];
$nome = $_POST["nome"];
$ano = $_POST["ano"];
$classe = $_POST["classe"];
$velocidade = $_POST["velocidade"];
$peso = $_POST["peso"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$fabricante = $_POST["fabricante"];


$_SESSION["valida_nome"] = $nome;


// PEGANDO AS FOTOS DO MODELO
foreach($fotos as $i) {
    if($i["modelo_id"] === $ID) {
        $antigasFotos[] = $i;
    }
}


// ALTERANDO NOME
if($nome !== "") {
    alteraCol("nome", $nome, $ID, $conn);
}

// ALTERANDO ANO
if($ano !== "" && is_numeric($ano)) {
    alteraCol("ano", $ano, $ID, $conn);
}

// ALTERANDO CLASSE
if($classe !== "") {
    alteraCol("classe", $classe, $ID, $conn);
}

// ALTERANDO VELOCIDADE
if($velocidade !== "" && is_numeric($velocidade)) {
    alteraCol("velocidade", $velocidade, $ID, $conn);
}

// ALTERANDO PESO
if($peso !== "" && is_numeric($peso)) {
    alteraCol("peso", $peso, $ID, $conn);
}

// ALTERANDO PRECO
if($preco !== "" && is_numeric($preco)) {
    alteraCol("preco", $preco, $ID, $conn);
}

// ALTERANDO FABRICANTE
if($fabricante !== "" && is_numeric($fabricante)) {
    alteraCol("fabricante_id", $fabricante, $ID, $conn);
}

// ALTERANDO DESCRICAO
if($descricao !== "") {
    alteraCol("descricao", $descricao, $ID, $conn);
}

// CRIANDO IMAGEM
if(isset($_FILES["imagens"])) {

    // SOMENTE CASO NOVAS IMAGENS TENHA SIDO SELECIONADO
    if($_FILES["imagens"]["name"][0] !== "") {
        $contador = 0;

        // DELETANDO IMAGENS ANTIGAS DA PASTA
        if(count($antigasFotos) > 0) {
            foreach($antigasFotos as $i) {
                unlink("../assets/img/modelos/" . $i["foto"]);
            }
        }

        // DELETANDO GEFISTRO DAS FOTOS ANTIGAS DO BD
        $stmt = $conn->prepare("DELETE FROM fotos WHERE modelo_id = :modelo_id");

        $stmt->bindParam(":modelo_id", $ID);
        $stmt->execute();


        // CRIANDO DATA PARA NOME DA IMG
        $zona = new dateTimeZone("America/Sao_Paulo");
        $data = new DateTime("now", $zona);

        $dataString = $data->format("Y-m-d H:i:s");

        // CRIANDO NOME PARA AS IMAGENS
        $nomeImg = $nome . $dataString;
        $nomeImg = preg_replace('/[^A-Za-z0-9\-]/', '', $nomeImg) . "_";


        // CRIANDO NOVAS IMAGENS
        foreach($_FILES["imagens"]["name"] as $i) {

            $extencao = strtolower(substr($i,-4));
            $imagens = $nomeImg . $contador . $extencao;
            $diretorio = '../assets/img/modelos/';

            move_uploaded_file($_FILES["imagens"]["tmp_name"][$contador], $diretorio.$imagens);

            $contador++;

            // ADICIONANDO IMAGEM AO BD
            $stmt = $conn->prepare("INSERT INTO fotos (foto, modelo_id) VALUES (:foto, :modelo_id)");
            $stmt->bindParam(":foto", $imagens);
            $stmt->bindParam(":modelo_id", $ID);
            $stmt->execute();
        }

    }
}


// RETORNA AO DASH COM MENSAGEM DE SUCESSO
$_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> alterado com sucesso";
$_SESSION["msg-type"] = "msg-sucesso";

$_SESSION["valida_nome"] = "";
header("location: ../dashboard.php");





// FUNCAO PARA ALTERAR BD DOS INPUT PADRAO 
function alteraCol($coluna, $var, $id, $conn) {
    $stmt = $conn->prepare("UPDATE modelos SET $coluna = :$coluna WHERE ID = :ID");

    $stmt->bindParam(":$coluna", $var);
    $stmt->bindParam(":ID", $id);

    $stmt->execute();
}
