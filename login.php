<?php
session_start();
include_once 'includes/db.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            echo "Login successful! Welcome, $username.";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}
$conn->close();
?>