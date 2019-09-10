 <?php
$name=$_SESSION['name'];

 ?>   









    <!-- Header -->
    <div class="navbar  navbar-default navbar-fixed-top ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <?php if(isset($_SESSION['email'])) {?>
                <a class="navbar-brand" href="profile.php">Profile</a>
            <?php } ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                <li><a href = "profile.php"><span class = "glyphicon glyphicon-user"></span>
                <?php print_r('Hi '.$name); ?></a></li>
                <li><a href = "settings.php"><span class = "glyphicon glyphicon-wrench"></span>
                Settings</a></li>
                <li><a href = "home.php"><span class = "glyphicon glyphicon-comment"></span>
                Post</a></li>

                <li><a href = "logout.php"><span class = "glyphicon glyphicon-login"></span> Logout</a></li>
                <?php
                    } else {
                        ?>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>
                    Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>
                    Login</a></li>
                        <?php
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>  