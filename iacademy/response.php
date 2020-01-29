<?php

require_once("config/config-db.php");


if((isset($_POST['fname'])&& $_POST['fname'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
{
	require_once("contact-mail.php");
	$courses = $conn->real_escape_string($_POST['courses']);
	$fname = $conn->real_escape_string($_POST['fname']);
	$lname = $conn->real_escape_string($_POST['lname']);
	$email = $conn->real_escape_string($_POST['email']);
	$phone = $conn->real_escape_string($_POST['phone']);
	$about = $conn->real_escape_string($_POST['about']);
	$country = $conn->real_escape_string($_POST['country']);
	$nationality = $conn->real_escape_string($_POST['nationality']);
	$state = $conn->real_escape_string($_POST['state']);
	$comments = $conn->real_escape_string($_POST['comments']);
    $session = $conn->real_escape_string($_POST['course_session']);


	$sql="INSERT INTO enrollment_form (courses, fname, lname, email, phone, about, country, nationality, state, comments, course_session) VALUES ('".$courses."','".$fname."', '".$lname."', '".$email."', '".$phone."','".$about."', '".$country."', '".$nationality."','".$state."','".$comments."','".$session."')";


	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}
	else
	{
		echo(
			"<div class='container'>
			<div class='row'>
			<div class='col'>
			<div class='alert alert-success p-4' style='position:fixed; z-index:9999; margin: 20%'>
			<button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
			×</button>
			<span class='glyphicon glyphicon-ok'></span> <strong>Congrats</strong>
			<hr class='message-inner-separator'>
			<p class='h3'>
				You have successfully enrolled for iAcademy Programme.
			</p>
			<hr class='message-inner-separator'>
			<div class='small'>
			<p>
				please check your email for confirmation in 5mins time.
			</p>
			</div>
			</div>
			</div>
			</div>
			</div>
			
			<div class='modelbox' id='Modal'></div>

			");

	}
}
else
{
	echo(
      "<div class='container'>
      <div class='row'>
      <div class='col'>
      <div class='alert alert-danger p-4 fixed'>
      <button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
      ×</button>
      <span class='glyphicon glyphicon-ok'></span> <strong>Could not submit your form</strong>
      <hr class='message-inner-separator'>
      
      <p class='h3'>
      		Something went wrong trying to submit the form.
      </p>
      <p>
      		Check you internet connection!.
      </p>

      </div>
      </div>
      </div>
      </div>
      
      <div class='modelbox' id='Modal'></div>

      ");
}

?>