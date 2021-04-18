<?php
$email = $_POST["email"];
$lst = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM12345678901234567890';
$str = str_shuffle ($lst);
$p = mb_substr ($str , 0, 10);
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "To: <$email>\r\n";
$headers .= "From: admin \r\n";
$message = '
            <html>
            <head>
            <title>Подтвердите Email</title>
            </head>
            <body>
            <p>Что бы подтвердить Email, перейдите по <a href="http://example.com/confirmed.php?p=' . $p . '">ссылка</a></p>
            </body>
            </html>
            ';
mail($email, "Подтвердите Email на сайте", $message, $headers);
if (mail($email, "Подтвердите Email на сайте", $message, $headers)){
echo "Check your email";
}else{
echo "Unknown ERROR";}
?>
