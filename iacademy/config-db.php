<?php


$host = "localhost";
$userName = "ibrandafricaDB";
$password = "mangoboy1987@@@";
$dbName = "ibrandafrica";

// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}else{
	// echo(
	// 		"<div class='container'>
	// 		<div class='row'>
	// 		<div class='col'>
	// 		<div class='alert alert-success p-4' style='width:50%; position:fixed;z-index:9999;'>
	// 		<button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
	// 		×</button>
	// 		<span class='glyphicon glyphicon-ok'></span> <strong>Success</strong>
	// 		<hr class='message-inner-separator'>
	// 		<p>
	// 			New record successfully added!.
	// 		</p>
	// 		<hr class='message-inner-separator'>
	// 		</div>
	// 		</div>
	// 		</div>
	// 		</div>
	// 		");}
}
?>
