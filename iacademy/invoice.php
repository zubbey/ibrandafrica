<?php
require ("./components/menu.php");

if (isset($_GET['enrollment']) && $_GET['enrollment'] === "completed"){
    enrollCompleted($_GET['amount'], $_GET['ref']);
}
if (isset($_SESSION['candidatePaid'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['candidatePaid']."')");
}
?>
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2>Congratulation</h2>
                        <p>Your have successfully completed your registration.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="invoice">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6">
                                <img class="logo-2" src="./img/iacademy_logo.png" width="127.76" height="48.73" alt="iAcademy logo" />
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #<?php echo strtoupper($_SESSION['invoice_id']);?></p>
                                <p>Registered Date: <?php echo date('F/j/Y',strtotime($_SESSION['reg_date']));?></p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Student Information</p>
                                <p class="mb-1">Name: <?php echo ucwords($_SESSION['fristname']).' '.ucwords($_SESSION['lastname'])?></p>
                                <p class="mb-1">Email Address: <?php echo $_SESSION['emailaddress']?></p>
                                <p class="mb-1">Phone Number: <?php echo $_SESSION['phone']?></p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">Reference Code: </span> <?php echo $_SESSION['ref'];?></p>
                                <p class="mb-1"><span class="text-muted">Student Unique ID: </span> <?php echo strtoupper($_SESSION['student_id']);?></p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Online</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unique Student ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Course</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Course Type</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Start Session </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM enrollment_form WHERE email = '".$_SESSION['emailaddress']."'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '
                                                <tr>
                                                    <td class="text-uppercase">'.strtoupper($row['student_id']).'</td>
                                                    <td>'.$row['courses'].'</td>
                                                    <td>'.$row['course_type'].'</td>
                                                    <td>'.$row['course_session'].'</td>
                                                </tr>
                                                ';
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse text-white p-4" style="background: #1b98ab;">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Amount Paid</div>
                                <div class="h2 font-weight-light">&#8358;<?php echo money_format("%n",$_SESSION['amount'])?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="getPDF()" class="btn btn-block btn-primary">Download invoice <i class="fas fa-download"></i></button>
</section>
<?php require_once'tawkto.php'; ?>
<?php require ('./components/academy_footer.php');?>

<script>
    function getPDF(){
        $('.banner_area').hide();
        var HTML_Width = $("#invoice").width();
        var HTML_Height = $("#invoice").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;

        html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height+"  "+canvas.width);

            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);

            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("iAcademy-Invoice.pdf");
        });
    };
</script>