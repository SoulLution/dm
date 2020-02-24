<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$to = 'faun1605@gmail.com';

$name = $_POST['name'];
$phone = $_POST['phone'];

$subject = 'Заявка с сайта DM.kz';

$message = '
<html>
<head>
  <title>Заявка с сайта <a href="http://dm-development.kz/">DM Development</a></title>
</head>
<body>
  <p>ФИО: '.$name.'</p>
  <p>Телефон:'.$phone.'</p>
</body>
</html>
';

$headers = 'Content-type: text/html; charset=iso-8859-1'. "\r\n" .'From: <help@dm-development.kzz>';
mail($to, $subject, $message);
if(mail($to, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>