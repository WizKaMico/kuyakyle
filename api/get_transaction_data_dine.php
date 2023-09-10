<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$transListDine = $portCont->allTransactionListDine();

// Encode the data as JSON
$jsonData = json_encode($transListDine);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
