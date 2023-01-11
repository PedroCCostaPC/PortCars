<?php

require_once("../global/global.php");
require_once("../global/db.php");


$nome = $_POST["nome"];
$slogan = $_POST["slogan"];
$atividade = $_POST["atividade"];
$ano = $_POST["ano"];
$site = $_POST["site"];
$descricao = $_POST["descricao"];

$fundadores = $_POST["fundador"];
$sede = $_POST["sede"];
$proprietarios = $_POST["proprietario"];
$produtos = $_POST["produto"];


$_SESSION["valida_nome"] = $nome;
$_SESSION["valida_slogan"] = $slogan;
$_SESSION["valida_atividade"] = $atividade;
$_SESSION["valida_ano"] = $ano;
$_SESSION["valida_site"] = $site;
$_SESSION["valida_descricao"] = $descricao;

$_SESSION["valida_fundadores"] = $fundadores;
$_SESSION["valida_mais_fundador"] = [];
$_SESSION["valida_sede"] = $sede;
$_SESSION["valida_mais_sede"] = [];
$_SESSION["valida_proprietario"] = $proprietarios;
$_SESSION["valida_mais_proprietario"] = [];
$_SESSION["valida_produto"] = $produtos;
$_SESSION["valida_mais_produto"] = [];



// CHECANDO SE CAMPOS FORAM PREENCHIDOS
if($nome === "" || $slogan === "" || $atividade === "" || $ano === "" || $site === "" || $descricao === "") {

    // VALIDANDO NOME
    if($nome === "") {
        $_SESSION["classNome"] = "invalido";
    }

    // VALIDANDO SLOGAN
    if($slogan === "") {
        $_SESSION["classSlogan"] = "invalido";
    }

    // VALIDANDO ATIVIDADE
    if($atividade === "") {
        $_SESSION["classAtividade"] = "invalido";
    }

    // VALIDANDO ANO
    if($ano === "") {
        $_SESSION["classAno"] = "invalido";
    }

    // VALIDANDO SITE
    if($site === "") {
        $_SESSION["classSite"] = "invalido";
    }

    // VALIDANDO DESCRICAO
    if($descricao === "") {
        $_SESSION["classDescricao"] = "textarea-invalido";
    }

    $validado = false;

} else {
    $validado = true;
}

// VALIDANDO FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
voltaObj("fundador-nome", $fundadores, "valida_mais_fundador", "classFundador");
voltaObj("sede-nome", $sede, "valida_mais_sede", "classSede");
voltaObj("proprietario-nome", $proprietarios, "valida_mais_proprietario", "classProprietario");
voltaObj("produto-nome", $produtos, "valida_mais_produto", "classProduto");


// CASO VALIDADO SEJA FALSE RETORNA AO FORMULARIO
if(!$validado) {

    $_SESSION["msg"] = "Preencha Todos os campos obrigatórios";
    $_SESSION["msg-type"] = "msg-erro";
        
    header("location: ../publicar_fabricante.php");


// TODOS OS CAMPOS FORAM PREENCHIDOS
} else {

    // CHECANDO SE ANO CONTEM SOMENTE NUMEROS
    if(!is_numeric($ano)) {
        $_SESSION["msg"] = "<b>Ano</b> deve conter somente números";
        $_SESSION["msg-type"] = "msg-erro";
        $_SESSION["classAno"] = "invalido";
            
        header("location: ../publicar_fabricante.php");
    } 

    // TIRANDO O "https://" DA STRING CASO TENHA
    if(substr($site, 0, 8) === "https://") {        
        $site = substr($site, 8);        
    }

    // TIRANDO A "/" NO FINAL DA STRING CASO TENHA
    if(substr($site, -1, 1) === "/") {        
        $site = rtrim($site, "/");
    }


    // CRIANDO IMAGEM
    if(isset($_FILES["logo"])) {

        $extencao = strtolower(substr($_FILES['logo']['name'],-4));
        $logo = $nome . $extencao;
        $diretorio = '../assets/img/fabricantes/';
        move_uploaded_file($_FILES['logo']['tmp_name'], $diretorio.$logo);

    }

    // CRIANDO DATA
    $zona = new dateTimeZone("America/Sao_Paulo");
    $data = new DateTime("now", $zona);

    $dataString = $data->format("Y-m-d H:i:s");

    // COLOCANDO SITUACAO TRUE
    $situacao = true;

    // ID DO AUTOR DO POST
    $idAutor = (int) $_SESSION["ID"];



    // ADICIONANDO FABRICANDO NO BD
    $stmt = $conn->prepare(
        "INSERT INTO fabricantes 
            (
                nome, 
                logo, 
                slogan, 
                atividade, 
                ano, 
                siteOficial, 
                historia, 
                data_publicada,
                funcionario_id,
                situacao
            ) VALUES
            (
                :nome,
                :logo,
                :slogan,
                :atividade,
                :ano,
                :siteOficial,
                :historia,
                :data_publicada,
                :funcionario_id,
                :situacao
            )
        "
    );

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":logo", $logo);
    $stmt->bindParam(":slogan", $slogan);
    $stmt->bindParam(":atividade", $atividade);
    $stmt->bindParam(":ano", $ano);
    $stmt->bindParam(":siteOficial", $site);
    $stmt->bindParam(":historia", $descricao);
    $stmt->bindParam(":data_publicada", $dataString);
    $stmt->bindParam(":funcionario_id", $idAutor);
    $stmt->bindParam(":situacao", $situacao);

    $stmt->execute();


    // PEGANDO ID DO FABRICANTE CRIADO
    $stmt = $conn->prepare("SELECT MAX(ID) FROM fabricantes");
    $stmt->execute();
    $novoFab = $stmt->fetch(PDO::FETCH_ASSOC);

    $newFab = $novoFab["MAX(ID)"];


    // ADICIOANDO FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
    adicionaObj("fundador-nome", "fundadores", "fabricante_fundador", "fundador_id", $conn, $newFab);
    adicionaObj("sede-nome", "sede", "fabricante_sede", "sede_id", $conn, $newFab);
    adicionaObj("proprietario-nome", "proprietarios", "fabricante_proprietario", "proprietario_id", $conn, $newFab);
    adicionaObj("produto-nome", "produtos", "fabricante_produto", "produto_id", $conn, $newFab);


    // ADICIONANDO RELACAO DE CHECKBOX EM FUNDADORES / SEDE / PROPRIETARIOS / PRODUTOS
    checkboxSel("fundador", "fabricante_fundador", "fundador_id", $conn, $newFab);
    checkboxSel("sede", "fabricante_sede", "sede_id", $conn, $newFab);
    checkboxSel("proprietario", "fabricante_proprietario", "proprietario_id", $conn, $newFab);
    checkboxSel("produto", "fabricante_produto", "produto_id", $conn, $newFab);



    // RETORNA AO DASH COM MENSAGEM DE SUCESSO
    $_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> publicado com sucesso";
    $_SESSION["msg-type"] = "msg-sucesso";


    // LIMPANDO SESSIONS
    $_SESSION["valida_nome"] = "";
    $_SESSION["valida_slogan"] = "";
    $_SESSION["valida_atividade"] = "";
    $_SESSION["valida_ano"] = "";
    $_SESSION["valida_site"] = "";
    $_SESSION["valida_descricao"] = "";

    $_SESSION["valida_fundadores"] = "";
    $_SESSION["valida_sede"] = "";
    $_SESSION["valida_proprietario"] = "";
    $_SESSION["valida_produto"] = "";
        
    header("location: ../dashboard.php");


}



// FUNCAO PARA VOLTAR COM OS CAMPOS PREENCHIDOS 
function voltaObj($post, $checkbox, $sessao, $classe) {
    if(!isset($checkbox)) {

        if(isset($_POST[$post])) { 
            $novoObjeto = $_POST[$post];

            foreach($novoObjeto as $i) {
                if($i != "") {
                    $_SESSION[$sessao][] = $i;
                }
            }

            if(!isset($checkbox) && count($_SESSION[$sessao]) === 0) {
                $_SESSION["msg"] = "Preencha Todos os campos obrigatórios";
                $_SESSION["msg-type"] = "msg-erro";
                $_SESSION[$classe] = "check-invalido";
                header("location: ../publicar_fabricante.php");
            }

        } else {
            $_SESSION["msg"] = "Preencha Todos os campos obrigatórios";
            $_SESSION["msg-type"] = "msg-erro";
            $_SESSION[$classe] = "check-invalido";
            header("location: ../publicar_fabricante.php");
        }

        
    } else {
        if(isset($_POST[$post])) {
            $novoObjeto = $_POST[$post];

            foreach($novoObjeto as $i) {
                if($i != "") {
                    $_SESSION[$sessao][] = $i;
                }
            }

        }
    }
}



// FUNCAO PARA ADICIONAR DADOS
function adicionaObj($post, $tabela, $tabRelacao, $coluna, $conn, $newFab) {
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

                $stmt->bindParam(":fabricante_id", $newFab);
                $stmt->bindParam(":$coluna", $newObjt["MAX(ID)"]);
                $stmt->execute(); 
            }
        }

    }
}


// FUNCAO PARA SELECAO DOS CHECKBOX
function checkboxSel($post, $tabRelacao, $coluna, $conn, $newFab) {
    
    if(isset($_POST[$post])) {
        $objeto = $_POST[$post];

        foreach($objeto as $obj) {

            $stmt = $conn->prepare("INSERT INTO $tabRelacao (fabricante_id, $coluna) VALUES (:fabricante_id, :$coluna)");

            $stmt->bindParam(":fabricante_id", $newFab);
            $stmt->bindParam(":$coluna", $obj);
            $stmt->execute();

        }

    }

}







