<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <input type="checkbox" style="display: none;">
        <div class="cover">
            <div class="front">
                <img src="assets/img/bg1.png" alt="">
                <div class="text">
                    <span class="text-1">Every new friend is a <br> new adventure</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Sign Up</div>
                    <form action="/regis" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="bi bi-envelope-fill"></i>
                                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="bi bi-person-lines-fill"></i>
                                <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="input-box">
                                <i class="bi bi-person-circle"></i>
                                <input type="text" name="username" id="username" placeholder="Enter your username"
                                    required>
                            </div>
                            <div class="input-box">
                                <i class="bi bi-shield-lock-fill"></i>
                                <input type="password" name="password" id="password" placeholder="Enter your password"
                                    required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Signup">
                            </div>
                            <div class="text sign-up-text">Do you have an account? <label><a href="/login">Login
                                        now</a></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>
