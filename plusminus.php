<?php
session_start();

if (isset($_SESSION['id'])) {
    $c = $_SESSION['id'];
}
else {
    $c = array(1,2,4);
}

if (is_null($_SESSION['info'])) {
    $id_new = array_flip($c);
    $_SESSION['info'] = 1;

}
else {
    $id_new  = $c;
}

for ($i=0; $i < count($id_new); $i++) {
    if (is_null($id_new[$i])){
        unset($id_new[$i]);
    }
}
 if (in_array($_POST["id"], array_keys($id_new))) {

     $id_new[$_POST["id"]] = (integer)$_POST['quantity'];
     if ((integer)$_POST['quantity'] == 0) {
         unset($id_new[$_POST["id"]]);
}
 }

$_SESSION['id'] = $id_new;

header('location: store.php');