<?php

include_once 'const_db.php';
session_start();
$error = '';
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $passwordApp = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwordApp'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userType = $row['user_type'];
        $userName = $row['username'];
        $_SESSION['userType'] = $userType;
        $_SESSION['username'] = $userName ;
        $_SESSION['email'] = $email;
        header('Location: home.php');
        exit();
    } else {
        $error = 'Invalid username or password!';
        header('Location: login.php?error=' . $error);
        exit();
    }
    $connection->close();
}
