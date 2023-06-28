<?php
session_start();
include('errors.php');

// Initializing variables
$first_name = "";
$last_name = "";
$phone_number = "";
$id_number = "";
$property_name = "";
$house_number = "";
$email = "";
$password = "";
$date_of_arrival = "";
$errors = array();

// Database connection
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'project';

$db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check the connection
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Register User
if (isset($_POST['reg_user'])) {
    // Receive all inputs
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $id_number = mysqli_real_escape_string($db, $_POST['id_number']);
    $property_name = mysqli_real_escape_string($db, $_POST['property_name']);
    $house_number = mysqli_real_escape_string($db, $_POST['house_number']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $date_of_arrival = mysqli_real_escape_string($db, $_POST['date_of_arrival']);

    // User check query
    $user_check_query = "SELECT * FROM login WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
}
?>
