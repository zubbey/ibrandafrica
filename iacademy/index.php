<?php
require ("./components/menu.php");
?>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img id="logo" class="d-none" src="./img/iacademy_logo.png" width="127.76" height="48.73" alt="iAcademy logo"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link btn js-scroll-trigger" href="#courses">Get Started</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead 100hv">
    <div class="container align-items-center">
      <div class="mx-auto text-center">
        <div id="typed-strings1" class="d-none">
          <p>Start your creative journey at iBrand Academy.</p>
          <p>Grow as a designer through close interaction
          with our award winning instructors.</p>
        </div>
        <h1 class="mx-auto my-0 text-uppercase"><img class="logo" src="./img/iAcademy.svg" width="100%" height="150px" alt="iAcademy"></h1>
        <h2 class="text-20 mx-auto mt-3 mb-5" style="height: 120px;"><span id="typed1">Join a vibrant, creative and award-winning student community.</span></h2>

        <div class="mt-2">
          <span class="tcon-indicator" aria-label="scroll" aria-hidden="true">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="tcon-svgchevron" viewBox="0 0 30 36">
              <path class="a3" d="M0,0l15,16L30,0"></path>
              <path class="a2" d="M0,10l15,16l15-16"></path>
              <path class="a1" d="M0,20l15,16l15-16"></path>
            </svg>
          </span>
        </div>
        <a class="btn js-scroll-trigger" href="#about">Continue</a>
      </div>
    </div>
    <div id="stage" class="img-fluid" style="width: 980px; height: 100%; margin: auto;"></div>
    <!-- width="1280" height="380" -->
  </header>


  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="text-white mb-4">Something to note</h1>
          <p class="text-white justify">iBrand Academy  (iA) has been established to address the growing need for talented designers and innovators in Africa and beyond – today’s students who will be tomorrow’s innovators. Global in outlook, bold in our approach, the Academy  instills students with the confidence to take risks, push boundaries and challenge ways of thinking and making.
          All of this converges through our Certificates of Design. The first integrated CDes of it’s kind in the region, students map their own educational journey by exploring two concentrations from a possible two: Multimedia and Strategic Design Management.</p>
          <a class="btn js-scroll-trigger" href="#more_about">Know more</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div id="more_about" class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="https://i.imgur.com/cQmyHU6.png" alt="OUR MISSION">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left ml-4">
            <h2>Our Vision</h2>
            <p class="text-black-50 list-group-item ">iBrand Academy  aspires to be the design academy  of choice in Africa by providing an international learning environment encompassing innovation and knowledge to contribute to the advancement of humanity.</p>
          </div>
        </div>
      </div>

      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-4 col-lg-5">
          <div class=" text-center text-lg-left " style="border-right:.5rem solid #64a19d; padding: 0 2rem 0  0 ;">
            <h2>Our Mission</h2>
            <p class="text-black-50 list-group-item">
              To create a truly international learning environment with top tier academic collaborations, where students are immersed in a world of learning and possibilities.
            </p>
            <div class="divider mb-2 "></div>
            <p class="text-black-50 list-group-item">
              To deliver a world-class design education to regional and international talent, within a design ecosystem, providing them with the skills to contribute to the advancement of humanity.
            </p>
            <div class="divider mb-2 "></div>
            <p class="text-black-50 list-group-item">
              To provide access to global research that advances knowledge and innovation opportunities for the next generation of designers
            </p>
            <div class="divider mb-2"></div>
            <p class="text-black-50 list-group-item">
              To shape the future of civilizations and contribute to the happiness of societies – by making everyday living better.
            </p>
          </div>
        </div>

        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="https://i.imgur.com/hq65yKc.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section id="courses" class="courses-section bg-light mb-lg-5">
    <div class="container">
      <h2 class="mx-auto mb-lg-5">Available Courses</h2>
        <div class="row">

        <?php
        $sql = "SELECT * FROM avaiable_courses";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo
                '
                <div class="col-md-4 mb-lg-5" id="card-deck0">
                    <div class="card card-hover">
                      <img src="./admin/uploads/'.$row['course_img'].'" class="p-lg-5 img-fluid card-img-top course_img" height="100" alt="">
                      <div class="card-body">
                        <h4 class="card-title">'.$row['course_name'].'</h4>
                        <p class="card-text comment more">'.$row['course_detail_intro'].'</p>
                      </div>
                      <div class="card-footer">
                        <p class="small">
                          <h3 class="card-title pricing-card-title">&#8358;'.number_format($row['course_fee']).'</h3>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>Certification: <span class="text-muted">'.$row['qualification'].'</span></li>
                          </ul>
                        </p>
                      </div>
                      <button onclick="window.location.assign(\'course_details?course_id='.$row['course_id'].'\')" type="button" id="photo_btn" class="btn-primary btn btn-lg btn-block ">View Course Details</button>
                    </div>
                </div>
                ';
            }
        }
        ?>
        </div>
    </div>
  </section>
    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt mb-2"></i>
                <h4 class="text-uppercase text-white m-0">Address</h4>
                <hr class="my-4">
                <div class=" text-white">
                  <p class="h6">iBrand Africa Limited</p>
                  <p class="h6">No 4 Amadi-ama Layout, Trans-Amadi, Phalga 500272, Port Harcourt</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope mb-2"></i>
                <h4 class="text-uppercase text-white m-0">Email</h4>
                <hr class="my-4">
                <div class="text-white">
                  <p class="h6">info@ibrandacademy.one</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center text-white">
                <i class="fas fa-mobile-alt mb-2"></i>
                <h4 class="text-uppercase text-white m-0">Phone</h4>
                <hr class="my-4 ">
                <p class="h6">+234(080) 212-60000</p>
                <p class="h6">+234(080) 374-78593</p>
              </div>
            </div>
          </div>
        </div>

        <div class="py-4 social d-flex justify-content-center">
          <a href="https://www.twitter.com/ibrandacademy_" target="_black" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="https://www.facebook.com/ibrandacademy_" target="_blank" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/ibrandacademy_" target="_blank" class="mx-2">
            <i class="fab fa-instagram"></i>
          </a>
        </div>

      </div>
    </section>

  <?php require_once'tawkto.php'; ?>
    <!-- Footer -->
<?php require ('./components/academy_footer.php');?>
