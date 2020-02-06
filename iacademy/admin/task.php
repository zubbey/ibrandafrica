<?php
require("./assets/admin_menu.php");

if (isset($_GET['course_error']) && $_GET['course_error'] === 'Course name is required!'){
    $invalid_course_name = "is-invalid";
    $invalid_course_name_Msg = "<div class=\"invalid-feedback\">".$_GET['course_error']."</div>";
}
if (isset($_GET['location_error']) && $_GET['location_error'] === 'Course location is required!'){
    $invalid_location = "is-invalid";
    $invalid_location_Msg = "<div class=\"invalid-feedback\">".$_GET['location_error']."</div>";
}
if (isset($_GET['fee_error']) && $_GET['fee_error'] === 'Course Amount is required!'){
    $invalid_fee= "is-invalid";
    $invalid_fee_Msg = "<div class=\"invalid-feedback\">".$_GET['fee_error']."</div>";
}
if (isset($_GET['image_error']) && $_GET['image_error'] === 'Sorry, there was an error uploading your Course Image. only JPEG, JPG, PNG is allowed'){
    $invalid_image_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['image_error']."</div>";
}


if (isset($_GET['edit_id'])){
    $course_id = $_GET['edit_id'];

    $selectQuery = mysqli_query($conn, "SELECT * FROM avaiable_courses WHERE course_id = '$course_id'");
    $course = mysqli_fetch_assoc($selectQuery);

    $course_name = $course['course_name'];
    $course_location = $course['course_location'];
    $course_fee = $course['course_fee'];
    $num_seats = $course['number_of_seats'];
    $qualification = $course['qualification'];
    $schedule = $course['schedule_date'];
    $detail_title = $course['course_detail_title'];
    $detail_intro = $course['course_detail_intro'];
    $course_image = $course['course_image'];
}


?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Available Courses</h5>
                        <div class="row">
                            <div class="col update d-flex justify-content-between align-content-center">
                                <?php
                                $sql="SELECT * FROM avaiable_courses";
                                $query=mysqli_query($conn,$sql);
                                $num=mysqli_num_rows($query);
                                if ($num == 1){
                                    echo "<p class='card-category' style='margin: 0;'>you have ".$num." course</p>";
                                } else{
                                    echo "<p class='card-category' style='margin: 0;'>you have ".$num." courses</p>";
                                }
                                ?>
                                <button onclick="location.assign('?add=true')" type="button" class="btn btn-primary btn-round"><i class="nc-icon nc-simple-add"></i> Add New Course</button>
<!--                                -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th class="text-left">
                                    S/N
                                </th>
                                <th>
                                    Course Name
                                </th>
                                <th>
                                    View Course
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th class="text-right">
                                    Delete
                                </th>
                                </thead>
                                <?php
                                $sql = "SELECT * FROM avaiable_courses";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td class='text-left'>".$row['course_id']."</td>";
                                        echo "<td>".$row['course_name']."</td>";
                                        echo "<td><button onclick=\"location.assign('../course_details?course_id=".$row['course_id']."')\"  class='btn-primary'>View Course</button></td>";
                                        echo "<td><button onclick=\"location.assign('?edit_id=".$row['course_id']."')\"  class='btn-info'>Edit</button></td>";
                                        echo "<td class='text-right'><button onclick=\"location.assign('?delete_id=".$row['course_id']."&course=".$row['course_name']."')\" class='btn-danger'>Delete</button></td>";
                                        echo "</tr>";
                                        echo "</tbody>";
                                    }
                                } else {
                                    echo "<p>You have 0 Course!</p>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <?php
                            $sql = "SELECT `update_date` FROM avaiable_courses LIMIT 1";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $time_ago = date('F/j/Y',strtotime($row['update_date']));

                            echo "<i class=\"fa fa-history\"></i>Last Update: ".$time_ago."";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade modal-mini modal-primary-lg" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="myModalLabel">Add a new Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input type="text" class="form-control <?php echo $invalid_course_name; ?>" name="course_name" id="courseName" placeholder="Eg: Photography" value="<?php echo $_GET['course_name'];?>">
                            <?php echo $invalid_course_name_Msg; ?>
                        </div>
                        <div class="my-3">
                            <input type="file" name="fileToUpload" id="fileToUploadAdd">
                            <?php echo $invalid_image_Msg; ?>
                        </div>
                        <div class="form-group">
                            <label for="courseLoc">Course Location</label>
                            <input type="text" class="form-control <?php echo $invalid_location; ?>" name="course_location" id="courseLoc" placeholder="Eg: Port Harcourt" value="<?php echo $_GET['course_location'];?>">
                            <?php echo $invalid_location_Msg; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseFee">Course Fee</label>
                                <input type="text" class="form-control <?php echo $invalid_fee; ?>" id="courseFee" name="course_fee" placeholder="Eg: 1000" value="<?php echo $_GET['course_amount'];?>">
                                <?php echo $invalid_fee_Msg; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="numSeats">Number of Seats</label>
                                <input type="text" class="form-control" id="numSeats" name="number_of_seats" placeholder="Eg: 20" value="20">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Schedule Date</label>
                            <input type="text" class="form-control datetimepicker" id="datetimepicker" name="schedule_date" value="10AM - 4PM"/>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Qualification</label>
                            <input type="text" class="form-control" name="qualification" placeholder="Eg: iA Photography Certificate"/>
                        </div>
                        <div class="form-group">
                            <label for="courseDetailTitle">Course Detail Title</label>
                            <input type="text" class="form-control" id="CourseDetailTitle" name="course_detail_title" placeholder="Eg: The building process of design">
                        </div>
                        <div class="form-group">
                            <label for="courseDetailInto">Course Detail Into</label>
                            <textarea class="form-control" id="CourseDetailInto" name="course_detail_intro"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="detailPara">More Detail</label>
                            <div class="input_fields_wrap">
                                <button type="button" class="add_field_button mb-sm-2"><i class="nc-icon nc-simple-add"></i> Add Paragraph</button>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" type="text" name="heading[]" placeholder="heading">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" type="text" name="body[]" placeholder="body">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detailPara">Course Outline</label>
                            <div class="input_fields_wrap_2">
                                <button type="button" class="add_field_button_2 mb-sm-2"><i class="nc-icon nc-simple-add"></i> Add Course Outline</button>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" type="text" name="heading2[]" placeholder="heading">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" type="text" name="body2[]" placeholder="body">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_course_btn">Create Course</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

<!--    EDIT COURSES-->
    <div class="modal fade modal-mini modal-primary-lg" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="myModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input type="text" class="form-control" id="courseName" value="<?php echo $course_name;?>" disabled>
                            <input type="hidden" name="course_name" value="<?php echo $course_name;?>">
                        </div>
                        <div class="my-3">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <?php echo $invalid_image_Msg; ?>
                        </div>
                        <div class="form-group">
                            <label for="courseLoc">Course Location</label>
                            <input type="text" class="form-control <?php echo $invalid_location; ?>" name="course_location" id="courseLoc" value="<?php echo $course_location;?>">
                            <?php echo $invalid_location_Msg; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseFee">Course Fee</label>
                                <input type="text" class="form-control <?php echo $invalid_fee; ?>" id="courseFee" name="course_fee" value="<?php echo $course_fee;?>">
                                <?php echo $invalid_fee_Msg; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="numSeats">Number of Seats</label>
                                <input type="text" class="form-control" id="numSeats" name="number_of_seats" value="<?php echo $num_seats;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Qualification</label>
                            <input type="text" class="form-control" name="qualification" value="<?php echo $qualification;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Schedule Date</label>
                            <input type="text" class="form-control datetimepicker" name="schedule_date" value="<?php echo $schedule;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="courseDetailTitle">Course Detail Title</label>
                            <input type="text" class="form-control" id="CourseDetailTitle" name="course_detail_title" value="<?php echo $detail_title;?>">
                        </div>
                        <div class="form-group">
                            <label for="courseDetailInto">Course Detail Into</label>
                            <textarea class="form-control" id="CourseDetailInto" name="course_detail_intro"><?php echo $detail_intro;?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="edit_course_btn">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php
require("./assets/footer.php");
?>