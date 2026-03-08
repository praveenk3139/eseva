<?php
session_start();
include "db.php"; // Database connection

// Get user data from session
$user_id = $_SESSION['user_id'];

// Get form data safely
$type = mysqli_real_escape_string($conn, $_POST['type']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

// Insert complaint into database
$sql = "INSERT INTO complaints (user_id, subject, description, status, created_at) 
        VALUES ('$user_id', '$type', '$description', 'Pending', NOW())";

if (mysqli_query($conn, $sql)) {
    // Redirect back to dashboard
    header("Location: dashboard.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>