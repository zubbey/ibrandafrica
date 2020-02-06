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
setlocale(LC_ALL,"cch_NG");

// initializing variables
$errors =  array();
$username= "";

$course = $conn->real_escape_string($_POST['course']);
$amount = $conn->real_escape_string($_POST['amount']);
$fname = $conn->real_escape_string($_POST['fname']);
$lname = $conn->real_escape_string($_POST['lname']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$about = $conn->real_escape_string($_POST['about']);
$country = $conn->real_escape_string($_POST['country']);
$nationality = $conn->real_escape_string($_POST['nationality']);
$state = $conn->real_escape_string($_POST['state']);
$course_type = $conn->real_escape_string($_POST['course_type']);
$schedule = $conn->real_escape_string($_POST['start-date']);

//ENROLL FORM
//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enrollment_submit_btn'])) {
        if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
            $errors['empty_field'] = "Please fill out all fields, especially your fullname, email and phone number";
            header("Location: ?enroll=true&course_id=".$course_id."&error_empty=".$errors['empty_field']."&fname=".$fname."&lname=".$lname."&email=".$email."&phone=".$phone."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
            exit();
        } else{
            $fname = test_input($_POST["fname"]);
            // check if fname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                $errors['fname_invalid'] = "Only letters and white space allowed";
                header("Location: ?enroll=true&course_id=".$course_id."&fname_invalid=".$errors['fname_invalid']."&lname=".$lname."&email=".$email."&phone=".$phone."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
                exit();
            }
            $lname = test_input($_POST["lname"]);
            // check if lname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                $errors['lname_invalid'] = "Only letters and white space allowed";
                header("Location: ?enroll=true&course_id=".$course_id."&lname_invalid=".$errors['lname_invalid']."&fname=".$lname."&email=".$email."&phone=".$phone."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
                exit();
            }
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email_invalid'] = "Invalid email format";
                header("Location: ?enroll=true&course_id=".$course_id."&email_invalid=".$errors['email_invalid']."&fname=".$fname."&lname=".$lname."&phone=".$phone."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
                exit();
            }
            $phone = test_input($_POST["phone"]);
            // check if phone number is valid
            if (!preg_match('/^[0-9]{11}+$/', $phone)){
                $errors['phone_invalid'] = "Invalid Phone Number";
                header("Location: ?enroll=true&course_id=".$course_id."&phone_invalid=".$errors['phone_invalid']."&fname=".$fname."&lname=".$lname."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
                exit();
            }
        }

        //CHECK IF EMAIL IS IN THE DATABASE
        $check_query = "SELECT * FROM enrollment_form WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if ($user['email'] === $email) {
                $errors['email_exist'] = "This email address ({$email}) is already registered!";
                header("Location: ?enroll=true&course_id=".$course_id."&email_exist=".$errors['email_exist']."&fname=".$fname."&lname=".$lname."&phone=".$phone."&about=".$about."&country=".$country."&nationality=".$nationality."&state=".$state."&course_type=".$course_type."&schedule=".$schedule);
                exit();
            }
        }

        if (count($errors) == 0) {
            $amount_paid = "0";
            $sql="INSERT INTO enrollment_form (courses, fname, lname, email, phone, about, country, nationality, state, course_type, course_session, paid_amount) VALUES ('$course','$fname', '$lname', '$email', '$phone','$about', '$country', '$nationality', '$state', '$course_type', '$schedule', '$amount_paid')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $query = "SELECT * FROM enrollment_form WHERE email='$email' LIMIT 1";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $student = mysqli_fetch_assoc($result);

                    session_regenerate_id();
                    $_SESSION['candidate_session'] = TRUE;
                    $userid = $conn->insert_id;
                    $_SESSION['candidate_id'] = $userid;
                    $_SESSION['emailaddress'] = $_POST['email'];
                    $_SESSION['fristname'] = $_POST['fname'];
                    $_SESSION['lastname'] = $_POST['lname'];
                    $_SESSION['phone'] = $_POST['phone'];
                    $_SESSION['courses'] = $_POST['course'];
                    $_SESSION['amount'] = $_POST['amount'];
                    $_SESSION['newCandidate'] = "You Have a new Registered Candidate Called : ".$student['fname']." ".$student['lname'];
                    require_once ('./mail.php');
                    autoReply($_POST['email'], $_POST['fname'], $_POST['lname'], $_POST['course']);

                    header("Location: pay?enrolled=true");
                }
            } else {
                header("Location: ?error=true");
                exit();
            }
        }
    }
}

//complete registration
function enrollCompleted($paid_amount, $ref){
    global $conn;
    $student_id = RandomString(6);
    $invoice_id = RandomString(3);
    $result = mysqli_query($conn, "SELECT * FROM enrollment_form WHERE email = '".$_SESSION['emailaddress']."' LIMIT 1");
    $user = mysqli_fetch_array($result);
    if ($result > 0){
        $update = mysqli_query($conn, "UPDATE enrollment_form SET paid_amount ='$paid_amount', student_id ='$student_id', invoice_id ='$invoice_id' WHERE id = '".$user['id']."'");
        if ($update) {
            $_SESSION['student_id'] = $student_id;
            $_SESSION['invoice_id'] = $invoice_id;
            $_SESSION['course_type'] = $user['course_type'];
            $_SESSION['course_session'] = $user['course_session'];
            $_SESSION['reg_date'] = $user['reg_date'];
            $_SESSION['ref'] = $ref;
            $_SESSION['amount'] = $paid_amount;

            $_SESSION['candidatePaid'] = $user['fname']." ".$user['lname']." Just paid ".$paid_amount;
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=invoice\">";
            exit();
        }
    }
}
function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = "";
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//ADMIN PORTAL ACCESS
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if (empty($username)) {
        $errors['empty_username'] = "Enter your admin username";
        header("Location: ?login=0&username_error=".$errors['empty_username']."&username=".$username);
    }else if (empty($password)) {
        $errors['empty_password'] = "Enter the correct admin password";
        header("Location: ?login=0&password_error=".$errors['empty_password']."&username=".$username);
    }
    if (count($errors) == 0) {
        $sql = "SELECT * FROM admin WHERE username = ? ";
        if($query = $conn->prepare($sql)) { // assuming $mysqli is the connection
            $query->bind_param('s', $username);
            $query->execute();
            // any additional code you need would go here.
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            if ($password === $user['password'] || password_verify($_POST['password'], $user['password'])) {
                $id = $user['id'];
                if ($user[`lastAction`] == 0) {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                } else {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                }
                $_SESSION['admin_session'] = TRUE;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $username;
                $_SESSION['adminEmail'] = $user['email'];
                $_SESSION['adminRole'] = $user['role'];
                //SESSION VARIABLE WITH NULL VALUE
                // flash messages

                $_SESSION['loginlog'] = "you last logged in at " . date("h:i a");
                if ($username === "thankgod"){
                    $_SESSION['newLogin'] = "Thankgod Okoro last logged in at ". date("h:i a");
                } elseif ($username === "cachy"){
                    $_SESSION['newLogin'] = "Ginikachi last logged in at ". date("h:i a");
                } elseif ($username === "ernest"){
                    $_SESSION['newLogin'] = "Ernest Nnadi last logged in at ". date("h:i a");
                } elseif ($username === "zubbey"){
                    $_SESSION['newLogin'] = "Zubbey Just last logged in at ". date("h:i a");
                }
            } else {
                $errors['no_account'] = "You do not have access to this portal!";
                header("Location: ?login=0&no_account=" . $errors['no_account'] . "&username=" . $username);
            }
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error; // 1054 Unknown column 'username' in 'field list'
        }
    }
}
//assign value to admins
if (isset($_SESSION['admin_session'])){
    if ($_SESSION['username'] === "thankgod"){
        $company = "Webify.com.ng";
    }
    if ($_SESSION['username'] === "cachy"){
        $company = "Belacrio Ltd";
    }
    if ($_SESSION['username'] === "ernest"){
        $company = "Ibrand Africa (CEO)";
    }
    if ($_SESSION['username'] === "zubbey"){
        $company = "stockafricana.ng";
    }
}
//UPLOAD COURSE IMAGES
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
$course_location = mysqli_real_escape_string($conn, $_POST['course_location']);
$course_fee = mysqli_real_escape_string($conn, $_POST['course_fee']);
$no_seats = mysqli_real_escape_string($conn, $_POST['number_of_seats']);
$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
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
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // if everything is ok, try to upload file
    if ($uploadOk == 1) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    } else {
        $errors['image_error'] = "Sorry, there was an error uploading your Course Image. only JPEG, JPG, PNG is allowed";
        header("Location: ?add=true&image_error=".$errors['image_error']."&course_amount=".$course_fee."&course_name=".$course_name."&course_location=".$course_location);
        exit();
    }

    if (count($errors) == 0) {
        $date = date("Y-m-d");
        $query = "INSERT INTO avaiable_courses (course_name, course_img, course_location, course_fee, number_of_seats, qualification, schedule_date, course_detail_title, course_detail_intro) VALUES('$course_name', '".$_FILES["fileToUpload"]["name"]."', '$course_location', '$course_fee', '$no_seats', '$qualification', '$schedule', '$detail_title', '$detail_intro')";
        $result = mysqli_query($conn, $query);
        if($result){
            $selectQuery = mysqli_query($conn, "SELECT * FROM avaiable_courses WHERE course_name = '$course_name'");
            if (mysqli_num_rows($selectQuery) > 0){
                $courseRow = mysqli_fetch_assoc($selectQuery);
                //    add to course_paragraph & course_outline if not empty
                $course_id = $courseRow['course_id'];
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
                if ($_SESSION['username'] === "thankgod"){
                    $_SESSION['courseAdded'] = "Thankgod Okoro Just added a new course called: ".$course_name;
                }
                if ($_SESSION['username'] === "cachy"){
                    $_SESSION['courseAdded'] = "Ginikachi Just added a new course called: ".$course_name;
                }
                if ($_SESSION['username'] === "ernest"){
                    $_SESSION['courseAdded'] = "Ernest Nnadi Just added a new course called: ".$course_name;
                }
                if ($_SESSION['username'] === "zubbey"){
                    $_SESSION['courseAdded'] = "Zubbey Just added a new course called: ".$course_name;
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


function createCourseid(){
    $_SESSION['editid'] = $_GET['edit_id'];
}

if (isset($_POST['edit_course_btn'])){
    $courseName = mysqli_real_escape_string($conn, $_POST['course_name']);
    $course_location = mysqli_real_escape_string($conn, $_POST['course_location']);
    $course_fee = mysqli_real_escape_string($conn, $_POST['course_fee']);
    $no_seats = mysqli_real_escape_string($conn, $_POST['number_of_seats']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $schedule = mysqli_real_escape_string($conn, $_POST['schedule_date']);
    $detail_title = mysqli_real_escape_string($conn, $_POST['course_detail_title']);
    $detail_intro = mysqli_real_escape_string($conn, $_POST['course_detail_intro']);
    $course_image = $_FILES["fileToUpload"]["name"];
    $course_id = $_SESSION['editid'];

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // if everything is ok, try to upload file
    if ($uploadOk == 1) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    } else {
        $errors['image_error'] = "Sorry, there was an error uploading your Course Image. only JPEG, JPG, PNG is allowed";
        header("Location: ?edit_id=".$course_id."&image_error=".$errors['image_error']."&course_amount=".$course_fee."&course_location=".$course_location);
        unset($_SESSION['editid']);
        exit();
    }

    if (empty($course_location)) {
        $errors['location_error'] = "Course location is required!";
        header("Location: ?edit_id=".$course_id."&location_error=".$errors['location_error']."&course_location=".$course_location."&course_amount=".$course_fee);
        unset($_SESSION['editid']);
        exit();
    }if (empty($course_fee)) {
        $errors['fee_error'] = "Course Amount is required!";
        header("Location: ?edit_id=".$course_id."&fee_error=".$errors['fee_error']."&course_amount=".$course_fee."&course_location=".$course_location);
        unset($_SESSION['editid']);
        exit();
    }
    if (count($errors) == 0) {
        editCourse($conn, $course_id, $courseName, $course_image, $course_location, $course_fee, $no_seats, $qualification, $schedule, $detail_title, $detail_intro);
    }
}
//Edit Courses
function editCourse($conn, $course_id, $courseName, $course_image, $course_location, $course_fee, $no_seats, $qualification, $schedule, $detail_title, $detail_intro){

    $updateQuery = "UPDATE avaiable_courses SET course_img = '$course_image', course_location = '$course_location', course_fee = '$course_fee', number_of_seats = '$no_seats', qualification = '$qualification', schedule_date = '$schedule', course_detail_title = '$detail_title', course_detail_intro = '$detail_intro', update_date = NOW() WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $updateQuery);
    if ($result) {
        if ($_SESSION['username'] === "thankgod"){
            $_SESSION['courseUpdated'] = "Thankgod Okoro Just updated ".$courseName;
        }
        if ($_SESSION['username'] === "cachy"){
            $_SESSION['courseUpdated'] = "Ginikachi Just updated ".$courseName;
        }
        if ($_SESSION['username'] === "ernest"){
            $_SESSION['courseUpdated'] = "Ernest Nnadi Just updated ".$courseName;
        }
        if ($_SESSION['username'] === "zubbey"){
            $_SESSION['courseUpdated'] = "Zubbey Just updated ".$courseName;
        }
        header("Location: ?success=courseUpdated");
        unset($_SESSION['editid']);
        exit();
    } else {
        header("Location: ?error=couldnotCreate");
        unset($_SESSION['editid']);
        exit();
    }
}

//delete courses
if ($_GET['delete_id']) {
    $id = $_GET['delete_id'];
    $_SESSION['course_name'] = $_GET['course'];
    //        Delete after
    $deleteQuery = "DELETE FROM avaiable_courses WHERE course_id = '$id'";
    $result = mysqli_query($conn, $deleteQuery);
    if ($result){
        mysqli_query($conn,"ALTER TABLE avaiable_courses AUTO_INCREMENT = 0");
        mysqli_query($conn,"ALTER TABLE courses_outline AUTO_INCREMENT = 0");
        mysqli_query($conn,"ALTER TABLE courses_paragraph AUTO_INCREMENT = 0");

        if ($_SESSION['username'] === "thankgod"){
            $_SESSION['courseDeleted'] = "Thankgod Okoro Just deleted ".$_SESSION['course_name'];
        }
        if ($_SESSION['username'] === "cachy"){
            $_SESSION['courseDeleted'] = "Ginikachi Just deleted ".$_SESSION['course_name'];
        }
        if ($_SESSION['username'] === "ernest"){
            $_SESSION['courseDeleted'] = "Ernest Nnadi Just deleted ".$_SESSION['course_name'];
        }
        if ($_SESSION['username'] === "zubbey"){
            $_SESSION['courseDeleted'] = "Zubbey Just deleted ".$_SESSION['course_name'];
        }
        header('location: ?success=deleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
        die($deleteQuery);
    }
}

//DELETE LOGS
if (isset($_GET['logid'])){
    $del_selectedlog = mysqli_query($conn, "DELETE FROM system_logs WHERE id = '".$_GET['logid']."'");
    mysqli_query($conn,"ALTER TABLE system_logs AUTO_INCREMENT = 1");
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard\">";
    exit();
}

//$deletelogs = mysqli_query($conn, "DELETE FROM system_logs WHERE log_date > CURRENT_TIMESTAMP - INTERVAL 1 DAY");
//if ($deletelogs){
//    mysqli_query($conn,"ALTER TABLE system_logs AUTO_INCREMENT = 1");
//}

//LOGOUT ADMIN
if (isset($_GET['logout'])) {
    $id = $_SESSION['id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET lastAction = '$time' WHERE `id` = '$id'");
    session_destroy();
    $_SESSION['admin_session'] = FALSE;
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['adminEmail']);
    unset($_SESSION['adminRole']);
    // UNSET SESSION VAIRABLE WITH NULL
    header('location: index');
    exit();
}