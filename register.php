<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO users (name, email, password, role)
        VALUES ('$name', '$email', '$password', '$role')";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - e-Seva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1f2937; /* dark background */
            color: #f3f4f6; /* light text */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #111827;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #facc15;
            margin-bottom: 20px;
        }

        a {
            color: #fbbf24;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: #fcd34d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register - e-Seva</h2>
        <div class="message">
            <?php
            if (mysqli_query($conn, $sql)) {
                echo "Registration successful <br>";
                echo "<a href='login.html'>Login Now</a>";
            } else {
                echo "Error";
            }
            ?>
        </div>
    </div>
</body>
</html>