<?php
// Object-Oriented Programming (OOP)
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return "Animal sound";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Woof!";
    }
}

$dog = new Dog("Buddy");
echo $dog->speak(); // Output: Woof!
echo "<br>";

// Inheritance
class Shape {
    public function area() {
        return 0;
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo "Circle area: " . $circle->area(); // Output: Circle area: 78.539816339745
echo "<br>";

// Interfaces
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "Logging to file: $message<br>";
    }
}

class DatabaseLogger implements Logger {
    public function log($message) {
        echo "Logging to database: $message<br>";
    }
}

$fileLogger = new FileLogger();
$fileLogger->log("Hello, File Logger!"); // Output: Logging to file: Hello, File Logger!

$databaseLogger = new DatabaseLogger();
$databaseLogger->log("Hello, Database Logger!"); // Output: Logging to database: Hello, Database Logger!
echo "<br>";

// Namespaces
namespace MyNamespace;

class MyClass {
    public function showNamespace() {
        echo "This class is part of MyNamespace.<br>";
    }
}

$myClass = new MyClass();
$myClass->showNamespace(); // Output: This class is part of MyNamespace.
echo "<br>";

// Exception Handling
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Division by zero is not allowed.");
    }
    return $numerator / $denominator;
}

try {
    $result = divide(10, 0);
    echo "Result: $result";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); // Output: Error: Division by zero is not allowed.
}
?>