<!-- Footer start -->
<footer class="footer">
	<div class="container footer-inner">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
				<div class="footer-item clearfix">
					<img src="<?=base_url()?>assets/home/img/logos/logo.png" alt="logo" class="f-logo">
					<div class="text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae posuere sapien vitae posuere.</p>
					</div>
				</div>
			</div>
			<?php /** @var array $social_links */ ?>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
				<div class="footer-item">
					<h4>Contact Us</h4>
					<ul class="contact-info">
						<li>
							<i class="flaticon-pin"></i>Lorem Ipsum Lorem Ipsum
						</li>
						<li>
							<i class="flaticon-mail"></i><a href="mailto:<?= $social_links->email ?>"><?= $social_links->email ?></a>
						</li>
						<li>
							<i class="flaticon-phone"></i><a href="tel:+91<?= $social_links->mobile ?>"><?= $social_links->mobile ?></a>
						</li>
						<li>
							<i class="flaticon-fax"></i>0123456789
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
					<h4>Subscribe</h4>
					<div class="Subscribe-box">
						<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
						<form class="form-inline" action="<?=base_url('subscribers')?>" method="POST">
							<input type="text" name="email" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
							<button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<p class="copy">©  <a href="#"></a> <?=date('Y')?> City Prop Realtors</p>
				</div>
				<div class="col-lg-4 col-md-12">
					<ul class="social-list clearfix">
						<li><a href="<?= $social_links->facebook ?>" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?= $social_links->twitter ?>" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?= $social_links->instagram ?>" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
						<li><a href="<?= $social_links->linked_in ?>" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
					</ul>
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
