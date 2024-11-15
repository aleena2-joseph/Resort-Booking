<?php
include 'database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email']; // Corrected this line to retrieve the email separately
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert new user with 'user' role
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";

    if (mysqli_query($conn,$sql)) {
        echo "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Resort Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://images.pexels.com/photos/21764459/pexels-photo-21764459/free-photo-of-close-up-of-large-green-leaves-of-a-philodendron.jpeg') no-repeat center center fixed;
            
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        form {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 300px;
            backdrop-filter:blur(8px);
            height:400px;
            width: 400px;
            
    padding-top: 50px;
    height: 250px;
    padding-right: 50px;
    padding-left: 50px;
    padding-bottom: 50px;

        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        

        button {
            width: 40%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin:10px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: #ffcc00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div>
        <h2>Register</h2>
        <div class="form">
        <form method="POST" >
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        </div>
    </div>
</body>
</html>