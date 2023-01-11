<?php 

    require_once("template/header.php");

    // Pegando somente as fabricantes com situacao True
    foreach($fabricanteNome as $fabricante) {
        if($fabricante["situacao"]) {
            $fabrica[] = $fabricante;
        }
    }

    //Pegando uma foto aleatoria da tabela fotos para o banner
    $banner = array_rand($fotos);


?>


<div class="container">

    <!-- *********** BANNER *********** -->
    <section id="banner">
        <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $fotos[$banner]["foto"] ?>" alt="fabricantes">

        <div class="box-shadow">

            <div class="bot">
                <div class="col-1"><h1>Fabricantes</h1></div>
                <div class="col-2">
                    <a href="#fabricantes">
                        <p>Rolar para baixo</p>
                        <p><i class="fa-solid fa-chevron-down"></i></p>
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- *********** FABRICANTES *********** -->
    <section id="fabricantes">

        <h2>Principais fabricantes automotivas da atualidade</h2>

        <div class="row">
            <?php foreach($fabrica as $fab): ?>

                <a class="anime" href="<?= $BASE_URL ?>fabricante.php?id=<?= $fab["ID"] ?>">

                    <img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fab["logo"] ?>" alt="<?= $fab["nome"] ?>">

                </a>

            <?php endforeach; ?>
        </div>

    </section>


</div><!-- fim div .container -->






<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/fabricantes.js"></script>

<script>
    altura();
    efeitoH2();
    animeBox();
</script>



</body>
</html>
