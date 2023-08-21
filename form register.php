<!DOCTYPE html>
<html>
<head>
    <title>Sample Web Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Web Page</h1>
        <p>This is a sample web page with some styled content.</p>
        <button id="colorButton">Change Background Color</button>
    </div>

    <script>
        const colorButton = document.getElementById("colorButton");
        colorButton.addEventListener("click", () => {
            document.body.style.backgroundColor = getRandomColor();
        });

        function getRandomColor() {
            const letters = "0123456789ABCDEF";
            let color = "#";
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

    <form method="POST" action="index.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        
        <input type="submit" value="Submit">

        <a href="https://www.example.com">Visit Example.com</a>
    </form>

    <form method="GET" action="index.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>