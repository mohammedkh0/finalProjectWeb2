<?php

include_once 'const_db.php';
$user_id = $_POST['user_id'];

$sql = "DELETE FROM users WHERE id = '$user_id'";

if ($connection->query($sql) === TRUE) {
    header("Location: home.php");
    exit();
    $connection->close();
} else {
    echo "حدث خطأ أثناء حذف المستخدم: " . $connection->error;
}