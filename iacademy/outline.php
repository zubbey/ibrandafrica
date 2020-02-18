<section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <h4 class="title">Course Outline</h4>

                    <div class="accordion">
                        <?php
                        $outlineSql = "SELECT * FROM courses_outline WHERE course_id = '".$_SESSION['course_id']."'";
                        $result = mysqli_query($conn, $outlineSql);
                        while ($outlineRow = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="accordion-item">
                                <a class="text-black outline">'.$outlineRow['heading'].'</a>
                                <div class="content">
                                    <p>'.$outlineRow['body'].'</p>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
</section>