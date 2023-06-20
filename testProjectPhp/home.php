
<?php
include_once 'const_db.php';
session_start();
$userType = $_SESSION['userType'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
        <h1>Home</h1>
        <hr>
        <?php
        if ($userType === 'admin') {
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            echo "<table border='1.5' style='text-align: center;width: 100%'>";
            echo "<tr><th>#</th><th>Name</th><th>Email</th><th>Type Of User</th><th>Deleted Users</th></tr>";
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['user_type'] . "</td>
                        <td>
                        <form action='logic_delete_user.php' method='POST'>
                    <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                    <button type='submit' name='delete'>Delete</button>
                </form>
</td>
                        </tr>";
}
            echo "</table>";
        }else{
            echo 'student';
        }
        ?>
</body>
</html>