<?php
$local = "localhost";
$user = "root";
$password = "";

$db = "vehicle";

$conn = mysqli_connect($local, $user, $password, $db);

if(!$conn) {
    echo "<p class='text-danger'>Sorry. An error occured while trying to connect to database</p>";
}

?>