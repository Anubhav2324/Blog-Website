<?php require_once('./includes/common.php'); ?>


<?php 

if (!isset($_SESSION['email'])) 
{
    header('location:login.php');
}

if (!isset($_POST['comm'])) 
{
    header('location:home.php');
}

$id = $_SESSION['id'];
$pid = $_POST['pid'];
$data = $_POST['comment'];
$name = $_SESSION['name'];

$sql = "INSERT INTO `comments` (`id`,`pid`,`com_data`,`name`) VALUES ($id,$pid,'$data','$name')";
echo $sql;
mysqli_query($conn,$sql);

header('location:home.php');

 ?>