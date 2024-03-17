<?php
require_once 'db.php';

$query = "SELECT * FROM inc_stock";

$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);