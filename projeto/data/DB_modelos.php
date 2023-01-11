<?php 

// Ordem ID mais novo
$stmt = $conn->prepare("SELECT * FROM modelos ORDER BY ID DESC");

$stmt->execute();
$modelosNovo = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Ordem ano mais novo
$stmt = $conn->prepare("SELECT * FROM modelos ORDER BY ano DESC");

$stmt->execute();
$modelosAno = $stmt->fetchAll(PDO::FETCH_ASSOC);