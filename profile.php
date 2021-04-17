<?php
$connect = mysqli_connect("localhost", "root", "", "user") or die("No connection");
$query ="SELECT * FROM user";
$result = mysqli_query($connect, $query) or die("No connection");
echo "WELCOME, ";
$login = $_COOKIE["Login"];
echo $login;
if($result)
{
    $rows = mysqli_num_rows($result);
    for ($i = 0 ; $i < ($rows) ; ++$i)
    {
    $row = mysqli_fetch_row($result);
    if ($row[1] === $login){
    $info = array($row[3], $row[4], $row[5], $row[6], $row[7], $row[8]); // массив с данными профиля
    }
    }
    }
?>
