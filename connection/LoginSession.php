<?php
// Start session
session_start();
// Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    // If no session is found, check for the remember me token
    if (isset($_COOKIE['remember_me_cookie'])) {
        

        $token = $_COOKIE['remember_me_cookie'];
        $user_id = getUserIdFromToken($token); // Retrieve user ID from token

        if ($user_id) {
            $_SESSION['user_id'] = $user_id;
        }
    }

    // If still not logged in, redirect to login page
    if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
        header("location: index.php");
        exit();
    }
}

$session_id = $_SESSION['user_id'];
?>
