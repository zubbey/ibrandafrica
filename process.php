<?php
//Variable from the form

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = 'zuby@mailinator.com';
    $headers = 'From:'.$email;
    $txt = 'You have recieve an email form '.$name.''.$message;

    mail($mailTo, $subject, $txt, $headers);
    header('Location: index.php?mailsend');
}
// echo $subject . '<br/>';
// echo $name . '<br/>';
// echo $email . '<br/>';
// echo $number;
