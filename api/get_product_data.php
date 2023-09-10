<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$productList = $portCont->getAllProduct();

// Encode the data as JSON
$jsonData = json_encode($productList);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
