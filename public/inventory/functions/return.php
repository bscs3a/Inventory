<?php
require_once 'db.php';

$query = "SELECT * FROM return_stock";

$stmt = $conn->prepare($query);
$stmt->execute();
$rowsReturn = $stmt->fetchAll(PDO::FETCH_ASSOC);