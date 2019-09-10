<?php require './includes/common.php';?>

<?php


if(!isset($_SESSION['email']))
{
    header('Location:login.php');
}


?>
<?php $name=$_SESSION['name'];?>
<?php $email=$_SESSION['email'];?>

<?php

$sql = "SELECT `name`,`email`,`phone`,`dob`,`about` FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$col = array_keys($row);



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php include 'includes/header.php'; ?>
    <div id="content" style="margin-top: 100px;">
        <div class="container-fluid" id="content">
            <div class="row">
                    <div class="col-xs-12 col-md-8">
                         <div class="panel panel-primary" >
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead><th></th><th></th></thead>
                                    <tbody>
                                        <?php for ($i=0; $i <count($row) ; $i++) 
                                        { if($row[$col[$i]])
                                        	{?>
                                        <tr><td><?php echo ucfirst($col[$i]) ?></td><td><p><?php print_r($row[$col[$i]]); ?></p></td></tr>
                                    <?php } }; ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</html>