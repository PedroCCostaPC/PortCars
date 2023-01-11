<div id="menu-dash">
    
    <button class="bot-new-post">
        + <span>Nova Postagem</span>
    </button>

    <!-- BOX CONFIRMACAO DE NOVO POST -->
    <div class="new-post">
        <div class="box-fundo">
            <div class="close"></div>

            <div class="box anime">
                <p>Qual publicação deseja fazer?</p>

                <div class="col col-fab">
                    <a href="<?= $BASE_URL ?>publicar_fabricante.php"><i class="fa-solid fa-industry"></i> Publicar Fabricante</a>
                </div>

                <div class="col">
                    <a href="<?= $BASE_URL ?>publicar_modelo.php"><i class="fa-solid fa-car"></i> Publicar Modelo</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- NAV ESQUERDO DO DASH -->
    <nav>
        <button class="bot-menu">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button>
        
        <div class="nav">
            <div class="close"></div>

            <ul class="anime">
                <li>
                    <a href="<?= $BASE_URL ?>dashboard.php"><i class="fa-solid fa-book"></i> Todas Postagens</a>
                </li>

                <li>
                    <a href="<?= $BASE_URL ?>dash_fabricantes.php"><i class="fa-solid fa-industry"></i> Fabricantes</a>
                </li>

                <li>
                    <a href="<?= $BASE_URL ?>dash_modelos.php"><i class="fa-solid fa-car"></i> Modelos</a>
                </li>

                <?php if($_SESSION["cargo_id"] === 1): ?>
                    <li>
                        <a href="<?= $BASE_URL ?>dash_funcionarios.php"><i class="fa-solid fa-person"></i> Funcionarios</a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?= $BASE_URL ?>minha_conta.php"><i class="fa-solid fa-gear"></i> Minha Conta</a>
                </li>
            </ul>
        </div>
    </nav>


</div><!-- Fim div #menu-dash -->




