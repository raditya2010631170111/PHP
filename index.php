<?php
echo "<h1>Hello, PHP!</h1>";

// Variables=wadah and Data Types, case-sensitive=huruf kecil, besar
$heat = 25;      // Integer variable
$_height2 = 1.75; // Float variable
$noValue = null; //null
$colors = array("red", "green", "blue"); // Array
// Associative Array
$person = array(
    "name" => "Alice",
    "age" => 30,
    "isStudent" => false
);

$firstName = "Alice";  // String variable
$lastName = "Einzbern";

// Operators and Expressions //Arithmetic
$ac = 10 - 4;   // Subtraction
$temperature = $heat + $ac;     // Addition, multiple *, divide /, modulus %

$ac++; // Increment by 1 (equivalent to $count = $count + 1)
$otherCount = $ac--; // Decrement by 1 after assigning the value (post-decrement)

//Logical
$hasPermission = true; // Boolean variable
$isAdmin = false;
$canAccess = $hasPermission && $isAdmin; // AND (both conditions are true)
$canEdit = $hasPermission || $isAdmin; // OR (at least one condition is true) = | vertical bar
$cannotEdit = !$canEdit; // NOT (negation)

//Assignment Operators
$x = 10;
$y = 5;
$x += $y; // Equivalent to $x = $x + $y;
$x -= $y; // Equivalent to $x = $x - $y;
$x *= $y; // Equivalent to $x = $x * $y;
$x /= $y; // Equivalent to $x = $x / $y;
$x %= $y; // Equivalent to $x = $x % $y;

//Type Casting
$number = "123";
$intNumber = (int)$number; // Convert to integer
$floatNumber = (float)$number; // Convert to float
$stringNumber = (string)$number; // Convert to string
$booleanValue = (bool)$number; // Convert to boolean

// Functions
function greet($firstName, $lastName) {
    echo "<table style='border-collapse: collapse;'>";
    echo "<tr><td style='border: 1px solid black;padding:5px'>Hello, $firstName $lastName, "; // echo "Hello, " . $firstName . " " . $lastName . ", "; // Concatenate Operator = $firstName . " " . $lastName
}
greet($firstName, $lastName);
    
// Control Structures
if ($temperature > 25) { //greaterThan
    echo "it's a hot day!<br>";
} else if ($temperature < 25) { //lessThan
    echo "It's not too hot.<br>";
} else {
    echo "It's a pleasant day.<br>";
}
echo "</td></tr></table>";

//Ternary
$score1 = 85;
$result1 = ($score1 >= 60) ? "Passed" : "Failed"; //greaterOrEqual
$result2 = ($temperature <= 60) ? "Failed" : "Passed"; //lessOrEqual
echo "You have $result1 your exam, and $result2 your physic test <br>";

// Working with Forms and User Input
if ($_SERVER["REQUEST_METHOD"] == "POST") { //equal ==, notEqual !=
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo "Thank you, $name! We received your email: $email";
}

// GET=value put into URL vs POST
if (isset($_GET['name']) && isset($_GET['email'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    
    echo "Hello, $name! Your email is $email.";
} else {
    echo "Please provide a name and email.";
}

?>

<!--  Full-Stack = databases (MySQL, PostgreSQL), php/python (server-side) (Back-End)=scripting-manage: html, css, js (client-side=tampil di web) (Front-End)
eksekusi source code=tampil ke web
xampp 1) check .php files 2) from open>close tag
akses=kita client - server - php 

parse e.=misplaced parentheses, semicolons, quotes, or brackets. - fatal e.=redeclare a function or class/incorrect syntax/false call
eksekusi jalan = notice=var, unused library, warning e.=non-existent file/deprecated functions

xampp>apache
/xampp/htdocs/php/index.php http://localhost/php/index.php

xampp>mysql
http://localhost/phpmyadmin
>new>create>tabbar "SQL"

AND OR
username or email
-->