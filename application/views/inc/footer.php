<!-- Footer start -->
<footer class="footer">
	<div class="container footer-inner">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
				<div class="footer-item clearfix">
					<img src="<?=base_url();?>img/logos/black-logo.png" alt="logo" class="f-logo">
					<div class="text">
						<p>City Prop Realtors -<br> The Fastest Growing Real Estate Company Providing Home Buying Solutions To Home Buyers.<br>
						RERA : AG001089</p>
						<p></p>
					</div>
				</div>
			</div>
			<?php /** @var array $social_links */ ?>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
				<div class="footer-item">
					<h4>Contact Us</h4>
					<ul class="contact-info">
						<li>
							<i class="flaticon-pin"></i>7th Floor, Raheja Tower 26/27 MG Road, Bangalore, karnataka 560001
						</li>
						<li>
							<i class="flaticon-mail"></i><a href="mailto:info@cityprop.com">
							<!-- <?= $social_links->email ?> -->
							info@cityprop.com</a>
						</li>
						<li>
							<i class="flaticon-phone"></i><a href="tel:+918746842086">
								<!-- <?= $social_links->mobile ?> -->+91 8746842086
							</a>
						</li>
						<li>
						<i class="fa fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=+918746842086&text=Hi%20I%27m%20interested%20In%20Buying/Investing%20In%20Real%20Estate.">+91 8746842086</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
				<div class="footer-item">
					<h4>
						Useful Links
					</h4>
					<ul class="links">
						<li>
							<a href="<?=base_url()?>">Home</a>
						</li>
						<li>
							<a href="<?=base_url('about')?>">About Us</a>
						</li>

						<li>
							<a href="<?=base_url('contact')?>">Contact Us</a>
						</li>
						<li>
							<a href="<?=base_url('careers')?>">Career</a>
						</li>
						<li>
							<a href="<?=base_url('blog')?>">Blog</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
				<div class="footer-item clearfix">
					<h4>Get In Touch</h4>
					<div class="Subscribe-box">
						<!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p> -->
						<form action="<?=base_url('home/sendEmail')?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group name col-md-12">
								<input type="text" name="name" class="form-control" placeholder="Your Name">
							</div>
							<div class="form-group number col-md-12">
								<input type="tel" name="phone" class="form-control" placeholder="Phone Number">
							</div>
							<div class="form-group email col-md-12">
								<input type="email" name="email" class="form-control" placeholder="Your Email">
							</div>
							
						
							<div class="send-btn text-center col-md-12">
								<button type="submit " class="btn btn-md button-theme">Submit</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="footer container">
					<ul class="social-list clearfix">
						<li><a href="<?= $social_links->facebook ?>" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?= $social_links->twitter ?>" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=+918746842086&text=Hi%20I%27m%20interested%20In%20Buying/Investing%20In%20Real%20Estate." class="whatsapp-bg"><i class="fa fa-whatsapp"></i></a></li>
						<li><a href="<?= $social_links->instagram ?>" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
						<li><a href="<?= $social_links->linked_in ?>" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
	</div>
	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 text-center">
					<p class="copy">©  <a href="#"></a> <?=date('Y')?> City Prop Realtors | RERA : AG001089</p>
				</div>
				
			</div>
		</div>
	</div>
</footer>
<!-- Footer end -->



<script src="<?=base_url('assets/home/js')?>/jquery-2.2.0.min.js"></script>

<!-- <script src="<?=base_url('assets/home/js')?>/popper.min.js"></script> -->
<script src="<?=base_url('assets/home/js')?>/bootstrap.min.js"></script>

<script src="<?=base_url('assets/js')?>/jquery.fancybox.pack.js"></script>
<script  src="<?=base_url('assets/home/js')?>/bootstrap-submenu.js"></script>
<script  src="<?=base_url('assets/home/js')?>/rangeslider.js"></script>
<script  src="<?=base_url('assets/home/js')?>/jquery.mb.YTPlayer.js"></script>
<script  src="<?=base_url('assets/home/js')?>/bootstrap-select.min.js"></script>
<script  src="<?=base_url('assets/home/js')?>/jquery.easing.1.3.js"></script>
<script  src="<?=base_url('assets/home/js')?>/jquery.scrollUp.js"></script>
<script  src="<?=base_url('assets/home/js')?>/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="<?=base_url('assets/home/js')?>/leaflet.js"></script>
<script  src="<?=base_url('assets/home/js')?>/leaflet-providers.js"></script>
<!-- <script  src="<?=base_url('assets/home/js')?>/leaflet.markercluster.js"></script>
<script  src="<?=base_url('assets/home/js')?>/dropzone.js"></script> -->
<script  src="<?=base_url('assets/home/js')?>/slick.min.js"></script>
<!-- <script  src="<?=base_url('assets/home/js')?>/jquery.filterizr.js"></script> -->
<script  src="<?=base_url('assets/home/js')?>/jquery.magnific-popup.min.js"></script>
<script  src="<?=base_url('assets/home/js')?>/jquery.countdown.js"></script>
<script  src="<?=base_url('assets/home/js')?>/maps.js"></script>
<script  src="<?=base_url('assets/home/js')?>/app.js"></script>


<script>
	$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: 'none',
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>

</body>

</html>
