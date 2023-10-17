<?php
session_start();

// Get the current date in the format 'Ymd' (e.g., 20231008)
$currentDate = date("Ymd");

// Initialize a counter variable if it's a new day
if (!isset($_SESSION['lastDate']) || $_SESSION['lastDate'] !== $currentDate) {
    $_SESSION['lastDate'] = $currentDate;
    $_SESSION['queueCounter'] = 1;
} else {
    // Increment the counter within the same day
    $_SESSION['queueCounter']++;
}

// Ensure the counter stays within the range of 1 to 999
if ($_SESSION['queueCounter'] > 999) {
    $_SESSION['queueCounter'] = 1;
}

// Format the queue number with leading zeros to make it three digits
$queueNumber = str_pad($_SESSION['queueCounter'], 3, '0', STR_PAD_LEFT);

// Combine the current date and the queue number
$queue = $currentDate . '-' . $queueNumber;

echo $queue;
?>