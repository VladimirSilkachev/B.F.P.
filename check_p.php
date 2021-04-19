<?php
$p = $_GET["p"];
$p_big = $_COOKIE["P"];
$email = $_COOKIE["Email"];
echo $email;
$connect = mysqli_connect("localhost", "root", "", "user") or die("No connection");
if ($p === $p_big){
$sql = "UPDATE `user` SET `status` = 'True' WHERE `user`.`email` = '$email'";
$table = mysqli_query($connect, $sql);
}
?>
