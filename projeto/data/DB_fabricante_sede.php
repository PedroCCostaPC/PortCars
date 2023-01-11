<?php


$stmt = $conn->prepare("SELECT * FROM fabricante_sede");

$stmt->execute();
$fabricanteSede = $stmt->fetchAll(PDO::FETCH_ASSOC);

