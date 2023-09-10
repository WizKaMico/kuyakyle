<?php

// Assuming you have a database connection established
$mysqli = new mysqli("localhost", "root", "", "kyle");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL query to retrieve the data
$sql = "SELECT COUNT(id) as total, SUM(amount) as sum_amount, date(order_at) as order_date FROM tbl_order GROUP BY date(order_at)";

// Execute the query
$result = $mysqli->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Create an array to store the chart data
$chartData = array();

// Loop through the query results and populate the data array
while ($row = $result->fetch_assoc()) {
    $chartData[] = array(
        "date" => $row["order_date"],
        "total" => intval($row["total"])
    );
}

// Close the database connection
$mysqli->close();

// Encode the data as JSON
$jsonData = json_encode($chartData);

// Set the response content type to JSON
header("Content-Type: application/json");

// Output the JSON data
echo $jsonData;
