<?php 

    require_once("template/DASH_header.php");

    // CASO SEJA PARA ALTERAR POST
    if(isset($_GET["id"])) {
        $idPost = (int) $_GET["id"];

        foreach($fabricanteID as $fab) {
            if($fab["ID"] === $idPost) {
                $fabricante = $fab;
                break;
            }
        }

        // PEGANDO OS FUNDADORES DA FABRICANTE
        foreach($fundadores as $fundador) {
            foreach($fabricanteFundador as $i) {
                if($i["fabricante_id"] === $fab["ID"] && $i["fundador_id"] == $fundador["ID"]) {
                    $fundadorDaFab[] = $fundador;
                }
            }
        }   
        
        // PEGANDO AS SEDE DA FABRICANTE
        foreach($sede as $sed) {
            foreach($fabricanteSede as $i) {
                if($i["fabricante_id"] === $fab["ID"] && $i["sede_id"] == $sed["ID"]) {
                    $sedeDaFab[] = $sed;
                }
            }
        }

        // PEGANDO OS PROPRIETARIOS DA FABRICANTE
        foreach($proprietarios as $proprietario) {
            foreach($fabricanteProprietario as $i) {
                if($i["fabricante_id"] === $fab["ID"] && $i["proprietario_id"] == $proprietario["ID"]) {
                    $proprietarioDaFab[] = $proprietario;
                }
            }
        }

        // PEGANDO OS PRODUTOS DA FABRICANTE
        foreach($produtos as $produto) {
            foreach($fabricanteProduto as $i) {
                if($i["fabricante_id"] === $fab["ID"] && $i["produto_id"] == $produto["ID"]) {
                    $produtoDaFab[] = $produto;
                }
            }
        }

    }
    

    // PEGANDO ALFABETO DA PRIMEIRA LETRA DOS NOMES DE FUNDADORES
    foreach($fundadores as $i) {
        $alfabetoFundador[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoFundador = array_unique($alfabetoFundador);

    // PEGANDO ALFABETO DA PRIMEIRA LETRA DOS NOMES DA SEDE
    foreach($sede as $i) {
        $alfabetoSede[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoSede = array_unique($alfabetoSede);

    // PEGANDO ALFABETO DA PRIMEIRA LETRA DOS NOMES DE PROPRIETARIOS
    foreach($proprietarios as $i) {
        $alfabetoProprietario[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoProprietario = array_unique($alfabetoProprietario);

    // PEGANDO ALFABETO DA PRIMEIRA LETRA DOS NOMES DE PRODUTOS
    foreach($produtos as $i) {
        $alfabetoProdutos[] = strtolower(substr($i["nome"], 0, 1));
    }
    $alfabetoProdutos = array_unique($alfabetoProdutos);
    


    // PEGANDO OS CAMPOS JA PREENCHIDOS CASO VOLTE PARA A PAGINA POR NAO TER PREENCHIDO ALGUM CAMPO
    // PARA APLICAR NOS INPUT

    // NOME
    if(isset($_SESSION["valida_nome"]) && $_SESSION["valida_nome"] !== "") {
        $validaNome = $_SESSION["valida_nome"];
    } else {
        $validaNome = "";
    }

    // SLOGAN
    if(isset($_SESSION["valida_slogan"]) && $_SESSION["valida_slogan"] !== "") {
        $validaSlogan = $_SESSION["valida_slogan"];
    } else {
        $validaSlogan = "";
    }

    // ATIVIDADE
    if(isset($_SESSION["valida_atividade"]) && $_SESSION["valida_atividade"] !== "") {
        $validaAtividade = $_SESSION["valida_atividade"];
    } else {
        $validaAtividade = "";
    }

    // ANO
    if(isset($_SESSION["valida_ano"]) && $_SESSION["valida_ano"] !== "") {
        $validaAno = $_SESSION["valida_ano"];
    } else {
        $validaAno = "";
    }

    // SITE
    if(isset($_SESSION["valida_site"]) && $_SESSION["valida_site"] !== "") {
        $validaSite = $_SESSION["valida_site"];
    } else {
        $validaSite = "";
    }

    // DESCRICAO
    if(isset($_SESSION["valida_descricao"]) && $_SESSION["valida_descricao"] !== "") {
        $validaDescricao = $_SESSION["valida_descricao"];
    } else {
        $validaDescricao = "";
    }

    // FUNDADORES
    if(isset($_SESSION["valida_fundadores"]) && $_SESSION["valida_fundadores"] !== "") {
        $validaFundadores = $_SESSION["valida_fundadores"];
    } else {
        $validaFundadores = "";
    }
    // MAIS FUNDADORES
    if(isset($_SESSION["valida_mais_fundador"]) && count($_SESSION["valida_mais_fundador"]) > 0) {
        $maisFundador = $_SESSION["valida_mais_fundador"];
    }

    // SEDE
    if(isset($_SESSION["valida_sede"]) && $_SESSION["valida_sede"] !== "") {
        $validaSede = $_SESSION["valida_sede"];
    } else {
        $validaSede = "";
    }
    // MAIS SEDE
    if(isset($_SESSION["valida_mais_sede"]) && count($_SESSION["valida_mais_sede"]) > 0) {
        $maisSede = $_SESSION["valida_mais_sede"];
    }

    // PROPRIETARIOS
    if(isset($_SESSION["valida_proprietario"]) && $_SESSION["valida_proprietario"] !== "") {
        $validaProprietario = $_SESSION["valida_proprietario"];
    } else {
        $validaProprietario = "";
    }
    // MAIS PROPRIETARIOS
    if(isset($_SESSION["valida_mais_proprietario"]) && count($_SESSION["valida_mais_proprietario"]) > 0) {
        $maisProprietario = $_SESSION["valida_mais_proprietario"];
    }

    // PRODUTOS
    if(isset($_SESSION["valida_produto"]) && $_SESSION["valida_produto"] !== "") {
        $validaProduto = $_SESSION["valida_produto"];
    } else {
        $validaProduto = "";
    }
    // MAIS PRODUTOS
    if(isset($_SESSION["valida_mais_produto"]) && count($_SESSION["valida_mais_produto"]) > 0) {
        $maisProduto = $_SESSION["valida_mais_produto"];
    }

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
        <h1><span>Publicar</span> Fabricante</h1>
        <p><?= $cargo ?></p>
    </div>

    <form id="form-publica" action="<?= $BASE_URL ?>admin/publicaFabricante.php" method="POST" enctype="multipart/form-data">

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

                <!-- SLOGAN -->
                <div class="row">
                    <label for="slogan"><span>*</span> Slogan:</label>
                    <input type="text" name="slogan" id="slogan" value="<?= $validaSlogan ?>" class="<?= $_SESSION["classSlogan"] ?>">
                    <?php $_SESSION["valida_slogan"] = ""; ?>
                    <?php $_SESSION["classSlogan"] = ""; ?>
                </div>

                <!-- ATIVIDADE -->
                <div class="row">
                    <label for="atividade"><span>*</span> Atividade:</label>
                    <input type="text" name="atividade" id="atividade" placeholder="Ex: Automobilística"  value="<?= $validaAtividade ?>" class="<?= $_SESSION["classAtividade"] ?>">
                    <?php $_SESSION["valida_atividade"] = ""; ?>
                    <?php $_SESSION["classAtividade"] = ""; ?>
                </div>

                <!-- ANO -->
                <div class="row">
                    <label for="ano"><span>*</span> Ano:</label>
                    <input class="numero <?= $_SESSION["classAno"] ?>" type="number" name="ano" id="ano" placeholder="Fundação" value="<?= $validaAno ?>">
                    <?php $_SESSION["valida_ano"] = ""; ?>
                    <?php $_SESSION["classAno"] = ""; ?>
                </div>

                <!-- SITE OFICIAL -->
                <div class="row">
                    <label for="site"><span>*</span> Site Oficial:</label>
                    <input type="text" name="site" id="site" placeholder="Ex: www.fabricante.com" value="<?= $validaSite ?>" class="<?= $_SESSION["classSite"] ?>">
                    <?php $_SESSION["valida_site"] = ""; ?>
                    <?php $_SESSION["classSite"] = ""; ?>
                </div>

            </div><!-- Fim div .input-padrao -->


            <!-- ************** CHECKBOX FUNDADORES ************** -->
            <!-- BOTAO -->
            <div class="bot-fundadores bot-checkbox <?= $_SESSION["classFundador"] ?>">
                Fundadores <i class="fa-solid fa-chevron-down"></i>
            </div>
            <?php $_SESSION["classFundador"] = ""; ?>

            <!-- CAMPO -->
            <div class="box-fundadores box-checkbox anime">
                <?php foreach($alfabetoFundador as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($fundadores as $fundador): ?>
                        <?php if(strtolower(substr($fundador["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="fundador[]" value="<?= $fundador["ID"] ?>" id="fundador-<?= $fundador["ID"] ?>"

                                    <?php if($validaFundadores !== ""): ?>
                                        <?php foreach($validaFundadores as $i): ?>
                                            <?php if($i == $fundador["ID"]): ?>
                                                checked
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                ><!-- Fim do input -->
                                        
                                <label for="fundador-<?= $fundador["ID"] ?>"> <?= $fundador["nome"] ?></label>
                                <?php $_SESSION["valida_fundadores"] = ""; ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR FUNDADOR -->
                <div id="mais-fundador" class="campo-adicionado">

                    <?php if(isset($maisFundador)): ?>
                        <?php foreach($maisFundador as $i): ?>
                            <div class="row">
                                <label>Nome:</label>
                                <input type="text" name="fundador-nome[]" value="<?= $i ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php $_SESSION["valida_mais_fundador"] = [] ?>

                </div>

                <!-- BOTAO PARA ADICIONAR FUNDADOR -->
                <div id="add-fundador" class="adicionar">+ Adicionar Fundador</div>
            </div><!-- Fim div .box-fundadores -->


            <!-- ************** CHECKBOX SEDE ************** -->
            <!-- BOTAO -->
            <div class="bot-sede bot-checkbox <?= $_SESSION["classSede"] ?>">
                Sede <i class="fa-solid fa-chevron-down"></i>
            </div>
            <?php $_SESSION["classSede"] = ""; ?>

            <!-- CAMPO -->
            <div class="box-sede box-checkbox anime">
                <?php foreach($alfabetoSede as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($sede as $sed): ?>
                        <?php if(strtolower(substr($sed["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="sede[]" value="<?= $sed["ID"] ?>" id="sede-<?= $sed["ID"] ?>"
                                
                                    <?php if($validaSede !== ""): ?>
                                        <?php foreach($validaSede as $i): ?>
                                            <?php if($i == $sed["ID"]): ?>
                                                checked
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                ><!-- Fim do input -->
                                        
                                <label for="sede-<?= $sed["ID"] ?>"> <?= $sed["nome"] ?></label>
                                <?php $_SESSION["valida_sede"] = ""; ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR SEDE -->
                <div id="mais-sede" class="campo-adicionado">

                    <?php if(isset($maisSede)): ?>
                        <?php foreach($maisSede as $i): ?>
                            <div class="row">
                                <label>Nome:</label>
                                <input type="text" name="sede-nome[]" value="<?= $i ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php $_SESSION["valida_mais_sede"] = [] ?>

                </div>

                <!-- BOTAO PARA ADICIONAR SEDE -->
                <div id="add-sede" class="adicionar">+ Adicionar Sede</div>
            </div><!-- Fim div .box-sede -->


            <!-- ************** CHECKBOX PROPRIETARIOS ************** -->
            <!-- BOTAO -->
            <div class="bot-proprietarios bot-checkbox <?= $_SESSION["classProprietario"] ?>">
                Proprietarios <i class="fa-solid fa-chevron-down"></i>
            </div>
            <?php $_SESSION["classProprietario"] = ""; ?>

            <!-- CAMPO -->
            <div class="box-proprietarios box-checkbox anime">
                <?php foreach($alfabetoProprietario as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($proprietarios as $proprietario): ?>
                        <?php if(strtolower(substr($proprietario["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="proprietario[]" value="<?= $proprietario["ID"] ?>" id="proprietario-<?= $proprietario["ID"] ?>"
                                
                                    <?php if($validaProprietario !== ""): ?>
                                        <?php foreach($validaProprietario as $i): ?>
                                            <?php if($i == $proprietario["ID"]): ?>
                                                checked
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                ><!-- Fim do input -->
                                        
                                <label for="proprietario-<?= $proprietario["ID"] ?>"> <?= $proprietario["nome"] ?></label>
                                <?php $_SESSION["valida_proprietario"] = ""; ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR PROPRIETARIOS -->
                <div id="mais-proprietario" class="campo-adicionado">

                    <?php if(isset($maisProprietario)): ?>
                        <?php foreach($maisProprietario as $i): ?>
                            <div class="row">
                                <label>Nome:</label>
                                <input type="text" name="proprietario-nome[]" value="<?= $i ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php $_SESSION["valida_mais_proprietario"] = [] ?>

                </div>

                <!-- BOTAO PARA ADICIONAR PROPRIETARIOS -->
                <div id="add-proprietario" class="adicionar">+ Adicionar Proprietario</div>
            </div><!-- Fim div .box-proprietarios -->


            <!-- ************** CHECKBOX PRODUTOS ************** -->
            <!-- BOTAO -->
            <div class="bot-produtos bot-checkbox <?= $_SESSION["classProduto"] ?>">
                Produtos <i class="fa-solid fa-chevron-down"></i>
            </div>
            <?php $_SESSION["classProduto"] = ""; ?>

            <!-- CAMPO -->
            <div class="box-produtos box-checkbox anime">
                <?php foreach($alfabetoProdutos as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($produtos as $produto): ?>
                        <?php if(strtolower(substr($produto["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="produto[]" value="<?= $produto["ID"] ?>" id="produto-<?= $produto["ID"] ?>"
                                
                                    <?php if($validaProduto !== ""): ?>
                                        <?php foreach($validaProduto as $i): ?>
                                            <?php if($i == $produto["ID"]): ?>
                                                checked
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                ><!-- Fim do input -->
                                        
                                <label for="produto-<?= $produto["ID"] ?>"> <?= $produto["nome"] ?></label>
                                <?php $_SESSION["valida_produto"] = ""; ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR PRODUTOS -->
                <div id="mais-produto" class="campo-adicionado">

                    <?php if(isset($maisProduto)): ?>
                        <?php foreach($maisProduto as $i): ?>
                            <div class="row">
                                <label>Nome:</label>
                                <input type="text" name="produto-nome[]" value="<?= $i ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php $_SESSION["valida_mais_produto"] = [] ?>

                </div>

                <!-- BOTAO PARA ADICIONAR PRODUTOS -->
                <div id="add-produto" class="adicionar">+ Adicionar Produto</div>
            </div><!-- Fim div .box-produtos -->


            <!-- ************** IMAGEM -> LOGOTIPO ************** -->
            <div class="input-logo">
                <label class="label-logo"><span>*</span> Enviar Logotipo</label>
                <label id="label-img" class="logo" for="logotipo"><i class="fa-regular fa-image"></i></label>
                <input type="file" accept="image/*" name="logo" id="logotipo">
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
        <h1><span>Alterar</span> <?= $fabricante["nome"] ?></h1>
        <p><?= $cargo ?></p>
    </div>

    <form id="form-publica" action="<?= $BASE_URL ?>admin/alteraFabricante.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $fabricante["ID"] ?>">

        <div class="form">
            <!-- ************** INPUTS PADRAO ************** -->
            <div class="input-padrao">

                <!-- NOME -->
                <div class="row">
                    <label for="nome"><span>*</span> Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?= $fabricante["nome"] ?>">
                </div>

                <!-- SLOGAN -->
                <div class="row">
                    <label for="slogan"><span>*</span> Slogan:</label>
                    <input type="text" name="slogan" id="slogan" value="<?= $fabricante["slogan"] ?>">
                </div>

                <!-- ATIVIDADE -->
                <div class="row">
                    <label for="atividade"><span>*</span> Atividade:</label>
                    <input type="text" name="atividade" id="atividade" placeholder="Ex: Automobilística" value="<?= $fabricante["atividade"] ?>">
                </div>

                <!-- ANO -->
                <div class="row">
                    <label for="ano"><span>*</span> Ano:</label>
                    <input class="numero" type="number" name="ano" id="ano" placeholder="Fundação" value="<?= $fabricante["ano"] ?>">
                </div>

                <!-- SITE OFICIAL -->
                <div class="row">
                    <label for="site"><span>*</span> Site Oficial:</label>
                    <input type="text" name="site" id="site" placeholder="Ex: www.fabricante.com" value="<?= $fabricante["siteOficial"] ?>">
                </div>

            </div><!-- Fim div .input-padrao -->


            <!-- ************** CHECKBOX FUNDADORES ************** -->
            <!-- BOTAO -->
            <div class="bot-fundadores bot-checkbox">
                Fundadores <i class="fa-solid fa-chevron-down"></i>
            </div>

            <!-- CAMPO -->
            <div class="box-fundadores box-checkbox anime">
                <?php foreach($alfabetoFundador as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($fundadores as $fundador): ?>
                        <?php if(strtolower(substr($fundador["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="fundador[]" value="<?= $fundador["ID"] ?>" id="fundador-<?= $fundador["ID"] ?>" 
                                    <?php foreach($fundadorDaFab as $i): ?>
                                        <?php if($i["ID"] === $fundador["ID"]): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                ><!-- Fechando input -->
                                        
                                <label for="fundador-<?= $fundador["ID"] ?>"> <?= $fundador["nome"] ?></label>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR FUNDADOR -->
                <div id="mais-fundador" class="campo-adicionado">
                </div>

                <!-- BOTAO PARA ADICIONAR FUNDADOR -->
                <div id="add-fundador" class="adicionar">+ Adicionar Fundador</div>
            </div><!-- Fim div .box-fundadores -->

            


            <!-- ************** CHECKBOX SEDE ************** -->
            <!-- BOTAO -->
            <div class="bot-sede bot-checkbox">
                Sede <i class="fa-solid fa-chevron-down"></i>
            </div>

            <!-- CAMPO -->
            <div class="box-sede box-checkbox anime">
                <?php foreach($alfabetoSede as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($sede as $sed): ?>
                        <?php if(strtolower(substr($sed["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="sede[]" value="<?= $sed["ID"] ?>" id="sede-<?= $sed["ID"] ?>"
                                    <?php foreach($sedeDaFab as $i): ?>
                                        <?php if($i["ID"] === $sed["ID"]): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                ><!-- Fechando input -->
                                        
                                <label for="sede-<?= $sed["ID"] ?>"> <?= $sed["nome"] ?></label>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR SEDE -->
                <div id="mais-sede" class="campo-adicionado">
                </div>

                <!-- BOTAO PARA ADICIONAR SEDE -->
                <div id="add-sede" class="adicionar">+ Adicionar Sede</div>
            </div><!-- Fim div .box-sede -->


            <!-- ************** CHECKBOX PROPRIETARIOS ************** -->
            <!-- BOTAO -->
            <div class="bot-proprietarios bot-checkbox">
                Proprietarios <i class="fa-solid fa-chevron-down"></i>
            </div>

            <!-- CAMPO -->
            <div class="box-proprietarios box-checkbox anime">
                <?php foreach($alfabetoProprietario as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($proprietarios as $proprietario): ?>
                        <?php if(strtolower(substr($proprietario["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="proprietario[]" value="<?= $proprietario["ID"] ?>" id="proprietario-<?= $proprietario["ID"] ?>"
                                    <?php foreach($proprietarioDaFab as $i): ?>
                                        <?php if($i["ID"] === $proprietario["ID"]): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                ><!-- Fechando input -->
                                        
                                <label for="proprietario-<?= $proprietario["ID"] ?>"> <?= $proprietario["nome"] ?></label>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR PROPRIETARIOS -->
                <div id="mais-proprietario" class="campo-adicionado">
                </div>

                <!-- BOTAO PARA ADICIONAR PROPRIETARIOS -->
                <div id="add-proprietario" class="adicionar">+ Adicionar Proprietario</div>
            </div><!-- Fim div .box-proprietarios -->

            
            <!-- ************** CHECKBOX PRODUTOS ************** -->
            <!-- BOTAO -->
            <div class="bot-produtos bot-checkbox">
                Produtos <i class="fa-solid fa-chevron-down"></i>
            </div>

            <!-- CAMPO -->
            <div class="box-produtos box-checkbox anime">
                <?php foreach($alfabetoProdutos as $letra): ?>

                    <div class="letra">
                        <p><?= $letra ?></p>
                    </div>
                    
                    <?php foreach($produtos as $produto): ?>
                        <?php if(strtolower(substr($produto["nome"], 0, 1)) === $letra): ?>

                            <div class="col">
                                <input class="checkbox" type="checkbox" name="produto[]" value="<?= $produto["ID"] ?>" id="produto-<?= $produto["ID"] ?>"
                                    <?php foreach($produtoDaFab as $i): ?>
                                        <?php if($i["ID"] === $produto["ID"]): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                ><!-- Fechando input -->
                                        
                                <label for="produto-<?= $produto["ID"] ?>"> <?= $produto["nome"] ?></label>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>
                <?php endforeach; ?>

                <!-- CAMPO ONDE APARECERA INPUT DE ADICIONAR PRODUTOS -->
                <div id="mais-produto" class="campo-adicionado">
                </div>

                <!-- BOTAO PARA ADICIONAR PRODUTOS -->
                <div id="add-produto" class="adicionar">+ Adicionar Produto</div>
            </div><!-- Fim div .box-produtos -->

            
            <!-- ************** IMAGEM -> LOGOTIPO ************** -->
            <div class="input-logo">
                <input type="hidden" name="nome-logo" value="<?= $fabricante["logo"] ?>">
                <label class="label-logo"><span>*</span> Enviar Logotipo</label>
                <label id="label-img" class="logo" for="logotipo">
                    <i class="logo-atual"><img src="<?= $BASE_URL ?>assets/img/fabricantes/<?= $fabricante["logo"] ?>" class="input-img"></i>
                </label>
                <input type="file" accept="image/*" name="logo" id="logotipo">
            </div>

        </div><!-- fim div form -->

        <!-- ************** TEXTAREA ************** -->
        <div class="textarea">
            <textarea name="descricao" cols="100" rows="30"><?= $fabricante["historia"] ?></textarea>
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

    // Arir sanfona para fundadores
    sanfonaCheckbox(
        "#form-publica .bot-fundadores",
        "#form-publica .box-fundadores",
        "#form-publica .bot-sede",
        "#form-publica .box-sede",
        "#form-publica .bot-proprietarios",
        "#form-publica .box-proprietarios",
        "#form-publica .bot-produtos",
        "#form-publica .box-produtos"
    );

    // Arir sanfona para sede
    sanfonaCheckbox(
        "#form-publica .bot-sede",
        "#form-publica .box-sede",
        "#form-publica .bot-fundadores",
        "#form-publica .box-fundadores",
        "#form-publica .bot-proprietarios",
        "#form-publica .box-proprietarios",
        "#form-publica .bot-produtos",
        "#form-publica .box-produtos"
    );

    // Arir sanfona para proprietarios
    sanfonaCheckbox(
        "#form-publica .bot-proprietarios",
        "#form-publica .box-proprietarios",
        "#form-publica .bot-fundadores",
        "#form-publica .box-fundadores",
        "#form-publica .bot-sede",
        "#form-publica .box-sede",
        "#form-publica .bot-produtos",
        "#form-publica .box-produtos"
    );

    // Arir sanfona para produtos
    sanfonaCheckbox(
        "#form-publica .bot-produtos",
        "#form-publica .box-produtos",
        "#form-publica .bot-fundadores",
        "#form-publica .box-fundadores",
        "#form-publica .bot-sede",
        "#form-publica .box-sede",
        "#form-publica .bot-proprietarios",
        "#form-publica .box-proprietarios"
    );


    adiciona("add-fundador", "mais-fundador", "fundador-nome");
    adiciona("add-sede", "mais-sede", "sede-nome");
    adiciona("add-proprietario", "mais-proprietario", "proprietario-nome");
    adiciona("add-produto", "mais-produto", "produto-nome");

    previewLogo("#logotipo", "#label-img", "#label-img i");

</script>



</body>
</html>