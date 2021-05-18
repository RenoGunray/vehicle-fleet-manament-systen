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
    <div class="table-box"> <!--table box starts here-->
        <div class="table-box-title-bar">
            <p>All Routs</p>
            <a href="register-routs.php" class="cus-btn">Add Route</a>
        </div>
        <table class="tables"> <!--table displaying vehicle information-->
            <!--table headers-->
            <th>id</th>
            <th>Name</th>
            <th>Phone</th>
            <?php $sel = mysqli_query($conn, "select * from routs");?>

            <?php 
                while($row=mysqli_fetch_array($sel)) { //while loop: fetching vehicle information
                    $id = $row['r_id'];
                    $name = $row['r_name'];
                    $destination = $row['destination'];                    
            ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $destination; ?></td>
            </tr>
            <?php } //end while loop: fetching vehicle information ?>
        </table> <!--table displaying vehicle information-->
    </div><!--end table box-->

</div>
    
<!--END MAIN CONTAINER:: ALL THINGS CONTAINED-->

<!--js link-->
    <?php include 'includes/js.php' ?>
</body>
</html>