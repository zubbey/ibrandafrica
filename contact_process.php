<?php

 //    $to = "info@ibrandafrica.one";

 //    $name = $_REQUEST['name'];
 //    $from = $_REQUEST['email'];
 //    $number = $_REQUEST['number'];
 //    $message = $_REQUEST['message'];
 //    $service = $_REQUEST['subject'];


 //    $headers = "From: $from";
	// $headers = "From: " . $from . "\r\n";
	// $headers .= "Reply-To: ". $from . "\r\n";
	// $headers .= "MIME-Version: 1.0\r\n";
	// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

 //    $subject = $service;

 //    $logo = 'img/logo.png';
 //    $link = 'www.ibrandafrica.one';

	// $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	// $body .= "<table style='width: 100%;'>";
	// $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	// $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	// $body .= "</td></tr></thead><tbody><tr>";
	// $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	// $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	// $body .= "</tr>";
	// $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$service}</td></tr>";
	// $body .= "<tr><td></td></tr>";
	// $body .= "<tr><td colspan='2' style='border:none;'>{$message}</td></tr>";
	// $body .= "</tbody></table>";
	// $body .= "</body></html>";

 //    $send = mail($to, $subject, $body, $headers);
 //    header('Location: index.php?mailsend');
function auto_responce() {

	$reply_subject = "YOUR REQUEST FOR:"." ". $_POST["subject"];
	$reply_message = "Hello"." ".$_POST["name"].">\r\n"." Thank You for Contact iBarnd Africa.".">\r\n"."
	Our support reps will check your message and forward it to the best person when necessary. We'll get back to you within 48 hours.
	If your issue can't wait, you can also reach us through this number +2348021260000, +2348060265677.".">\r\n".
	"Warm regards,";
	mail($reply_back, $reply_subject, $reply_message);
}

$reply_back = $_POST["email"];
$toEmail = "info@ibrandafrica.one";
$mailHeaders = "From: " . $_POST["name"] . "<". $_POST["email"] .">\r\n";
if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
	auto_responce();
	echo(
			"<div class='container'>
			<div class='row'>
			<div class='col'>
			<div class='alert alert-success p-4' style='width:50%; position:fixed;z-index:9999;'>
			<button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
			×</button>
			<span class='glyphicon glyphicon-ok'></span> <strong>Success</strong>
			<hr class='message-inner-separator'>
			<p>
				Contact Mail Sent Successfully!.
			</p>
			<hr class='message-inner-separator'>
			</div>
			</div>
			</div>
			</div>
			");
} else {
	echo(
      "<div class='container'>
      <div class='row'>
      <div class='col'>
      <div class='alert alert-danger p-4' style='position:fixed;z-index:9999;'>
      <button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
      ×</button>
      <span class='glyphicon glyphicon-ok'></span> <strong>Error Sending Email</strong>
      <hr class='message-inner-separator'>
      
      <p>
      		Something went wrong while trying to connect to the mail server.
      </p>

      </div>
      </div>
      </div>
      </div>
      ");

}


?>