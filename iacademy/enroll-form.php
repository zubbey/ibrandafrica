<!-- Bootstrap core CSS -->
  <link rel="icon" href="img/logoicon.png" type="image/png">

  <link rel="stylesheet" href="../css/magnific.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">
  <!-- <link href="../css/style.css" rel="stylesheet"> -->
  <link href="css/custom.css" rel="stylesheet">

<!-- enroll Section -->
    <section id="enroll" class="enroll-section">
      <div class="container-fluid">
        <?php

// define variables and set to empty values

        $fnameErr = $lnameErr = $emailErr = $phoneErr = "";
        $courses = $fname = $lname = $email = $phone = $about = $country = $nationality = $state = $comments = "";

        if (($_SERVER["REQUEST_METHOD"] == "POST")) {


          $courses = $_POST['courses'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $about = $_POST['about'];
          $country = $_POST['country'];
          $nationality = $_POST['nationality'];
          $state = $_POST['state'];
          $comments = $_POST['comments'];

          if (empty($_POST["fname"])) {
            $fnameErr = "<div style='padding:10px'>First Name is required</div>";

          } else {
            $fname = test_input($_POST["fname"]);
    // check if fname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
              $fnameErr = "<div style='padding:10px'>Only letters and white space allowed</div>"; 
            }
          }

          if (empty($_POST["lname"])) {
            $lnameErr = "<div style='padding:10px'>Last Name is required</div>";
          } else {
            $lname = test_input($_POST["lname"]);
    // check if lname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
              $lnameErr = "<div style='padding:10px'>Only letters and white space allowed</div>"; 
            }
          }

          if (empty($_POST["email"])) {
            $emailErr = "<div style='padding:10px'>Email Address is required</div>";
          } else {
            $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "<div style='padding:10px'>Invalid email format</div>"; 
            }
          }

          if (empty($_POST["phone"])) {
            $phoneErr = "<div style='padding:10px'>Phone is required</div>";
          } else {
            $phone = test_input($_POST["phone"]);
          }

          if((isset($_POST['fname'])&& $_POST['fname'] !='') && (isset($_POST['email'])&& $_POST['email'] !='')){
            require_once("response.php");
          }else{

          }
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        ?>
        <div class="container">
          <div class="formBox">
            <form class="js-scroll-trigger" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#enroll">
              <div class="row mb-lg-5">
                <div class="col-sm-12">
                  <h2 class="mx-auto mb-lg-5">Enroll Form</h2>
                  <h5 class="card-text mb-lg-5">
                    To enquire for any course at iA, all you need to do is fill out our online enquiry  form. If you need assistance or are unsure of which course or study pathway is right for you fill out our enquiry form and we’ll get in touch.
                  </h5>
                  <p class="text-muted">To get started on your enrollment, fill the form below.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="inputBox ">
                    <div class="inputText active-input">Course Type</div>
                    <select class="input" name="courses" value="<?php echo $courses?>">
                      <option>Social Media Marketing Course</option>
                      <option>Graphic Design Course</option>
                      <option>Mobile App Development Short Course</option>
                      <option>Digital Video Editing Course</option>
                      <option>Games Development Course</option>
                      <option>3D Animation with Maya</option>
                      <option>Motion Graphics Course</option>
                      <option>Web Design Course</option>
                      <option>Photography</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="inputBox ">
                    <div class="inputText">First Name</div>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $fnameErr?>
                    </div>             
                    <input type="text" name="fname" class="input" value="<?php echo $fname?>">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="inputBox">
                    <div class="inputText">Last Name</div>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $lnameErr?>
                    </div> 
                    <input type="text" name="lname" class="input" value="<?php echo $lname?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="inputBox">
                    <div class="inputText">Email</div>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $emailErr?>
                    </div> 
                    <input type="text" name="email" class="input" value="<?php echo $email?>">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="inputBox">
                    <div class="inputText">Mobile</div>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $phoneErr?>
                    </div> 
                    <input type="text" name="phone" class="input" value="<?php echo $phone?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="inputBox">
                    <div class="inputText">How did you hear about us?</div>
                    <textarea class="input" name="about" value="<?php echo $about?>"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-row">

                <div class="col-sm-6">
                  <div class="inputBox">
                    <div class="inputText">Country of Residence</div>
                    <input type="text" name="country" class="input" value="<?php echo $country?>">
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="inputBox">
                    <div class="inputText">Nationality</div>
                    <input type="text" name="nationality" class="input" value="<?php echo $nationality?>">
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="inputBox">
                    <div class="inputText active-input">State</div>
                    <select class="input" name="state" value="<?php echo $courses?>">
                      <option>Abia State</option>
                      <option>Adamawa State</option>
                      <option>Akwa Ibom State</option>
                      <option>Anambra State </option>
                      <option>Bauchi State</option>
                      <option>Bayelsa State</option>
                      <option>Benue State</option>
                      <option>Borno State</option>
                      <option>Cross River State</option>
                      <option>Delta State</option>
                      <option>Ebonyi State</option>
                      <option>Edo State</option>
                      <option>Ekiti State </option>
                      <option>Enugu State</option>
                      <option>Gombe State</option>
                      <option>Imo State</option>
                      <option>Jigawa State</option>
                      <option>Kaduna State</option>
                      <option>Kano State</option>
                      <option>Katsina State</option>
                      <option>Kebbi State</option>
                      <option>Kogi State </option>
                      <option>Kwara State</option>
                      <option>Lagos State</option>
                      <option>Nasarawa State  Lafia</option>
                      <option>Niger State</option>
                      <option>Ogun State</option>
                      <option>Ondo State</option>
                      <option>Osun State</option>
                      <option>Oyo State</option>
                      <option>Plateau State</option>
                      <option>Rivers State </option>
                      <option>Sokoto State</option>
                      <option>Taraba State</option>
                      <option>Yobe State</option>
                      <option>Zamfara State</option>
                    </select>                  
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="inputBox">
                    <div class="inputText">Comment</div>
                    <textarea class="input" name="comments" value="<?php echo $comments?>"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <input type="submit" name="submit" class="button btn-primary btn btn-lg btn-block" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdn.boomcdn.com/libs/instafeed-js/1.4.1/instafeed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="./vendor/player/lottie.js" type="text/javascript"></script>

    <script>

      lottie.loadAnimation({
        container: document.getElementById('stage'), // the dom element that will contain the animation
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'iacademy_mb.json' // the path to the animation json
      });

      $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
         $('#logo').removeClass('d-none');
         $('.navbar-toggler').css('visibility', 'visible');
       } else {
         $('#logo').addClass('d-none');
         $('.navbar-toggler').css('visibility', 'hidden');
       }
     });

      var typed1 = new Typed('#typed1',{
        stringsElement: '#typed-strings1',
        typeSpeed:90,
        startDelay:5000,
        backDelay:500,
        loop: false
      });

      $(document).ready(function(){
        $('#next').click(function(){
          $('#card-deck0').addClass('d-none');
          $('#card-deck1').addClass('d-none');
          $('#p').removeClass('disabled');
          $('#card-deck2').removeClass('d-none');
          $('#n').addClass('disabled');
    }); //click on next button...........
        $('#previous').click(function(){
          $('#card-deck0').removeClass('d-none');
          $('#card-deck1').removeClass('d-none');
          $('#p').addClass('disabled');
          $('#card-deck2').addClass('d-none');
          $('#n').removeClass('disabled');
    });//click on previous button...........

      });

      $(".input").focus(function() {
        $(this).parent().addClass("focus");
      })

      $(".input").click(function(){
        $(".alert-danger").hide(500);
      })

      function reFresh() {
        location.replace("http://www.ibrandafrica.one/iacademy/");
      }

      function scroll_to_enroll(){
        $('html, body').animate({
          scrollTop: $("#enroll").offset().top
        }, 1000)
      }

      $('#photo_btn').on('click',function(){
        $("[name='courses']").val("Photography");
        scroll_to_enroll();
      })
      $('#web_btn').on('click',function(){
        $("[name='courses']").val("Web Design Course");
        scroll_to_enroll();
      })
      $('#motions_btn').on('click',function(){
        $("[name='courses']").val("Motion Graphics Course");
        scroll_to_enroll();
      })
      $('#3d_btn').on('click',function(){
        $("[name='courses']").val("3D Animation with Maya");
        scroll_to_enroll();
      })
      $('#games_btn').on('click',function(){
        $("[name='courses']").val("Games Development Course");
        scroll_to_enroll();
      })
      $('#editing_btn').on('click',function(){
        $("[name='courses']").val("Digital Video Editing Course");
        scroll_to_enroll();
      })
      $('#app_btn').on('click',function(){
        $("[name='courses']").val("Mobile App Development Short Course");
        scroll_to_enroll();
      })
      $('#graphics_btn').on('click',function(){
        $("[name='courses']").val("Graphic Design Course");
        scroll_to_enroll();
      })
      $('#social_btn').on('click',function(){
        $("[name='courses']").val("Social Media Marketing Course");
        scroll_to_enroll();
      });


      var userFeed = new Instafeed({
        get: 'user',
        userId: '1216467727',
        filter: function(image) {
          return image.tags.indexOf('appdevelopment') >= 0;
        },
        limit: 4,
        resolution: 'standard_resolution',
        accessToken: '1216467727.1677ed0.f48401b90f4c4132afc776b9be779352',
        sortBy: 'most-recent',
        template: '<div class="col-lg-3 instaimg hovereffect"><a href="{{link}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-fluid img-responsive"/></a></div>',
      });


      userFeed.run();


        // This will create a single gallery from all elements that have class "gallery-item"
        $('.gallery').magnificPopup({
          type: 'image',
          delegate: 'a',
          gallery: {
            enabled: true
          }
        });

        $(document).ready(function(){
          $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 4
              }
            }, {
              breakpoint: 520,
              settings: {
                slidesToShow: 3
              }
            }]
          });
        });
      </script>