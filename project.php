<?php
	$value = '';
	if(isset($_GET['q'])){
		$value = $_GET['q'];
	};
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>iBrand Africa || Get Started</title>
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-114x114.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/android-icon-144x144.png">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/animsition.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="css/swiper3.css">
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style-child-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/css/lightgallery.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

	<link rel="stylesheet" href="css/banner_slider.min.css">
	<link rel="stylesheet" href="css/headings.min.css">
	<link rel="stylesheet" href="css/line_of_images.min.css">
	<link rel="stylesheet" href="css/the_grid.min.css">

	<link rel="stylesheet" href="css/video_banner.min.css">
	<link rel="stylesheet" href="css/lightgallery.min.css">
	<link rel="stylesheet" href="css/info_block.min.css">
	<link rel="stylesheet" href="css/services.min.css">
	<link rel="stylesheet" href="css/team.min.css">
	<link rel="stylesheet" href="css/the_grid.min.css">
	<link rel="stylesheet" href="css/services_list.min.css">
	<link rel="stylesheet" href="css/banner_image.min.css">
	<link rel="stylesheet" href="css/contacts.min.css">
	<link rel="stylesheet" href="css/headings.min.css">
	<link rel="stylesheet" href="lib/swiper-master/package/css/swiper.min.css">
	<link rel="stylesheet" href="css/nprogress.css">
	<link rel="stylesheet" href="css/custom.css">

	<style>
	/*form styles*/
	@font-face {
		font-family: 'icomoon';
		src:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/icomoon.eot?8pq1w');
		src:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/icomoon.eot?#iefix8pq1w') format('embedded-opentype'),
			url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/icomoon.woff?8pq1w') format('woff'),
			url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/icomoon.ttf?8pq1w') format('truetype'),
			url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/icomoon.svg?8pq1w#icomoon') format('svg');
		font-weight: normal;
		font-style: normal;
	}

	.wizard {
	  width: 100%;
	}
	.wizard > .steps .current-info,
	.wizard > .content > .title {
	  position: absolute;
	  left: -99999px;
	}
	.wizard > .content {
	  position: relative;
	  width: auto;
	  padding: 0;
	}
	.wizard > .content > .body {
	  /* padding: 0 40px; */
	}
	.wizard > .content > iframe {
	  border: 0 none;
	  width: 100%;
	  height: 100%;
	}
	.wizard > .steps {
	  position: relative;
	  display: block;
	  width: 100%;
	}
	.wizard > .steps > ul {
	  display: table;
	  width: 100%;
	  table-layout: fixed;
	  margin: 0;
	  padding: 0;
	  list-style: none;
	}
	.wizard > .steps > ul > li {
	  display: table-cell;
	  width: auto;
	  vertical-align: top;
	  text-align: center;
	  position: relative;
	  font-family: 'AvenirNextDemiBold','Helvetica', 'Arial', sans-serif!important;
	}
	.wizard > .steps > ul > li a {
	  position: relative;
	  padding-top: 48px;
	  margin-top: 40px;
	  margin-bottom: 40px;
	  display: block;
		text-decoration: none;
	}
	.wizard > .steps > ul > li:before,
	.wizard > .steps > ul > li:after {
	  content: '';
	  display: block;
	  position: absolute;
	  top: 58px;
	  width: 50%;
	  height: 2px;
	  background-color: #26366f;
	  z-index: 9;
	}
	.wizard > .steps > ul > li:before {
	  left: 0;
	}
	.wizard > .steps > ul > li:after {
	  right: 0;
	}
	.wizard > .steps > ul > li:first-child:before,
	.wizard > .steps > ul > li:last-child:after {
	  content: none;
	}
	.wizard > .steps > ul > li.current:after,
	.wizard > .steps > ul > li.current ~ li:before,
	.wizard > .steps > ul > li.current ~ li:after {
	  background-color: #eeeeee;
	}
	.wizard > .steps > ul > li.current > a {
	  color: #26366f;
	  cursor: default;
	}
	.wizard > .steps > ul > li.current .number {
	  border-color: #26366f;
	  color: #26366f;
	}
	/* .wizard > .steps > ul > li.current .number:after {
	  content: '\e913';
	  font-family: 'icomoon';
	  display: inline-block;
	  font-size: 16px;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  line-height: 34px;
	  -webkit-transition: all 0.15s ease-in-out;
	  -o-transition: all 0.15s ease-in-out;
	  transition: all 0.15s ease-in-out;
	} */
	.wizard > .steps > ul > li.disabled a,
	.wizard > .steps > ul > li.disabled a:hover,
	.wizard > .steps > ul > li.disabled a:focus {
	  color: #A5AEB7;
	  cursor: default;
	}
	.wizard > .steps > ul > li.done a,
	.wizard > .steps > ul > li.done a:hover,
	.wizard > .steps > ul > li.done a:focus {
	  color: #26366f;
	}
	.wizard > .steps > ul > li.done .number {
	  font-size: 0;
	  background-color: #26366f;
	  border-color: #26366f;
	  color: #fff;
	}
	.wizard > .steps > ul > li.done .number:after {
	  content: '\ed6e';
	  font-family: 'icomoon';
	  display: inline-block;
	  font-size: 16px;
	  line-height: 34px;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  -webkit-transition: all 0.15s ease-in-out;
	  -o-transition: all 0.15s ease-in-out;
	  transition: all 0.15s ease-in-out;
	}
	.wizard > .steps > ul > li.error .number {
	  border-color: #f54e83;
	  color: #f54e83;
	}
	@media (max-width: 768px) {
	  .wizard > .steps > ul {
	    margin-bottom: 20px;
	  }
	  .wizard > .steps > ul > li {
	    display: block;
	    float: left;
	    width: 50%;
	  }
	  .wizard > .steps > ul > li > a {
	    margin-bottom: 0;
	  }
	  .wizard > .steps > ul > li:first-child:before,
	  .wizard > .steps > ul > li:last-child:after {
	    content: '';
	  }
	  .wizard > .steps > ul > li:last-child:after {
	    background-color: #00BCD4;
	  }
	}
	@media (max-width: 480px) {
	  .wizard > .steps > ul > li {
	    width: 100%;
	  }
	  .wizard > .steps > ul > li.current:after {
	    background-color: #26366f;
	  }
	}
	.wizard > .steps .number {
	  background-color: #fff;
	  color: #A5AEB7;
	  display: inline-block;
	  position: absolute;
	  top: 0;
	  left: 50%;
	  margin-left: -19px;
	  width: 38px;
	  height: 38px;
	  border: 2px solid #eeeeee;
	  font-size: 14px;
	  border-radius: 50%;
	  z-index: 10;
	  line-height: 34px;
	  text-align: center;
	}
	.panel-flat > .wizard > .steps > ul {
	  border-top: 1px solid #ddd;
	}
	.wizard > .actions {
	  position: relative;
	  display: block;
	  text-align: right;
		padding: 10px;
	}
	.wizard > .actions > ul {
	  float: left;
	  list-style: none;
	  padding: 0;
	  margin: 0;
	}
	.wizard > .actions > ul:after {
	  content: '';
	  display: table;
	  clear: both;
	}
	.wizard > .actions > ul > li {
	  float: left;
	}
	.wizard > .actions > ul > li + li {
	  margin-left: 10px;
	}
	.wizard > .actions > ul > li > a {
	  background: #26366f;
	  color: #fff;
	  display: block;
	  padding: 10px 25px;
	  font-family: 'AvenirNextDemiBold','Helvetica', 'Arial', sans-serif!important;
	  border-radius: 0px;
	  text-transform: uppercase;
		font-size: 12px;
		letter-spacing: 1px;
		text-decoration: none;
	}
	.wizard > .actions > ul > li > a:hover,
	.wizard > .actions > ul > li > a:focus {
		background-color: rgba(38, 54, 111, 0.68);
	}
	.wizard > .actions > ul > li > a:active {
	}
	.wizard > .actions > ul > li > a[href="#previous"] {
	  background-color: #fff;
	  color: #4A4A49;
	  border: 2px solid #EDEDED;
	}
	.wizard > .actions > ul > li > a[href="#previous"]:hover,
	.wizard > .actions > ul > li > a[href="#previous"]:focus {

	}
	.wizard > .actions > ul > li > a[href="#previous"]:active {

	}
	.wizard > .actions > ul > li.disabled > a,
	.wizard > .actions > ul > li.disabled > a:hover,
	.wizard > .actions > ul > li.disabled > a:focus {
	  background-color: #fff;
	  color: #4A4A49;
	  border: 2px solid #EDEDED;
	}
	.wizard > .actions > ul > li.disabled > a[href="#previous"],
	.wizard > .actions > ul > li.disabled > a[href="#previous"]:hover,
	.wizard > .actions > ul > li.disabled > a[href="#previous"]:focus {
	  -webkit-box-shadow: none;
	  box-shadow: none;
	}
	label{
	  display:block;
	}
	label.error{
	  color:#f54e83;
	}

	.contacts-info-wrap.style3 .content {
	    padding: 10px !important;
	}
	</style>
</head>
<body class="woocommerce woocommerce-page enable_sound enable_sound_mob white_bg">

<!-- MAIN_WRAPPER -->
<div class="main-wrapper" data-sound="audio/" data-top="992">
	<div class="header_top_bg white_bg header_trans-fixed menu_light_text" style="padding-bottom: 0;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!-- HEADER -->
					<header class="right-menu compact full ">
						<!-- LOGO -->
						<a href="./" class="logo">
							<img src="img2/logo_ibrand/brand__logo.png" alt="iBrand Africa" class="main-logo">
							<img src="img2/logo_ibrand/brand__logo__white.png" alt="iBrand Africa" class="logo-hover">
							<img src="img2/logo_ibrand/brand__logo.png" alt="iBrand Africa" class="main-logo logo-mobile">
						</a>
						<!-- /LOGO -->


						<!-- ASIDE MENU ICON -->
						<a href="#" class="aside-nav">
							<span class="aside-nav-line line-1"></span>
							<span class="aside-nav-line line-2"></span>
							<span class="aside-nav-line line-3"></span>
						</a>
						<!-- /ASIDE MOB MENU ICON -->

						<!-- NAVIGATION -->
						<nav id="topmenu" class="topmenu ">
							<a href="#" class="mob-nav-close">
								<span>close</span>
								<div class="hamburger">
									<span class="line"></span>
									<span class="line"></span>
								</div>
							</a>
							<div class="full-menu-wrap">
								<ul id="menu-short-menu" class="menu">
									<li class="menu-item"><a href="about">about us</a></li>
									<li class="menu-item"><a href="services">services</a></li>
									<li class="menu-item"><a href="works">works</a></li>
									<li class="menu-item current-menu-item"><a href="contact">contact</a></li>
									<li class="menu-item"><a href="consultation">Free Consultation</a></li>
								</ul>
								<div class="pricing-btn">
									<a href="project" class="a-btn">Start A Project</a>
								</div>
								<div class="info-wrap">
									<div class="additional">
										<h4><strong>services we provide</strong></h4>
										<div id="headerServices">
										</div>
									</div>
									<div class="search">
										<div>search</div>
										<div class="site-search" id="search-box">
											<div class="close-search">
												<span class="line"></span>
												<span class="line"></span>
											</div>
											<div class="form-container">
												<div class="container">
													<div class="row">
														<div class="col-lg-12">
															<form role="search" method="get" class="search-form" action="services" >
																<div class="input-group">
																	<input type="search" value="" name="search" class="search-field" placeholder="Enter search Keyword" required>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="copy">© iBrand Africa. <br />All Right Reserved 2020.</div>
							</div>
						</nav>
						<!-- NAVIGATION -->

						<!-- MOB MENU ICON -->
						<a href="#" class="mob-nav mob-but-full">
							<span>close</span>
							<div class="hamburger">
								<span class="line" style="background-color: #222" ></span>
								<span class="line" style="background-color: #222" ></span>
								<span class="line" style="background-color: #222" ></span>
							</div>
						</a>
						<!-- /MOB MENU ICON -->

					</header>
				</div>
			</div>
		</div>
	</div>

	<div id="contact" class="container-fluid">
		<div class="hero">
			<div class="row">
				<div class="col-xs-12 no-padd">
					<div class="contacts-info-wrap style3 full-height over">
						<div class="content-wrap">
							<div class="image-wrap full-height parallax-window full-height" data-parallax="scroll" data-position-Y="top" data-position-X="center" data-image-src="https://i.imgur.com/ud5KM3Z.jpg"></div>
							<div class="content ">
								<h2 class="title-main">Start a new project</h2>
								<div class="text">Let work together with ease</div>
								<div class="form-wrap form">
									<div role="form" class="wpcf7" id="wpcf7-f124-p195-o1" lang="en-US" dir="ltr">

								    <div id="jquery-steps">
								        <h3>About Project</h3>
								        <section>
								          <form id="account-form" class="wpcf7-form">
														<input type="text" id="projectname" name="projectname" class="wpcf7-form-control required" placeholder="Enter Project Name*" value="<?php echo $value; ?>"/>
														<textarea id="desc" name="desc" class="wpcf7-form-control required" placeholder="Tell us a bit about your project*" /></textarea>
								            <p>(*) Mandatory</p>
								            </form>
								        </section>
								        <h3>Personal Info</h3>
								        <section>
								          <form id="profile-form" class="wpcf7-form">
														<input type="text" id="firstname" name="firstname" class="wpcf7-form-control required" placeholder="Enter Your First Name*" />
														<input type="text" id="lastname" name="lastname" class="wpcf7-form-control required" placeholder="Enter Your Last Name*" />
														<input type="text" id="email" name="email" class="wpcf7-form-control required" placeholder="Enter Your Email Address*" />
														<input type="text" id="phone" name="phone" class="wpcf7-form-control required" placeholder="Enter Your Mobile Phone*" />
								            <p>(*) Mandatory</p>
								          </form>
								        </section>
								    </div>
									</div>
								</div>
								<span style="padding: 10px">
									<p>Your brand is the “identity” of your company: By giving you a voice, a personality, and a distinct image, it helps to differentiate you from all the other startups struggling to earn attention in a saturated marketplace.</p>
								</span>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer" class=" modern footer_bg">
		<div class="container no-padd">
			<div class="widg clearfix">
				<div id="instagram_widget-2" class="sidebar-item col-xs-12 col-sm-6 col-md-3 AwaInstagramWidget"><div class="item-wrap">
					<div class="quze-widget-user quze-widget-border-bottom">
						<img src="img2/logo_ibrand/brand__logo__white.png" alt="iBrand Africa" class="insta-logo">
						<div class="instagram-text"><span>follow us on </span>
							<a href="https://www.instagram.com/ibrandafricagroup/" target="_blank">iBrand Africa Group</a>
						</div>
					</div>
				</div>
			</div>
			<div id="text-2" class="sidebar-item col-xs-12 col-sm-6 col-md-3 widget_text"><div class="item-wrap">
				<h5>Wanna say hello?</h5>
				<div class="textwidget">
					<p><a href="email:info@ibrandafrica.com"><span>info@ibrandafrica.com</span></a></p>
					<p><a href="tel:+2348021260000">(+234) 8021260000</a></p>
					<p><a href="tel:+2347020600000">(+234) 7020600000</a></p>
					<p><a href="tel:+2348021260000">(+234) 8037478593</a></p>
				</div>
			</div>
		</div>
		<div id="nav_menu-2" class="sidebar-item col-xs-12 col-sm-6 col-md-3 widget_nav_menu">
			<div class="item-wrap">
				<h5>explore</h5>
				<div class="menu-footer-menu-container">
					<ul id="menu-footer-menu" class="menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198">
							<a href="./about">About us</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-197">
							<a href="./contact">Contact us</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105">
							<a href="./works">Works</a>
						</li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199">
							<a href="./services">Services</a>
						</li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199">
							<a href="./team">Team</a>
						</li>
						<li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199">
							<a href="./consultation">Free consultation</a>
						</li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199">
							<a href="./project">Start a project</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="text-3" class="sidebar-item col-xs-12 col-sm-6 col-md-3 widget_text">
			<div class="item-wrap">
				<h5>Office</h5>
				<div class="textwidget">
					<p>#4 Amadi-ama Trans-Amadi Industrial Layout, Port Harcourt, Nigeria</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 footer-socials text-center col-sm-6">
		<a href="https://www.facebook.com/ibrandafricagroup" target="_blank">
			<i class="fa fa-facebook-square"></i>
		</a>
		<a href="https://twitter.com/ibrandafricagroup" target="_blank">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="https://www.instagram.com/ibrandafricagroup" target="_blank">
			<i class="fa fa-instagram"></i>
		</a>
	</div>
	<div class="copyright col-xs-12 text-center col-sm-6">©iBrand Africa, Copyright by
		<a href="http://ibrandafrica.com/">iBrandafrica.com</a>
	</div>
	</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>
	<script src="https://www.youtube.com/iframe_api"></script>
	<script src="js/lib/modernizr-2.6.2.min.js"></script>
	<script src="js/lib/scripts.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/foxlazy.js"></script>
	<script src="js/jquery.easings.min.js"></script>
	<script src="js/jquery.multiscroll.min.js"></script>
	<script src="js/magnific.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/equalHeightsPlugin.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/jquery.fitvids.js"></script>
	<script src="js/swiper3.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/fragment.js"></script>
	<script src="js/scrollMonitor.js"></script>
	<script src="js/slider-transition.js"></script>
	<script src="js/slick.js"></script>
	<script src="js/jquery.sliphover.min.js"></script>
	<script src="js/pixi.min.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/parallax.lib.js"></script>
	<script src="js/typed.js"></script>
	<script src="js/headings.js"></script>
	<script src="js/nprogress.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
	<script src="js/jquery.steps.min.js"></script>
	<script src="lib/swiper-master/package/js/swiper.min.js"></script>
	<script src="js/services.js"></script>
	<script src="js/lightgallery.min.js"></script>
	<script src="js/banner_slider.js"></script>
	<script src="js/foxlazy.js"></script>
	<script src="js/app.js"></script>

	<script>
		hoverlogo.src = 'img2/logo_ibrand/brand__logo.png';

		$('#profile-form').validate();
		$('#jquery-steps').steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				onStepChanging: function (event, currentIndex, newIndex)
				{
					if (newIndex<currentIndex){
						return true;
					}
					var form=$('.body.current form');
					if (form.length==1){
						form.validate().settings.ignore = ":disabled,:hidden";
						return form.valid();
					}
					return true;
				},
				onFinishing: function (event, currentIndex)
				{

					var form=$('.body.current form');
					if (form.length==1){
						form.validate().settings.ignore = ":disabled";
						return form.valid();
					}
					console.log(form);
					return true;
				},
				onFinished: async function (event, currentIndex)
				{
					payload = {
						projectname: $('[name=projectname]').val(),
						desc: $('[name=desc]').val(),
						firstname: $('[name=firstname]').val(),
						lastname: $('[name=lastname]').val(),
						email: $('[name=email]').val(),
						phone: $('[name=phone]').val()
					}

					await fetch(endpoint + 'client/project', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json'
						},
						body: JSON.stringify(payload)
					})
					.then(response => {
						if (response.status == 400){
							Promise.reject(response);
							swal({
								title: "Error!",
								text: response.statusText,
								icon: "error",
							});
						}else {
							Promise.resolve(response)
							swal({
								title: "You're doing well!",
								text: "You will hear from us shortly",
								icon: "success",
							})
							.then(() => location.reload());
						}
					})
					.catch(error => {
						swal({
							title: "Error!",
							text: error.message,
							icon: "error",
						});
					})
				}
		});
	</script>
	</body>
	</html>
