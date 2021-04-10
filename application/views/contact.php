<!-- Sub banner start -->
<div class="Home-sub-banner">
	<div class="container">
		<div class="breadcrumb-area">
			<h1>Contact us</h1>
			<ul class="breadcrumbs">
				<li><a href="<?=base_url()?>">Home</a></li>
				<li class="active">Contact us</li>
			</ul>
		</div>
	</div>
</div>
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 Home-content-area">
	<div class="container">
		<!-- Main title -->
		<div class="main-title text-center">
			<h1>Contact Us</h1>
<!--			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
		</div>
		<form action="<?=base_url('contact')?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-7">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group name">
								<input type="text" name="name" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group email">
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group subject">
								<input type="text" name="subject" class="form-control" placeholder="Subject">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group number">
								<input type="text" name="phone" class="form-control" placeholder="Number">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group message">
								<textarea class="form-control" name="message" placeholder="Write message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="send-btn text-center">
								<button type="submit" class="btn btn-md button-theme">Send Message</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="contact-info">
						<div class="media">
							<i class="flaticon-phone"></i>
							<div class="media-body">
								<h5>Phone:</h5>
								<p><a href="tel:+91<?= $social_links->mobile ?>">+91 <?= $social_links->mobile ?></a></p>
							</div>
						</div>
						<div class="media">
							<i class="flaticon-mail"></i>
							<div class="media-body">
								<h5>Email:</h5>
								<p><a href="mailto:<?= $social_links->email ?>"><?= $social_links->email ?></a></p>
							</div>
						</div>
<!--						<div class="media">-->
<!--							<i class="flaticon-internet"></i>-->
<!--							<div class="media-body">-->
<!--								<h5>Web:</h5>-->
<!--								<p><a href="#">info@test.com</a></p>-->
<!--							</div>-->
<!--						</div>-->

					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Contact 2 end -->

<!-- Google map start -->
<div class="section">
	<div class="map">

		<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497698.6600798865!2d77.35073573336324!3d12.954517008640543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1612883988130!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

	</div>
</div>
<!-- Google map end -->
