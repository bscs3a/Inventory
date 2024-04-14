<?php
require_once 'db.php';

$query = "SELECT * FROM delivery_inc";

$stmt = $conn->prepare($query);
$stmt->execute();
$IncStock = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM returns";

$stmt = $conn->prepare($query);
$stmt->execute();
$returns = $stmt->fetchAll(PDO::FETCH_ASSOC);
