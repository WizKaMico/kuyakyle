<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$productInventory = $portCont->inventoryProduct();

// Encode the data as JSON
$jsonData = json_encode($productInventory);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
