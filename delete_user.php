<?php
include 'database_connection.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}
?>