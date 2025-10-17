<?php
echo "Questions: Write a PHP script to create a class representing a 'Car' with properties like make,
 model, and year, and a method to display the car details.". "<br><br>";



class Car {
    // Properties
    public $make;
    public $model;
    public $year;

    // Constructor to initialize properties
    public function __construct($make, $model, $year) {
        $this->make  = $make;
        $this->model = $model;
        $this->year  = $year;
    }

    // Method to display car details
    public function displayDetails() {
        echo "Car Details:<br>";
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}

// Create a new Car object
$myCar = new Car("Honda", "Civic", 2021);

// Display the car details
$myCar->displayDetails();




?>