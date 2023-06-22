<?php
session_start();
$name = $_SESSION['nameToEdit'];
$email = $_SESSION['emailToEdit'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edite user</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        .message_error {
            margin-top: 20px;
            text-align: center;
            color: #ff0000;
            margin-bottom: 10px;
        }
        .message_success {
            margin-top: 20px;
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edite User Information</h1>
    <form action="logic_update_user.php" method="POST">
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="username" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email"  name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="update" value="Update User">
        </div>
        <?php
        $error = $_GET['error'] ?? '';
        if (!empty($error)) {
            echo '<div class="message_error">' . $error . '</div>';
        }
        ?>
        <?php
        $success = $_GET['success'] ?? '';
        if (!empty($success)) {
            echo '<div class="message_success">' . $success . '</div>';
        }
        ?>
    </form>
</div>
</body>
</html>
