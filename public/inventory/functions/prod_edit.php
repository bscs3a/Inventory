<?php
require_once __DIR__ . '/../functions/db.php';

$product = null;

if (isset ($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $stmt = $conn->prepare("SELECT * FROM total_stocks WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Product ID is required";
    // header("Location: product.php");
    // exit(); 
}