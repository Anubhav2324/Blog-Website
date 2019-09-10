<?php

if (isset($_SESSION['email'])) 
{
    header('location:profile.php');
}

require './includes/common.php';
$name=$_POST['name'];
$name = mysqli_real_escape_string($conn, $name);
$phone = $_POST['phone'];
$phone = mysqli_real_escape_string($conn, $phone);
$dob = $_POST['dob'];
$dob = mysqli_real_escape_string($conn,$dob);


$email=mysqli_real_escape_string($conn,$_POST['email']);

$password=sha1($_POST['password']);
$password = mysqli_real_escape_string($conn, $password);

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

$query="SELECT id FROM users WHERE users.email = '$email'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$total_rows = mysqli_num_rows($result);
if($total_rows>0){
	$error = "<span class='red'>Email already exists.</span>";
	header('location: signup.php?error=' . $error);
}else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: signup.php?m1=' . $m);
}else{
	$insert="INSERT INTO `users` (`name`, `email`, `password`,`phone`,`dob`) VALUES ('$name','$email','$password','$phone')";
	mysqli_query($conn,$insert) or die(mysqli_error($conn));

	$id=mysqli_insert_id($conn); 
	
	$_SESSION['email'] = $email;
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $name;
	header('Location:profile.php');	
}

?>