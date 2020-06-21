<?php
$page = 'contact';
require_once('layouts/header.html')

?>

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
	<!-- awa contact-us.html template -->
	<?php
		$value = '';
		if(isset($_GET['q'])){
			$value = $_GET['q'];
		};
	?>
	<div id="contact" class="container-fluid">
		<div class="hero">
			<div class="row">
				<div class="col-xs-12 no-padd">
					<div class="contacts-info-wrap style3 full-height over">
						<div class="content-wrap">
							<div class="image-wrap full-height parallax-window full-height" data-parallax="scroll" data-position-Y="top" data-position-X="center" data-image-src="https://i.imgur.com/2l3ruze.jpg"></div>
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
<?php
require_once('layouts/footer.html')
?>
