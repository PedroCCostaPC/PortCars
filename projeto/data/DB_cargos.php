<?php


$stmt = $conn->prepare("SELECT * FROM cargos");

$stmt->execute();
$cargos = $stmt->fetchAll(PDO::FETCH_ASSOC);
