<?php
$page = 'services';
require_once('layouts/header.html')

?>
<style>
.img-wrap img{
	width: 100%;
	height: 250px;
}
.services.classic .img-wrap{
	margin: 0 0 20px !important;
}
.services.classic .content .text{
	padding: 0 0 30px 0;
}
.contacts-info-wrap.style3 .form-wrap {
    margin-top: 30px;
}
</style>
	<!-- awa services.html template -->

	<?php
		if(isset($_GET['q'])){
			echo '
			<div class="container-fluid">
				<div class="hero">
					<div id="service" class="row">
						<div class="loader loading" id="loader-1" style="margin: 100px auto;"></div>
					</div>
				</div>
			</div>
			';
		} else if(isset($_GET['search'])){
			echo '
			<div class="container-fluid">
				<div class="hero">
					<div class="row margin-lg-140t margin-md-60t margin-sm-40t margin-xs-20t">
						<div class="container">
							<div id="serviceHeader" class="row">
								<div class="col-xs-12">
									<div class="headings-wrap not-bg-title  load-fade">
										<div class="headings style2">
											<div class="content">
												<div class="info">
													<h5 class="subtitle" style="color:#f54ea2">our services</h5>
													<h3 class="title" style="color:#222222">We will help you to achieve your goals and to grow your business.</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-lg-120b margin-lg-70t margin-md-100b margin-ms-60t margin-sm-80b margin-sm-50t margin-xs-50b margin-sm-30t">
						<div class="container">
							<div class="loader loading" id="loader-1"></div>
							<div class="row" id="searched_services">
							</div>
						</div>
					</div>
				</div>
		</div>
			';
		}
		else {
			echo '
			<div class="container-fluid">
				<div class="hero">
					<div class="row margin-lg-140t margin-md-60t margin-sm-40t margin-xs-20t">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="headings-wrap not-bg-title  load-fade">
										<div class="headings style2">
											<div class="content">
												<div class="info">
													<h5 class="subtitle" style="color:#f54ea2">our services</h5>
													<h3 class="title" style="color:#222222">We will help you to achieve your goals and to grow your business.</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-lg-120b margin-lg-70t margin-md-100b margin-ms-60t margin-sm-80b margin-sm-50t margin-xs-50b margin-sm-30t">
						<div class="container">
							<div class="loader loading" id="loader-1"></div>
							<div class="row" id="services">
							</div>
						</div>
					</div>
					<div class="row bg_grey">
						<div class="container">
							<div class="row margin-lg-35b margin-md-0b margin-sm-0b margin-xs-0b padding-lg-105t padding-md-85t padding-sm-65t padding-sm-00b padding-xs-35t padding-xs-0b">
								<div class="col-sm-6 col-lg-4 col-md-4 col-xs-12 margin-lg-30b margin-xs-15b">
									<div class="services center">
										<div class="content ">
											<i class="icon-layers-2" style="color: rgb(245, 78, 162);" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#f54ea2\'"></i>
											<h4 class="title animation">user experience</h4>
											<div class="text">UX Design Services. Creating intelligently personalized user experiences that are custom tailored to your audience delivering engaging digital experiences.<br>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 col-md-4 col-xs-12 margin-lg-30b margin-xs-15b">
									<div class="services center">
										<div class="content ">
											<i class="icon-bookmark-3" style="color:#ffdd65" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#ffdd65\'"></i>
											<h4 class="title animation">interface design</h4>
											<div class="text">We craft user interfaces that fit both brand & product function.</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-4 col-xs-12 margin-lg-30b margin-xs-15b">
									<div class="services center">
										<div class="content ">
											<i class="icon-smartphone" style="color:#f54ea2" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#f54ea2\'"></i>
											<h4 class="title animation">mobile apps</h4>
											<div class="text">We cover end-to-end development of mobile apps, from BA and UI/UX design to deployment or online market publication.<br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row bg_grey">
						<div class="container">
							<div class="row">
								<div class="row margin-lg-75b margin-md-65b margin-sm-35b margin-xs-20b">
									<div class="col-sm-6 col-lg-4 col-md-4 col-xs-12 margin-lg-30b margin-xs-15b">
										<div class="services center">
											<div class="content ">
												<i class="icon-help-2" style="color:#ffdd65" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#ffdd65\'"></i>
												<h4 class="title animation">brand guildline</h4>
												<div class="text">Brand guidelines might not be as exciting as a strapline, a colourway or a logo.</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-lg-4 col-md-4 col-xs-12 margin-lg-30b margin-xs-15b">
										<div class="services center">
											<div class="content ">
												<i class="icon-planet" style="color:#f54ea2" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#f54ea2\'"></i>
												<h4 class="title animation">brand elements & components</h4>
												<div class="text">The way a business looks and sounds is tied up in their brand identity.</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-0 col-lg-4  col-xs-12 margin-lg-30b margin-xs-15b">
										<div class="services center">
											<div class="content ">
												<i class="icon-cooking-timer-3" style="color:#ffdd65" onmouseover="this.style.color=\'#ffdd65\'" onmouseout="this.style.color=\'#ffdd65\'"></i>
												<h4 class="title animation">rebranding</h4>
												<div class="text">Rebranding needn’t cost the earth or cause a headache.</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-lg-110t margin-lg-120b margin-md-90t margin-md-100b margin-sm-70t margin-sm-80b margin-xs-40t margin-xs-50b">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="info-block-wrap style-1">
										<div class="row">
											<div class="image-wrap col-xs-12 col-sm-6 col-sm-push-6">
												<div class="image-container">
													<img src="https://i.imgur.com/ZrcHrrI.jpg" class="info-block-img" alt="" />
												</div>
											</div>
											<div class="content-wrap col-xs-12 col-sm-6 col-sm-pull-6">
												<div class="content">
													<p></p>
													<h2>Your identity musts be <span style="color: #f54ea2">authentic</span></h2>
													<p>Startup brands are in a tough position. You want to earn the loyalty of your target customers, but you need to act fast to make sure that you get their attention before your competitors do.
													At iBrand Africa we do the following to mentain authenticity</p>
													<ul>
														<li>We Define Your Purpose + Passions</li>
														<li>We Understand Your Audience</li>
														<li>We Create an Experience of Transformation</li>
														<li>We make Your Brand Ecosystem Unique</li>
														<li>We Become your Brand Biggest Advocate</li>
													</ul>
													<p></p>
												</div>
												<div class="but-wrap">
													<a href="works" rel="" class="a-btn-4">view our work</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 no-padd">
							<div class="call-to-action default">
								<div class="text-left-wrap" style="background-color:#ffdd65; color: #333">
									<h4 class="title"  >we believe in creativity</h4>
									<h4 class="subtitle" >We offer a full range of Web Design Services, Social Media Marketing, Multimedia Galleries, Search Engine Optimization services and more. We specialize in affordable website design services for small to medium businesses</h4>
								</div>
								<div class="image-wrap">
									<img src="https://i.imgur.com/pI8DwH6.jpg" class="s-img-switch" alt="" />
								</div>
								<div class="text-right-wrap">
									<img src="img/dotts.png" alt="" class="s-img-switch">
									<div class="text">Start a project<br/>with iBrand Africa?</div>
									<div class="text-center">
										<a href="project" class="a-btn">Get Started</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			';
		}
	?>

<?php
require_once('layouts/footer.html')
?>
