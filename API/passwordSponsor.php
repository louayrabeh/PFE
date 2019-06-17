<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$email= $_GET["emailSpons"];
$query = "SELECT * from sponsor where emailSpons like '".$email."';";


$result = mysqli_query($connect,$query);
//$response=array();
$send="";

if (mysqli_num_rows($result) > 0){
    $code=substr(md5(rand()), 0, 6);
    $send.="<div style='font-family:caviar dreams;text-align:center'><h1><b>Confirmation email</b></h1>
    <p>The code <b class='code'>".$code."</b></p></div>";
/*    $query1="INSERT INTO codeconf(code)values('$code')";
    mysqli_query($connect,$query1);*/
}/*
else
{
 $send.= "we failed to send an email to to the given email, please send a valid email";
}*/
$mail = new PHPMailer(true);
   try {
       $mail->SMTPDebug = 2;
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'peakyblinders2im8@gmail.com';
       $mail->Password = 'isamm2017';
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
       $mail->setFrom('peakyblinders2im8@gmail.com');
       $mail->addAddress("$email");
       $mail->isHTML(true);
       $mail->Subject = 'Confirmation email';
       $mail->Body    = $send;
       $mail->send();
       echo 'Message has been sent';
       $query1="INSERT INTO codeconf(code)values('$code')";
    mysqli_query($connect,$query1);
   } catch (Exception $e) {
       echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   }
mysqli_close($connect);

?>