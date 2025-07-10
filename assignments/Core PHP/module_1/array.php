   <?php
echo "Question 1: Display the value of an array". "<br><br>";

   $a=array("a"=>"KEYUR","b"=>"JIGNESH","C"=>"DEVANSH"); // saprate key and value 1 to make it 2 array


echo "<br>";
print_r(array_values($a)); // arr of values
echo "<br><br><br>";
   ?>

   <?php

echo "Question 2: Find and display the number of odd and even elements in an array.". "<br><br>";

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$evenCount = 0;
$oddCount = 0;

foreach ($array as $value) {
    if ($value % 2 == 0) {
        $evenCount++;
    } else {
        $oddCount++;
    }
}

echo "Number of even elements: " . $evenCount. "<br>" ;
echo "Number of odd elements: " . $oddCount ;

echo "<br><br><br>";

?>

<?php

echo "Question 3: Create an associative array for user details (name, email, age) and display them". "<br><br>";


$userDetails = array(
    "name" => "John Doe",
    "email" => "john.doe@example.com",
    "age" => 30
);


echo "Name: " . $userDetails["name"] . "<br>";
echo "Email: " . $userDetails["email"] . "<br>";
echo "Age: " . $userDetails["age"] . "<br>";

echo "<br><br><br>";
?>

<?php

echo "Question 4: Write a script to shift all zero values to the bottom of an array.". "<br><br>";



function shiftZerosToBottom($array) {
    
    $result = [];
    
   
    $zeroCount = 0;

   
    foreach ($array as $value) {
        if ($value === 0) {
        
            $zeroCount++;
        } else {
          
            $result[] = $value;
        }
    }


    for ($i = 0; $i < $zeroCount; $i++) {
        $result[] = 0;
    }

    return $result;
}


$inputArray = [0, 1, 0, 3, 12, 0, 5];
$outputArray = shiftZerosToBottom($inputArray);

print_r($outputArray);
?>

