<?php
function autoReply($email, $fname, $lname, $course){
    $to = 'registration@ibrandafrica.one';
    $subject = 'iBrand Academy Enrollment System';
    $from = $email;

// To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
    $admin = "com.zubbey@hotmail.com";
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'CC: '.$admin."\r\n" .
        'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h1>Hello '.$fname.' '.$lname.', </h1>';
    $message .= 'We are existed to have you on board! you have enrolled for '.$course.' at iBrand Academy Training Programme."."\r\n"."
	you can always reach us at registration@ibrandafrica.one or call our hotline @( 08021260000, 08037478593 )."."\r\n"."
	Our aim is to reply to all emails within 48 hours. At busy times this might take longer. Please be assured though that we are dealing with your request and will get back to you as soon as possible."."\r\n"."
';
    $message .= '</body></html>';

// Sending email
    mail($to, $subject, $message, $headers);
}
?>