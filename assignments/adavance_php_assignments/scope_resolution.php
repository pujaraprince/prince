<?php

echo "Questions: Create a class with static properties and methods, and demonstrate their access
 using thescope resolution operator.". "<br><br>";

?>

<?php
class MathOperations {
    // Static property
    public static $pi = 3.14159;

    // Static method
    public static function square($number) {
        return $number * $number;
    }

    // Another static method that uses static property
    public static function areaOfCircle($radius) {
        return self::$pi * self::square($radius);
    }
}

// Accessing static property using scope resolution operator ::
echo "Value of PI: " . MathOperations::$pi . "<br>";

// Calling static method using scope resolution operator ::
echo "Square of 5: " . MathOperations::square(5) . "<br>";

// Calling another static method
echo "Area of Circle with radius 3: " . MathOperations::areaOfCircle(3);
?>
