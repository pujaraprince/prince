<?php

echo "Questions: Create a class marked as final and attempt to extend
 it to show the restriction.". "<br><br>";

?>
<?php

/*
// Define a final class
final class Vehicle {
    public function displayType() {
        echo "This is a generic vehicle.<br>";
    }
}

// Attempt to extend the final class
class Car extends Vehicle {
    public function displayCar() {
        echo "This is a car.<br>";
    }
}

// Create an object of Car
$car = new Car();
$car->displayCar();
*/


//The final keyword before a class means it cannot be inherited or extended.

//Any attempt to create a subclass (class Car extends Vehicle) will result in a fatal error.

//If you remove the inheritance:


final class Vehicle {
    public function displayType() {
        echo "This is a generic vehicle.<br>";
    }
}

$vehicle = new Vehicle();
$vehicle->displayType();
?>

