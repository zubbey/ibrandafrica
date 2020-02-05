<?php

    function auto_responce() {
	$reply_back = $_POST["email"];
	$reply_subject = "ENROLLMENT FOR:"." ". $_POST["courses"];
	$reply_message = "Hello"." ".$_POST["fname"]." ".$_POST["lname"].","."\r\n"."Thank you for your interest in the"." ".$_POST["courses"]." "." iAcademy Programme."."\r\n"."
	We are very excited to learn about your issue and share information with you."."\r\n"."
	Our aim is to reply to all emails within 48 hours. At busy times this might take longer. Please be assured though that we are dealing with your request and will get back to you as soon as possible."."\r\n"."

	In the meantime, I encourage you to explore our website http://ibrandafrica.one/"."\r\n".
	"Warm regards,";
	mail($reply_back, $reply_subject, $reply_message);
    }

    $to = "registration@ibrandafrica.one";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $from = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    $about = $_POST['about'];
    $courses = $_POST['courses'];
    $country = $_POST['country'];
    $nationality = $_POST['nationality'];
    $state = $_POST['state'];


    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = $courses;

    $logo = "./img/iacademy_logo.png";
    $link = "www.ibrandiacademy.one";

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>iAcademy Enrollment</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt='iacademy logo'>iAcademy</a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Frist Name: </strong>{$fname}</td>";
	$body .= "<td style='border:none;'><strong>Last Name: </strong>{$lname}</td>";
	$body .= "<td style='border:none;'><strong>Email: </strong>{$from}</td>";
	$body .= "</tr>";
	$body .= "<td style='border:none;'><strong>Phone Number: </strong>{$phone}</td>";
	$body .= "<tr><td style='border:none;'><strong>Course:</strong>{$courses}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>Heard About Us: </strong>{$about}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>country: </strong>{$country}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>nationality: </strong>{$nationality}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>State: </strong>{$state}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'><strong>Comment: </strong>{$comments}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    if ($send = mail($to, $subject, $body, $headers)){
        auto_responce();
    };
?>