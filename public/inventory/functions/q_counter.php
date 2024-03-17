<?php
require_once 'db.php';

//quantity coutner
$query = "SELECT SUM(quantity) AS total_quantity FROM total_stocks";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_quantity = $row['total_quantity'];

$query = "SELECT SUM(no_of_order) AS total_incoming FROM inc_stock";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_incoming = $row['total_incoming'];

$query = "SELECT COUNT(*) AS no_stock_count FROM no_stock";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$no_stock_count = $row['no_stock_count'];

$query = "SELECT COUNT(*) AS return_stock FROM return_stock";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$return_stock = $row['return_stock'];