<?php
require_once ("./config/config-db.php");
require_once ("./controller/auth_controller.php");

//GET VISTORS
$user_ip = $_SERVER['REMOTE_ADDR'];
$check_ip = mysqli_query($conn, "SELECT userip FROM visitors WHERE page='homepage' and userip='$user_ip'");
if(mysqli_num_rows($check_ip)>=1)
{
    //not unique user
}
else
{
    $insertview = mysqli_query($conn, "INSERT INTO visitors (page, userip) VALUE ('homepage','$user_ip')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ibrand Academy">
    <meta name="author" content="Innocent Wanyanwu">

    <title>iAcademy&trade; </title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" href="img/logoicon.png" type="image/png">

    <link rel="stylesheet" href="../css/magnific.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/outline.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
<!--    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />-->
<!--    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Table style -->
    <link rel="stylesheet" href="css/tablestyle.css" />

    <link href="css/custom.css" rel="stylesheet">

</head>
<body id="page-top">