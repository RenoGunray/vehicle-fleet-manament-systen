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
            <form action="add-to-damaged.php" method="post">
                <div class="form-group">
                <lable>Vehicle</label>
                <select type="text" name="name" class="form-control">
                    <option value="<?php echo $car_id; ?>"><?php echo $car_name; ?></option>
                </select>
                </div>
                
                <div class="form-group">
                <lable>Model</label>
                <?php
                    $sel2 = mysqli_query($conn, "select * from vehicles where v_id='$car_id'");
                ?>
                <select type="text" name="model" class="form-control">
                <?php
                    while($row2=mysqli_fetch_array($sel2)) {
                        $model = $row2['model'];
                ?>
                    <option><?php echo $model; ?></option>
                <?php } ?>    
                </select>
                </div>

                <div class="form-group">
                <lable>Serial #</label>
                <?php
                    $sel3 = mysqli_query($conn, "select * from vehicles where v_id='$car_id'");
                ?>
                <select type="text" name="serial" class="form-control">
                <?php
                    while($row3=mysqli_fetch_array($sel3)) {
                        $serial = $row3['serialno'];
                ?>
                    <option><?php echo $serial; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="form-group">
                <lable>Type</label>
                <?php
                    $sel3 = mysqli_query($conn, "select * from vehicles where v_id='$car_id'");
                ?>
                <select type="text" name="type" class="form-control">
                <?php
                    while($row3=mysqli_fetch_array($sel3)) {
                        $type = $row3['type'];
                ?>
                    <option><?php echo $type; ?></option>
                <?php } ?>
                </select>
                </div>


                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="move" class="btn btn-info"> Move </button>
                </div>

                <?php
                if(isset($_POST['move'])) {
                    $reg = new MoveVehicles();
                    $reg->moveToDamaged();
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