<?php require_once('./includes/common.php'); ?>


<?php 

if (!isset($_SESSION['email'])) 
{
    header('location:login.php');
}

?>

<?php $id = $_SESSION['id']; ?>
<?php $email = $_SESSION['email']; ?>
<?php $user_name = $_SESSION['name']; ?>

<?php

$sql = "SELECT * FROM `posts` WHERE 1 ORDER BY `pid` DESC";
$result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts | Home</title>
        <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
   		<body>
   			<?php include 'includes/header.php'; ?>
   		<div id="content" style="margin-top: 100px;">
   			<?php if($_SESSION['id'] == 10) 
   			{}
   			else{?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4><?php print_r('Hi '.$user_name." post your issue"); ?></h4>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="submitpost.php" method="POST">
                                	<div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Enter Title ...." name="title" required>
                                    </div>
 
                                    <div class="form-group">
                                        <textarea class="form-control" style="resize: none;" rows="3" placeholder="Enter your issue ...." name="userpost"></textarea>
                                    </div>
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">POST</button><br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p></p></div>
                        </div>
                    </div>
                </div>
           <?php }?>



<?php 

while($row = mysqli_fetch_array($result))
{

$qry = 'SELECT `name` FROM `users` WHERE `id` = '.$row['id'];
$res = mysqli_query($conn,$qry);
$name = mysqli_fetch_array($res);
$userName= $name['name'];
$pid = $row['pid'];

?>

                 <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4><?php echo 'Posted by '.$userName;?></h4>
                            </div>
                            <div class="panel-body">
                                <h3><?php echo $row['title']; ?></h3>
								<p><?php echo $row['post_data'];?></p>
                                <p style="float: right;"><?php echo $row['date']; ?></p>
                            </div>                         	
                            <div class="panel-footer">

                                <?php 
                                
                                $commsql = "SELECT * FROM `comments` WHERE pid = $pid";
                                $commresult = mysqli_query($conn,$commsql);
                                while($commrow=mysqli_fetch_assoc($commresult))
                                {
                                ?>
                                <div class="alert alert-primary" role="alert">
                                    <p><?php echo $commrow['com_data']; ?></p>
                                    <p style="float: right;">
                                        By: <?php echo $commrow['name']; ?>
                                    </p>
                                </div>
                                <?php }; ?>
                            
                           		<form role="form" action="comments.php" method="POST">
	                                <div class="form-group">
	                                     <input type="text" class="form-control"  placeholder="Enter your comments..." name="comment" required>
                                         <input type="hidden" name="pid" value="<?php echo "$pid" ?>">
	                                </div>
                                	<button type="submit" name="comm" value= "comm" class="btn btn-primary">Comment</button><br><br>
                                </form>
                            <?php //} ?>

                                    <?php 

                                        if($userName==$_SESSION['name'])
                                        {?>
                                    <form action="del_post.php" method="POST">
                                        <button name="pid" VALUE="<?php echo "$pid" ?>" class="btn btn-danger">DELETE</button> 
                                    </form></a>      
                                    <?php } ?>
                        	</div>
                        </div>
                    </div>
                </div>

<?php }; ?>
            </div>
        </div>
   	</body>
</html>



