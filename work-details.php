<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>iBrand Africa | Latest Work</title>
	<!-- Bootstrap CSS -->
	<?php include("components/navbar.php"); ?>

	<!--================ Start portfolio Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-right">
					<h1>Latest Work</h1>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="services.php">Work</a>
						<a href="index.php">Latest Work</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Portfolio Banner Area =================-->

	<!--================ Start Portfolio Details Area =================-->
	<section class="portfolio_details_area section_gap">
		<div class="container">
			<div class="portfolio_details_inner">
				<div class="row">
					<div class="col-md-6">
						<div class="left_img">
							<img class="img-fluid" src="img/works/project-details-1.jpg" alt="">
						</div>
					</div>
					<div class="offset-md-1 col-md-5">
						<div class="portfolio_right_text mt-30">
							<h4>Lavendar ambient colorlib</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							<ul class="list">
								<li><span>Rating</span>: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									 class="fa fa-star"></i></li>
								<li><span>Client</span>: colorlib</li>
								<li><span>Website</span>: colorlib.com</li>
								<li><span>Completed</span>: 17 Aug 2018</li>
							</ul>
							<ul class="list social_details">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
					magna.</h3>
				<p>Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
					sunt
					in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
					voluptatem
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
					architecto
					beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
					quia
					consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
					quia
					dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
					magnam
					aliquam quaerat voluptatem.</p>
			</div>
		</div>
	</section>
	<!--================ Start Portfolio Details Area =================-->
	
<?php include("components/footer.php")?>
	<script>			

		$('#work').on('click',function(){
			$('ul.dropdown-menu').toggleClass("d-block"),ease;
		});
	</script>
</body>

</html>