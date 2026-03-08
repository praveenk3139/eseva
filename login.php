<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['user_id'];   // IMPORTANT
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid login";
}
?>