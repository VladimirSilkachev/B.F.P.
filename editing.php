<?php
$connect = mysqli_connect("localhost", "root", "", "users-data") or die("No connection");
$query ="SELECT * FROM user";
$result = mysqli_query($connect, $query) or die("No connection");
$id = $_COOKIE["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<form>
   <p><select name="select" size="3" multiple>
    <option selected value="s1">Name</option>
    <option value="s2">Surname</option>
    <option value="s3">Date of birth</option>
    <option value="s4">Address</option>
   </select>
   <input type="submit" value="Enter"></p>
<?php
$opt = $_GET['select'];
if ($opt === "s1") {
?>
<div>
    <h3>Change name:</h3>
    <label for="name">Name</label>
    <input type="text" name="name">
</div>
<?php
}
$new_name = $_GET['name'];
$sql = "UPDATE `users-data` SET `name`= `$new_name` WHERE `users-data`.`id`=$id";

?>
<?php
if ($opt === "s2") {
?>
<div>
    <h3>Change surname:</h3>
    <label for="surname">Surname</label>
    <input type="text" name="surname">
</div>
<?php
}
$new_surname = $_GET['surname'];
$sql = "UPDATE `users-data` SET `surname`= `$new_surname` WHERE `users-data`.`id`=$id";
?>
<?php
if ($opt === "s3") {
?>
<div>
    <h3>Change birth:</h3>
        <label for="birth">Date of birth</label>
        <input type="text" name="birth">
    </div>
<?php
}
$new_birth = $_GET['birth'];
$sql = "UPDATE `users-data` SET `birth`= `$new_birth` WHERE `users-data`.`id`=$id";
?>
<?php
if ($opt === "s4") {
?>
<div>
    <h3>Change address:</h3>
    <label for="address">Name</label>
    <input type="text" name="address">
</div>
<?php
}
$new_address = $_GET['address'];
$sql = "UPDATE `users-data` SET `address`= `$new_address` WHERE `users-data`.`id`=$id";
?>



</form>
</body>
</html>
