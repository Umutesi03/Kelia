<?php
session_start();
include('Connection.php');

if (isset($_SESSION['log_user'])) {
    $useremail = $_SESSION['log_user'];
    $sql = mysqli_query($conn, "SELECT FirstName, LastName FROM registration WHERE Email='$useremail'");
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    if ($row) {
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
    } else {
        // Handle case where user is not found
        echo "User not found";
    }
} else {
    // Handle case where session variable is not set
    header('location: login.php');
    exit();
}
?>
