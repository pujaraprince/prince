<?php

echo "Questions: Write a class that shows examples of each visibility type and how
they restrict access toproperties and methods.". "<br><br>";

?>

<?php
class ExampleVisibility {
    // Properties with different visibility levels
    public $publicVar = "I am PUBLIC";       // Accessible everywhere
    protected $protectedVar = "I am PROTECTED"; // Accessible only inside the class and subclasses
    private $privateVar = "I am PRIVATE";    // Accessible only inside the same class

    // Public method
    public function showPublic() {
        echo "Accessing from PUBLIC method:<br>";
        echo $this->publicVar . "<br>";
        echo $this->protectedVar . "<br>";
        echo $this->privateVar . "<br><br>";
    }

    // Protected method
    protected function showProtected() {
        echo "Accessing from PROTECTED method inside the class.<br>";
    }

    // Private method
    private function showPrivate() {
        echo "Accessing from PRIVATE method inside the class.<br>";
    }

    // Public method to test access inside the class
    public function accessAll() {
        $this->showProtected();
        $this->showPrivate();
    }
}

// Subclass to demonstrate inheritance behavior
class ChildExample extends ExampleVisibility {
    public function accessFromChild() {
        echo "Accessing from Child Class:<br>";
        echo $this->publicVar . "<br>";      //  Allowed
        echo $this->protectedVar . "<br>";   //  Allowed
        // echo $this->privateVar;           //  Error (private not accessible)
    }
}

// Create object of main class
$obj = new ExampleVisibility();
echo "<h3>Accessing from Outside the Class:</h3>";
echo $obj->publicVar . "<br>";               //  Allowed
// echo $obj->protectedVar;                  //  Error
// echo $obj->privateVar;                    //  Error

$obj->showPublic();                          //  Allowed
$obj->accessAll();                           //  Allowed (calls protected/private inside)

// Create object of child class
echo "<h3>Accessing from Child Class:</h3>";
$child = new ChildExample();
$child->accessFromChild();
?>
