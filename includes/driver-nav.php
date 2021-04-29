<?php
$name = $_SESSION['fname'] . ' ' . $_SESSION['lname']

?>
<nav>
    <div class="navigation">
        <div class="contain-log">
            <h4><a href="#">Logo</a></h4>
        </div>
        <div class="nav-lists">
            <a href="logout.php">log Out</a>
            <p><?php echo $name; ?></p>
        </div>
    </div>
</nav>