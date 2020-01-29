<?php
// AUTH CONTROLLER FOR BACKEND
session_start();
// last request was more than 30 minutes ago
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    $id = $_SESSION['id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET `lastAction` = '$time' WHERE `lastAction` = NOW() - 1800");
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: ?login=0&time=inactive");
    exit();
}$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
//admin login
// initializing variables
$errors =  array();
$username= "";

$course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
$course_location = mysqli_real_escape_string($conn, $_POST['course_location']);
$course_fee = mysqli_real_escape_string($conn, $_POST['course_fee']);
$no_seats = mysqli_real_escape_string($conn, $_POST['number_of_seats']);
$schedule = mysqli_real_escape_string($conn, $_POST['schedule_date']);
$detail_title = mysqli_real_escape_string($conn, $_POST['course_detail_title']);
$detail_intro = mysqli_real_escape_string($conn, $_POST['course_detail_intro']);

if (isset($_POST['add_course_btn'])){

    if (empty($course_name)) {
        $errors['course_error'] = "Course name is required!";
        header("Location: ?add=true&course_error=".$errors['course_error']."&course_name=".$course_name."&course_location=".$course_location."&course_amount=".$course_fee);
    }if (empty($course_location)) {
        $errors['location_error'] = "Course location is required!";
        header("Location: ?add=true&location_error=".$errors['location_error']."&course_location=".$course_location."&course_name=".$course_name."&course_amount=".$course_fee);
    }if (empty($course_fee)) {
        $errors['fee_error'] = "Course Amount is required!";
        header("Location: ?add=true&fee_error=".$errors['fee_error']."&course_amount=".$course_fee."&course_name=".$course_name."&course_location=".$course_location);
    }
    if (count($errors) == 0) {
        $date = date("Y-m-d");
        $query = "INSERT INTO avaiable_courses (course_name, course_location, course_fee, number_of_seats, schedule_date, course_detail_title, course_detail_intro) VALUES('$course_name', '$course_location', '$course_fee', '$no_seats', '$schedule', '$detail_title', '$detail_intro')";
        $result = mysqli_query($conn, $query);
        if($result){

            $selectQuery = mysqli_query($conn, "SELECT course_id FROM avaiable_courses WHERE course_name = '$course_name'");
            $course = mysqli_fetch_assoc($selectQuery);

            if ($course > 0){
                //    add to course_paragraph & course_outline if not empty
                $course_id = $course['course_id'];
                if (!empty($_POST['heading']) && !empty($_POST['body'])){
                    $query = "INSERT INTO courses_paragraph (course_id, heading, body) VALUES ";
                    foreach($_POST['heading'] as $i => $name)
                    {
                        // Get values from post.
                        $paragraph_heading = mysqli_real_escape_string($conn, $name);
                        $paragraph_body = mysqli_real_escape_string($conn, $_POST['body'][$i]);

                        // Add to database
                        $query = $query." ('$course_id', '$paragraph_heading', '$paragraph_body') ,";
                    }
                    $query = substr($query,0,-1); //remove last char
                    $result = mysqli_query($conn, $query);
                }
                if (!empty($_POST['heading2']) && !empty($_POST['body2'])){
                    $query = "INSERT INTO courses_outline (course_id, heading, body) VALUES ";
                    foreach($_POST['heading2'] as $i => $name)
                    {
                        // Get values from post.
                        $outline_heading = mysqli_real_escape_string($conn, $name);
                        $outline_body = mysqli_real_escape_string($conn, $_POST['body2'][$i]);

                        // Add to database
                        $query = $query." ('$course_id', '$outline_heading', '$outline_body') ,";
                    }
                    $query = substr($query,0,-1); //remove last char
                    $result = mysqli_query($conn, $query);
                }
                header("Location: ?success=courseCreated");
                exit();
            } else{
                header("Location: ?error=nodataFound");
                exit();
            }
        } else {
            header("Location: ?error=couldnotCreate");
            exit();
        }
    }

}


//Edit Courses

if (isset($_POST['edit_course_btn'])){
    if (empty($course_location)) {
        $errors['location_error'] = "Course location is required!";
        header("Location: ?add=true&location_error=".$errors['location_error']."&course_location=".$course_location."&course_name=".$course_name."&course_amount=".$course_fee);
    }if (empty($course_fee)) {
        $errors['fee_error'] = "Course Amount is required!";
        header("Location: ?add=true&fee_error=".$errors['fee_error']."&course_amount=".$course_fee."&course_name=".$course_name."&course_location=".$course_location);
    }
    if (count($errors) == 0) {
        $editid = $_GET['edit_id'];
        $date = date("Y-m-d");
        $updateQuery = "UPDATE avaiable_courses SET course_location = '$course_location', course_fee = '$course_fee', number_of_seats = '$no_seats', schedule_date = '$schedule', course_detail_title = '$detail_title', course_detail_intro = '$detail_intro' WHERE course_id = '$editid'";
        $result = mysqli_query($conn, $updateQuery);
        if ($result) {
//                Update course Paragraph
            $updateparagragh = "UPDATE courses_paragraph SET heading =";
            foreach ($_POST['heading'] as $i => $name) {
                // Get values from post.
                $heading = mysqli_real_escape_string($conn, $name);
                $body = mysqli_real_escape_string($conn, $_POST['heading'][$i]);

                // Add to database
                $updateparagragh = $query . " '$heading' WHERE course_id = '$editid'";
            }
            $updateparagragh = substr($updateparagragh, 0, -1); //remove last char
            $result = mysqli_query($conn, $updateparagragh);

//                Update Course Outline

            $updateoutline = "UPDATE courses_outline SET heading = , body = ";
            foreach ($_POST['heading2'] as $i => $name) {
                // Get values from post.
                $heading2 = mysqli_real_escape_string($conn, $name);
                $body2 = mysqli_real_escape_string($conn, $_POST['body2'][$i]);

                // Add to database
                $updateoutline = $query . " '$heading2', '$body2' WHERE course_id = '$edit_id'";
            }
            $updateoutline = substr($updateoutline, 0, -1); //remove last char
            $result = mysqli_query($conn, $updateoutline);

            header("Location: ?success=courseUpdated");
            exit();
        } else {
            header("Location: ?error=couldnotCreate");
            exit();
        }
    }
}
//delete courses
if ($_GET['delete_id']) {
    $id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM avaiable_courses WHERE course_id = '$id'";
    if (mysqli_query($conn, $deleteQuery)){
        mysqli_query($conn,"ALTER TABLE avaiable_courses AUTO_INCREMENT = 0");
        mysqli_query($conn,"ALTER TABLE courses_outline AUTO_INCREMENT = 0");
        mysqli_query($conn,"ALTER TABLE courses_paragraph AUTO_INCREMENT = 0");
        header('location: ?success=deleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
        die($deleteQuery);
    }
}