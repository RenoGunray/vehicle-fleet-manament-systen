<?php 
include 'classes.php';
$name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
if(isset($name)){
    echo $name;
    if(isset($_POST['register'])){
        $reg = new Registration();
        $reg->registerVehicle();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles dashboard</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <!-- registration form -->
    <div class="container log-padding">
        <div class="card log-card-padd">
            <form action="vehicles.php" method="post">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" placeholder="Model">
                </div>

                <div class="form-group">
                <label>Serial Number</label>
                <input type="text" name="serial" class="form-control" placeholder="Serial Number">
                </div>

                <div class="form-group">
                <label>Type</label>
                <Select type="text" name="type" class="form-control">
                    <option></option>
                    <option>Saloon Car</option>
                    <option>Box Body</option>
                    <option>Tractor</option>
                    <option>Motor Cycle</option>
                </select>
                </div>

                <div class="form-group">
                <label>Capacity</label>
                <select type="text" name="capacity" class="form-control">
                    <option></option>
                    <option>One Tone</option>
                    <option>Two Tone</option>
                    <option>Three Tone</option>
                    <option>Four Tone</option>
                </select>
                </div>

                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="register" class="btn btn-info"> Register </button>
                </div>
            </form>
            <a href="tpo-dash.php"><< Back</a>
        </div>
    </div>
    <!-- end registration form -->
    <?php include 'includes/js.php'?>
</body>
</html>