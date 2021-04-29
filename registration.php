<?php
include 'classes.php';
include 'conn.php';

if(isset($_POST['register'])) {
    $reg = new Registration();
    $reg->regDriver();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- css link -->
    <?php include 'includes/css.php' ?>
</head>
<body>
<!-- Navigation Link -->
<?php include 'includes/navbar.php' ?>

    <!-- registration form -->
    <div class="container log-padding">
        <div class="card log-card-padd">
            <form action="registration.php" method="post">
                <div class="form-group">
                <lable>First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="First Name">
                </div>

                <div class="form-group">
                <lable>Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Last Name">
                </div>

                <div class="form-group">
                <lable>Ocupation</label>
                <Select type="text" name="ocupation" class="form-control">
                    <option></option>
                    <option>Transport Officer</option>
                    <option>Admin</option>
                    <option>Driver</option>
                </select>
                </div>

                <div class="form-group">
                <lable>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                <lable>Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Phone NUmber">
                </div>

                <div class="form-group">
                <lable>Date Of Birth</label>
                <input type="date" name="dob" class="form-control">
                </div>

                <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="password">
                </div>

                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="register" class="btn btn-info"> Register </button>
                </div>
            </form>
        </div>
    </div>
    <!-- end registration form -->

    <!-- js link -->
    <?php include 'includes/js.php' ?>
</body>
</html>