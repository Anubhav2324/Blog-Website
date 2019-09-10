<?php require './includes/common.php';?>

<?php


if(isset($_SESSION['email']))
{
    header('Location:profile.php');
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php include 'includes/header.php'; ?>
    <div id="content" style="margin-top: 100px;">
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container ">
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body"><br><img src="./images/banner.jpg" class="img-responsive" alt="Hello"><br></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <h2>SIGN UP</h2>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                             <div class="form-group">
                                <input class="form-control" placeholder="Phone" name="phone"  required = "true">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="e-mail" required = "true"><?php if(isset($_GET['m1'])){
                                    echo $_GET['m1'];
                                }; ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="date" placeholder="DOB" name="dob"  required = "true">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <?php
                                    if(isset($_GET['error'])) {echo $_GET['error'];}
                            ?>

                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>