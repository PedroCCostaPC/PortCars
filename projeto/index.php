<?php 

    require_once("template/header.php");


    // Pegando somente os modelos com situacao True
    foreach($modelosNovo as $modelo) {
        if($modelo["situacao"]) {
            $model[] = $modelo;
        }
    }

    // Pegando somente as fabricantes com situacao True
    foreach($fabricanteID as $fabricante) {
        if($fabricante["situacao"]) {
            $fabrica[] = $fabricante;
        }
    }

    // Tornando array em ordem aleatoria
    shuffle($fabrica);

?>

<div class="container">

    <!-- *********** SLIDE *********** -->
    <div id="slide">

        <?php for($i = 0; $i < 3; $i++): ?>

            <div class="slide">

                <?php if($model[$i]["situacao"]): ?>
                
                    <?php foreach($fotos as $foto): ?>
                        <?php if($foto["modelo_id"] === $model[$i]["ID"]): ?>

                            <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $model[$i]["nome"] ?>">


                            <div class="titulo">

                                <?php foreach($fabricanteNome as $fabricante): ?>

                                    <?php if($fabricante["ID"] === $model[$i]["fabricante_id"]): ?>

                                        <a href="<?= $BASE_URL ?>modelo.php?id=<?= $model[$i]["ID"] ?>">
                                            <?= $fabricante["nome"] ?> <?= $model[$i]["nome"] ?> (<?= $model[$i]["ano"] ?>)
                                        </a>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>
                            <?php break ?>

                        <?php endif; ?>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        <?php endfor; ?>

    </div><!-- Fim div #slide -->

    
    <!-- *********** MODELOS MAIS RECENTES *********** -->
    <section id="modelos-recentes">
        <?php for($i = 3; $i <= 8; $i++): ?>

            <!-- Checando se existe post na casa $i -->
            <?php if(isset($model[$i])): ?>

                <?php foreach($fabricanteNome as $fabricante): ?>
                    <?php if($fabricante["ID"] === $model[$i]["fabricante_id"]): ?>

                        <!-- Se $i for IMPAR -> imagem a esquerda -->
                        <?php if($i % 2 !== 0): ?>

                            <div class="row-esquerda">

                                <div class="esquerda anime">

                                    <!-- Titulo -->
                                    <div class="titulo">
                                        <a class="anime" href="<?= $BASE_URL ?>modelo.php?id=<?= $model[$i]["ID"] ?>">
                                            (<?= $model[$i]["ano"] ?>) 
                                            <?= $fabricante["nome"] ?> 
                                            <?= $model[$i]["nome"] ?>
                                        </a>
                                    </div>

                                    <!-- Data -->
                                    <div class="data-public">
                                        <p class="anime"><?= formataDataPub($model[$i]["data_publicada"]) ?></p>
                                    </div>

                                    <!-- IMAGEM -->
                                    <div class="col-1">
                                        <?php foreach($fotos as $foto): ?>
                                            <?php if($foto["modelo_id"] === $model[$i]["ID"]): ?>
                                                <img class="anime" src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $model[$i]["nome"] ?>">

                                                <?php break ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>                                        
                                    </div>

                                    <!-- DESCRICAO -->
                                    <div class="col-2">
                                        <div class="esconde anime"></div>
                                        <?= substr($model[$i]["descricao"], 0, 400) ?>...
                                        
                                        <div class="veja-mais">
                                            <a class="anime" href="<?= $BASE_URL ?>modelo.php?id=<?= $model[$i]["ID"] ?>">
                                                Ler mais
                                            </a>
                                        </div>
                                    </div>


                                </div>

                            </div><!-- Fim div .row-esquerda -->

                        <!-- Se $i for PAR -> imagem a direita -->
                        <?php else: ?>

                            <div class="row-direita">

                                <div class="direita anime">

                                    <!-- Titulo -->
                                    <div class="titulo">
                                        <a class="anime" href="<?= $BASE_URL ?>modelo.php?id=<?= $model[$i]["ID"] ?>">
                                            (<?= $model[$i]["ano"] ?>) 
                                            <?= $fabricante["nome"] ?> 
                                            <?= $model[$i]["nome"] ?>
                                        </a>
                                    </div>

                                    <!-- Data -->
                                    <div class="data-public">
                                        <p class="anime"><?= formataDataPub($model[$i]["data_publicada"]) ?></p>
                                    </div>

                                    <!-- IMAGEM -->
                                    <div class="col-1">
                                        <?php foreach($fotos as $foto): ?>
                                            <?php if($foto["modelo_id"] === $model[$i]["ID"]): ?>
                                                <img class="anime" src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $model[$i]["nome"] ?>">

                                                <?php break ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>                                        
                                    </div>

                                    <!-- DESCRICAO -->
                                    <div class="col-2">
                                        <div class="esconde anime"></div>
                                        <?= substr($model[$i]["descricao"], 0, 400) ?>...

                                        <div class="veja-mais">
                                            <a class="anime" href="<?= $BASE_URL ?>modelo.php?id=<?= $model[$i]["ID"] ?>">
                                                Ler mais
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- Fim div .row-direita -->

                        <?php endif; ?>


                    <?php endif; ?>
                <?php endforeach; ?>

            <?php endif; ?>
        <?php endfor; ?>

    </section>


    <!-- *********** 10 FABRICANTES ALEATORIO *********** -->
    <section id="fabricantes-home" class="anime">

        <?php for($i = 0; $i < 10; $i++): ?>

            <a href="<?= $BASE_URL ?>fabricante.php?id=<?= $fabrica[$i]["ID"] ?>">
                <div class="col">
                    <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabrica[$i]["logo"] ?>" alt="<?= $fabrica[$i]["nome"] ?>">
                </div>
            </a>

        <?php endfor; ?>

    </section>


</div><!-- Fim div .container -->




<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/home.js"></script>

<script>
    slide();
    
    animeRecentes(
        ".row-esquerda .esquerda", 
        ".row-esquerda .esquerda .titulo a", 
        ".row-esquerda .esquerda .data-public p",
        ".row-esquerda .esquerda .col-1 img",
        ".row-esquerda .esquerda .col-2 .esconde",
        ".row-esquerda .esquerda .col-2 .veja-mais a"
    );

    animeRecentes(
        ".row-direita .direita", 
        ".row-direita .direita .titulo a", 
        ".row-direita .direita .data-public p", 
        ".row-direita .direita .col-1 img", 
        ".row-direita .direita .col-2 .esconde", 
        ".row-direita .direita .col-2 .veja-mais a"
    );

    carouselFabrica();
    alturaFab();
    animeFab();
</script>



</body>
</html>