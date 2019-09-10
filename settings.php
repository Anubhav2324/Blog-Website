<?php require './includes/common.php';?>

<?php

if (!isset($_SESSION['email'])) 
{
    header('location:login.php');


}
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php include 'includes/header.php'; ?>
    <div id="content" style="margin-top: 100px;">
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container ">

                    <div class="col-xs-12 col-md-8">
                         <div class="panel panel-primary" >
                            <div class="panel-body">
                                 <form  action="settings_script.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" required="True" value="<?php echo $row['name']?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="email" required="True" value="<?php echo $row['email']?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone" name="phone" value="<?php echo $row['phone']?>">
                                    </div>
                                    <div class="form-group">
                                        <input type = "Date" class="form-control" placeholder="Date of Birth" name="dob" value="<?php echo $row['dob']?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="About" name="about" value="<?php echo $row['about']?>">
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </form>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>