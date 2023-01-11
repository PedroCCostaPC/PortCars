<?php 

    require_once("template/header.php");

    if(isset($_SESSION["email"]) && $_SESSION["situacao"]) {
        header("location: dashboard.php");
    } 

?>


<div class="container">

    <div id="login-main">

        <?php if(isset($_SESSION["msg"]) && $_SESSION["msg"] !== ""): ?>
            <div id="main-mensagem">
                <div id="mensagem" class="<?= $_SESSION["msg-type"] ?>">
                    <?= $_SESSION["msg"] ?>
                </div>
            </div>
            
            <?php $_SESSION["msg"] = ""; ?>
        <?php endif; ?>


        <div id="login">
            <h1>Login</h1>

            <form action="<?= $BASE_URL ?>admin/authentic.php" method="POST">

                <div class="row">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="Digite seu e-mail">
                </div>

                <div class="row">
                    <label>Senha:</label>
                    <input type="password" name="senha" placeholder="Digite sua senha">
                </div>

                <button>Entrar</button>

                

            </form>
        </div>

    </div>

</div>












<!-- *********** FOOTER *********** -->
<?php 
    require_once("template/footer.php");
?>





</body>
</html>