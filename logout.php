<?php
session_start();
unset($name);
unset($email);
session_destroy();
header("location: index.php");
?>