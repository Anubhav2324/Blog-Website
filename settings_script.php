<?php require './includes/common.php';?>


<?php


if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}

?>
<?php $email=$_SESSION['email'];?>

<?php

    $id = $_SESSION['id'];

    if(isset($_POST['update'])) {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $phone = strip_tags($_POST['phone']);
        $dob = strip_tags($_POST['dob']);
        $about = strip_tags($_POST['about']);

        $name = mysqli_real_escape_string($conn,$name);
        $email = mysqli_real_escape_string($conn,$email);
        $phone = mysqli_real_escape_string($conn,$phone);
        $dob = mysqli_real_escape_string($conn,$dob);
        $about = mysqli_real_escape_string($conn,$about);
        $_SESSION['email'] = $email;
        
        $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`dob`='$dob',`about`='$about' WHERE `id` = '$id' ";


        mysqli_query($conn,$sql);    

        header("Location: profile.php");
    }
?>
