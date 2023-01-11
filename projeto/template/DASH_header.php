<?php

require_once("global/global.php");
require_once("global/db.php");
require_once("models/formataData.php");
require_once("models/formataNumero.php");

require_once("models/DB_ponte.php");



if(!isset($_SESSION["email"]) || !$_SESSION["situacao"]) {
    header("location: $BASE_URL/login.php");
} 

foreach($cargos as $i) {
    if($i["ID"] === $_SESSION["cargo_id"]) {
        $cargo = $i["nome"];
        break;
    }
}


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <title>Port Cars</title>

    <!-- ********* ICONE ********* -->
    <link rel="icon" type="img/png" href="<?= $BASE_URL ?>assets/img/icon.png" >

    <!-- ********* LIB ********* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/wow/style.css" />

    <!-- ********* Fonte ********* -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/font/roboto.css">

    <!-- ********* CSS ********* -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/busca.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/DASH.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/DASH_form.css">

    
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/DASH_mobile.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/mobile.css">
    
</head>
<body>

<!-- LOADING -->
<div id="loading">
    <img src="<?= $BASE_URL ?>assets/img/loading.svg" style="width:150px;height:150px;" />
</div>
    

<header class="dash-header">

    <div class="container">

        <!-- LOGO -->
        <div class="logo">
            <a href="<?= $BASE_URL ?>dashboard.php">
                DASH<span>BOARD</span>
            </a>
        </div>

        <!-- BUSCA -->
        <div class="busca">
            <form action="<?= $BASE_URL ?>buscaDash.php" method="GET">
                <input name="busca" type="text" placeholder="Pesquisar postagem">
                <button>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <!-- NAV -->
        <div class="nav">

            <!-- Bot closer -->
            <button class="close"><i class="fa-solid fa-xmark"></i></button>

            <nav>
                <ul>
                    <li>
                        <a href="<?= $BASE_URL ?>dashboard.php">Inicio</a>
                    </li>

                    <li>
                        <a target="blanck" href="<?= $BASE_URL ?>">Ver site</a>
                    </li>

                    <li>
                        <p><?= $_SESSION["nome"] ?> <?= $_SESSION["sobrenome"] ?></p>
                    </li>

                    <li>
                        <form action="<?= $BASE_URL ?>admin/logout.php" method="POST">
                            <button class="sair">Sair</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

    </div><!-- Fim div .container -->


    <!-- Menu Mobile -->
    <div class="bot-nav-moile">
        <i class="fa-solid fa-bars"></i>
    </div>

    <div class="dark-nav"></div>


</header>