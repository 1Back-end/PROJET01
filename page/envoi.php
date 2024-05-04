<?php
$name=$_POST["name"];
$message = $_POST["message"];
$subject=$_POST["subject"];
$email = $_POST["email"];



$message ='
Nom: '.$name.'<br>
Email: '.$email.'<br>
Sujet: '.$subject.'<br>
Message: '.$message.'<br>
';

require "PHPMailer/vendor/autoload.php";
require "PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail = new PHPMailer(true);
$mail->isSMTP();  
$mail->SMTPAuth   = true; 
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587; 
$mail->Username   = 'laurentalphonsewilfried@gmail.com';
$mail->Password   = 'rqak exlb rywc icdx';

$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress('dilanenguemzi23@gmail.com', 'Dylan Marc');
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = 'Préocupation de M. '.$name.'';
$mail->Body = $message;

$mail->send();
echo 'Message a été envoyer';