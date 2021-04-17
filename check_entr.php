<?php

$login = $_POST['login'];
$password = $_POST['password'];

$connect = mysqli_connect("localhost", "root", "", "user") or die("No connection");
$query ="SELECT * FROM user";
$result = mysqli_query($connect, $query) or die("No connection");
$logins = "";
$passwords = "";
if($result)
{
    $rows = mysqli_num_rows($result);
    for ($i = 0 ; $i < ($rows) ; ++$i)
    {
    $row = mysqli_fetch_row($result);
    $logins .= $row[1];
    $passwords .= $row[2];
    $logins .= " ";
    $passwords .= " ";
    }
    }
$l_array = explode(" ", $logins);
$p_array = explode(" ", $passwords);
$l = array_search ($login, $l_array);
$p = array_search ($password, $p_array);
setcookie("Login", $login, time()+3600);
if (in_array($login, $l_array)) {
    if ($p !== false and $p === $l){
        setcookie("Login", $login);
        setcookie("Login", $login, time()+3600);
        setcookie("Login", $login, time()+3600, "/~rasmus/", "example.com", 1);
        header("Location: profile.php");
        exit();
    } else {
        echo "Incorrect login or password";
    }
} else {
    require("Entrance.php");
    echo "Incorrect login or password";}
?>
