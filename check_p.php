<?php
$p = $_GET["p"];
$p_big = $_COOKIE["P"];
$email = $_COOKIE["Email"];
$connect = mysqli_connect("localhost", "root", "", "users-data") or die("No connection");
$query ="SELECT * FROM user";
$result = mysqli_query($connect, $query) or die("No connection");
if ($p === $p_big){
$sql = "UPDATE user SET status = True WHERE email = $email";
}
?>
