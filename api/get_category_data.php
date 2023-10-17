<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$productCategory = $portCont->categoryProduct();

// Encode the data as JSON
$jsonData = json_encode($productCategory);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
