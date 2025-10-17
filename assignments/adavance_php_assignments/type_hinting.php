<?php

echo "Questions: Write a method in a class that accepts type-hinted parameters and demonstrate
 how it works with different data types.". "<br><br>";

?>

<?php
class DataProcessor {

    // Method with type-hinted parameters
    public function processData(string $name, int $age, array $skills) {
        echo "Name: $name<br>";
        echo "Age: $age<br>";
        echo "Skills: " . implode(", ", $skills) . "<br><br>";
    }
}

// Create an object
$processor = new DataProcessor();

//  Correct usage — correct data types
$processor->processData("Alice", 25, ["PHP", "MySQL", "JavaScript"]);

//  Incorrect usage — wrong data types (will cause TypeError)
/*
try {
    $processor->processData(12345, "Twenty", "PHP, MySQL");
} catch (TypeError $e) {
    echo " Type Error: " . $e->getMessage() . "<br>";
}
    */   
?>
