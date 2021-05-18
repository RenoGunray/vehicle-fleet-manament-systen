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
            <p>All Vehicles</p>
            <a href="register-vehicle.php" class="cus-btn">Add Vehicle</a>
        </div>
        <table class="tables"> <!--table displaying vehicle information-->
            <!--table headers-->
            <th>id</th>
            <th>Name</th>
            <th>Model</th>
            <th>Serial #</th>
            <th>Type</th>
            <th>Capacity</th>
            <?php $sel = mysqli_query($conn, "select * from vehicles");?>

            <?php 
                while($row=mysqli_fetch_array($sel)) { //while loop: fetching vehicle information
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
            <?php } //end while loop: fetching vehicle information ?>
        </table> <!--table displaying vehicle information-->
    </div><!--end table box starts here-->


    <div class="table-box"> <!--table box starts here-->
        <div class="table-box-title-bar">
            <p>Assigned</p>
            <a href="#" class="cus-btn">Assign vehicle</a>
        </div>
        <table class="tables"> <!--table displaying vehicle information-->
            <!--table headers-->
            <th>id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Capacity</th>
            <th>Driver #</th>
            <th>Driver</th>
            <?php $sel = mysqli_query($conn, "select * from vehicles join assigned_vehicles where v_id=vehicle_id");?>

            <?php
                if(mysqli_num_rows($sel)==0) {
                    echo "<p class='text-danger'><strong>There are no vehicles assigned to drivers</strong></p>";
                }else{
                    while($row=mysqli_fetch_array($sel)) { //while loop: fetching vehicle information
                        $v_id = $row['v_id'];
                        $name = $row['name'];
                       // $model = $row['model'];
                       // $serial = $row['serialno'];
                        $type = $row['type'];
                        $capacity = $row['capacity'];
                        //$driver = $row['driver'];
                        $driver_id = $row['driver_id'];
            ?>

            <?php  
            $sel2 = mysqli_query($conn, "select * from drivers where dr_id='$driver_id'");
            while($row2=mysqli_fetch_array($sel2)){
                $driver_name = $row2['fname'].' '.$row2['lname'];
            ?>
            <tr>
            <td><?php echo $v_id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $type; ?></td>
            <td><?php echo $capacity; ?></td>
            <td><?php echo $driver_id; ?></td>
            <td><?php echo $driver_name; ?></td>
            </tr>
            <?php }//end while loop: fetching vehicle information
                    }//end else statement  
                        } ?>
        </table> <!--table displaying vehicle information-->
    </div><!--end table box starts here-->

    <div class="table-box"> <!--table box starts here-->
        <div class="table-box-title-bar">
            <p>Assigned</p>
            <a href="#" class="cus-btn">Assign vehicle</a>
        </div>
        <table class="tables"> <!--table displaying vehicle information-->
            <!--table headers-->
            <th>id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Capacity</th>
            <th>Driver #</th>
            <th>Driver</th>
            <?php $sel = mysqli_query($conn, "select * from vehicles join assigned_vehicles where v_id!=vehicle_id");?>

            <?php
                if(mysqli_num_rows($sel)==0) {
                    echo "<p class='text-danger'><strong>There are no vehicles assigned to drivers</strong></p>";
                }else{
                    while($row=mysqli_fetch_array($sel)) { //while loop: fetching vehicle information
                        $v_id = $row['v_id'];
                        $name = $row['name'];
                       // $model = $row['model'];
                       // $serial = $row['serialno'];
                        $type = $row['type'];
                        $capacity = $row['capacity'];
                        //$driver = $row['driver'];
                        //$driver_id = $row['driver_id'];
            ?>

            <?php  
            // $sel2 = mysqli_query($conn, "select * from drivers where dr_id='$driver_id'");
            // while($row2=mysqli_fetch_array($sel2)){
            //     $driver_name = $row2['fname'].' '.$row2['lname'];
            ?>
            <tr>
            <td><?php echo $v_id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $type; ?></td>
            <td><?php echo $capacity; ?></td>
            <td><?php// echo $driver_id; ?></td>
            <td><?php// echo $driver_name; ?></td>
            </tr>
            <?php }//end while loop: fetching vehicle information
                    }//end else statement  
                     ?>
        </table> <!--table displaying vehicle information-->
    </div><!--end table box starts here-->
    </div>
</div>
<!--END MAIN CONTAINER:: ALL THINGS CONTAINED-->

<!--js link-->
    <?php include 'includes/js.php' ?>
</body>
</html>