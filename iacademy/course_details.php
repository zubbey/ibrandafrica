<?php
require("./components/menu.php");

if (isset($_GET['course_id'])){
    $_SESSION['course_id'] = $_GET['course_id'];

    $sql = "SELECT * FROM avaiable_courses WHERE course_id = '".$_SESSION['course_id']."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    while ($courseRow = mysqli_fetch_assoc($result)) {
        $_SESSION['course_name'] = $courseRow['course_name'];
        $_SESSION['course_image'] = $courseRow['course_img'];
        $_SESSION['course_amount'] = $courseRow['course_fee'];
        $_SESSION['course_loc'] = $courseRow['course_location'];
        $_SESSION['course_seat'] = $courseRow['number_of_seats'];
        $_SESSION['course_qfn'] = $courseRow['qualification'];
        $_SESSION['schedule '] = $courseRow['schedule_date'];
        $_SESSION['course_title'] = $courseRow['course_detail_title'];
        $_SESSION['course_intro'] = $courseRow['course_detail_intro'];
    }
}
else{
    unset($_SESSION['course_name']);
    unset($_SESSION['course_image']);
    unset($_SESSION['course_amount']);
    unset($_SESSION['course_loc']);
    unset($_SESSION['course_seat']);
    unset($_SESSION['course_qfn']);
    unset($_SESSION['schedule']);
    unset($_SESSION['course_title']);
    unset($_SESSION['course_intro']);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index#courses\">";
    exit();
}
?>

<!--================ Start Header Menu Area =================-->
<header class="header_area white-header">
    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink bg-white">
            <div class="container">
                <a class="navbar-brand" href="index">
                    <img class="logo-2" src="./img/iacademy_logo.png" width="127.76" height="48.73" alt="iAcademy logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item submenu dropdown">
                            <a style="display:inline; background: #00aabd;border:0;border-radius:10px" class="p-3 text-white nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses <i class="fas fa-sort-down"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <?php
                                $sql = "SELECT * FROM avaiable_courses";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                            <li class="nav-item">
                                                <a style="color:#00aabd;" class="nav-link coursenav" href="?course_id='.$row['course_id'].'">'.$row['course_name'].'</a>
                                            </li>
                                        ';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2><?php echo $_SESSION['course_name'];?></h2>
                        <span><?php echo $_SESSION['course_qfn']?></span>

                        <p>Full-Time, Weekend OR 2-Week Accelerated Training</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================ Start Course Details Area =================-->
<section class="course_details_area section_gap my-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image card card-hover">
                    <img id="courseImage" class="img-fluid card-img-top" src="./admin/uploads/<?php echo $_SESSION['course_image'];?>" alt="<?php echo $_SESSION['course_image'];?>" height="100">
                </div>
                <div class="content_wrapper my-lg-4">
                    <h4 class="title"><?php echo $_SESSION['course_title'];?></h4>
                    <div>
                        <p><?php echo $_SESSION['course_intro'];?></p>
                        <?php
                        $paraSql = "SELECT * FROM courses_paragraph WHERE course_id = '".$_SESSION['course_id']."'";
                        $result = mysqli_query($conn, $paraSql);
                        while ($paraRow = mysqli_fetch_assoc($result)) {
                            echo '
                            <p>
                                <strong>'.$paraRow['heading'].'</strong><br>
                                '.$paraRow['body'].'
                            </p>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex">
                            <p>Course Location</p>
                            <span class="or"><?php echo $_SESSION['course_loc'];?></span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Course Fee </p>
                            <span>₦<?php echo number_format($_SESSION['course_amount']);?></span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Number of Seats </p>
                            <span><?php echo $_SESSION['course_seat'];?></span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Schedule </p>
                            <span><?php echo $_SESSION['schedule '];?></span>
                        </a>
                    </li>
                </ul>
                <a onclick="location.assign('?enroll=true&course_id=<?php echo $_SESSION['course_id'];?>')" class="btn-primary btn btn-lg btn-block  w-100 border-0">Enroll the course</a>
                <a class="btn-primary btn btn-lg btn-block  w-100 border-0" data-toggle="modal" data-target="#schedulemodal">View Training Schedule</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!--================ End Course Details Area =================-->

<?php require_once'outline.php'; ?>

<!--================ Modal Start ===============-->
<?php require_once'form-modal.php'; ?>
<?php require_once'schedule-modal.php'; ?>
<!--==================== Modal End ================-->

<?php require_once'tawkto.php'; ?>
<!--================ Start footer Area  =================-->
<?php require ('./components/academy_footer.php');?>
