<!DOCTYPE html>
<html>
<head>
    <title>User Registration and Login</title>
</head>
<body>
    <h1>User Registration and Login</h1>

    <h2>Register</h2>
    <form action="register.php" method="post">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>

    <h2>Login</h2>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>