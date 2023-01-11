<?php


$stmt = $conn->prepare("SELECT * FROM fabricante_fundador");

$stmt->execute();
$fabricanteFundador = $stmt->fetchAll(PDO::FETCH_ASSOC);

