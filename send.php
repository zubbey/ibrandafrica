<?php

// require_once('PHPMailer/PHPMailerAutoload.php');

// $mail = new PHPMailer();
// // $mail->isSMTP();
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = 'ssl';
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = '465';
// $mail->Username = 'zubyinnocent@gmail.com';
// $mail->Password = 'Inno070687';
// $mail->SetFrom('zubyinnocent@outlook.com');
// $mail->Subject = 'Hello World!';
// $mail->Body = 'Testing the gmail function with PHPMailer!';
// $mail->AddAddress('com.zubbey@hotmail.com');

// $mail->Send();


// mail("zubyinnocent@gmail.com","Success","Send mail from localhost using PHP");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'PHPMailer/PHPMailerAutoload.php';
// include_path('PHPMailer/get_oauth_token.php');

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();         
$mail->SMTPDebug = 2;                             // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Host = 'ssl';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zubyinnocent@gmail.com';                 // SMTP username
$mail->Password = 'Inno070687';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('zubyinnocent@gmail.com', 'ibrandafrica');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message not sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}?>