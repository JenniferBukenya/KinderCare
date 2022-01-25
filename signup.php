<?php
include"connection.php";

if (isset($_POST['signup'])){
    $firstName=mysqli_real_escape_string($link, $_POST['fname']);
    $lastName=mysqli_real_escape_string($link, $_POST['lname']);
    $userName=mysqli_real_escape_string($link, $_POST['username']);
    $password=mysqli_real_escape_string($link, $_POST['password']);

    $query="INSERT INTO teachers (first_name, last_name, username, passwords) VALUES('$firstName', '$lastName','$userName', '$password');";
   if(mysqli_query($link, $query)){
       header("Location:index.php");
   } 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCES</title>
</head>
<body>
    <?php require ("header.php"); ?>
    <h2>Teacher's sign up page</h2>

    <div>
<form action="signup.php" method ="POST">

<label for="fname">FIRST NAME</label>
<input type="text" name="fname">
<label for="lname">LAST NAME</label>
<input type="text" name="lname">
<label for="username">USERNAME</label>
<input type="text" name="username">
<labe>PASSWORD</label>
<input type="password" name = "password">
<button type="submit" name="signup">SIGN UP </button>
<p>Already have an account? <a href="index.php"> Log in </a> </p>
</form>
    </div>
</body>
</html>