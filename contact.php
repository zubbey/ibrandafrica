<?php
$page = 'contact';
require_once('layouts/header.html')

?>
	<!-- awa contact-us.html template -->
	<div id="contact" class="container-fluid">
		<div class="hero">
			<div class="row">
				<div class="col-xs-12 no-padd">
					<div class="contacts-info-wrap style3 full-height over">
						<div class="content-wrap">
							<div class="image-wrap full-height parallax-window full-height" data-parallax="scroll" data-position-Y="top" data-position-X="center" data-image-src="https://i.imgur.com/ojWWzPj.jpg"></div>
							<div class="content ">
								<h2 class="title-main">contact us</h2>
								<div class="text">interested in working with us?</div>
								<div class="form-wrap form">
									<div role="form" class="wpcf7" id="wpcf7-f124-p195-o1" lang="en-US" dir="ltr">
										<div class="screen-reader-response"></div>
										<span></span>
										<form id="contactForm" class="wpcf7-form" novalidate="novalidate">
											<p>
												<span class="wpcf7-form-control-wrap name">
													<input type="text" name="fullname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your name*" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
													<div class="validation name"></div>
												</span>
												<br />
												<span class="wpcf7-form-control-wrap email">
													<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your e-mail*" data-rule="email" data-msg="Please enter a valid email" />
													<div class="validation"></div>
												</span>
												<br />
												<span class="wpcf7-form-control-wrap name">
													<input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your phone number*" data-rule="minlen:2" data-msg="Please enter a valid number" />
													<div class="validation"></div>
												</span>
												<br />
												<span class="wpcf7-form-control-wrap textarea">
													<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your message*" data-rule="required" data-msg="Please write something"></textarea>
													<div class="validation"></div>
												</span>
												<br />
												<button id="sendBtn" type="submit" class="btn btn-block btn-lg btn-primary"><i class="fa fa-envelope"></i> Send Message</button>
											</p>
											<div class="wpcf7-response-output wpcf7-display-none"></div>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 no-padd">
					<div class="contacts-info-wrap style4">
						<div class="additional-content-wrap">
							<div class="container">
								<div class="row">
									<div class="text col-xs-12 col-sm-6">
										iBrand Africa was founded in 2006 by our Passionate business analyst Ernest Nnadi, Through partnerships with creative minds who aspire to unlock the unique value of brand innovation.
										<p>With collaboration and in-depth consultation, we deliver expert branding, web/app development and brand communications services to help these businesses achieve their potential in full.</p>
									</div>
									<div class="content-items col-xs-12 col-sm-6">
										<div class="content-item">
											<h5 class="title">address:</h5>
											<div class="address">#4 Amadi-ama Trans-Amadi Industrial Layout, Port Harcourt, Nigeria</div>
										</div>
										<div class="content-item">
											<h5 class="title">phone:</h5>
											<a href="tel:+7599334345" class="email">(+234) 8021260000</a>
											<a href="tel:+7599334345" class="email">(+234) 8037478593</a>
										</div>
										<div class="content-item">
											<h5 class="title">email:</h5>
											<a href="email:info@ibrandafrica.com" class="email"><span class="__cf_email__" >info@ibrandafrica.com</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
require_once('layouts/footer.html')
?>
