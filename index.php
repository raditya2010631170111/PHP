<?php
echo "<h1 align="center">Hello, PHP!</h1>";
// <body bgcolor="white">
// <hr></hr> //lines
// <br> //enter
// <font size="24" face="courier" color="red"></font>
// <p></p>
// <ol type="i" start="2"> <li></ol>
// <ul type="square"> <ul> //default=circle
// <dl> <dt></dt><dd></dd> </dl>
// <a href=""><img src=".jpg"></img></a> //".com" or "file.html", target="_blank"
//<table border="1" cellpadding='' cellspacing="" width="">
//<th/><th/><tr/><td colspan="" rowspan="" bgcolor=""/></table>

// input[type="text"] = remember value
// input[type="number"] =  button to auto fill

// Variables=wadah and Data Types, case-sensitive=huruf kecil, besar
$heat = 25;      // Integer variable //echo {$heat};
$_height2 = 1.75; // Float variable
$noValue = null; //null
$colors = array("red", "green", "blue"); // Array echo $colors[0];
echo "Hi".$heat." Welcome <br> I'm".$_height2;

$colors = array("Red", "Green", "Blue", "Yellow"); // Array echo $colors[0];
foreach ($colors as $color) { //foreach L.
    // echo "$color<br>";
}

// Associative Array
$person = array(
    "name" => "Alice",
    "age" => 30,
    "isStudent" => false
);
echo "Name: " . $person["name"] . "<br>";
echo "Age: " . $person["age"] . "<br>";
echo "Is Student: " . ($person["isStudent"] ? "Yes" : "No") . "<br>";

//multi dimension
$students = array(
    array("name" => "Alice", "age" => 20),
    array("name" => "Bob", "age" => 22),
    array("name" => "Charlie", "age" => 21)
);
echo "Name of the first student: " . $students[0]["name"] . "<br>"; // Concatenate 
echo "Age of the second student: " . $students[1]["age"] . "<br>";

$mixedArray = array(
    "person" => array(
        "name" => "Alice",
        "age" => 30,
        "isStudent" => false
    ),
    "students" => array(
        array("name" => "Bob", "age" => 22),
        array("name" => "Charlie", "age" => 21)
    )
);
echo "Name: " . $mixedArray["person"]["name"] . "<br>";
echo "Age: " . $mixedArray["person"]["age"] . "<br>";
echo "Is Student: " . ($mixedArray["person"]["isStudent"] ? "Yes" : "No") . "<br>";

echo "Name of the first student: " . $mixedArray["students"][0]["name"] . "<br>";
echo "Age of the second student: " . $mixedArray["students"][1]["age"] . "<br>";

$firstName = "Alice";  // String variable
$lastName = "Einzbern";
$fullName = "{$firstName} {$lastName}";

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
    echo "<tr><td style='border: 1px solid black;padding:5px'>Hello, $firstName $lastName, ";
}
greet($firstName, $lastName);
    
// Control Structures L.
if ($temperature > 25) { //greaterThan
    echo "it's a hot day!<br>";
} elseif ($temperature < 25) { //lessThan
    echo "It's not too hot.<br>";
} else {
    echo "It's a pleasant day.<br>";
}
echo "</td></tr></table>";

$day = "Wednesday";
switch ($day) {
    case "Monday":
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday":
        echo "It's a regular weekday.";
        break;
    case "Saturday":
    case "Sunday":
        echo "It's the weekend!";
        break;
    default:
        echo "Invalid day.";
        break;
}
//It's a regular weekday.

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
akses=kita client - server - php 
mekanisme eksekusi code: xampp 1) check .php files 2) from open>close tag
langkah eksekusi: xampp>apache /xampp/htdocs/php/index.php http://localhost/php/index.php
running=berhasil eksekusi, debugging=fix error eksekusi, executable file=php >

parse E.=misplaced parentheses, semicolons, quotes, or brackets. - fatal E.=redeclare a function or class/incorrect syntax/false call
eksekusi jalan = notice=var, unused library, warning E.=non-existent file/deprecated functions

xampp>mysql
http://localhost/phpmyadmin
>new>create>tabbar "SQL"

AND OR
username or email

Aplikasi Mockup: Figma, Pencil Project
implementasi UI - drag & drop: Dreamweaver, Google Web Designer
-->