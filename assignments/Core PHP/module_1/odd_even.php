<html>
<head>
<title></title>
</head>
<body>
    <p>Question: Write a PHP program to determine if a number is even or odd using if conditions.</p>

<form action="" method="post" <?php echo $_SERVER['PHP_SELF'];?>>
	<p>Enter Number : <input type="number" name="num" required /></p>
	
	<input class="btn" type="submit"name="sum" value="Sumbit"/>

</form>
</body>
</html>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $value = $_POST['num'] ;

if($value%2 == 0) {

    echo "The numer $value is even";
}
else{
    echo "The number $value is odd";
};
}
?>