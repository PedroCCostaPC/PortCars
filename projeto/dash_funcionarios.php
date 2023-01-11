<?php 

    require_once("template/DASH_header.php");

    // SOMENTE CARGO BOSS TEM ACESSO A ESSA PAGNIA
    if($_SESSION["cargo_id"] !== 1) {
        header("location: dashboard.php");
    }

?>

<!-- CSS EXCLUSIVO DA PAGINA -->
<style>
    #menu-dash nav ul li:nth-child(4) a {
        color: var(--color_tres);
    }
</style>

<div class="dash-container container">

    <!-- MENSAGEM INTERATIVA -->
    <?php if(isset($_SESSION["msg"]) && $_SESSION["msg"] !== ""): ?>
        <div id="main-mensagem">
            <div id="mensagem" class="<?= $_SESSION["msg-type"] ?>">
                <?= $_SESSION["msg"] ?>
            </div>
        </div>
        
        <?php $_SESSION["msg"] = ""; ?>
    <?php endif; ?>

    <!-- *********** TITULO *********** -->
    <div id="titulo">
        <h1>Funcionarios</span></h1>
        <p><?= $cargo ?></p>
    </div>


    <!-- *********** MENU *********** -->
    <?php require_once("template/DASH_menu.php"); ?>



    <!-- *********** FUNCIONARIOS *********** -->
    <div id="funcionarios">
        <div class="cadastra-funci">
            <a href="<?= $BASE_URL ?>cadastro_funcionario.php">+ Cadastrar Funcionarios</a>
        </div>

        <?php foreach($funcionarios as $funcionario): ?>

            <div class="row">
                <!-- ID -->
                <div class="col-1">
                    <p># <?= $funcionario["ID"] ?></p>
                </div>

                <!-- NOME -->
                <div class="col-1">
                    <p><?= $funcionario["nome"] ?> <?= $funcionario["sobrenome"] ?></p>
                </div>

                <!-- EMAIL -->
                <div class="col-1">
                    <p><?= $funcionario["email"] ?></p>
                </div>

                <!-- CARGO -->
                <div class="col-1">
                    <?php foreach($cargos as $cargo): ?>
                        <?php if($funcionario["cargo_id"] === $cargo["ID"]): ?>
                            <p><?= $cargo["nome"] ?></p>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- SITUACAO -->
                <div class="col-1">
                    <?php if($funcionario["situacao"]): ?>
                        <p class="ativo">Ativo</p>
                    <?php else: ?>
                        <p class="inativo">Inativo</p>
                    <?php endif; ?>
                </div>


                <div class="altera-demiti">

                    <!-- ALTERAR -->
                    <div class="col-2">
                        <a href="<?= $BASE_URL ?>cadastro_funcionario.php?id=<?= $funcionario["ID"] ?>"><i class="fa-solid fa-pen"></i> Alterar</a>
                    </div>

                    <!-- CONTRATAR / DEMITIR -->
                    <?php if($_SESSION["ID"] !== $funcionario["ID"]): ?>
                        <div class="col-2">
                            <form action="<?= $BASE_URL ?>admin/contrataDemiti.php" method="POST">
                                <input type="hidden" name="id" value="<?= $funcionario["ID"] ?>">
                                <input type="hidden" name="situacao" value="<?= $funcionario["situacao"] ?>">
                                <input type="hidden" name="nome" value="<?= $funcionario["nome"] ?> <?= $funcionario["sobrenome"] ?>">
                                <?php if($funcionario["situacao"]): ?>
                                    <button class="ativo"><i class="fa-solid fa-skull-crossbones"></i> Demitir</button>
                                <?php else: ?>
                                    <button class="inativo"><i class="fa-regular fa-face-smile"></i> Contratar</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    <?php endif; ?>

                </div><!-- altera-demiti -->
            </div> <!-- fim div .row -->

        <?php endforeach; ?>
        
    </div><!-- Fim div #funcionarios -->


</div><!-- fim dic .container -->


<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/dashboard.js"></script>

<script>

    // Nova Publicacao
    confirmPost(
        "#menu-dash .bot-new-post", 
        ".new-post .box-fundo .close", 
        ".new-post .box-fundo",
        ".new-post .box-fundo .box"
    );

    // Menu Lateral no mobile
    confirmPost(
        "#menu-dash nav .bot-menu", 
        "#menu-dash nav .nav .close", 
        "#menu-dash nav .nav",
        "#menu-dash nav .nav ul"
    );
</script>

</body>
</html>