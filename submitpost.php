<?php require_once('./includes/common.php'); ?>

<?php 

if (!isset($_SESSION['email'])) 
{
    header('location:login.php');
}
else
{
	if (!isset($_POST['submit'])) 
	{
	    header('location:home.php');
	}
}

?>

<?php 


$title = $_POST['title'];
$userpost = $_POST['userpost'];
$id = $_SESSION['id'];

?>


<?php 
	
$sql = "INSERT INTO `posts` (`id`,`title`,`post_data`)
VALUES ('$id','$title','$userpost');";

$result = mysqli_query($conn,$sql);

$pid = mysqli_insert_id($conn);

header('location:home.php');

?>
