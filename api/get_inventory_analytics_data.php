

<?php
require_once "../connection/ApiController.php";

$portCont = new shopController();

$productInventoryAnalytics = $portCont->inventoryAnalyticsProduct();

// Encode the data as JSON
$jsonData = json_encode($productInventoryAnalytics);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>
