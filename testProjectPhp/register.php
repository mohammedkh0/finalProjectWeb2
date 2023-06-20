<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            text-align: center;
            color: #ff0000;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="logic_for_register.php" method="post">
        <input type="text" placeholder="Username" required name="username">
        <input type="email" placeholder="Email" required name="email">
        <input type="password" placeholder="Password" required name="password">
        <input type="password" placeholder="Confirm Password" required name="confirm_password">
        <label for="">User Type:</label>
        <input type="radio"  name="userType" value="admin" required >
        <label for="">Admin</label>
        <input type="radio"  name="userType" value="student" required >
        <label for="">Student</label>
        <input type="submit" value="Register" name="register">
            <?php
            $error = $_GET['error'] ?? '';
            if (!empty($error)) {
                echo '<div class="message">' . $error . '</div>';
            }
            ?>
    </form>
</div>
</body>
</html>
