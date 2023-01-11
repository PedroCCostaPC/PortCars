<?php

require_once("../global/global.php");
require_once("../global/db.php");


$ID = $_POST["id"];
$nome = $_POST["nome"];
$slogan = $_POST["slogan"];
$atividade = $_POST["atividade"];
$ano = $_POST["ano"];
$site = $_POST["site"];
$descricao = $_POST["descricao"];
$nomeLogo = $_POST["nome-logo"];



$_SESSION["valida_nome"] = $nome;


$backupFundadores = backupDados("fabricante_fundador", $ID, $conn);
$backupSede = backupDados("fabricante_sede", $ID, $conn);
$backupProprietarios = backupDados("fabricante_proprietario", $ID, $conn);
$backupProdutos = backupDados("fabricante_produto", $ID, $conn);



// ALTERANDO NOME
if($nome !== "") {
    alteraCol("nome", $nome, $ID, $conn);
}

// ALTERANDO SLOGAN
if($slogan !== "") {
    alteraCol("slogan", $slogan, $ID, $conn);
}

// ALTERANDO ATIVIDADE
if($atividade !== "") {
    alteraCol("atividade", $atividade, $ID, $conn);
}

// ALTERANDO ANO
if($ano !== "" && is_numeric($ano)) {
    alteraCol("ano", $ano, $ID, $conn);
}

// ALTERANDO SITE
if($site !== "") {

    // REMOVENDO O "https://" DA STRING CASO TENHA
    if(substr($site, 0, 8) === "https://") {        
        $site = substr($site, 8);
    }

    // REMOVENDO A "/" NO FINAL DA STRING CASO TENHA
    if(substr($site, -1, 1) === "/") {        
        $site = rtrim($site, "/");
    }

    alteraCol("siteOficial", $site, $ID, $conn);
}

// ALTERANDO LOGO
if(isset($_FILES["logo"])) {

    $logo = $nomeLogo;
    $diretorio = '../assets/img/fabricantes/';
    move_uploaded_file($_FILES['logo']['tmp_name'], $diretorio.$logo);

}

// ALTERANDO DESCRICAO
if($descricao !== "") {
    alteraCol("historia", $descricao, $ID, $conn);
}


// REMOVENDO RELACAO DOS CHECKBOX
removecheck("fabricante_fundador", $ID, $conn);
removecheck("fabricante_sede", $ID, $conn);
removecheck("fabricante_proprietario", $ID, $conn);
removecheck("fabricante_produto", $ID, $conn);


// ADICIOANDO FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
adicionaObj("fundador-nome", "fundadores", "fabricante_fundador", "fundador_id", $ID, $conn);
adicionaObj("sede-nome", "sede", "fabricante_sede", "sede_id", $ID, $conn);
adicionaObj("proprietario-nome", "proprietarios", "fabricante_proprietario", "proprietario_id", $ID, $conn);
adicionaObj("produto-nome", "produtos", "fabricante_produto", "produto_id", $ID, $conn);



// ADICIONANDO RELACAO DE CHECKBOX EM FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
checkboxSel("fundador", "fabricante_fundador", "fundador_id", $conn, $ID);
checkboxSel("sede", "fabricante_sede", "sede_id", $conn, $ID);
checkboxSel("proprietario", "fabricante_proprietario", "proprietario_id", $conn, $ID);
checkboxSel("produto", "fabricante_produto", "produto_id", $conn, $ID);



// RECOLOCA OS DADOS ANTERIORES NO BD CASO NAO RECEBA NOVOS DADOS
recolocaDados("fundador", "fundador-nome", $backupFundadores, "fundador_id", "fabricante_fundador", $ID, $conn);
recolocaDados("sede", "sede-nome", $backupSede, "sede_id", "fabricante_sede", $ID, $conn);
recolocaDados("proprietario", "proprietario-nome", $backupProprietarios, "proprietario_id", "fabricante_proprietario", $ID, $conn);
recolocaDados("produto", "produto-nome", $backupProdutos, "produto_id", "fabricante_produto", $ID, $conn);




// RETORNA AO DASH COM MENSAGEM DE SUCESSO
$_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> alterado com sucesso";
$_SESSION["msg-type"] = "msg-sucesso";

$_SESSION["valida_nome"] = "";
header("location: ../dashboard.php");





// FUNCAO PARA ALTERAR BD DOS INPUT PADRAO 
function alteraCol($coluna, $var, $id, $conn) {
    $stmt = $conn->prepare("UPDATE fabricantes SET $coluna = :$coluna WHERE ID = :ID");

    $stmt->bindParam(":$coluna", $var);
    $stmt->bindParam(":ID", $id);

    $stmt->execute();
}


// FUNCAO PARA REMOVER RELACAO DOS CHECKBOX
function removecheck($tabRelacao, $id, $conn) {

    $stmt = $conn->prepare("DELETE FROM $tabRelacao WHERE fabricante_id = :fabricante_id");
    
    $stmt->bindParam(":fabricante_id", $id);
    $stmt->execute();

}


// FUNCAO PARA ADICIONAR DADOS
function adicionaObj($post, $tabela, $tabRelacao, $coluna, $id, $conn) {
    if(isset($_POST[$post])) {

        $novoObjeto = $_POST[$post];

        foreach($novoObjeto as $i) {
            if($i != "") {
                // INSERINDO DADOS NO BANCO
                $stmt = $conn->prepare("INSERT INTO $tabela (nome) VALUES (:nome)");
                $stmt->bindParam(":nome", $i);
                $stmt->execute();

                // BUSCANDO ID DO NOVO DADO CRIADO
                $stmt = $conn->prepare("SELECT MAX(ID) FROM $tabela");
                $stmt->execute();
                $newObjt = $stmt->fetch(PDO::FETCH_ASSOC);

                // ADICIONANDO A RELACAO APOS DADO CRIADO
                $stmt = $conn->prepare("INSERT INTO $tabRelacao (fabricante_id, $coluna) VALUES (:fabricante_id, :$coluna)");

                $stmt->bindParam(":fabricante_id", $id);
                $stmt->bindParam(":$coluna", $newObjt["MAX(ID)"]);
                $stmt->execute(); 
            }
        }

    }
}


// FUNCAO PARA SELECAO DOS CHECKBOX
function checkboxSel($post, $tabRelacao, $coluna, $conn, $id) {
    
    if(isset($_POST[$post])) {
        $objeto = $_POST[$post];

        // RECOLOCANDO DADOS
        foreach($objeto as $obj) {

            $stmt = $conn->prepare("INSERT INTO $tabRelacao (fabricante_id, $coluna) VALUES (:fabricante_id, :$coluna)");

            $stmt->bindParam(":fabricante_id", $id);
            $stmt->bindParam(":$coluna", $obj);
            $stmt->execute();

        }

    }

}


// FUNCAO PARA BACKUP DOS DADOS
function backupDados($tabela, $id, $conn) {

    $stmt = $conn->prepare("SELECT * FROM $tabela WHERE fabricante_id = :fabricante_id");
    $stmt->bindParam(":fabricante_id", $id);

    $stmt->execute();
    $backup = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $backup;
}

// FUNCAO PARA RECOLOCAR BACKUP NO BD CASO NENHUM DADO SEJA COLOCADO
function recolocaDados($checkbox, $inputs, $dados, $coluna, $tabela, $id, $conn) {
    if(!isset($_POST[$checkbox])) {

        if(isset($_POST[$inputs])) {
            foreach($_POST[$inputs] as $i) {
                if($i != "") {
                    $valido = true;
                }
            }
        }


        if(!isset($valido)) {
            foreach($dados as $dado) {

                $stmt = $conn->prepare("INSERT INTO $tabela (fabricante_id, $coluna) VALUES (:fabricante_id, :$coluna)");
                
                $stmt->bindParam(":fabricante_id", $id);
                $stmt->bindParam(":$coluna", $dado[$coluna]);
                $stmt->execute();

            }
        }


    }
}







