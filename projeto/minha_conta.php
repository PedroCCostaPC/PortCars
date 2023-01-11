
<?php 

require_once("template/DASH_header.php");




?>


<div class="container">

    <!-- MENSAGEM -->
    <?php if(isset($_SESSION["msg"]) && $_SESSION["msg"] !== ""): ?>
        <div id="main-mensagem">
            <div id="mensagem" class="<?= $_SESSION["msg-type"] ?>">
                <?= $_SESSION["msg"] ?>
            </div>
        </div>
            
        <?php $_SESSION["msg"] = ""; ?>
    <?php endif; ?>

    <!-- FORMULARIO PARA ALTERAR FUNCIONARIO -->
    <div id="titulo-form-publicar">
        <h1><span>Alterar</span> meus dados</h1>
        <p><?= $cargo ?></p>
    </div>


    <form id="form-publica" action="<?= $BASE_URL ?>admin/alteraFuncionario.php" method="POST">

        <input type="hidden" name="id" value="<?= $_SESSION["ID"] ?>">
        <input type="hidden" name="tipo" value="minha_conta">

        <div class="form">
            <!-- ************** INPUTS PADRAO ************** -->
            <div class="input-padrao">

                <!-- NOME -->
                <div class="row">
                    <label for="nome"><span>*</span> Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?= $_SESSION["nome"] ?>">
                </div>

                <!-- SOBRENOME -->
                <div class="row">
                    <label for="sobrenome"><span>*</span> Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" value="<?= $_SESSION["sobrenome"] ?>">
                </div>

                <!-- EMAIL -->
                <div class="row">
                    <label for="email"><span>*</span> Email:</label>
                    <input type="text" name="email" id="email" value="<?= $_SESSION["email"] ?>">
                </div>

                <!-- SENHA -->
                <div class="row">
                    <label for="senha"><span>*</span> Senha:</label>
                    <input type="password" name="senha" id="senha">
                </div>
            </div><!-- Fim div .input-padrao -->

        </div><!-- fim div .form -->


        <!-- ************** BOTAO ENIAR ************** -->
        <div class="form">
            <button class="bot-publicar">Alterar</button>
        </div><!-- fim div form -->
    </form>




</div><!-- Fim div .container -->

<!-- *********** FOOTER *********** -->
<?php 
require_once("template/footer.php");
?>

<!-- SCRIPTS -->
<script src="<?= $BASE_URL ?>assets/js/dashForm.js"></script>

<script>

paddingLeft("#form-publica .input-padrao", ".row label", ".row input");

</script>

</body>
</html>