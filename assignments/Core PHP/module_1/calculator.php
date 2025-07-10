<html>
<head>
<title></title>
</head>
<body>
	<p>Question: Create a calculator using if-else conditions that takes two inputs
 and an operator(+,-,*,/).</p>

<form action="" method="post">
	<p>Enter Number 1st: <input type="number" name="num1" required /></p>
	<p>Enter Number 2st: <input type="number" name="num2" required /></p>
	<br>

	<input class="btn" type="submit"name="sum" value="Sum"/>
	<input class="btn" type="submit"name="sub" value="Substraction"/>
	<input type="submit"name="multi" value="Multiplication"/>
	<input type="submit"name="div" value="Division"/>
</form>
</body>
</html>
<?php


if(isset($_REQUEST['sum']))
{
	$num1=$_REQUEST['num1'];
	$num2=$_REQUEST['num2'];
	echo "Your Sum : ".$sum=$num1+$num2;
}

if(isset($_REQUEST['sub']))
{
	$num1=$_REQUEST['num1'];
	$num2=$_REQUEST['num2'];
	echo "Your Substraction : ".$ans=$num1-$num2;
}
if(isset($_REQUEST['multi']))
{
	$num1=$_REQUEST['num1'];
	$num2=$_REQUEST['num2'];
	echo "Your Multiplication : ".$ans=$num1*$num2;
}

if(isset($_REQUEST['div']))
{
	$num1=$_REQUEST['num1'];
	$num2=$_REQUEST['num2'];
	echo "Your Division : ".$ans=$num1/$num2;
}

?>