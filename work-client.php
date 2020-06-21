<?php
require_once('layouts/header.html')
?>
	<div class="container-fluid portfolio-single-content simple_slider ">
		<div class="row">
			<div class="loader loading" id="loader-1"></div>
			<div class="swiper3-container post-media" data-mouse="0" data-autoplay="5000" data-loop="1" data-speed="1500" data-center="1" data-space="0" data-pagination-type="bullets" data-mode="horizontal">
                <div id="errorPage" class=""></div>
				<div id="sliders" class="swiper3-wrapper">
				</div>
				<div class="swiper3-pagination"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div id="desc" class="desc-wrapper">
				</div>

				<div id="projectImages" class="images-wrap izotope-container light-gallery insta-wrapper">
				</div>
<!--				<div class="blockquote">this is an excellent company! I personally enjoyed the energy and the professional support the whole team gave to us into creating website.<cite>insightstudio</cite></div>-->
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="single-pagination simple_slider">
					<div class="pag-prev">
                        <span>
                            <span>check out previous Jobs</span>
                            <span id="getPrevious" class="content" style="cursor: pointer; color: #3d3d3d">Previous project</span>
                        </span>
					</div>

					<div class="icon-wrap"><i class="fa fa-th-large"></i></div>
					<div class="pag-next">
                        <span>
                            <span>check out more jobs</span>
                            <span id="getNext" class="content" style="cursor: pointer; color: #3d3d3d">Next project</span>
                        </span>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php
    require_once('layouts/footer.html')
    ?>
