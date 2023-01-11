
<?php 

    require_once("template/DASH_header.php");

    // SOMENTE CARGO BOSS TEM ACESSO A ESSA PAGNIA
    if($_SESSION["cargo_id"] !== 1) {
        header("location: dashboard.php");
    }

    if(isset($_GET["id"])) {

        foreach($funcionarios as $i) {
            if($i["ID"] == $_GET["id"]) {
                $funcionario = $i;
                break;
            }
        }

    }


    // PEGANDO OS CAMPOS JA PREENCHIDOS CASO VOLTE PARA A PAGINA POR NAO TER PREENCHIDO ALGUM CAMPO
    // PARA APLICAR NOS INPUT

    // NOME
    if(isset($_SESSION["valida_nome"]) && $_SESSION["valida_nome"] !== "") {
        $validaNome = $_SESSION["valida_nome"];
    } else {
        $validaNome = "";
    }

    // SOBRENOME
    if(isset($_SESSION["valida_sobrenome"]) && $_SESSION["valida_sobrenome"] !== "") {
        $validaSobrenome = $_SESSION["valida_sobrenome"];
    } else {
        $validaSobrenome = "";
    }

    // EMAIL
    if(isset($_SESSION["valida_email"]) && $_SESSION["valida_email"] !== "") {
        $validaEmail = $_SESSION["valida_email"];
    } else {
        $validaEmail = "";
    }

    // CARGO
    if(isset($_SESSION["valida_cargo"]) && $_SESSION["valida_cargo"] !== "") {
        $validaCargo = $_SESSION["valida_cargo"];
    } else {
        $validaCargo = "";
    }

    // PEGANDO ALFABETO DOS CARGOS
    foreach($cargos as $i) {
        $alfabetoCargo[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoCargo = array_unique($alfabetoCargo);

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


    <!-- FORMULARIO PARA CADASTRAR NOVO FUNCIONARIO -->
    <?php if(!isset($funcionario)): ?>

        <div id="titulo-form-publicar">
            <h1><span>Cadastrar</span> Funcionario</h1>
            <p><?= $cargo ?></p>
        </div>

        <form id="form-publica" action="<?= $BASE_URL ?>admin/cadastrarFuncionario.php" method="POST">
            <div class="form">
                <!-- ************** INPUTS PADRAO ************** -->
                <div class="input-padrao">

                    <!-- NOME -->
                    <div class="row">
                        <label for="nome"><span>*</span> Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $validaNome ?>" class="<?= $_SESSION["classNome"] ?>">
                        <?php $_SESSION["valida_nome"] = ""; ?>
                        <?php $_SESSION["classNome"] = ""; ?>
                    </div>

                    <!-- SOBRENOME -->
                    <div class="row">
                        <label for="sobrenome"><span>*</span> Sobrenome:</label>
                        <input type="text" name="sobrenome" id="sobrenome" value="<?= $validaSobrenome ?>" class="<?= $_SESSION["classSobrenome"] ?>">
                        <?php $_SESSION["valida_sobrenome"] = ""; ?>
                        <?php $_SESSION["classSobrenome"] = ""; ?>
                    </div>

                    <!-- EMAIL -->
                    <div class="row">
                        <label for="email"><span>*</span> Email:</label>
                        <input type="text" name="email" id="email" value="<?= $validaEmail ?>" class="<?= $_SESSION["classEmail"] ?>">
                        <?php $_SESSION["valida_email"] = ""; ?>
                        <?php $_SESSION["classEmail"] = ""; ?>
                    </div>

                    <!-- SENHA -->
                    <div class="row">
                        <label for="senha"><span>*</span> Senha:</label>
                        <input type="password" name="senha" id="senha" class="<?= $_SESSION["classSenha"] ?>">
                        <?php $_SESSION["classSenha"] = ""; ?>
                    </div>
                </div><!-- Fim div .input-padrao -->


                <!-- SELECT CARGO -->
                <div class="select">
                    <p><span>*</span> Cargos</p>

                    <div class="main-sel-fab">
                        <?php foreach($alfabetoCargo as $alfa): ?>

                            <div class="alfabeto">
                                
                                <p class="<?= $_SESSION["classCargo"] ?>"><?= $alfa ?></p>

                                <?php foreach($cargos as $cargo): ?>
                                    <?php if(strtolower(substr($cargo["nome"], 0, 1)) === $alfa): ?>
                                        <div class="opcoes">

                                            <input type="radio" name="cargo" id="cargo-<?= $cargo["ID"] ?>" value="<?= $cargo["ID"] ?>"
                                                <?php if($validaCargo !== "" && $validaCargo == $cargo["ID"]): ?>
                                                    checked
                                                <?php endif; ?>
                                            ><!-- Fim input -->

                                            <label for="cargo-<?= $cargo["ID"] ?>"><?= $cargo["nome"] ?></label>

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                        <?php endforeach; ?>

                        <?php $_SESSION["valida_cargo"] = ""; ?>
                        <?php $_SESSION["classCargo"] = ""; ?>
                    </div>
                </div><!-- Fim div .select -->
            </div><!-- fim div .form -->

            <!-- ************** BOTAO ENIAR ************** -->
            <div class="form">
                <button class="bot-publicar">Cadastrar</button>
            </div><!-- fim div form -->
        </form>

    <!-- FORMULARIO PARA ALTERAR FUNCIONARIO -->
    <?php else: ?>
        <div id="titulo-form-publicar">
            <h1><span>Alterar</span> <?= $funcionario["nome"] ?> <?= $funcionario["sobrenome"] ?></h1>
            <p><?= $cargo ?></p>
        </div>


        <form id="form-publica" action="<?= $BASE_URL ?>admin/alteraFuncionario.php" method="POST">

            <input type="hidden" name="id" value="<?= $funcionario["ID"] ?>">
            <input type="hidden" name="tipo" value="altera_funcionario">

            <div class="form">
                <!-- ************** INPUTS PADRAO ************** -->
                <div class="input-padrao">

                    <!-- NOME -->
                    <div class="row">
                        <label for="nome"><span>*</span> Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $funcionario["nome"] ?>">
                    </div>

                    <!-- SOBRENOME -->
                    <div class="row">
                        <label for="sobrenome"><span>*</span> Sobrenome:</label>
                        <input type="text" name="sobrenome" id="sobrenome" value="<?= $funcionario["sobrenome"] ?>">
                    </div>

                    <!-- EMAIL -->
                    <div class="row">
                        <label for="email"><span>*</span> Email:</label>
                        <input type="text" name="email" id="email" value="<?= $funcionario["email"] ?>">
                    </div>

                    <!-- SENHA -->
                    <div class="row">
                        <label for="senha"><span>*</span> Senha:</label>
                        <input type="password" name="senha" id="senha">
                    </div>
                </div><!-- Fim div .input-padrao -->


                <!-- SELECT CARGO -->
                <!-- FUNCIONARIO NAO PODE MUDAR SEU PROPRIO CARGO -->
                <?php if($funcionario["ID"] !== $_SESSION["ID"]): ?>
                    <div class="select">
                        <p><span>*</span> Cargos</p>

                        <div class="main-sel-fab">
                            <?php foreach($alfabetoCargo as $alfa): ?>

                                <div class="alfabeto">
                                    
                                    <p class="<?= $_SESSION["classCargo"] ?>"><?= $alfa ?></p>

                                    <?php foreach($cargos as $cargo): ?>
                                        <?php if(strtolower(substr($cargo["nome"], 0, 1)) === $alfa): ?>
                                            <div class="opcoes">

                                                <input type="radio" name="cargo" id="cargo-<?= $cargo["ID"] ?>" value="<?= $cargo["ID"] ?>"
                                        
                                                    <?php if($cargo["ID"] === $funcionario["cargo_id"]): ?>
                                                        checked
                                                    <?php endif; ?>
                                                
                                                ><!-- Fim do input -->

                                                <label for="cargo-<?= $cargo["ID"] ?>"><?= $cargo["nome"] ?></label>

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>

                            <?php endforeach; ?>

                            <?php $_SESSION["valida_fabricante"] = ""; ?>
                            <?php $_SESSION["classFabricante"] = ""; ?>
                        </div>
                    </div><!-- Fim div .select -->
                <?php endif; ?>
            </div><!-- fim div .form -->


            <!-- ************** BOTAO ENIAR ************** -->
            <div class="form">
                <button class="bot-publicar">Alterar</button>
            </div><!-- fim div form -->
        </form>

    <?php endif; ?>



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