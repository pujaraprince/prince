<?php
echo "Questions: Create a 'Vehicle' class and extend it with a 'Car' class. 
Include properties and methods in both classes, demonstrating inherited behavior". "<br><br>";


?>
<?php
// Base class
class Vehicle {
    public $brand;
    public $model;

    // Constructor
    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    // Method to start the vehicle
    public function start() {
        echo "The {$this->brand} {$this->model} is starting...<br>";
    }

    // Method to stop the vehicle
    public function stop() {
        echo "The {$this->brand} {$this->model} has stopped.<br>";
    }
}

// Subclass extending Vehicle
class Car extends Vehicle {
    public $fuelType;

    // Constructor for Car
    public function __construct($brand, $model, $fuelType) {
        // Call parent constructor
        parent::__construct($brand, $model);
        $this->fuelType = $fuelType;
    }

    // Method specific to Car
    public function displayCarInfo() {
        echo "Car Info → Brand: {$this->brand}, Model: {$this->model}, Fuel Type: {$this->fuelType}<br>";
    }

    // Overriding parent method
    public function start() {
        echo "Starting the car {$this->brand} {$this->model} with {$this->fuelType} engine...<br>";
    }
}

// Instantiate a Car object
$myCar = new Car("Toyota", "Corolla", "Petrol");

// Access inherited and subclass methods
$myCar->displayCarInfo();  // from Car
$myCar->start();           // overridden from Vehicle
$myCar->stop();            // inherited from Vehicle
?>
