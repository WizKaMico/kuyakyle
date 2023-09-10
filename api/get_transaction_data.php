<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$transList = $portCont->allTransactionList();

// Encode the data as JSON
$jsonData = json_encode($transList);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
