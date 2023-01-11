<?php


$stmt = $conn->prepare("SELECT * FROM fabricante_proprietario");

$stmt->execute();
$fabricanteProprietario = $stmt->fetchAll(PDO::FETCH_ASSOC);

