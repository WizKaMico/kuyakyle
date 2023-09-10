<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$salesListToday = $portCont->allSalesTodayList();

// Encode the data as JSON
$jsonData = json_encode($salesListToday);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
