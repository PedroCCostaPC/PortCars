<?php

$stmt = $conn->prepare("SELECT * FROM produtos ORDER BY nome ASC");

$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
