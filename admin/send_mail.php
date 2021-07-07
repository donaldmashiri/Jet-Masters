<?php
// include phpmailer files
require 'phpmailer/PHPMailerAutoload.php';

// define name spaces 
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//create an instance of phpmailer
$mail= new PHPMailer();
//define smtp host
$mail->Host= "smtp.gmail.com";
//set port to connect smtp
$mail->Port="587";
//enable smtp aunthentication
$mail->SMTPAuth=true;
//set type of smtp encription
$mail->SMTPSecure ="tls";

//set mailer to use smtp
$mail->isSMTP();



//set gmail user
$mail->Username ="Chindekacanon@gmail.com";
// set gamil password
$mail->Password = "CanonKundai1996";
//set email subject
$mail->Subject ="testing my code";
//set sender mail
$mail->setFrom("Chindekacanon@gmail.com");
$mail->isHTML(true);
//set mail body
$mail->Body = "this mail body";
//add recipient
$mail->addAddress("donaldtondemashiri@gmail.com");
//finally sent asn email
$mail->Send();


?>