<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$salesList = $portCont->allSalesList();

// Encode the data as JSON
$jsonData = json_encode($salesList);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
