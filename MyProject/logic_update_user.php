<?php
include_once 'const_db.php';
session_start();
$success = '';
$error = '';

if (isset($_POST['update'])){
    $name = $_POST['username'];
    $email = $_POST['email'];

    $sql ="UPDATE users SET username=?, email=? WHERE id=?";
    $statmentUpdate = $connection->prepare($sql);
    $statmentUpdate->bind_param('ssi' , $name, $email, $_SESSION['id']);
    if($statmentUpdate->execute()){

        header('Location: home.php');
        exit();
    }else{
        $success = 'User Update Error.';
        header('Location: edite_user.php?error='. $error);
        exit();
    }


    $statmentUpdate->close();
    $connection->close();

}else{
    header('Location: edite_user.php');
    exit();
}