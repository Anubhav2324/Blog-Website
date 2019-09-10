<?php require_once('./includes/common.php'); ?>


<?php 	print_r($_POST) ?>
<?php //$cid=$commrow['cid']?>
<?php

	if(!isset($_POST['pid'])) {
		header("Location: home.php");

	} else {
		$cid = $_POST['cid'];
		$sql = "DELETE FROM `comments` WHERE `cid` = $cid";
		echo $sql;
		mysqli_query($conn,$sql);
		header("Location: home.php");
	 }

?>