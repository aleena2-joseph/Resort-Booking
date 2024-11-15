<?php
session_start();
include 'database_connection.php';

if ($_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Background with nature resort image */
        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://res.cloudinary.com/simplotel/image/upload/x_0,y_2,w_3342,h_1880,r_0,c_crop/q_80,w_900,dpr_1,f_auto,fl_progressive,c_limit/parakkat-nature-hotel-and-resorts-munnar/IMG_9382') no-repeat center center/cover;
        }

        /* Transparent overlay for better text visibility */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        /* Dashboard container styling */
        .dashboard-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
            color: #fff;
            max-width: 500px;
            width: 90%;
        }

        /* Title styling */
        h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        /* Paragraph styling */
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        /* Link styling */
        a {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background: #4CAF50;
            transition: background 0.3s ease;
        }
        
        a:hover {
            background: #388E3C;
        }
    </style>
</head>
<body>
    <!-- Overlay for background effect -->
    <div class="overlay"></div>
    
    <!-- Dashboard container -->
    <div class="dashboard-container">
        <?php
            echo "<h2>User Dashboard</h2>";
            echo "<p>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</p>";
        ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>