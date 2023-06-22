<?php
include_once 'const_db.php';
session_start();
$userId = $_GET['user_id'];
$query = "SELECT * FROM users WHERE id = $userId";
$result = $connection->query($query);
$_SESSION['id'] = $userId;
$userType = $_SESSION['userType'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .user-info {
            margin: 50px auto;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .user-info h2 {
            margin-bottom: 10px;
        }

        .user-info p {
            margin: 10px 0;
        }
        .edit {
            display: block;
            width: 150px;
            margin: 0 auto;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="user-info">
    <?php

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['username'];
        $email = $row['email'];
        $userType =$row['user_type'];

        echo "<h2>User Information</h2>";
        echo "<p><strong>name:</strong> $name</p>";
        echo "<p><strong>email:</strong> $email</p>";
        echo "<p><strong>user type:</strong> $userType</p>";
       if ($userType === "admin"){
           echo "<a href='edite_user.php'><button class='edit'>Edite</button></a>";
       }else{
           echo '';
       }

        $_SESSION['nameToEdit'] = $name;
        $_SESSION['emailToEdit'] = $email;
    }
    ?>
</div>
</body>
</html>











