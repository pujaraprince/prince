<?php

echo "Question: Day Finder: Write a script that finds the current day. Ifi tis Sunday, print 'Happy
 Sunday.'". "<br><br>";

$currentDay = date('l');

if ($currentDay == 'Sunday') {
    echo "Happy Sunday!";
} else {
    echo "Today is " . $currentDay . ".";
}
?>
