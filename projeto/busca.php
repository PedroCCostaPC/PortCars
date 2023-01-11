<?php 

    require_once("template/header.php");
    require_once("search.php");

    if(isset($valor)) {
        $valor = array_unique($valor, SORT_REGULAR);
        sort($valor);
    }


    if(isset($decada)) {
        $decada = array_unique($decada, SORT_REGULAR);
        sort($decada);
    }

    if(isset($velo)) {
        $velo = array_unique($velo, SORT_REGULAR);
        sort($velo);
    }

    

    // MODELOS ALEATORIO CASO NAO TENHA RESULTADO
    $modelRand = $modelosNovo;
    shuffle($modelRand);
    

?>

<div class="container">

    <!-- *********** CASO NAO ENCONTRE NA BUSCA *********** -->
    <?php if(count($resultado) === 0): ?>

        <div id="titulo-busca" class="titulo-sem-busca">
            <h1>Não encontramos nenhum resultado na sua busca.</h1>
            <p>O que eu faço?</p>
            <ul>
                <li><span>Verifique os termos digitados ou os filtros selecionados.</span></li>
                <li><span>Utilize termos genéricos na busca.</span></li>
            </ul>
        </div>

        <section id="busca" class="busca-rand">

            <?php for($i = 0; $i < 12; $i++): ?>

                <?php if(isset($modelRand[$i])): ?>
                    <div class="busca-modelos col">
                        <?php foreach($fotos as $foto): ?>
                            <?php if($foto["modelo_id"] === $modelRand[$i]["ID"]): ?>

                                <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $modelRand[$i]["nome"] ?>">

                                <p><?= $modelRand[$i]["nome"] ?> (<?= $modelRand[$i]["ano"] ?>)</p>

                                <a href="<?= $BASE_URL ?>modelo.php?id=<?= $modelRand[$i]["ID"] ?>">
                                    Ver Modelo
                                </a>

                                <?php break ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            <?php endfor; ?>

        </section>
        





    <!-- *********** CASO ENCONTRE NA BUSCA *********** -->
    <?php else: ?>
        <div id="titulo-busca">
            <h1>Resutados para busca "<span><?= $busca ?></span>"</h1>
            <p><span><?= count($resultado) ?></span> modelo(s) encontrado(s)</p>

            <!-- BOTAO FILTRO -> PARA MOBILE -->
            <div class="filtro-mobile">
                <button><i class="fa-solid fa-filter"></i> Filtrar</button>
            </div>
        </div>


        <!-- ******* FILTROS ******* -->
        <section id="filtro">
            <div class="row">

                <button class="close-filter"><i class="fa-solid fa-xmark"></i></button>

                <!-- Só APARECE CASO ALGUM FILTRO FOI ESCOLHIDO -->
                <?php if(isset($precoCheck) || isset($decadaCheck) || isset($velocidadeCheck) || isset($classeCheck)): ?>
                    <div class="col">
                        <form  action="<?= $BASE_URL ?>busca.php" method="GET">
                            <input type="hidden" name="busca" value="<?= $busca ?>">
                            
                            <button>
                                <input type="checkbox" id="todos-modelos" name="all-model"> 
                                <label for="todos-modelos">
                                    <i class="fa-solid fa-circle"></i>
                                    Todos os modelos
                                </label>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>


                <!-- FILTRO DE PRECOS -->
                <div class="col">
                    <p>Preço</p>

                    <form  action="<?= $BASE_URL ?>busca.php" method="GET">
                        <input type="hidden" name="busca" value="<?= $busca ?>">
                    
                        <?php foreach($valor as $val): ?>
                            <button>

                                <!-- SE INPUT NAO FOI CHECADO, NAO COLOCA CLASS -> check-true  -->
                                <?php if(!isset($precoCheck)): ?>
                                    <input type="checkbox" id="<?= $val["nome"] ?>" name="<?= $val["nome"] ?>"> 
                                    <label for="<?= $val["nome"] ?>">
                                        <i class="fa-solid fa-circle"></i> 
                                        <?= $val["string"] ?>
                                    </label>

                                <!-- SE INPUT FOI CHECADO, COLOCA CLASS -> check-true  -->
                                <?php else: ?>

                                    <!-- SE FOI CHECADO MAS O VALOR FOR DIFERENTE, NAO COLOCA CLASS -->
                                    <?php if($precoCheck !== $val["valor"]): ?>
                                        <input type="checkbox" id="<?= $val["nome"] ?>" name="<?= $val["nome"] ?>"> 
                                        <label for="<?= $val["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $val["string"] ?> 
                                        </label>

                                    <!-- SE O VALOR FOR IGUAL, COLOCA CLASS -->
                                    <?php else: ?>
                                        <input type="checkbox" id="<?= $val["nome"] ?>" name="<?= $val["nome"] ?>"> 
                                        <label class="check-true" for="<?= $val["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $val["string"] ?>
                                        </label>

                                    <?php endif; ?>
                                <?php endif; ?>

                            </button>
                        <?php endforeach; ?>
                    </form>
                </div>


                <!-- FILTRO PARA ANO -->
                <div class="col">
                    <p>Ano</p>

                    <form  action="<?= $BASE_URL ?>busca.php" method="GET">
                        <input type="hidden" name="busca" value="<?= $busca ?>">

                        <?php foreach($decada as $deca): ?>
                            <button>

                                <!-- SE INPUT NAO FOI CHECADO, NAO COLOCA CLASS -> check-true  -->
                                <?php if(!isset($decadaCheck)): ?>
                                    <input type="checkbox" id="<?= $deca["nome"] ?>" name="<?= $deca["nome"] ?>"> 
                                    <label for="<?= $deca["nome"] ?>">
                                        <i class="fa-solid fa-circle"></i> 
                                        <?= $deca["string"] ?>
                                    </label>

                                <!-- SE INPUT FOI CHECADO, COLOCA CLASS -> check-true  -->
                                <?php else: ?>

                                    <!-- SE FOI CHECADO MAS O VALOR FOR DIFERENTE, NAO COLOCA CLASS -->
                                    <?php if($decadaCheck !== $deca["decada"]): ?>
                                        <input type="checkbox" id="<?= $deca["nome"] ?>" name="<?= $deca["nome"] ?>"> 
                                        <label for="<?= $deca["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $deca["string"] ?>
                                        </label>

                                    <!-- SE O VALOR FOR IGUAL, COLOCA CLASS -->
                                    <?php else: ?>
                                        <input type="checkbox" id="<?= $deca["nome"] ?>" name="<?= $deca["nome"] ?>"> 
                                        <label class="check-true" for="<?= $deca["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $deca["string"] ?>
                                        </label>

                                    <?php endif; ?>
                                <?php endif; ?>

                            </button>
                        <?php endforeach; ?>
                    </form>
                </div>


                <!-- FILTRO PARA VELOCIDADE MAXIMA -->
                <div class="col">
                    <p>Velocidade Maxima</p>

                    <form  action="<?= $BASE_URL ?>busca.php" method="GET">
                        <input type="hidden" name="busca" value="<?= $busca ?>">
                    
                        <?php foreach($velo as $vel): ?>
                            <button>

                                <!-- SE INPUT NAO FOI CHECADO, NAO COLOCA CLASS -> check-true  -->
                                <?php if(!isset($velocidadeCheck)): ?>
                                    <input type="checkbox" id="<?= $vel["nome"] ?>" name="<?= $vel["nome"] ?>"> 
                                    <label for="<?= $vel["nome"] ?>">
                                        <i class="fa-solid fa-circle"></i> 
                                        <?= $vel["string"] ?>
                                    </label>

                                <!-- SE INPUT FOI CHECADO, COLOCA CLASS -> check-true  -->
                                <?php else: ?>

                                    <!-- SE FOI CHECADO MAS O VALOR FOR DIFERENTE, NAO COLOCA CLASS -->
                                    <?php if($velocidadeCheck !== $vel["velo"]): ?>
                                        <input type="checkbox" id="<?= $vel["nome"] ?>" name="<?= $vel["nome"] ?>"> 
                                        <label for="<?= $vel["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $vel["string"] ?>
                                        </label>

                                    <!-- SE O VALOR FOR IGUAL, COLOCA CLASS -->
                                    <?php else: ?>
                                        <input type="checkbox" id="<?= $vel["nome"] ?>" name="<?= $vel["nome"] ?>"> 
                                        <label class="check-true" for="<?= $vel["nome"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $vel["string"] ?>
                                        </label>

                                    <?php endif; ?>
                                <?php endif; ?>

                            </button>
                        <?php endforeach; ?>
                    </form>                    
                </div>


                <!-- FILTRO PARA CLASSE -->
                <div class="col">
                    <p>Classe</p>

                    <form  action="<?= $BASE_URL ?>busca.php" method="GET">
                        <input type="hidden" name="busca" value="<?= $busca ?>">

                        <?php foreach($classes as $classe): ?>
                            <button class="txt">

                                <!-- SE INPUT NAO FOI CHECADO, NAO COLOCA CLASS -> check-true  -->
                                <?php if(!isset($classeCheck)): ?>
                                    <input type="checkbox" id="<?= $classe["valor"] ?>" name="<?= $classe["valor"] ?>"> 
                                    <label for="<?= $classe["valor"] ?>">
                                        <i class="fa-solid fa-circle"></i> 
                                        <?= $classe["nome"] ?>
                                    </label>
                                    

                                <!-- SE INPUT FOI CHECADO, COLOCA CLASS -> check-true  -->
                                <?php else: ?>

                                    <!-- SE FOI CHECADO MAS O VALOR FOR DIFERENTE, NAO COLOCA CLASS -->
                                    <?php if($classeCheck !== $classe["nome"]): ?>
                                        <input type="checkbox" id="<?= $classe["valor"] ?>" name="<?= $classe["valor"] ?>"> 
                                        <label for="<?= $classe["valor"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $classe["nome"] ?>
                                        </label>

                                    <!-- SE O VALOR FOR IGUAL, COLOCA CLASS -->
                                    <?php else: ?>
                                        <input type="checkbox" id="<?= $classe["valor"] ?>" name="<?= $classe["valor"] ?>"> 
                                        <label class="check-true" for="<?= $classe["valor"] ?>">
                                            <i class="fa-solid fa-circle"></i> 
                                            <?= $classe["nome"] ?>
                                        </label>

                                    <?php endif; ?>
                                <?php endif; ?>

                            </button>
                        <?php endforeach; ?>
                    </form>
                    
                </div>

            </div><!-- fim div .row -->

        </section>





        <!-- ******* RESULTADO BUSCA ******* -->
        <section id="busca">

            <?php foreach($carros as $result): ?>

                <div class="busca-modelos col">
                    <?php foreach($fotos as $foto): ?>
                        <?php if($foto["modelo_id"] === $result["ID"]): ?>

                            <img src="<?= $BASE_URL ?>assets/img/modelos/<?= $foto["foto"] ?>" alt="<?= $result["nome"] ?>">

                            <p><?= $result["nome"] ?> (<?= $result["ano"] ?>)</p>

                            <a href="<?= $BASE_URL ?>modelo.php?id=<?= $result["ID"] ?>">
                                Ver Modelo
                            </a>

                            <?php break ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>

        </section>







    <?php endif; ?>


    









</div><!-- fim div .container -->


<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/busca.js"></script>

<script>
    menuFilter();
</script>


</body>
</html>