<?php
include 'classes.php';
include 'conn.php';

$car_id = $_GET['id'];
$car_name = $_GET['name'];

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
            <form action="move-to-location.php" method="post">
                <div class="form-group">
                <lable>Name</label>
                <?php
                    $sel = mysqli_query($conn, "select * from locations");
                ?>
                <select type="text" name="name" class="form-control">
                    <?php 
                        while ($row=mysqli_fetch_array($sel)) {
                            $id = $row['l_id'];
                            $name = $row['l_name']; 
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php } ?>
                </select>
                </div>

                <div class="form-group">
                <lable>Area</label>
                <?php
                    $sel2 = mysqli_query($conn, "select * from locations");
                ?>
                <select type="text" name="area" class="form-control">
                <?php
                    while($row2=mysqli_fetch_array($sel2)) {
                        $area = $row2['l_area'];
                ?>
                    <option><?php echo $area; ?></option>
                <?php } ?>    
                </select>
                </div>

                <div class="form-group">
                <lable>District</label>
                <?php
                    $sel3 = mysqli_query($conn, "select * from locations");
                ?>
                <select type="text" name="district" class="form-control">
                <?php
                    while($row3=mysqli_fetch_array($sel3)) {
                        $district = $row3['district'];
                ?>
                    <option><?php echo $district; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="form-group">
                <lable>Vehicle</label>
                <select type="text" name="v-name" class="form-control">
                    <option value="<?php echo $car_id; ?>"><?php echo $car_name; ?></option>
                </select>
                </div>

                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="move" class="btn btn-info"> Move </button>
                </div>

                <?php
                if(isset($_POST['move'])) {
                    $reg = new MoveVehicles();
                    $reg->moveToLocation();
                    header("location: vehicles.php");
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