<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$to = 'help@dm-development.kz';

$name = $_POST['name'];
$phone = $_POST['phone'];
$question = $_POST['question'];

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

$headers = 'Content-type: text/html; charset=iso-8859-1'. "\r\n" .'From: <info@akh.kz>';
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