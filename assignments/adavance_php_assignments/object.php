<?php
echo "Questions:Instantiate multiple objects of the 'Car' class and demonstrate how to access their
properties and methods.". "<br><br>";

 ?>

 <?php
// Define a class
class Car {
    // Properties
    public $brand;
    public $color;
    public $year;

    // Constructor
    public function __construct($brand, $color, $year) {
        $this->brand = $brand;
        $this->color = $color;
        $this->year = $year;
    }

    // Method
    public function startEngine() {
        echo "The engine of the {$this->brand} is now running.<br>";
    }

    // Method to display car info
    public function displayInfo() {
        echo "Brand: {$this->brand}, Color: {$this->color}, Year: {$this->year}<br>";
    }
}

// Instantiate multiple objects
$car1 = new Car("Toyota", "Red", 2020);
$car2 = new Car("Honda", "Blue", 2022);
$car3 = new Car("Ford", "Black", 2018);

// Access properties
echo $car1->brand . "<br>"; // Output: Toyota
echo $car2->color . "<br>"; // Output: Blue

// Call methods
$car1->startEngine();
$car2->startEngine();

// Display information
$car1->displayInfo();
$car2->displayInfo();
$car3->displayInfo();
?>
