<?php


$stmt = $conn->prepare("SELECT * FROM funcionarios");

$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
