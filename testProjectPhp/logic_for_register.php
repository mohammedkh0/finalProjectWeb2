<?php
include_once 'const_db.php';


$error = '';
if (isset($_POST['register'])) {
    $usernameApp = $_POST['username'];
    $email = $_POST['email'];
    $passwordApp = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $userType = $_POST['userType'];


    if ($passwordApp !== $confirmPassword) {
        $error = 'Invalid your confirm password!';
        header('Location: register.php?error=' . $error);
        exit();
    } else {
        $statmentCheckEmail = $connection->prepare('SELECT * FROM users WHERE email = ?');
        $statmentCheckEmail->bind_param('s', $email);
        $statmentCheckEmail->execute();
        if ($statmentCheckEmail->get_result()->num_rows > 0) {
            $error = 'The email is taken already!';
            header('Location: register.php?error=' . $error);
            exit();
        } else {
            $statmentInsert = $connection->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
            $statmentInsert->bind_param("ssss", $usernameApp, $email, $passwordApp, $userType);
            $statmentInsert->execute();


            if ($statmentInsert->affected_rows > 0) {
                header('Location: login.php');
                exit();
            } else {
                echo "Error: " . $statmentInsert->error;
            }
            $statmentInsert->close();
            $connection->close();
        }
    }


}