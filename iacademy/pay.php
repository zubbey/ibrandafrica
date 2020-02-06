<?php
require ("./components/menu.php");
if (isset($_SESSION['newCandidate'])){
    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['newCandidate']."')");
}
?>
<script src="https://js.paystack.co/v1/inline.js"></script>
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Make Payment</h2>
                <p>Complete course registration by making payment</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="card w-100">
                    <h4 class="mx-auto p-5 text-center">Hello <?php echo $_SESSION['fristname'].' '.$_SESSION['lastname']?>, Your Unique Student ID will be issued after you complete your registration,
                    for <span style="color: #d62f19;">Bank transfer /deposit</span> send us a screenshot of your invoice /deposit slit to <span style="color:#1fabbf; font-weight:lighter;">registration@ibrandafrica.one</span> to complete your registration.</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 course_details_left">
                    <div class="main_image">
                        <button onclick="payWithPaystack()" class="button btn-primary btn btn-lg btn-block border-0 p-3 mb-lg-4">Pay Online <i class="fas fa-credit-card"></i></button>
                        <img class="img-fluid" src="https://i.imgur.com/6ovzVLg.gif" alt="">
                    </div>
                </div>
                <div class="col-lg-6 right-contents pay">
                    <div class="main_image">
                        <img class="img-fluid" src="https://i.imgur.com/ZQhLuzpl.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->


<?php require_once'tawkto.php'; ?>
<?php require ('./components/academy_footer.php');?>
<script>

    //PAYSTACK INTEGRATION
    const course =  "<?php echo $_SESSION['courses']; ?>";
    const courseAmount = "<?php echo $_SESSION['amount']; ?>";
    const pk_key = config.PAYSTACK_PUBLIC_KEY;
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: pk_key,
            email: '<?php echo $_SESSION['emailaddress']; ?>',
            firstname: '<?php echo $_SESSION['fristname']; ?>',
            lastname: '<?php echo $_SESSION['lastname']; ?>',
            phone: '<?php echo $_SESSION["phone"]; ?>',
            amount: courseAmount * 100,
            currency: "NGN",
            ref: Math.floor((Math.random() * 1000000000) + 1),
            metadata: {
                custom_fields: [
                    {
                        display_name: "Paid Course",
                        variable_name: "paid_course",
                        value: course
                    }
                ]
            },
            callback: function(response){
                const ref = response.reference;
                window.location.assign('invoice?enrollment=completed&ref='+ref+'&amount='+courseAmount);
            },
            onClose: function(){
                cancelPayment();
            }
        });
        handler.openIframe();
    }

    // if payment is cancelled
    function cancelPayment(){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'No, continue!',
            cancelButtonText: 'Yes, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                payWithPaystack();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Thank you! God bless you :)',
                    'error'
                )
            }
        });
    }
</script>
