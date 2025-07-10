<?php

echo "Question 1: For Loop: Write a script that displays numbers from 1 to 10 on a single line". "<br><br>";

for($i = 1;$i<=10;$i++){
   
    echo $i;
};

echo "<br><br><br>";

echo "Question 1: For Loop (Addition): Add all integers from 0 to 30 and display the total.". "<br><br>";

$total = 0; 

for ($i = 0; $i <= 30; $i++) {
    $total += $i; 
    
}

echo "The total of integers from 0 to 30 is: " . $total;
echo "<br><br><br>";
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <p>Question 3: Chessboard Pattern: Use a nested loop to create a chessboard pattern (8x8 grid). </p>
    <div style="margin-top: 25px;">
        <h3 style="color: #333; margin-bottom: 20px;">PHP Chessboard Pattern</h3>
        <table style="border-collapse: collapse; ">
            <?php
            $size = 8;
            for ($row = 1; $row <= $size; $row++) {
                echo '<tr>';
                for ($col = 1; $col <= $size; $col++) {
                  
                    $color = ($row + $col) % 2 ? '#b58863' : '#f0d9b5';
                    echo '<td style="width: 30px; height: 30px; background-color: '.$color.';"></td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
       
    </div>
<br><br><br>
 <p>Question 4: Various Patterns: Generate different patterns using loops. </p>
    <h1 >Various Patterns Using Loops</h1>

    <!-- Pattern 1: Number Triangle -->
    <div >
        <h2>1. Number Triangle</h2>
        <pre style="font-family: monospace;"><?php
        $rows = 5;
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $j . " ";
            }
            echo "\n";
        }
        ?></pre>
    </div>

    <!-- Pattern 2: Diamond -->
    <div class="pattern-container">
        <h2>2. Diamond Pattern</h2>
        <div >
        <?php
        $size = 5;
        for ($i = 1; $i <= $size; $i++) {
            for ($j = $i; $j < $size; $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($j = 1; $j <= (2 * $i - 1); $j++) {
                echo "*";
            }
            echo "<br>";
        }
        for ($i = $size-1; $i >= 1; $i--) {
            for ($j = $i; $j < $size; $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($j = 1; $j <= (2 * $i - 1); $j++) {
                echo "*";
            }
            echo "<br>";
        }
        ?>
        </div>
    </div>

    <!-- Pattern 3: Floyd's Triangle -->
    <div class="pattern-container">
        <h2>3. Floyd's Triangle</h2>
        <pre style="font-family: monospace;"><?php
        $rows = 5;
        $number = 1;
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $number . " ";
                $number++;
            }
            echo "\n";
        }
        ?></pre>
    </div>

    <!-- Pattern 4: Alphabet Pyramid -->
    <div class="pattern-container">
        <h2>4. Alphabet Pyramid</h2>
        <div >
        <?php
        $rows = 5;
        $alphabet = 'A';
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $alphabet++;
            }
            echo "<br>";
        }
        ?>
        </div>
    </div>

    <!-- Pattern 5: Binary Number Pattern -->
    <div class="pattern-container">
        <h2>5. Binary Number Pattern</h2>
        <div >
        <?php
        $rows = 5;
        for ($i = 1; $i <= $rows; $i++) {
            $binary = $i % 2;
            for ($j = 1; $j <= $i; $j++) {
                echo $binary . " ";
                $binary = 1 - $binary; // Toggle between 0 and 1
            }
            echo "<br>";
        }
        ?>
        </div>
    </div>


    
</body>
</html>

