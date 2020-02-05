<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coming Soon :: iAcademy&trade; </title>

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

</head>
<body id="page-top">

  <!-- Header -->
  <header class="masthead2 100hv">
    <div class="container align-items-center newclass">
      <div class="mx-auto text-center">
        <div id="typed-strings1" class="d-none">
          <p>Course Coming Soon!</p>
          <p>Just have a little patience,<br>the course will be available soon</p>
        </div>
        <h1 class="mx-auto my-0 text-uppercase"><img class="logo" src="./img/iAcademy.svg" width="100%" height="150px" alt="iAcademy"></h1>
        <h2 class="text-20 mx-auto mt-3 mb-5" style="height: 120px;"><span id="typed1">Course<br>Coming Soon!</span></h2>
        <a class="btn js-scroll-trigger" href="index">Go Back</a>
      </div>
    </div>
   <!-- <div id="stage" class="img-fluid" style="width: 980px; height: 100%; margin: auto;"></div> -->
    <!-- width="1280" height="380" -->
  </header>

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

    </body>

    </html>
