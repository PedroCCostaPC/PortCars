<?php 

    require_once("template/DASH_header.php");


    // PEGANDO TABELA DE MODELOS E 
    // COLOCANDO EM UM UNICO ARRAY
    foreach($modelosNovo as $model) {
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
    // ORGANIZANDO ARRAY POR ORDEM DE DATA MAIS RECENTE
    foreach($allPosts as $key => $row) {
        $auxi[$key] = $row["data"];
    }
    array_multisort($auxi, SORT_DESC, $allPosts);

    // FILTRO
    require_once("admin/dash_filtro.php");


?>

<!-- CSS EXCLUSIVO DA PAGINA -->
<style>
    #menu-dash nav ul li:nth-child(3) a {
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
        <h1>Modelos</h1>
        <p><?= $cargo ?></p>
    </div>


    <!-- *********** MENU *********** -->
    <?php require_once("template/DASH_menu.php"); ?>


    <!-- *********** PUBLICACOES *********** -->
    <div id="publicacoes">

        <!-- FILTRO -->
        <div class="filtro">
            <button class="bot-ordem">
                <?= $textoFiltro ?> <?= $quantidade ?> <i class="fa-solid fa-caret-down"></i>
            </button>
            
            <div class="opcoes">
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=todos">Todos (<?= count($allPosts) ?>)</a>

                <!-- PUBLICADOS -->
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=publicados">
                    Publicados 
                    <?php if(isset($arrayPublicado)): ?>
                        (<?= count($arrayPublicado) ?>)
                    <?php else: ?>
                        (0)
                    <?php endif; ?>
                </a>

                <!-- RASCUNHOS -->
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=rascunho">
                    Rascunhos 
                    <?php if(isset($arrayRascunho)): ?>
                        (<?= count($arrayRascunho) ?>)
                    <?php else: ?>
                        (0)
                    <?php endif; ?>
                </a>

                <!-- AUTOR DO POST -->
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=meus">
                    Minhas publicações 
                    <?php if(isset($arrayAutor)): ?>
                        (<?= count($arrayAutor) ?>)
                    <?php else: ?>
                        (0)
                    <?php endif; ?>
                </a>

                <!-- MAIS ANTIGOS -->
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=antigos">
                    Mais antigos
                </a>

                <!-- MAIS NOVOS -->
                <a href="<?= $BASE_URL ?>dash_modelos.php?filtro=novos">
                    Mais novos
                </a>
            </div>
        </div><!-- Fim div filtro -->
        

        <?php foreach($arraysetado as $post): ?>

            <!-- CHECANDO SITUACAO -->
            <?php if($post["situacao"]): ?>

                <div class="row">
                    <!-- IMG DO POST -->
                    <div class="col-1">
                        <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>">
                            <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                        </a>
                    </div>

                    <!-- TITULO E DATA DO POST -->
                    <div class="col-2">
                        <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
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

                        <!-- ID DO POST -->
                        <div class="id">
                            <p>Modelo #<?= $post["ID"] ?></p>
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
                                    <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                    <div class="descricao">
                                        <p>Alterar<span></span>publicação</p>
                                    </div>
                                </li>
                                <!-- Visualizar post -->
                                <li>
                                    <a target="blanck" href="<?= $BASE_URL ?>modelo.php?id=<?= $post["ID"] ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
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
                        <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>">
                            <img src="<?= $BASE_URL ?>assets/img/<?= $post["img"] ?>" alt="<?= $post["nome"] ?>">
                        </a>
                    </div>

                    <!-- TITULO E DATA DO POST -->
                    <div class="col-2">
                        <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><?= $post["nome"] ?></a>
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
                            <p>Modelo #<?= $post["ID"] ?></p>
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
                                    <a href="<?= $BASE_URL ?>publicar_modelo.php?id=<?= $post["ID"] ?>"><i class="fa-solid fa-pen"></i></a>
                                    <div class="descricao">
                                        <p>Alterar<span></span>publicação</p>
                                    </div>
                                </li>
                                <!-- Visualizar post -->
                                <li>
                                    <a target="blanck" href="<?= $BASE_URL ?>modelo.php?id=<?= $post["ID"] ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
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

    filtro();
    excluiPost();
</script>

</body>
</html>