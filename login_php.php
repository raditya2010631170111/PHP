<?php
// Establish database connection

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT id, username, password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
        session_start();
        $_SESSION["user_id"] = $row["id"];
        echo "Login successful.";
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}
?>