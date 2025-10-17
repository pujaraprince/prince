<?php
echo "Questions: Create a class that uses magic methods to handle property access and modification
dynamically.". "<br><br>";

?>

<?php
class DynamicProperties {
    // Private array to hold dynamic properties
    private $data = [];

    // Magic method to set property dynamically
    public function __set($name, $value) {
        echo "Setting '$name' to '$value'<br>";
        $this->data[$name] = $value;
    }

    // Magic method to get property dynamically
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            echo "Accessing '$name' property<br>";
            return $this->data[$name];
        } else {
            echo "Property '$name' not found!<br>";
            return null;
        }
    }

    // Magic method to check if property is set
    public function __isset($name) {
        return isset($this->data[$name]);
    }
}

// Create object
$obj = new DynamicProperties();

// Dynamically set properties
$obj->name = "John Doe";
$obj->age = 25;

// Dynamically access properties
echo "Name: " . $obj->name . "<br>";
echo "Age: " . $obj->age . "<br>";

// Try accessing a non-existent property
echo "City: " . $obj->city . "<br>";

// Check if a property is set
if (isset($obj->age)) {
    echo "The property 'age' is set.<br>";
}
?>
