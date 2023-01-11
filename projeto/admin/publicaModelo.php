<?php

require_once("../global/global.php");
require_once("../global/db.php");


$nome = $_POST["nome"];
$ano = $_POST["ano"];
$classe = $_POST["classe"];
$velocidade = $_POST["velocidade"];
$peso = $_POST["peso"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$fabricante = $_POST["fabricante"];


$_SESSION["valida_nome"] = $nome;
$_SESSION["valida_ano"] = $ano;
$_SESSION["valida_classe"] = $classe;
$_SESSION["valida_velocidade"] = $velocidade;
$_SESSION["valida_peso"] = $peso;
$_SESSION["valida_preco"] = $preco;
$_SESSION["valida_descricao"] = $descricao;
$_SESSION["valida_fabricante"] = $fabricante;


// CHECANDO SE CAMPOS FORAM PREENCHIDOS
if($nome === "" || $ano === "" || $classe === "" || $velocidade === "" || $peso === "" || $preco === "" || $descricao === "" || !isset($fabricante)) {

    // VALIDANDO NOME
    if($nome === "") {
        $_SESSION["classNome"] = "invalido";
    }

    // VALIDANDO ANO
    if($ano === "") {
        $_SESSION["classAno"] = "invalido";
    }

    // VALIDANDO CLASSE
    if($classe === "") {
        $_SESSION["classClasse"] = "invalido";
    }

    // VALIDANDO VELOCIDADE
    if($velocidade === "") {
        $_SESSION["classVelocidade"] = "invalido";
    }

    // VALIDANDO PESO
    if($peso === "") {
        $_SESSION["classPeso"] = "invalido";
    }

    // VALIDANDO PRECO
    if($preco === "") {
        $_SESSION["classPreco"] = "invalido";
    }

    // VALIDANDO DESCRICAO
    if($descricao === "") {
        $_SESSION["classDescricao"] = "textarea-invalido";
    }

    // VALIDANDO FABRICANTE
    if(!isset($fabricante)) {
        $_SESSION["classFabricante"] = "radio-invalido";
    }

    $validado = false;

} else {
    $validado = true;
}


// CASO VALIDADO SEJA FALSE RETORNA AO FORMULARIO
if(!$validado) {

    $_SESSION["msg"] = "Preencha Todos os campos obrigatórios";
    $_SESSION["msg-type"] = "msg-erro";
        
    header("location: ../publicar_modelo.php");


// TODOS OS CAMPOS FORAM PREENCHIDOS
} else {

    checkNumero("Ano", $ano, "classAno");
    checkNumero("Velocidade", $velocidade, "classVelocidade");
    checkNumero("Peso", $peso, "classPeso");
    checkNumero("Preço", $preco, "classPreco");

    // COLOCANDO SITUACAO TRUE
    $situacao = true;

    // ID DO AUTO DO POST
    $idAutor = (int) $_SESSION["ID"];

    // CRIANDO DATA
    $zona = new dateTimeZone("America/Sao_Paulo");
    $data = new DateTime("now", $zona);

    $dataString = $data->format("Y-m-d H:i:s");



    // ADICIONANDO MODELO AO BD
    $stmt = $conn->prepare(
        "INSERT INTO modelos 
            (
                nome, 
                ano, 
                classe, 
                velocidade, 
                preco, 
                peso, 
                descricao, 
                data_publicada, 
                fabricante_id, 
                funcionario_id, 
                situacao
            ) VALUES ( 
                :nome, 
                :ano, 
                :classe, 
                :velocidade, 
                :preco, 
                :peso, 
                :descricao, 
                :data_publicada, 
                :fabricante_id, 
                :funcionario_id, 
                :situacao
            )
        "
    );

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":ano", $ano);
    $stmt->bindParam(":classe", $classe);
    $stmt->bindParam(":velocidade", $velocidade);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":peso", $peso);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":data_publicada", $dataString);
    $stmt->bindParam(":fabricante_id", $fabricante);
    $stmt->bindParam(":funcionario_id", $idAutor);
    $stmt->bindParam(":situacao", $situacao);

    $stmt->execute();


    // PEGANDO ID DO MODELO CRIADO
    $stmt = $conn->prepare("SELECT MAX(ID) FROM modelos");
    $stmt->execute();
    $novoModelo = $stmt->fetch(PDO::FETCH_ASSOC);

    $newModel = $novoModelo["MAX(ID)"];


    // CRIANDO NOME PARA AS IMAGENS
    $nomeImg = $nome . $dataString;
    $nomeImg = preg_replace('/[^A-Za-z0-9\-]/', '', $nomeImg) . "_";


    // CRIANDO IMAGEM
    if(isset($_FILES["imagens"])) {
        $contador = 0;
    
        foreach($_FILES["imagens"]["name"] as $i) {
    
            $extencao = strtolower(substr($i,-4));
            $imagens = $nomeImg . $contador . $extencao;
            $diretorio = '../assets/img/modelos/';
    
            move_uploaded_file($_FILES["imagens"]["tmp_name"][$contador], $diretorio.$imagens);
    
            $contador++;
    
            // ADICIONANDO IMAGEM AO BD
            $stmt = $conn->prepare("INSERT INTO fotos (foto, modelo_id) VALUES (:foto, :modelo_id)");
            $stmt->bindParam(":foto", $imagens);
            $stmt->bindParam(":modelo_id", $newModel);
            $stmt->execute();
        }
    
    }

    // RETORNA AO DASH COM MENSAGEM DE SUCESSO
    $_SESSION["msg"] = "<b>" . $_SESSION["valida_nome"] . "</b> publicado com sucesso";
    $_SESSION["msg-type"] = "msg-sucesso";

    // LIMPANDO SESSIONS
    $_SESSION["valida_nome"] = "";
    $_SESSION["valida_ano"] = "";
    $_SESSION["valida_classe"] = "";
    $_SESSION["valida_velocidade"] = "";
    $_SESSION["valida_peso"] = "";
    $_SESSION["valida_preco"] = "";
    $_SESSION["valida_descricao"] = "";
    $_SESSION["valida_fabricante"] = "";

    header("location: ../dashboard.php");

}





// FUNCAO PARA CHECAR SE INPUT CONTEM SOMENTE NUMERO
function checkNumero($campo, $input, $class) {
    if(!is_numeric($input)) {
        $_SESSION["msg"] = "<b>$campo</b> deve conter somente números";
        $_SESSION["msg-type"] = "msg-erro";
        $_SESSION[$class] = "invalido";
                
        header("location: ../publicar_modelo.php");
    }
}








