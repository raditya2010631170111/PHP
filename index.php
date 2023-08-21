<?php
echo "<h1>Hello, PHP!</h1>";

// Variables=wadah and Data Types, case-sensitive=huruf kecil, besar
$name = "Alice"; // String variable
$heat = 25;      // Integer variable
$_height2 = 1.75; // Float variable
$isStudent = true; // Boolean variable
$noValue = null; //null
$person = array(
    "name" => "Alice",
    "age" => 30,
    "isStudent" => false
);

// Operators and Expressions //Arithmetic
$ac = 10 - 4;   // Subtraction
$temperature = $heat + $ac;     // Addition
$product = 6 * 2; // Multiplication
$quotient = 15 / 3; // Division
$remainder = 17 % 4; // Modulus (remainder)

$count = 0;
$count++; // Increment by 1 (equivalent to $count = $count + 1)
$otherCount = $count--; // Decrement by 1 after assigning the value (post-decrement)

$a = 10;
$b = 5;
$equal = ($a == $b); // Equal
$notEqual = ($a != $b); // Not equal
$greaterThan = ($a > $b);
$lessThan = ($a < $b);
$greaterOrEqual = ($a >= $b);
$lessOrEqual = ($a <= $b);

//Logical
$hasPermission = true;
$isAdmin = false;
$canAccess = $hasPermission && $isAdmin; // AND (both conditions are true)
$canEdit = $hasPermission || $isAdmin; // OR (at least one condition is true) = | vertical bar
$cannotEdit = !$canEdit; // NOT (negation)

// Functions
function greet($name) {
    echo "Hello, $name, ";
}

greet($name); //greet("Alice");

// Control Structures
if ($temperature > 25) {
    echo "it's a hot day!<br>";
} else {
    echo "it's not too hot.<br>";
}

// Working with Forms and User Input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    echo "Thank you, $name! We received your email: $email";
}

?>

<!--  Full-Stack = databases (MySQL, PostgreSQL), php/python (server-side) (Back-End)=scripting-manage: html, css, js (client-side=tampil di web) (Front-End)
eksekusi source code=tampil ke web
xampp 1) check .php files 2) from open>close tag
akses=kita client - server - php 

parse e.=misplaced parentheses, semicolons, quotes, or brackets. - fatal e.=redeclare a function or class/incorrect syntax/false call
eksekusi jalan = notice=var, unused library, warning e.=non-existent file/deprecated functions

/xampp/htdocs/php/index.php http://localhost/php/index.php
-->