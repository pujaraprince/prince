<?php
echo "Questions: Create a class with a constructor that initializes properties
 when an object is created". "<br><br>";

?>

<?php
class Person {
    // Properties
    public $name;
    public $age;

    // Constructor to initialize properties
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        echo "Object created for $this->name, Age: $this->age<br>";
    }

    // Method to display person details
    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
}

// Create objects and automatically initialize properties
$person1 = new Person("Alice", 25);
$person2 = new Person("Bob", 30);

// Display details
$person1->displayInfo();
$person2->displayInfo();
?>
