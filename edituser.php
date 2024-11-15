<?php
include 'DatabaseConnection.php';

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $update_query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>