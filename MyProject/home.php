
<?php
include_once 'const_db.php';
session_start();
$userType = $_SESSION['userType'];
if (!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
        .view {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>
        <h1>Welcome back <?php echo $_SESSION['username']?>...</h1>
        <hr>
        <?php
        if ($userType === 'admin') {
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            echo "<table>";
            echo "<tr><th>#</th><th>Name</th><th>Email</th><th>Type Of User</th><th>Deleted Users</th><th>View User Data</th></tr>";
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['user_type'] . "</td>
                        <td>
                        <form action='logic_delete_user.php' method='POST'>
                    <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                    <button type='submit' name='delete' class='delete'>Delete</button>
                </form>
</td><td>
                        <form action='view_info.php' method='get'>
                    <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                    <button type='submit' name='view' class='view'>View</button>
                </form>
</td>
                        </tr>";
}
            echo "</table>";
        }else{
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            echo "<table border='1.5' style='text-align: center;width: 100%'>";
            echo "<tr><th>Name</th><th>View User Data</th></tr>";
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>" . $row['username'] . "</td>
                        <td>
                        <form action='view_info.php' method='get'>
                    <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                    <button type='submit' name='view' class='view'>View</button>
                </form>
</td>
                        </tr>";
            }
            echo "</table>";
        }
        ?>
</body>
</html>