<?php

$stmt = $conn->prepare("SELECT * FROM proprietarios ORDER BY nome ASC");

$stmt->execute();
$proprietarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
