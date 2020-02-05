<?php
require("./assets/admin_menu.php");
?>


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registered Candidates</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th class="text-left">
                                S/N
                            </th>
                            <th>
                                Student ID
                            </th>
                            <th>
                                Full Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Course
                            </th>
                            <th>
                                Heard about us
                            </th>
                            <th>
                                Country
                            </th>
                            <th>
                                Nationality
                            </th>
                            <th>
                                State
                            </th>
                            <th>
                                Course Type
                            </th>
                            <th>
                                Session
                            </th>
                            <th>
                                Paid
                            <th>
                                Invoice
                            </th>
                            <th>
                                Reg Date
                            </th>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM enrollment_form";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td class='text-left'>".$row['id']."</td>";
                                    echo "<td>#".$row['student_id']."</td>";
                                    echo "<td>".$row['fname'].' '.$row['lname']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$row['courses']."</td>";
                                    echo "<td>".$row['about']."</td>";
                                    echo "<td>".$row['country']."</td>";
                                    echo "<td>".$row['nationality']."</td>";
                                    echo "<td>".$row['state']." ".$row['city']." ".$row['state']."</td>";
                                    echo "<td>".$row['course_type']."</td>";
                                    echo "<td>".$row['course_session']."</td>";
                                    echo "<td>".$row['paid_amount']."</td>";
                                    echo "<td>#".$row['invoice_id']."</td>";
                                    echo "<td>".$row['reg_date']."</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            } else {
                                echo "<p>You have 0 registered Candidate!</p>";
                            }
                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require ("./assets/footer.php");
?>
