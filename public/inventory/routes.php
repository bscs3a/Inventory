<?php

$path = './public/inventory/views';
$basePath = "$path/inv.";

$inv = [
    // Main
    '/inv/main' => $basePath . "main.php",

    // Inventory Products
    '/inv/inventoryProducts' => $basePath . "products.php",

    // Product Returns
    '/inv/returns' => $basePath . "returns.php",

    // Edit Product
    '/inv/prod-edit' => $basePath . "prodEdit.php",

    // Finance Request
    '/inv/req-finance' => $basePath . "fin.request.php",

];