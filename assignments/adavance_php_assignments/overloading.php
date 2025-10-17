<?php
echo "Questions: Create a class that demonstrates method
 overloading by defining multiple methods with the same name but different parameters.". "<br><br>";

?>

<?php
class MathOperations {
    // Same method name, but behavior changes based on arguments
    public function add($a, $b = 0, $c = 0) {
        $sum = $a + $b + $c;
        echo "Sum: $sum<br>";
    }
}

// Create an object
$math = new MathOperations();

// Call same method with different numbers of arguments
$math->add(5);         // Uses one parameter
$math->add(5, 10);     // Uses two parameters
$math->add(5, 10, 15); // Uses three parameters
?>

