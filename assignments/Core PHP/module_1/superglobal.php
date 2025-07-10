<!DOCTYPE html>
<html>
<body>
<p>Question: Create a form that takes a user's name and email.Use the \$_POST super global to
display the entered data</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname"><br>
  Email: <input type="email" name="femail"><br><br>
  <input type="submit">
</form>

<h3>submited Information</h3>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'] ;
    $email = $_POST['femail'];

    if (empty($name)) {
        echo "Name is empty";
       
    }
      elseif (empty($email)){
        echo "Email is empty";
      }
    
    
    else {
        echo "Name: ". $name. "<br>";
        echo "Email: ". $email. "<br>";
    }
}
?>

</body>
</html>