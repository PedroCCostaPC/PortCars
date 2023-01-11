<?php 

    require_once("template/DASH_header.php");


    if(!isset($_GET["busca"])) {

        header("location: $BASE_URL/dashboard.php");
    
    } else {

        $busca = $_GET["busca"];

        // SE CAMPO BUSCA ESTIVER VAZIO, VOLTA PARA PAGINA ANTERIOR
        if($busca === "") {

            header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

        } else {

            // BUSCANDO FABRICANTE NO BANCO DE DADOS
            $buscaQuery = "%" . $busca . "%";

            $stmt = $conn->prepare("SELECT * FROM fabricantes WHERE nome LIKE :nome");
            $stmt->bindParam(":nome", $buscaQuery);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($resultado) > 0) {
                $buscado = $resultado;

                foreach($buscado as $fab) {
                    $allPosts[] = [
                        "ID" => $fab["ID"],
                        "tipo" => "fabricantes",
                        "nome" => $fab["nome"],
                        "ano" => $fab["ano"],
                        "data" => $fab["data_publicada"],
                        "situacao" => $fab["situacao"],
                        "autor" => $fab["funcionario_id"],
                        "img" => "fabricantes/" . $fab["logo"]
                    ];
                }
            }

            // BUSCANDO MODELOS NO BANCO DE DADOS
            $buscaQuery = "%" . $busca . "%";

            $stmt = $conn->prepare("SELECT * FROM modelos WHERE nome LIKE :nome");
            $stmt->bindParam(":nome", $buscaQuery);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($resultado) > 0) {
                $buscado = $resultado;

                foreach($buscado as $model) {
                    foreach($fotos as $foto) {
                        if($foto["modelo_id"] === $model["ID"]) {
                            $allPosts[] = [
                                "ID" => $model["ID"],
                                "tipo" => "modelos",
                                "nome" => $model["nome"],
                                "ano" => $model["ano"],
                                "data" => $model["data_publicada"],
                                "situacao" => $model["situacao"],
                                "autor" => $model["funcionario_id"],
                                "img" => "modelos/" . $foto["foto"]
                            ];
                            break;
                        }
                        
                    }
                }
            }

        }

    }

    // ORGANIZANDO ARRAY POR ORDEM DE DATA MAIS RECENTE
    if(isset($allPosts)) {
        foreach($allPosts as $key => $row) {
            $auxi[$key] = $row["data"];
        }
        array_multisort($auxi, SORT_DESC, $allPosts);

        // FILTRO
        require_once("admin/dash_filtro.php");
    }


?>

<!-- CSS EXCLUSIVO DA PAGINA -->
<style>
    #titulo-busca {
        width: 70%;
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
        <h1>Bem vindo <span><?= $_SESSION["nome"] ?></span></h1>
        <p><?= $cargo ?></p>
    </div>


    <!-- *********** MENU *********** -->
    <?php require_once("template/DASH_menu.php"); ?>


    <!-- *********** PUBLICACOES *********** -->
    <!-- CASO NAO TENHA ENCONTRADO RESUTADO -->
    <?php if(!isset($allPosts)): ?>
        <div id="titulo-busca" class="titulo-sem-busca">
            <h2>Não encontramos nenhum resultado na sua busca.</h2>
            <p>O que eu faço?</p>
            <ul>
                <li><span>Verifique os termos digitados ou os filtros selecionados.</span></li>
                <li><span>Utilize termos genéricos na busca.</span></li>
            </ul>
        </div>


    <!-- CASO TENHA ENCONTRADO -->
    <?php else: ?>
        <div id="publicacoes">

            <?php foreach($arraysetado as $post): ?>

                <!-- CHECANDO SITUACAO -->
                <?php if($post["situacao"]): ?>

                    <div class="row">
                        <!-- IMG DO POST -->
                        <div class="col-1">
                            <?php if($post["tipo"] === "fabricantes"): ?>
                                <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>">
                                    <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                                </a>
                            <?php else: ?>
                                <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>">
                                    <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- TITULO E DATA DO POST -->
                        <div class="col-2">
                            <?php if($post["tipo"] === "fabricantes"): ?>
                                <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
                            <?php else: ?>
                                <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
                            <?php endif; ?>
                            <p><span>Publicado</span> <small>-</small> <?= formataDataPub($post["data"]) ?></p>
                        </div>

                        <!-- AUTOR DO POST -->
                        <div class="col-3">
                            <div class="autor">
                                <?php foreach($funcionarios as $i): ?>
                                    <?php if($i["ID"] === $post["autor"]): ?>
                                        <p><?= $i["nome"] ?> <?= $i["sobrenome"] ?> <i class="fa-solid fa-user"></i></p>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <!-- TIPO E ID DO POST -->
                            <div class="id">
                                <?php if($post["tipo"] === "fabricantes"): ?>
                                    <p>Fabricante #<?= $post["ID"] ?></p>
                                <?php elseif($post["tipo"] === "modelos"): ?>
                                    <p>Modelo #<?= $post["ID"] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- BOTOES -->
                            <div class="botoes">
                                <ul>
                                    <!-- Reverter para rascunho -->
                                    <li>
                                        <form action="<?= $BASE_URL ?>admin/alteraSituacao.php" method="POST">
                                            <input type="hidden" name="situacao" value="1">
                                            <input type="hidden" name="ID" value="<?= $post["ID"] ?>">
                                            <input type="hidden" name="tipo" value="<?= $post["tipo"] ?>">
                                            <input type="hidden" name="nome" value="<?= $post["nome"] ?>">
                                            <button><i class="fa-solid fa-paperclip"></i></button>
                                        </form>
                                        <div class="descricao">
                                            <p>Reverter<span></span>para<span></span>rascunho</p>
                                        </div>
                                    </li>
                                    <!-- Alterar post -->
                                    <li>
                                        <?php if($post["tipo"] === "fabricantes"): ?>
                                            <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                        <?php else: ?>
                                            <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                        <?php endif; ?>
                                        <div class="descricao">
                                            <p>Alterar<span></span>publicação</p>
                                        </div>
                                    </li>
                                    <!-- Visualizar post -->
                                    <li>
                                        <!--Caso seja post tipo "fabricantes" -->
                                        <?php if($post["tipo"] === "fabricantes"): ?>
                                            <a target="blanck" href="<?= $BASE_URL ?>fabricante.php?id=<?= $post["ID"] ?>">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                        <!--Caso seja post tipo "modelos" -->
                                        <?php elseif($post["tipo"] === "modelos"): ?>
                                            <a target="blanck" href="<?= $BASE_URL ?>modelo.php?id=<?= $post["ID"] ?>">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        <?php endif; ?>
                                        <div class="descricao">
                                            <p>Visualizar<span></span></p>
                                        </div>
                                    </li>
                                    <!-- Excluir post -->
                                    <li class="excluir-post">
                                        <button class="bot-excluir"><i class="fa-solid fa-trash"></i></button>
                                        <div class="descricao">
                                            <p>Excluir</p>
                                        </div>

                                        <div class="confirma-excluir">
                                            <div class="box">
                                                <p class="confirma">Deseja <span>excluir</span> <?= $post["nome"] ?>?<p>

                                                <p class="aviso">Isso excluirá esta postagem. Após excluir, não será mais possível vê-la nem editá-la.</p>

                                                <div class="confirma-botoes">
                                                    <button class="cancela">Cancelar</button>

                                                    <form action="<?= $BASE_URL ?>admin/excluiPost.php" method="POST">
                                                        <input type="hidden" name="tipo" value="<?= $post["tipo"] ?>">
                                                        <input type="hidden" name="nome" value="<?= $post["nome"] ?>">
                                                        <input type="hidden" name="id" value="<?= $post["ID"] ?>">
                                                        <button>Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- Fim div .confirma-excluir -->
                                    </li>
                                </ul>
                            </div><!-- Fim div .botoes -->
                        </div><!-- fim div .col-3 -->

                    </div><!-- Fim div .row -->

                <!-- CASO SITUACAO SEJA FALSE -->
                <?php else: ?>
                    <div class="row rascunho">
                        <!-- IMG DO POST -->
                        <div class="col-1">
                            <?php if($post["tipo"] === "fabricantes"): ?>
                                <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>">
                                    <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                                </a>
                            <?php else: ?>
                                <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>">
                                    <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- TITULO E DATA DO POST -->
                        <div class="col-2">
                            <?php if($post["tipo"] === "fabricantes"): ?>
                                <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
                            <?php else: ?>
                                <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
                            <?php endif; ?>
                            <p>Rascunho</p>
                        </div>

                        <!-- AUTOR DO POST -->
                        <div class="col-3">
                            <div class="autor">
                                <?php foreach($funcionarios as $i): ?>
                                    <?php if($i["ID"] === $post["autor"]): ?>
                                        <p><?= $i["nome"] ?> <?= $i["sobrenome"] ?> <i class="fa-solid fa-user"></i></p>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <!-- TIPO E ID DO POST -->
                            <div class="id">
                                <?php if($post["tipo"] === "fabricantes"): ?>
                                    <p>Fabricante #<?= $post["ID"] ?></p>
                                <?php elseif($post["tipo"] === "modelos"): ?>
                                    <p>Modelo #<?= $post["ID"] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- BOTOES -->
                            <div class="botoes">
                                <ul>
                                    <!-- Reverter para rascunho -->
                                    <li>
                                        <form action="<?= $BASE_URL ?>admin/alteraSituacao.php" method="POST">
                                            <input type="hidden" name="situacao" value="0">
                                            <input type="hidden" name="ID" value="<?= $post["ID"] ?>">
                                            <input type="hidden" name="tipo" value="<?= $post["tipo"] ?>">
                                            <input type="hidden" name="nome" value="<?= $post["nome"] ?>">
                                            <button><i class="fa-solid fa-paper-plane"></i></button>
                                        </form>
                                        <div class="descricao">
                                            <p>Publicar</p>
                                        </div>
                                    </li>
                                    <!-- Alterar post -->
                                    <li>
                                        <?php if($post["tipo"] === "fabricantes"): ?>
                                            <a href="<?= $BASE_URL ?>publicar_fabricante.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                        <?php else: ?>
                                            <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                        <?php endif; ?>
                                        <div class="descricao">
                                            <p>Alterar<span></span>publicação</p>
                                        </div>
                                    </li>
                                    <!-- Visualizar post -->
                                    <li>
                                        <!--Caso seja post tipo "fabricantes" -->
                                        <?php if($post["tipo"] === "fabricantes"): ?>
                                            <a target="blanck" href="<?= $BASE_URL ?>fabricante.php?id=<?= $post["ID"] ?>">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                        <!--Caso seja post tipo "modelos" -->
                                        <?php elseif($post["tipo"] === "modelos"): ?>
                                            <a target="blanck" href="<?= $BASE_URL ?>modelo.php?id=<?= $post["ID"] ?>">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        <?php endif; ?>
                                        <div class="descricao">
                                            <p>Visualizar<span></span></p>
                                        </div>
                                    </li>
                                    <!-- Excluir post -->
                                    <li class="excluir-post">
                                        <button class="bot-excluir"><i class="fa-solid fa-trash"></i></button>
                                        <div class="descricao">
                                            <p>Excluir</p>
                                        </div>

                                        <div class="confirma-excluir">
                                            <div class="box">
                                                <p class="confirma">Deseja <span>excluir</span> <?= $post["nome"] ?>?<p>

                                                <p class="aviso">Isso excluirá esta postagem. Após excluir, não será mais possível vê-la nem editá-la.</p>

                                                <div class="confirma-botoes">
                                                    <button class="cancela">Cancelar</button>

                                                    <form action="<?= $BASE_URL ?>admin/excluiPost.php" method="POST">
                                                        <input type="hidden" name="tipo" value="<?= $post["tipo"] ?>">
                                                        <input type="hidden" name="nome" value="<?= $post["nome"] ?>">
                                                        <input type="hidden" name="id" value="<?= $post["ID"] ?>">
                                                        <button>Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- Fim div .confirma-excluir -->
                                    </li>
                                </ul>
                            </div><!-- Fim div .botoes -->
                        </div><!-- fim div .col-3 -->

                    </div><!-- Fim div .row -->
                <?php endif; ?>
            <?php endforeach; ?>

        </div><!-- Fim div #publicacoes -->
    <?php endif; ?>




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

    excluiPost();
</script>

</body>
</html>