<?php

require_once("../global/global.php");
require_once("../global/db.php");

session_destroy();

session_start();
$_SESSION["msg"] = "Até Mais!";
$_SESSION["msg-type"] = "msg-sucesso";

header("location: ../login.php");