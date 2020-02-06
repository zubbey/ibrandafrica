<?php
require_once ("../config/config-db.php");
require_once ("../controller/auth_controller.php");

if(!isset($_SESSION['admin_session'])){
    header("Location: ./");
    exit();
}

if (isset($_SESSION['loginlog'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['loginlog']."')");
    if ($sql){
        unset($_SESSION['loginlog']);
    }
}
if (isset($_SESSION['newLogin'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['newLogin']."')");
    if ($sql){
        unset($_SESSION['newLogin']);
    }
}
if (isset($_SESSION['courseAdded'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['courseAdded']."')");
    if ($sql){
        unset($_SESSION['courseAdded']);
    }
}
if (isset($_SESSION['courseUpdated'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['courseUpdated']."')");
    if ($sql){
        unset($_SESSION['courseUpdated']);
    }
}
if (isset($_SESSION['courseDeleted'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['courseDeleted']."')");
    if ($sql){
        unset($_SESSION['courseDeleted']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
</head>

<body class="body">
<div id="result"></div>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="./assets/img/<?php echo $_SESSION['username']?>.png">
                </div>
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                <?php echo $_SESSION['username']?>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="dashboard">
                    <a href="./dashboard">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="registered">
                    <a href="./registered">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Registered Users</p>
                    </a>
                </li>
                <li class="task">
                    <a href="./task">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>Tasks</p>
                    </a>
                </li>
                <li class="profile">
                    <a href="./profile">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Admin Profile</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="?logout=true">
                        <i class="nc-icon nc-key-25"></i>
                        <p>Sign out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="./"><img id="logo" src="../img/iacademy_logo.png" height="48" alt="iAcademy logo"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="#pablo">
                                <i class="nc-icon nc-layout-11"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li id="logs" class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <?php
                                if ($_SESSION['username'] === "thankgod"){
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS totallogs FROM system_logs WHERE log_msg NOT LIKE 'Thankgod%'");
                                } elseif ($_SESSION['username'] === "cachy"){
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS totallogs FROM system_logs WHERE log_msg NOT LIKE 'Ginikachi%'");
                                } elseif ($_SESSION['username'] === "ernest"){
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS totallogs FROM system_logs WHERE log_msg NOT LIKE 'Ernest%'");
                                } elseif ($_SESSION['username'] === "zubbey"){
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS totallogs FROM system_logs WHERE log_msg NOT LIKE 'Zubbey%'");
                                }
                                $row = mysqli_fetch_array($result);
                                $total = $row['totallogs']; //use alias
                                        echo "<p><span class=\"badge badge-pill badge-danger\">".$total."</span></p>";
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                if ($_SESSION['username'] === "thankgod"){
                                    $selectLog = mysqli_query($conn, "SELECT * FROM system_logs WHERE log_msg NOT LIKE 'Thankgod%' order by id DESC");
                                } elseif ($_SESSION['username'] === "cachy"){
                                    $selectLog = mysqli_query($conn, "SELECT * FROM system_logs WHERE log_msg NOT LIKE 'Ginikachi%' order by id DESC");
                                } elseif ($_SESSION['username'] === "ernest"){
                                    $selectLog = mysqli_query($conn, "SELECT * FROM system_logs WHERE log_msg NOT LIKE 'Ernest%' order by id DESC");
                                } elseif ($_SESSION['username'] === "zubbey"){
                                    $selectLog = mysqli_query($conn, "SELECT * FROM system_logs WHERE log_msg NOT LIKE 'Zubbey%' order by id DESC");
                                }
                                    if (mysqli_num_rows($selectLog) > 0){
                                        while ($logs = mysqli_fetch_assoc($selectLog)){
                                            echo '
                                            <div class="d-flex justify-content-between">
                                                <a class="dropdown-item" href="?logid='.$logs['id'].'" >'.$logs['log_msg'].'</a>
                                                <button onclick="location.assign(\'?logid='.$logs['id'].'\')" type="button" class="px-3 close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="#pablo">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->