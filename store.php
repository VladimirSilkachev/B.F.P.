<?php session_start();
$connect = mysqli_connect("localhost", "root", "", "data") or die("No connection");
$query ="SELECT * FROM 	goods";
$result = mysqli_query($connect, $query) or die("No connection");
$id = $_SESSION['id'];
if (is_null($id)) {
    $id_arr = array(1,2,4);
    $id = array_flip($id_arr);
    for ($i=0; $i < count($id); $i++) {
        if (is_int($id[$i])){
            $id[$i]='2';
        }

    }
    while ((count($id) > count($id_arr))){
        array_pop($id);
    }
}
$flipped = array_flip($id);
$total_price = array();
$count = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Store</title>
    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="container">
    <div id="main">
        <form action="main.php" target="_blank">
            <button>To the shop</button></form>
        <h1>Product List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
<?php
while ($row=mysqli_fetch_array($result)): {
    if (in_array($row['id'], array_keys($id))) {?>
            <table>
            <tr>
                <td class="name"><?php echo $row['name']; ?></td>
                <td class="desc"><?php echo $row['description']; ?></td>
                <td class="price"><?php echo $row['price']; ?></td>
                    <td><div class="quantity">
                        <form action="plusminus.php" method="POST">
                            <input type="text" name="quantity" value="<?php echo $id[$row['id']] ?>" class="qty">
                            <?php $total_price[] = $row['price'] * $id[$row['id']] ?>
                            <input type="hidden"  name="id" value="<?php echo $row['id'] ?>" class="invisible">
                            <input type="submit" name='<?php echo $row['id'] ?>' value="&#10003;" class="minus" >
                        </form>
                    </div></td>
            </tr>
            </table>
        </table>
        <?php
    }}endwhile;
var_dump($id);?>

    </div>
    <div id="sidebar">
        <div>
            Delivery is carried out only in the localhost area, please write to the developers about the additional
            payment in other areas.
        <div>---------------</div>
        </div><?php echo 'Total price:', array_sum($total_price) ; ?></div>

</div>
<div class="row">
    <div class="col-75">
        <div class="container" >
            <form action="pay.php">

                <div class="row">
                    <div class="col-50">

                        <div class="col-50">
                            <h3>Pay order</h3>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name</label>
                            <input type="text" id="cname" name="cardname" placeholder="John Smith">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">valid for a month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">valid for a year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2021">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="111">
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="hidden"  name="id" value="<?php echo $id ?>" class="invisible">
                    <input type="hidden"  name="price" value="<?php echo array_sum($total_price) ?>" class="invisible">
                    <input type="submit" value="Continue" class="btn">
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>