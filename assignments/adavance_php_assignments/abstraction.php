<?php
echo "Questions: Define an interface named VehicleInterface with methods like start(), stop(),
 andimplement this interface in multiple classes.". "<br><br>";

?>

<?php
// Define the interface
interface VehicleInterface {
    public function start();
    public function stop();
}

// Implement the interface in a Car class
class Car implements VehicleInterface {
    public function start() {
        echo "Car engine started.<br>";
    }

    public function stop() {
        echo "Car engine stopped.<br>";
    }
}

// Implement the interface in a Bike class
class Bike implements VehicleInterface {
    public function start() {
        echo "Bike started with a kick.<br>";
    }

    public function stop() {
        echo "Bike stopped.<br>";
    }
}

// Implement the interface in a Bus class
class Bus implements VehicleInterface {
    public function start() {
        echo "Bus started with a roar.<br>";
    }

    public function stop() {
        echo "Bus engine turned off.<br>";
    }
}

// Create objects and use the implemented methods
$car = new Car();
$bike = new Bike();
$bus = new Bus();

$car->start();
$car->stop();

$bike->start();
$bike->stop();

$bus->start();
$bus->stop();
?>
