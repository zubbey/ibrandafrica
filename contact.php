<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>iBrand Africa | Contact</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
    <?php
// define variables and set to empty values
    $name = $email = $subject = $message = $phone = "";
    $nameErr = $emailErr = $phoneErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is required";
        } else {
            $phone = test_input($_POST["phone"]);
        }

        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $subject = test_input($_POST["subject"]);
        $message = test_input($_POST["message"]);
        $phone = test_input($_POST["phone"]);

        if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !='')){
            
    function auto_responce() {
    	$reply_back = $_POST["email"];
	    $reply_subject = "YOUR REQUEST FOR:"." ". $_POST["subject"];
	    $reply_message = "Hello"." ".$_POST["name"].","."\r\n"." Thank You for Contacting iBrand Africa."."\r\n"."
	    Our support reps will check your message and forward it to the best person when necessary. We'll get back to you within 48 hours.
	    If your issue can't wait, you can also reach us through this number +2348021260000, +2348060265677"."\r\n".
	    "Warm regards,";
	    mail($reply_back, $reply_subject, $reply_message);
    }


            $toEmail = "info@ibrandafrica.one";
            $mailHeaders = "From: " . $_POST["name"] . "<". $_POST["email"] .">\r\n";
            if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
                auto_responce();
                echo(
                    
                    "<div class='container'>
                    <div class='row'>
                    <div class='col'>
                    <div class='alert alert-success p-4 fixed' style=' position:fixed;margin:25% 0px;z-index:9999;'>
                    <button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
                    ×</button>
                    <span class='glyphicon glyphicon-ok'></span> <strong>Sent Successfully!</strong>
                    <hr class='message-inner-separator'>
                    <p class='h1'>
                    Thanks for contacting us.
                    </p>
                    <hr class='message-inner-separator'>
                    </div>
                    </div>
                    </div>
                    </div>
                    ");
            } else {
                echo(
                  "<div class='container'>
                  <div class='row'>
                  <div class='col'>
                  <div class='alert alert-danger p-4' style='position:fixed;margin:25% 0px;z-index:9999;'>
                  <button onclick='reFresh()' type='button' class='close btn' data-dismiss='alert' aria-hidden='true'>
                  ×</button>
                  <span class='glyphicon glyphicon-ok'></span> <strong>Error Sending Email</strong>
                  <hr class='message-inner-separator'>

                  <p class='h1'>
                  Something went wrong while trying send your mail.
                  </p>
                  <p class='smail'>
                  check your internet conncetion!.
                  </p>

                  </div>
                  </div>
                  </div>
                  </div>
                  ");

            }
        }
    }
    

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  ?>
  <!--================Header Menu Area =================-->
  <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand" href="index.php"><img class="logo" src="logo.svg" width="220" height="40" alt="ibrand africa logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item "><a class="nav-link" href="about-us.php">About</a></li>
                            <li class="nav-item submenu dropdown ">

                                <a id="work" class="nav-link " href="#">Works <i class="fa fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item "><a class="nav-link" href="services.php">Services  <i class="fa fa-angle-double-right"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="photos.php">Photos <i class="fa fa-angle-double-right"></i></a>
                                </ul>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <!--================ Start Contact Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-right">
                    <h1>Contact Us</h1>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Contact Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap" id="contact_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center">
                    <div class="main-title">
                        <h1>Contact </h1>
                        <h3>Convert quality traffic. Grow your business. Partner with iBrand Africa. </h3>
                        <p>As a local, full-service branding and  digital marketing agency with 5 Google Certifications and 8 years experience , iBrand Africa is well-positioned to achieve your goals.<p>
                        <p>
                            We have great clients, and they have great stories to tell. We look forward to learning yours.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Port Harcourt, Rivers State, Nigeria</h6>
                            <p>4 Trans-Amadi Industrial Layout Rd</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">234 (80) 2126 0000</a></h6>
                            <h6><a href="#">234 (80) 6026 5677</a></h6>
                            <p>Mon to Sat 8am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">ask@ibrandafrica.com</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="inner contact"> -->
                <div class="col-lg-9">                    
                    <div class="container contact-form">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <h3>What's up?</h3>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $nameErr?>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="my name is" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $emailErr?>
                                        </div>
                                        <input type="text" name="email" class="form-control" placeholder="my email is" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $phoneErr?>
                                        </div>
                                        <input type="text" name="phone" class="form-control" placeholder="my phone number is" value="" />
                                    </div>
                                    <label>Services: </label>
                                      <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="subject">
                                          <option>Branding</option>
                                          <option>Web Design/Development</option>
                                          <option>Advertising and PR</option>
                                          <option>Photography and Video Production</option>
                                          <option>Brand Collateral</option>
                                          <option>Software and Apps</option>
                                          <option>Logo Design</option>
                                          <option>Copywriting</option>
                                          <option>Email Marketing</option>
                                          <option>Social Media Management</option>
                                          <option>Blogging and Content Management</option>
                                          <option>Search Engine Optimization</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Ok the is my message" style="width: 100%; height: 150px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="primary-btn text-right">Send Message</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="mapBox">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.6249016190286!2d7.031744214762856!3d4.834297896489582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x415169b3541e472b!2siBrand+Africa+Limited!5e0!3m2!1sen!2sng!4v1546865454533" width="1110" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area section_gap">
        <div class="container">
            <div class="row footer_inner justify-content-center">
                <div class="col-lg-6 text-center">
                    <aside class="f_widget social_widget">
                        <div class="f_logo">
                            <img src="img/logo.png" alt="">
                        </div>
                        <div class="f_title">
                            <h4>Stay on Track</h4>
                        </div>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </aside>
                    <div class="copyright">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by <a href="https://coloredigit.com" target="_blank">ColoreDigit</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- contact js -->
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/contact.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>

    <script >
        $("input").click(function(){
        $(".alert-danger").hide(500);
      })
	
	$(document).ready(function(){

			$('#work').on('click',function(){
				$('ul.dropdown-menu').toggleClass("d-block"),ease;
			});
		});
	</script>
</body>
</html>