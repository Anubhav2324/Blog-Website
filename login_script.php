<?php
require './includes/common.php';

$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=sha1($_POST['password']);
$password = mysqli_real_escape_string($conn, $password);

$query = "SELECT id,email,name FROM `registration`.users WHERE `email` = '$email' and `password` = '$password'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$total_rows = mysqli_num_rows($result);
if($total_rows == 0){
	$error = "<span class='red'>Please enter correct E-mail id and Password</span>";
	header('location: login.php?error=' . $error);
}else{
	$row = mysqli_fetch_array($result);
	$_SESSION['email'] = $row['email'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	header('Location:profile.php');
}
?>