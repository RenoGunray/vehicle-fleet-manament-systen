<?php
$name = $_SESSION['fname'] . ' ' . $_SESSION['lname']

?>
<nav>
    <div class="navigation">
        <div class="contain-log">
            <h4><a href="#">Logo</a></h4>
        </div>
        <span class="nav-lists">
            <a href="logout.php">log Out</a>
            <a href="registration.php">Register User</a>
            <p><?php echo $name; ?></p>
        </span>
    </div>
</nav>