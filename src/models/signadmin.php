
<?php
include_once '../models/dbConnection.php';
$ref = @$_GET['q'];
//$name = $_POST['name'];
//$name= ucwords(strtolower($name));
//$gender = $_POST['gender'];
$email = $_POST['email'];

$password = $_POST['password'];



$q = mysqli_query($con, "INSERT INTO admin VALUES  ('$email' , '$password' , 'admin')");


header("location:../index.php?q=Succesfully registered");


?>