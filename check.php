<?php
$check = $_COOKIE["enter"];
if ($check !== '1') {
    header ('Location: Entrance.php');
    exit();
    }
?>
