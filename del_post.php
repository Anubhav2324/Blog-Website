<?php require_once('./includes/common.php'); ?>


<?php 	//print_r($_POST) ?>

<?php

	if(!isset($_POST['pid'])) {
		header("Location: home.php");

	} else {
		$pid = $_POST['pid'];
		$sql = "DELETE FROM `posts` WHERE `pid` = $pid";
		$sql2 = "DELETE FROM `comments` WHERE `pid` = $pid";

		echo $sql;
		echo $sql2;
		mysqli_query($conn,$sql);
		mysqli_query($conn,$sql2);
		header("Location: home.php");
	 }

?>