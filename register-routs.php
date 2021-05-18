<?php
include 'classes.php';
include 'conn.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration || Routs</title>
    <!-- css link -->
    <?php include 'includes/css.php' ?>
</head>
<body>
<!-- Navigation Link -->
<?php include 'includes/navbar.php' ?>

    <!-- registration form -->
    <div class="container log-padding">
        <div class="card log-card-padd">
            <form action="register-routs.php" method="post">
                <div class="form-group">
                <lable>Road Name</label>
                <input type="text" name="road_name" class="form-control" placeholder="First Name">
                </div>

                <div class="form-group">
                <lable>Area</label>
                <input type="text" name="area" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                <lable>Destination</label>
                <input type="text" name="destination" class="form-control">
                </div>
                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="register" class="btn btn-info"> Register </button>
                </div>

                <?php
                if(isset($_POST['register'])) {
                    $reg = new Registration();
                    $reg->registerRout();
                }
                ?>
            </form>
        </div>
    </div>
    <!-- end registration form -->

    <!-- js link -->
    <?php include 'includes/js.php' ?>
</body>
</html>