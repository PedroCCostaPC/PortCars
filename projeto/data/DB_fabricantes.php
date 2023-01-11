<?php 

// Ordem mais novo
$stmt = $conn->prepare("SELECT * FROM fabricantes ORDER BY ID DESC");

$stmt->execute();
$fabricanteID = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Ordem alfabetica
$stmt = $conn->prepare("SELECT * FROM fabricantes ORDER BY nome ASC");

$stmt->execute();
$fabricanteNome = $stmt->fetchAll(PDO::FETCH_ASSOC);


