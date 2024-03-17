<?php
require_once 'db.php';

$query = "SELECT * FROM total_stocks";

$stmt = $conn->prepare($query);
$stmt->execute();
$rowsTStock = $stmt->fetchAll(PDO::FETCH_ASSOC);


