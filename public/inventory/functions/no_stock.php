<?php
require_once 'db.php';

$query = "SELECT * FROM no_stock";

$stmt = $conn->prepare($query);
$stmt->execute();
$rowsNoStock = $stmt->fetchAll(PDO::FETCH_ASSOC);