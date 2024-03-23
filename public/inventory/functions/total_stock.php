<?php
require_once 'db.php';

$query = "SELECT * FROM total_stocks ORDER BY date_added DESC";

$stmt = $conn->prepare($query);
$stmt->execute();
$rowsTStock = $stmt->fetchAll(PDO::FETCH_ASSOC);



