<?php 
include 'classes.php';
include 'conn.php';
$name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
if(isset($name)){
    echo $name;
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
            <form action="assgn-driver.php" method="post">
                <div class="form-group">
                <label>Name</label>
                <?php $sel = mysqli_query($conn, "select v_id, name from vehicles");?>
                <!--select field diplaying vehicle names-->
                <select type="text" name="name" class="form-control">
                    <?php while ($rows1=mysqli_fetch_array($sel)) {
                        $name = $rows1['name'];
                        $v_id = $rows1['v_id'];
                     ?>
                    <option value="<?php echo $v_id; ?>" ><?php echo $name ?></option>
                    <?php } ?>
                </select>
                <!-- end select field diplaying vehicle names-->
                </div>

                <div class="form-group">
                <label>Model</label>
                <?php $sel2 = mysqli_query($conn, "select model from vehicles"); ?>
                <!--select field to display model number-->
                <select type="text" name="model" class="form-control">
                    <?php while ($row2=mysqli_fetch_array($sel2)) {
                        $model = $row2['model']; ?>
                    <option> <?php echo $model; ?> </option>
                    <?php } ?>
                </select>
                <!--end select field to display model number-->
                </div>

                <div class="form-group">
                <label>Serial Number</label>
                <?php $sel3 = mysqli_query($conn, "select serialno from vehicles"); ?>
                <select type="text" name="serial" class="form-control">
                    <?php while ($row3=mysqli_fetch_array($sel3)){
                        $serial = $row3['serialno']; ?>
                    <option><?php echo $serial ?></option>
                    <?php } ?>
                </select>
                </div>

                <div class="form-group">
                <label>Driver</label>
                <?php $sel4 = mysqli_query($conn, "select dr_id, fname, lname from drivers") ?>
                <Select type="text" name="driver" class="form-control">
                    <?php while ($row4=mysqli_fetch_array($sel4)) {
                        $id = $row4['dr_id'];
                        $fname = $row4['fname'];
                        $lname = $row4['lname']; ?>
                    <option value="<?php echo $id ?>"><?php echo $fname.' '.$lname; ?></option>
                    <?php } ?>
                </select>
                </div>

                <div class="form-group">
                    <!-- Temporarly link this will have to go inside the form-->
                    <button type="submit" name="assign" class="btn btn-info">Assign Driver</button>
                </div>
                <?php
                    if(isset($_POST['assign'])){
                        $reg = new Registration();
                        $reg->assignDriver();
                    }
                ?>
            </form>
            <a href="tpo-dash.php"><< Back</a>
        </div>
    </div>
    <!-- end registration form -->
    <?php include 'includes/js.php'?>
</body>
</html>
<?php } ?>