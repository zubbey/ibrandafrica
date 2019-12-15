<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>iBrand Africa | Gallery</title>
	<!-- Bootstrap CSS -->
	<?php include("components/navbar.php"); ?>

	<!--================ Start Services Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-right">
					<h1>Photos</h1>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="photos.php">Photos</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================ Start Gallery Area =================-->
	<section class="section_gap Photos_area" id="photos">
		<div class="container text-center">
		<div class="section-top-border">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="main-title">
						<h1>Our Photos over the years</h1>
						<p>get to know more about our latest project on web development /design, stationaries, Booklet, T-Shirt, and Products.</p>
					</div>
				</div>
			</div>
				<h3 class="title_color text-center">As an entrepreneur, you never stop learning...</h3>
			</div>

			<div class="row gallery " id="instafeed"></div>

            <a href="https://www.instagram.com/ibrandafrica/" target="_blank" class="primary-btn" id="more">More photos</a>
			
		</div>
	</section>
	<!--================ End Gallery Area =================-->

<?php include("components/footer.php")?>

    <script>
		$(document).ready(function() {

			
		    var userFeed = new Instafeed({
		        get: 'user',
		        userId: '1216467727',
		        filter: function(image) {
			        return image.tags.indexOf('branding') >= 0;
			    },
		        limit: 40,
		        resolution: 'standard_resolution',
		        accessToken: '1216467727.1677ed0.f48401b90f4c4132afc776b9be779352',
		        sortBy: 'most-recent',
		        template: '<div class="col-lg-3 gallery instaimg hovereffect"><a href="{{image}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-fluid img-responsive"/></a></div>',
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

		    // $('#more').click(function(){
		    // 	// limit-num * 2;
		    // 	// userFeed.limit:24
		    // 	alert('works!')
		    // });

		    $('#work').on('click',function(){
		    	$('ul.dropdown-menu').toggleClass("d-block"),ease;
		    });
		});
	</script>

</body>

</html>