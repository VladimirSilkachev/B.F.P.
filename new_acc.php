<?php

$login = $_POST["login"];
$password = $_POST["password"];
$status = "FALSE";
$name = $_POST["name"];
$surname = $_POST["surname"];
$birth = $_POST["birth"];
$address = $_POST["address"];
$sex = $_POST["sex"];




$connect = mysqli_connect("localhost", "root", "", "users-data") or die("No connection");
$write = "INSERT INTO `user` (`id`, `login`, `password`, `status`, `name`, `surname`, `birth`, `address`, `sex`, `$email`)
 VALUES (NULL, '$login', '$password', '$status', '$name', '$surname', '$birth', '$address', '$sex', '$email')";
$table = mysqli_query($connect, $write);

echo "Registration completed successfully";

php?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<a href="main.php">Go to back</a>

</body>
</html>
