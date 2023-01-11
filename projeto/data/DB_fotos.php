<?php

$stmt = $conn->prepare("SELECT * FROM fotos");

$stmt->execute();
$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);