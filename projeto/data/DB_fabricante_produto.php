<?php


$stmt = $conn->prepare("SELECT * FROM fabricante_produto");

$stmt->execute();
$fabricanteProduto = $stmt->fetchAll(PDO::FETCH_ASSOC);

