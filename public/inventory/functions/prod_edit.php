<?php
require_once __DIR__ . '/../functions/db.php';

$product = null;

if (isset($_SESSION['product_id'])) {
    $id = $_SESSION['product_id'];
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE product_id = :product_id");
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Product ID is required";
    // header("Location: product.php");
    // exit(); 
}