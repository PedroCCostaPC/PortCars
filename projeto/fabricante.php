<?php

    require_once("template/header.php");


    if(!isset($_GET["id"])) {

        header("location: fabricantes.php");

    } else {
        
        // Pegando informacoes da fabricante
        $fabricanteID = (int) $_GET["id"];
        $fabArray;

        foreach($fabricanteNome as $fabricante) {

            if($fabricante["ID"] === $fabricanteID) {
                $fabArray = $fabricante;
            } 

        }
    }

    // Cheacando se fabricante existe e se situacao é true
    if(!isset($fabArray["ID"]) || !$fabArray["situacao"]) {
        // Checando se nao é funcionario ativo
        if(!isset($_SESSION["email"]) || !$_SESSION["situacao"]) {
            header("location: fabricantes.php");
        }
    }


    // Pegando os modelos da fabricante com situacao true, e na ordem -> ano mais novo
    foreach($modelosAno as $i) {
        if($i["fabricante_id"] === $fabArray["ID"] && $i["situacao"]) {
            $modelo[] = $i;
        }
    }

    // Pegando modelo mais recente publicado
    foreach($modelosNovo as $i) {
        if($i["fabricante_id"] === $fabArray["ID"] && $i["situacao"]) {
            $modeloID[] = $i;
        }
    }


    // Pegando uma foto aleatoria para banner
    if(isset($modelo)) {
        $idRand = array_rand($modelo);
        
        foreach($fotos as $i) {
            if($i["modelo_id"] === $modelo[$idRand]["ID"]) {
                $bannerArray[] = $i["foto"];
            }
        }

        $banner = array_rand($bannerArray);
    }

    // Pegando os fundadores 
    foreach($fundadores as $i) {
        foreach($fabricanteFundador as $j) {
            if($i["ID"] === $j["fundador_id"] && $j["fabricante_id"] === $fabArray["ID"]) {
                $fundador[] = $i;
            }
        }
    }

    // Pegando as sedes
    foreach($sede as $i) {
        foreach($fabricanteSede as $j) {
            if($i["ID"] === $j["sede_id"] && $j["fabricante_id"] === $fabArray["ID"]) {
                $sed[] = $i;
            }
        }
    }

    // Pegando os proprietarios
    foreach($proprietarios as $i) {
        foreach($fabricanteProprietario as $j) {
            if($i["ID"] === $j["proprietario_id"] && $j["fabricante_id"] === $fabArray["ID"]) {
                $proprietario[] = $i;
            }
        }
    }

    // Pegando os produtos
    foreach($produtos as $i) {
        foreach($fabricanteProduto as $j) {
            if($i["ID"] === $j["produto_id"] && $j["fabricante_id"] === $fabArray["ID"]) {
                $produto[] = $i;
            }
        }
    }


    // Pegando autor do post 
    foreach($funcionarios as $i) {
        if($i["ID"] === $fabArray["funcionario_id"]) {
            $funcionario = $i["nome"] . " " . $i["sobrenome"];
        }
    }

    
?>


<div class="container">

    <!-- Etiqueta de "Rascunho", somente para funcionario ativo -->
    <?php if(!isset($fabArray["ID"]) || !$fabArray["situacao"]): ?>
        <?php if(isset($_SESSION["email"]) || $_SESSION["situacao"]): ?>
            <div id="main-rascunho">
                <div id="visualiza-rascunho">
                    <p>Rascunho</p>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- *********** BANNER *********** -->
    <!-- Banner só aparece se existir algum modelo da fabricante publicado -->
    <?php if(isset($modelo)): ?>
        <section id="banner">

            <div class="slogan"><?= $fabArray["slogan"] ?></div>

            <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $bannerArray[$banner] ?>" alt="fabricantes">

            <div class="box-shadow">

                <div class="bot">
                    <div class="col-1"><h1><?= $fabArray["nome"] ?></h1></div>
                    <div class="col-2">
                        <a href="#<?= $fabArray["nome"] ?>">
                            <p>Rolar para baixo</p>
                            <p><i class="fa-solid fa-chevron-down"></i></p>
                        </a>
                    </div>
                </div>

            </div>
        </section>

    <?php endif; ?>


    <!-- *********** CAMINHO NAV *********** -->
    <nav id="<?= $fabArray["nome"] ?>" class="nav-caminho">

        <div class="col-1">
            <p>
                <a href="<?= $BASE_URL ?>fabricantes.php">Fabricantes</a>
                <i class="fa-solid fa-chevron-right"></i> 
                <span><?= $fabArray["nome"] ?></span>
            </p> 
        </div>

        <div class="col-2">
            <p>Publicado por <span><?= $funcionario ?></span></p>
            <p><?= formataDataPub($fabArray["data_publicada"]) ?></p>
        </div>

    </nav>


    <!-- TITULO -> só aparece caso nao tenha nenhum modelo -->
    <?php if(!isset($modelo)): ?>
        <div id="titlulo-else">
            <div class="col">
                <h1><?= $fabArray["nome"] ?></h1>
            </div>

            <div class="col">
                <p><?= $fabArray["slogan"] ?></p>
            </div>
        </div>
    <?php endif; ?>


    <!-- *********** BOTOES HISTORIA / MODELOS *********** -->
    <!-- só aparece caso haja algum modelo -->
    <?php if(isset($modelo)): ?>
        <div class="bio-model">

            <button id="bot-historia" class="bot-atual">
                <img src="<?= $BASE_URL ?>assets/img/iconBiografia.png" alt="Historia"> HISTÓRIA
            </button>

            <button id="bot-model">
                <img src="<?= $BASE_URL ?>assets/img/iconModelos.png" alt="Historia"> MODELOS
            </button>

        </div>
    <?php endif; ?>

    
    <!-- *********** HISTORIA *********** -->
    <section id="historia">

        <!-- *********** ESPECIFICACAO *********** -->
        <div class="especificacao">

            <div class="col-1">
                <div class="img">
                    <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabArray["logo"] ?>" alt="">
                </div>
            </div>


            <div class="col-2">
                <!-- SLOGAN -->
                <div class="col">
                    <p>Slogan</p>
                    <ul>
                        <li><?= $fabArray["slogan"] ?></li>
                    </ul>
                </div>

                <!-- ATIVIDADE -->
                <div class="col">
                    <p>Atividade</p>
                    <ul>
                        <li><?= $fabArray["atividade"] ?></li>
                    </ul>
                </div>

                <!-- ANO FUNDACAO -->
                <div class="col">
                    <p>Fundação</p>
                    <ul>
                        <li><?= $fabArray["ano"] ?></li>
                    </ul>
                </div>

                <!-- FUNDADORES -->
                <div class="col">
                    <p>Fundadores</p>
                    <ul>
                        <?php foreach($fundador as $i): ?>
                            <li><?= $i["nome"] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- SEDE -->
                <div class="col">
                    <p>Sede</p>
                    <ul>
                        <?php foreach($sed as $i): ?>
                            <li><?= $i["nome"] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- PROPRIETARIOS -->
                <div class="col">
                    <p>Proprietarios</p>
                    <ul>
                        <?php foreach($proprietario as $i): ?>
                            <li><?= $i["nome"] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- PRODUTOS -->
                <div class="col">
                    <p>Produtos</p>
                    <ul>
                        <?php foreach($produto as $i): ?>
                            <li><?= $i["nome"] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>


                <!-- SITE -->
                <div class="col">
                    <p>Site</p>
                    <ul>
                        <li>
                            <a target="blanck" href="https://<?= $fabArray["siteOficial"] ?>">
                                <?= $fabArray["siteOficial"] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- Fim div .col-2 -->

        </div><!-- Fim div .especificacao -->

        <!-- *********** RECENTES *********** -->
        <?php if(isset($modeloID)): ?>
            <div class="recentes">
                
                <div class="carousel">

                    <?php for($i = 0; $i < 10; $i++): ?>
                        <?php if(isset($modeloID[$i])): ?>

                            <a href="<?= $BASE_URL ?>modelo.php?id=<?= $modeloID[$i]["ID"] ?>">
                                <div class="col">
                                    <?php foreach($fotos as $foto): ?>
                                        <?php if($foto["modelo_id"] === $modeloID[$i]["ID"]): ?>
                                            <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $modeloID[$i]["nome"] ?>">

                                            <div class="box">
                                                <p>
                                                    <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabArray["logo"] ?>" alt=""> 
                                                    <?= $modeloID[$i]["nome"] ?> (<?= $modeloID[$i]["ano"] ?>)
                                                </p>
                                            </div>

                                            <?php break ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </a>

                        <?php endif; ?>
                    <?php endfor; ?>

                </div><!-- Fim div .carousel -->
                
            </div><!-- Fim div .recentes -->
        <?php endif; ?>

        <!-- *********** BIOGRAFIA *********** -->
        <div class="bio">
            <?= $fabArray["historia"] ?>
        </div>

    </section>


    <!-- *********** MODELOS *********** -->
    <?php if(isset($modelo)): ?>
        <section id="modelos">
            <?php foreach($modelo as $model): ?>
            
                <a href="<?= $BASE_URL ?>modelo.php?id=<?= $model["ID"] ?>">
                    <div class="img">
                        <?php foreach($fotos as $foto): ?>
                            <?php if($foto["modelo_id"] === $model["ID"]): ?>
                                <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $model["nome"] ?>">

                                <?php break ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="nome">
                        <p>
                            <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabArray["logo"] ?>" alt="<?= $fabArray["nome"] ?>">
                            (<?= $model["ano"] ?>) <?= $model["nome"] ?>
                        </p>
                    </div>

                    <div class="resumo">
                        <p><?= substr($model["descricao"], 0, 79) ?>...</p>
                    </div>

                    <div class="veja-mais">
                        <p>Ver Modelo</p>
                    </div>
                </a>

            <?php endforeach; ?>
        </section>
    <?php endif; ?>
 
</div><!-- fim div .container -->



<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/fabricante.js"></script>

<script>
    modeloRecente();
    bioModel();
</script>


</body>
</html>