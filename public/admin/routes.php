<?php

$path = './public/admin/views';
$basePath = "$path/adm.";

$routes = [
    // Dashboard
    '/adm/dashboard' => $basePath . "dashboard.php",

    // Edit Employee
    '/adm/edit-employee' => $basePath . "edit-employee.php",

    // Product
    '/adm/product' => $basePath . "product.php",

    // Login
    '/adm/login' => $basePath . "login.php",
];