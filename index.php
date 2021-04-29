<?php
    include 'classes.php';

    if(isset($_POST['login'])) {
        $logs = new Login();
        if($logs->logDriver()){
            echo "<p class='text-success'><strong>Driver Logged in successful</strong></p>";
        }
        if($logs->logTpo()){
            echo "<p class='text-success'><strong>Transport Officer Logged in successful</strong></p>";
        }
        if($logs->logAdmin()){
            echo "<p class='text-success'><strong>Admin Logged in successful</strong></p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- css links -->
    <?php include('includes/css.php'); ?>
</head>
<body>
    <!-- log in form -->
    <div class="container log-padding">
        <div class="intro text-center">
            <div class="logo">
                <img src="images/wp2697859-sum-41-hd-wallpaper.jpg">
            </div>
            <div class="titles">
                <h4>Speed Curier</h4>
                <hr>
                <h3>Vehicle Fleet Management System</h3>
            </div>
        </div>
        <div class="log-card-padd">
        <center>
            <fieldset class="field-set redo-field"><legend class="field-set">Log In</legend>
            <form action="index.php" method="post">
                <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="password">
                </div>

                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-info form-control"> Log In </button>
                </div>
            </form>
            </fieldset>
            </center>
        </div>
    </div>
    <!-- end log in form -->

    <!-- js links -->
    <?php include('includes/js.php'); ?>  
</body>
</html>