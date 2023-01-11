<?php

$stmt = $conn->prepare("SELECT * FROM sede ORDER BY nome ASC");

$stmt->execute();
$sede = $stmt->fetchAll(PDO::FETCH_ASSOC);
