<?php

//calculator
class Calculator {
    public function add($a, $b) {
        return $a + $b;
    }

    public function subtract($a, $b) {
        return $a - $b;
    }

    public function multiply($a, $b) {
        return $a * $b;
    }

    public function divide($a, $b) {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Cannot divide by zero";
        }
    }
}

// Example Usage:
$calculator = new Calculator();
echo $calculator->add(5, 3); // Output: 8

?>

<?php 
class Student {
    public $name;
    public $age;
    public $grade;

    public function displayInfo() {
        echo "Name: $this->name, Age: $this->age, Grade: $this->grade";
    }
}

// Example Usage:
$student = new Student();
$student->name = "John";
$student->age = 18;
$student->grade = "A";
$student->displayInfo(); // Output: Name: John, Age: 18, Grade: A

?>
<?php
//Point in 2D Space

class Point {
    public $x;
    public $y;

    public function calculateDistance(Point $other) {
        return sqrt(pow($this->x - $other->x, 2) + pow($this->y - $other->y, 2));
    }
}

// Example Usage:
$point1 = new Point();
$point1->x = 1;
$point1->y = 2;

$point2 = new Point();
$point2->x = 4;
$point2->y = 6;

echo $point1->calculateDistance($point2); 
?>


<?php
class Book {
    public $title;
    public $author;

    public function displayInfo() {
        echo "Title: $this->title, Author: $this->author";
    }
}

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function displayAllBooks() {
        foreach ($this->books as $book) {
            $book->displayInfo();
            echo "<br>";
        }
    }
}

$book1 = new Book();
$book1->title = "The Catcher in the Rye";
$book1->author = "J.D. Salinger";

$book2 = new Book();
$book2->title = "To Kill a Mockingbird";
$book2->author = "Harper Lee";

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);

$library->displayAllBooks();

?>

<?php
class Employee {
    public $name;
    public $position;
    public $salary;

    public function calculateYearlyBonus() {
        return $this->salary * 0.1; // Assuming a 10% bonus
    }
}

$employee = new Employee();
$employee->name = "Alice";
$employee->position = "Manager";
$employee->salary = 50000;

echo $employee->calculateYearlyBonus(); // Output: 5000


?>

<?php
class Post {
    public $title;
    public $content;

    public function displayInfo() {
        echo "Title: $this->title<br>Content: $this->content";
    }
}

class Blog {
    private $posts = [];

    public function addPost(Post $post) {
        $this->posts[] = $post;
    }

    public function displayAllPosts() {
        foreach ($this->posts as $post) {
            $post->displayInfo();
            echo "<br><br>";
        }
    }
}

// Example Usage:
$post1 = new Post();
$post1->title = "Introduction to PHP";
$post1->content = "This is a blog post about PHP.";

$post2 = new Post();
$post2->title = "Object-Oriented Programming";
$post2->content = "An overview of OOP principles.";

$blog = new Blog();
$blog->addPost($post1);
$blog->addPost($post2);

$blog->displayAllPosts();

?>
<?php
class Shape {
}

class Circle extends Shape {
    public $radius;

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter() {
        return 2 * pi() * $this->radius;
    }
}

class Rectangle extends Shape {
    public $length;
    public $width;

    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function calculatePerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

$circle = new Circle();
$circle->radius = 5;

$rectangle = new Rectangle();
$rectangle->length = 4;
$rectangle->width = 6;

echo "Circle Area: " . $circle->calculateArea() . "<br>";
echo "Rectangle Perimeter: " . $rectangle->calculatePerimeter();
?>

<?php

class File {
    public $filename;
    public $size;

    public function getFileExtension() {
        $parts = explode(".", $this->filename);
        return end($parts);
    }

    public function displayFileInfo() {
        echo "Filename: $this->filename, Size: $this->size KB";
    }
}

$file = new File();
$file->filename = "document.txt";
$file->size = 1024;

echo "File Extension: " . $file->getFileExtension() . "<br>";
$file->displayFileInfo();

?>


<?php

//bank account
class BankAccount {
private $accountNumber;
private $accountHolder;
private $balance;

public function __construct($accountNumber, $accountHolder, $initialBalance) {
    $this->accountNumber = $accountNumber;
    $this->accountHolder = $accountHolder;
    $this->balance = $initialBalance;
}

public function deposit($amount) {
    $this->balance += $amount;
}

public function withdraw($amount) {
    if ($amount <= $this->balance) {
        $this->balance -= $amount;
    } else {
        echo "Insufficient funds for withdrawal.";
    }
}

public function displayInfo() {
    echo "Account Number: {$this->accountNumber}, Account Holder: {$this->accountHolder}, Balance: {$this->balance} USD";
}
}

// Create a bank account object
$account1 = new BankAccount("123456", "John Doe", 1000);

// Deposit and withdraw from the account
$account1->deposit(500);
$account1->withdraw(200);

// Display account information
$account1->displayInfo();
?>




<?php

//online shop
class Product {
private $productId;
private $name;
private $price;

public function __construct($productId, $name, $price) {
    $this->productId = $productId;
    $this->name = $name;
    $this->price = $price;
}

public function getPrice() {
    return $this->price;
}
}

class ShoppingCart {
private $items = [];

public function addItem(Product $product) {
    $this->items[] = $product;
}

public function calculateTotal() {
    $total = 0;
    foreach ($this->items as $item) {
        $total += $item->getPrice();
    }
    return $total;
}

public function displayItems() {
    echo "Shopping Cart Items:\n";
    foreach ($this->items as $item) {
        echo "{$item->getPrice()} - {$item->getPrice()} USD\n";
    }
}
}

// Create product objects
$product1 = new Product(1, "Laptop", 800);
$product2 = new Product(2, "Smartphone", 400);

// Create a shopping cart object
$cart = new ShoppingCart();

// Add products to the cart
$cart->addItem($product1);
$cart->addItem($product2);

// Display items and calculate total price
$cart->displayItems();
echo "Total Price: " . $cart->calculateTotal() . " USD";
?>





?>