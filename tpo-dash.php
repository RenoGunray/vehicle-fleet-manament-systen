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
    <title>Transport Officer Dashboard</title>
    <!--css link-->
    <?php include 'includes/css.php'; ?>
</head>
<body>
<!--tpo navigation link-->
<?php include 'includes/tpo-nav.php' ?>

<!--MAIN CONTAINER:: ALL THINGS CONTAINED-->
<div class="container-fluid all-things-contained">
    <p>Transport Officer</p>
    <nav class="tpo-nav-header">
        <div class="tpo-nav-items">
            <a href="tpo-dash.php">Dashboard</a>
            <a href="vehicles.php">Vehicles</a>
            <a href="drivers.php">Drivers</a>
            <a href="reports.php">Reports</a>
            <a href="routs.php">Routs</a>
            <a href="locations.php">Locations</a>
        </div>
    </nav>
    <div class="container">
        <p>Vehicle List</p>
        <table class="tables">
            <th>id</th>
            <th>Name</th>
            <th>Model</th>
            <th>Serial #</th>
            <th>Type</th>
            <th>Capacity</th>
            <?php $sel = mysqli_query($conn, "select * from vehicles");?>

            <?php 
                while($row=mysqli_fetch_array($sel)) {
                    $v_id = $row['v_id'];
                    $name = $row['name'];
                    $model = $row['model'];
                    $serial = $row['serialno'];
                    $type = $row['type'];
                    $capacity = $row['capacity'];
            ?>
            <tr>
            <td><?php echo $v_id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $model; ?></td>
            <td><?php echo $serial; ?></td>
            <td><?php echo $type; ?></td>
            <td><?php echo $capacity; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<!--END MAIN CONTAINER:: ALL THINGS CONTAINED-->

<!--js link-->
    <?php include 'includes/js.php' ?>
</body>
</html>