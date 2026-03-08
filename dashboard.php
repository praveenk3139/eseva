<?php
session_start();
include "db.php";   // Important for database connection
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - e-Seva</title>
  <style>
    /* General body styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #1f2937; /* Dark background */
      color: #f3f4f6; /* Light text */
      margin: 0;
      padding: 0;
    }

    h2, h3, h4 {
      color: #facc15; /* Highlight headers in yellow */
    }

    /* Container */
    .container {
      width: 90%;
      max-width: 900px;
      margin: 20px auto;
      background-color: #111827; /* Slightly lighter dark */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }

    /* Forms */
    input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: none;
    }

    button {
      background-color: #f59e0b;
      color: #111827;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #d97706;
    }

    /* Complaints box */
    .complaint {
      background-color: #374151;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 8px;
    }

    .complaint b {
      color: #fcd34d;
    }

    hr {
      border: 1px solid #4b5563;
    }
  </style>
</head>
<body>

<div class="container">
<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<?php
if ($_SESSION['role'] == "police") {
?>
<h3>Police Dashboard</h3>

<h3>All Complaints</h3>

<?php
$result = mysqli_query($conn, "SELECT * FROM complaints ORDER BY complaint_id DESC");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='complaint'>";
        echo "<b>ID:</b> " . $row['complaint_id'] . "<br>";
        echo "<b>Type:</b> " . $row['subject'] . "<br>"; 
        echo "<b>Description:</b> " . $row['description'] . "<br>";
        echo "<b>Status:</b> " . $row['status'] . "<br>";
        echo "<b>Date:</b> " . $row['created_at'] . "<br>";
        echo "</div>";
    }
} else {
    echo "No complaints found.";
}
?>

<?php
} else {
?>

<h3>Citizen Dashboard</h3>

<h4>Register Complaint</h4>

<form action="add_complaint.php" method="post">
  Complaint Type:
  <input type="text" name="type" required><br>

  Description:
  <textarea name="description" required></textarea><br>

  <button type="submit">Submit Complaint</button>
</form>

<hr>

<h3>Your Complaints</h3>

<?php
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM complaints WHERE user_id='$user_id' ORDER BY complaint_id DESC");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='complaint'>";
        echo "<b>Complaint ID:</b> " . $row['complaint_id'] . "<br>";
        echo "<b>Type:</b> " . $row['subject'] . "<br>";
        echo "<b>Status:</b> " . $row['status'] . "<br>";
        echo "<b>Date:</b> " . $row['created_at'] . "<br>";
        echo "</div>";
    }
} else {
    echo "No complaints found.";
}
?>

<?php
}
?>

</div>
</body>
</html>