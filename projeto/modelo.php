<?php

    require_once("template/header.php");



    if(!isset($_GET["id"])) {

        header("location: fabricantes.php");

    } else {
        
        $modelID = (int) $_GET["id"];
        $modelArray;

        foreach($modelosNovo as $modelo) {

            if($modelo["ID"] === $modelID) {
                $modelArray = $modelo;
            }

        }
    }

    // Cheacando se fabricante existe e se situacao é true
    if(!isset($modelArray["ID"]) || !$modelArray["situacao"]) {
        // Checando se nao é funcionario ativo
        if(!isset($_SESSION["email"]) || !$_SESSION["situacao"]) {
            header("location: fabricantes.php");
        }
    }

    // Pegando as fotos do modelo
    foreach($fotos as $i) {
        if($i["modelo_id"] === $modelArray["ID"]) {
            $foto[] = $i;
        }
    }

    // Pegando a fabricante do modelo
    foreach($fabricanteID as $i) {
        if($i["ID"] === $modelArray["fabricante_id"]) {
            $fabArray = $i;
        }
    }


    // Pegando autor do post 
    foreach($funcionarios as $i) {
        if($i["ID"] === $fabArray["funcionario_id"]) {
            $funcionario = $i["nome"] . " " . $i["sobrenome"];
        }
    }

    // Pegando uma foto aleatoria para especificacoes
    $fotoRand = array_rand($foto);




    // Formatando preco e peso
    $preco = formatNumber($modelArray["preco"]);
    $peso = formatNumber($modelArray["peso"]);

?>


<div class="container">

    <!-- Etiqueta de "Rascunho", somente para funcionario ativo -->
    <?php if(!isset($modelArray["ID"]) || !$modelArray["situacao"]): ?>
        <?php if(isset($_SESSION["email"]) || $_SESSION["situacao"]): ?>
            <div id="main-rascunho">
                <div id="visualiza-rascunho">
                    <p>Rascunho</p>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- *********** BANNER *********** -->
    <section id="banner">
        <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto[0]["foto"] ?>" alt="<?= $modelArray["nome"] ?>">

        <div class="box-shadow">

            <div class="bot">
                <div class="col-1"><h1><?= $modelArray["nome"] ?></h1></div>
                <div class="col-2">
                    <a href="#<?= $modelArray["nome"] ?>">
                        <p>Rolar para baixo</p>
                        <p><i class="fa-solid fa-chevron-down"></i></p>
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- *********** CAMINHO NAV *********** -->
    <nav id="<?= $modelArray["nome"] ?>" class="nav-caminho">
        <div class="col-1">
            <p>
                <a href="<?= $BASE_URL ?>fabricantes.php">Fabricantes</a>
                <i class="fa-solid fa-chevron-right"></i> 
                <a href="<?= $BASE_URL ?>fabricante.php?id=<?= $fabArray["ID"] ?>"><?= $fabArray["nome"] ?></a> 
                
                <i class="fa-solid fa-chevron-right"></i> 
                <span><?= $modelArray["nome"] ?></span>
            </p> 
        </div>

        <div class="col-2">
            <p>Publicado por <span><?= $funcionario ?></span></p>
            <p><?= formataDataPub($fabArray["data_publicada"]) ?></p>
        </div>
    </nav>

    <!-- *********** TITULO *********** -->
    <div id="h2-modelo">
        <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabArray["logo"] ?>" alt="<?= $fabArray["nome"] ?>"> 
        <h2><?= $modelArray["nome"] ?> (<?= $modelArray["ano"] ?>)</h2>
    </div>  

    <!-- *********** ESPECIFICACOES *********** -->
    <section id="especificacoes">

        <div class="col-1">

            <!-- NOME -->
            <div class="col">
                <p>Nome</p>
                <p><?= $modelArray["nome"] ?></p>
            </div>

            <!-- FABRICANTE -->
            <div class="col">
                <p>Fabricante</p>
                <p><?= $fabArray["nome"] ?></p>
            </div>

            <!-- ANO -->
            <div class="col">
                <p>Ano</p>
                <p><?= $modelArray["ano"] ?></p>
            </div>

            <!-- CLASSE -->
            <div class="col">
                <p>Classe</p>
                <p><?= $modelArray["classe"] ?></p>
            </div>

            <!-- VELOCIDADE MAXIMA -->
            <div class="col">
                <p>Velocidade Máxima</p>
                <p><?= $modelArray["velocidade"] ?> km/h</p>
            </div>

            <!-- PESO -->
            <div class="col">
                <p>Peso</p>
                <p><?= $peso ?> kg</p>
            </div>

            <!-- PESO -->
            <div class="col">
                <p>Preço</p>
                <p>$ <?= $preco ?></p>
            </div>

        </div><!-- Fim div .col-1 -->


        <div class="col-2">
            <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto[$fotoRand]["foto"] ?>" alt="<?= $modelArray["nome"] ?>">
        </div>

    </section>

    <!-- *********** GALERIA *********** -->
    <section id="galeria">

        <div class="foto">
            <div id="wowslider-container1">

                <div class="ws_images">
                    <ul>
                        <?php for($i = 0; $i < count($foto); $i++): ?>
                            <li>
                                <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto[$i]["foto"] ?>" alt="<?= $modelArray["nome"] ?>" title="<?= $foto[$i]["foto"] ?>" id="#wow1_<?= $foto[$i] ?>">
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>

                <div class="ws_bullets">
                    <div>
                        <?php for($i = 0; $i < count($foto); $i++): ?>
                            <a href="#wow1_<?= $foto[$i] ?>" title="<?= $foto[$i]["foto"] ?>"><span><?= $i ?></span></a>
                        <?php endfor; ?>
                    </div>
                </div> 

            </div><!-- Fim div #wowslider-container1 -->
        </div><!-- Fim div .foto -->

    </section>


    <!-- *********** TEXTO *********** -->
    <section id="detalhes">
        <?= $modelArray["descricao"] ?>
    </section>


</div><!-- Fim div .container -->


<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- LIB WOW -->
<script type="text/javascript" src="assets/lib/wow/wowslider.js"></script>
<script type="text/javascript" src="assets/lib/wow/script.js"></script>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/modelo.js"></script>

<script>
    galeriaFoto();
</script>


</body>
</html>