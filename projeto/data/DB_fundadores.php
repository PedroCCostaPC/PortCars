<?php

$stmt = $conn->prepare("SELECT * FROM fundadores ORDER BY nome ASC");

$stmt->execute();
$fundadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
