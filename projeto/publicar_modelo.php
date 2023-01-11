<?php 

    require_once("template/DASH_header.php");

    // CASO SEJA PARA ALTERAR POST
    if(isset($_GET["id"])) {
        $idPost = (int) $_GET["id"];

        foreach($modelosNovo as $mod) {
            if($mod["ID"] === $idPost) {
                $modelo = $mod;
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

    // ANO
    if(isset($_SESSION["valida_ano"]) && $_SESSION["valida_ano"] !== "") {
        $validaAno = $_SESSION["valida_ano"];
    } else {
        $validaAno = "";
    }

    // CLASSE
    if(isset($_SESSION["valida_classe"]) && $_SESSION["valida_classe"] !== "") {
        $validaClasse = $_SESSION["valida_classe"];
    } else {
        $validaClasse = "";
    }

    // VELOCIDADE MAXIMA
    if(isset($_SESSION["valida_velocidade"]) && $_SESSION["valida_velocidade"] !== "") {
        $validaVelocidade = $_SESSION["valida_velocidade"];
    } else {
        $validaVelocidade = "";
    }

    // PESO
    if(isset($_SESSION["valida_peso"]) && $_SESSION["valida_peso"] !== "") {
        $validaPeso = $_SESSION["valida_peso"];
    } else {
        $validaPeso = "";
    }

    // PRECO
    if(isset($_SESSION["valida_preco"]) && $_SESSION["valida_preco"] !== "") {
        $validaPreco = $_SESSION["valida_preco"];
    } else {
        $validaPreco = "";
    }

    // DESCRICAO
    if(isset($_SESSION["valida_descricao"]) && $_SESSION["valida_descricao"] !== "") {
        $validaDescricao = $_SESSION["valida_descricao"];
    } else {
        $validaDescricao = "";
    }

    // FABRICANTE
    if(isset($_SESSION["valida_fabricante"]) && $_SESSION["valida_fabricante"] !== "") {
        $validaFabricante = $_SESSION["valida_fabricante"];
    } else {
        $validaFabricante = "";
    }


    // PEGANDO ALFABETO DAS FABRICANTES
    foreach($fabricanteNome as $i) {
        $alfabetoFab[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoFab = array_unique($alfabetoFab);


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



<!-- FORMULARIO PARA CRIAR NOVO POST -->
<?php if(!isset($idPost)): ?>

<div id="titulo-form-publicar">
    <h1><span>Publicar</span> Modelo</h1>
    <p><?= $cargo ?></p>
</div>

<form id="form-publica" action="<?= $BASE_URL ?>admin/publicaModelo.php" method="POST" enctype="multipart/form-data">

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

            <!-- ANO -->
            <div class="row">
                <label for="ano"><span>*</span> Ano:</label>
                <input class="numero <?= $_SESSION["classAno"] ?>" type="number" name="ano" id="ano" placeholder="Fabricação" value="<?= $validaAno ?>">
                <?php $_SESSION["valida_ano"] = ""; ?>
                <?php $_SESSION["classAno"] = ""; ?>
            </div>

            <!-- CLASSE -->
            <div class="row">
                <label for="classe"><span>*</span> Classe:</label>
                <input type="text" name="classe" id="classe" value="<?= $validaClasse ?>" class="<?= $_SESSION["classClasse"] ?>" placeholder="Ex: (Sedan / Suv)">
                <?php $_SESSION["valida_classe"] = ""; ?>
                <?php $_SESSION["classClasse"] = ""; ?>
            </div>

            <!-- VELOCIDADE MAXIMA -->
            <div class="row">
                <label for="velocidade"><span>*</span> Velocidade Maxima:</label>
                <input class="numero <?= $_SESSION["classVelocidade"] ?>" type="number" name="velocidade" id="velocidade" value="<?= $validaVelocidade ?>" placeholder="km/h">
                <?php $_SESSION["valida_velocidade"] = ""; ?>
                <?php $_SESSION["classVelocidade"] = ""; ?>
            </div>

            <!-- PESO -->
            <div class="row">
                <label for="peso"><span>*</span> Peso:</label>
                <input class="numero <?= $_SESSION["classPeso"] ?>" type="number" name="peso" id="peso" value="<?= $validaPeso ?>" placeholder="kg">
                <?php $_SESSION["valida_peso"] = ""; ?>
                <?php $_SESSION["classPeso"] = ""; ?>
            </div>

            <!-- PRECO -->
            <div class="row">
                <label for="preco"><span>*</span> Preço:</label>
                <input class="numero <?= $_SESSION["classPreco"] ?>" type="number" name="preco" id="preco" value="<?= $validaPreco ?>" placeholder="Em Dolar">
                <?php $_SESSION["valida_preco"] = ""; ?>
                <?php $_SESSION["classPreco"] = ""; ?>
            </div>
            
        </div><!-- Fim div .input-padrao -->

        <!-- SELECT FABRICANTE -->
        <div class="select">

            <p><span>*</span> Fabricante</p>

            <div class="main-sel-fab">
                <?php foreach($alfabetoFab as $alfa): ?>

                    <div class="alfabeto">
                        
                        <p class="<?= $_SESSION["classFabricante"] ?>"><?= $alfa ?></p>

                        <?php foreach($fabricanteNome as $fabricante): ?>
                            <?php if(strtolower(substr($fabricante["nome"], 0, 1)) === $alfa): ?>
                                <div class="opcoes">

                                    <input type="radio" name="fabricante" id="fabricante-<?= $fabricante["ID"] ?>" value="<?= $fabricante["ID"] ?>"
                                        <?php if($validaFabricante !== "" && $validaFabricante == $fabricante["ID"]): ?>
                                            checked
                                        <?php endif; ?>
                                    ><!-- Fim input -->

                                    <label for="fabricante-<?= $fabricante["ID"] ?>"><?= $fabricante["nome"] ?></label>

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>

                <?php $_SESSION["valida_fabricante"] = ""; ?>
                <?php $_SESSION["classFabricante"] = ""; ?>
                <div class="link">
                    <a target="blacnk" href="<?= $BASE_URL ?>publicar_fabricante.php">+ Adicionar Fabricante</a>
                </div>

            </div>
        </div><!-- Fim div .select -->


        <!-- INPUT IMAGENS -->
        <div class="input-imagens">
            <label class="label-imagem">+ Adicionar Imagens</label>

            <div id="input-imagens-container">

                <label class="imagem" for="imagens">
                    <i class="fa-regular fa-image"></i> Adicionar Imagens
                </label>
                <input type="file" accept="image/*" name="imagens[]" id="imagens" multiple>

            </div>
        </div>

    </div><!-- fim div .form -->

    <!-- ************** TEXTAREA ************** -->
    <div class="textarea">
        <textarea name="descricao" cols="100" rows="30" class="<?= $_SESSION["classDescricao"] ?>"><?= $validaDescricao ?></textarea>
        <?= $_SESSION["valida_descricao"] = "" ?>
        <?= $_SESSION["classDescricao"] = "" ?>
    </div><!-- fi div .textarea -->


    <!-- ************** BOTAO ENIAR ************** -->
    <div class="form">
        <button class="bot-publicar">Publicar</button>
    </div><!-- fim div .form -->
</form>



<!-- FORMULARIO PARA ALTERAR POST -->
<?php else: ?>

<div id="titulo-form-publicar">
    <h1><span>Alterar</span> <?= $modelo["nome"] ?></h1>
    <p><?= $cargo ?></p>
</div>

<form id="form-publica" action="<?= $BASE_URL ?>admin/alteraModelo.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $modelo["ID"] ?>">

    <div class="form">
        <!-- ************** INPUTS PADRAO ************** -->
        <div class="input-padrao">

            <!-- NOME -->
            <div class="row">
                <label for="nome"><span>*</span> Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= $modelo["nome"] ?>">
            </div>

            <!-- ANO -->
            <div class="row">
                <label for="ano"><span>*</span> Ano:</label>
                <input class="numero" type="number" name="ano" id="ano" placeholder="Fabricação" value="<?= $modelo["ano"] ?>">
            </div>

            <!-- CLASSE -->
            <div class="row">
                <label for="classe"><span>*</span> Classe:</label>
                <input type="text" name="classe" id="classe" value="<?= $modelo["classe"] ?>" placeholder="Ex: (Sedan / Suv)">
            </div>

            <!-- VELOCIDADE MAXIMA -->
            <div class="row">
                <label for="velocidade"><span>*</span> Velocidade Maxima:</label>
                <input class="numero" type="number" name="velocidade" id="velocidade" value="<?= $modelo["velocidade"] ?>" placeholder="km/h">
            </div>

            <!-- PESO -->
            <div class="row">
                <label for="peso"><span>*</span> Peso:</label>
                <input class="numero" type="number" name="peso" id="peso" value="<?= $modelo["peso"] ?>" placeholder="kg">
            </div>

            <!-- PRECO -->
            <div class="row">
                <label for="preco"><span>*</span> Preço:</label>
                <input class="numero" type="number" name="preco" id="preco" value="<?= $modelo["preco"] ?>" placeholder="Em Dolar">
            </div>

        </div><!-- Fim div .input-padrao -->


        <!-- SELECT FABRICANTE -->
        <div class="select">

            <p><span>*</span> Fabricante</p>

            <div class="main-sel-fab">
                <?php foreach($alfabetoFab as $alfa): ?>

                    <div class="alfabeto">
                        <p><?= $alfa ?></p>

                        <?php foreach($fabricanteNome as $fabricante): ?>
                            <?php if(strtolower(substr($fabricante["nome"], 0, 1)) === $alfa): ?>
                                <div class="opcoes">

                                    <input type="radio" name="fabricante" id="fabricante-<?= $fabricante["ID"] ?>" value="<?= $fabricante["ID"] ?>"
                                    
                                        <?php if($fabricante["ID"] === $modelo["fabricante_id"]): ?>
                                            checked
                                        <?php endif; ?>
                                    
                                    ><!-- Fim do input -->

                                    <label for="fabricante-<?= $fabricante["ID"] ?>"><?= $fabricante["nome"] ?></label>

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>
            </div>

        </div><!-- Fim div .select -->


        <!-- INPUT IMAGENS -->
        <div class="input-imagens">
            <label class="label-imagem">+ Alterar Imagens</label>

            <div id="input-imagens-container">

                <label class="imagem" for="imagens">
                    <i class="fa-regular fa-image"></i> Alterar Imagens
                </label>
                <input type="file" accept="image/*" name="imagens[]" id="imagens" multiple>

            </div>
        </div>
    </div><!-- fim div .form -->

    <!-- ************** TEXTAREA ************** -->
    <div class="textarea">
        <textarea name="descricao" cols="100" rows="30"><?= $modelo["descricao"] ?></textarea>
    </div><!-- fi div .textarea -->

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