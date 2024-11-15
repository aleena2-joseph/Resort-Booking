<?php
session_start();
include 'database_connection.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Check password and role
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $username;

        if ($user['role'] === 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/14417646/pexels-photo-14417646.jpeg');
            /* opacity:0.6; */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* .container {
            background-color: black;
            backdrop-filter:blur(8px);
           
            padding: 30px;
            border-radius: 10px;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); */
            width: 400px;
            height:400px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            
            /* color: #fff;
        } */ */
        /* .container *:not(input)
        {
 opacity: 0.7;
        } */
        .container {
    background-color: black; /* Semi-transparent black background */
    backdrop-filter: blur(1px); /* Applies blur effect to the background */
    padding: 30px;
    border-radius: 10px;
    width: 400px;
    height: 400px;
    text-align: center;
    /* box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); */
    color: #fff;
    position: relative; /* Ensure proper stacking context */
}

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }

        p {
            margin-top: 20px;
            color: #333;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($error_message) { echo "<p class='error-message'>$error_message</p>"; } ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Sign up here</a></p>
    </div>
</body>
</html>