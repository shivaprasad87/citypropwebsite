<!-- Sub banner start -->
<div class="Home-sub-banner">
	<div class="container">
		<div class="breadcrumb-area">
			<h1>About Us</h1>
			<ul class="breadcrumbs">
				<li><a href="<?= base_url() ?>">Home</a></li>
				<li class="active">About Us</li>
			</ul>
		</div>
	</div>
</div>
<!-- Sub Banner end -->

<!-- About city estate start -->
<div class="about-content  Home-content-area bg-grea-3">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="about-info">
					<img class="d-block w-100" src="assets/img/properties/properties-6.jpg" alt="Third slide">
					<div class="Properties-info">
						<!-- <ul>
							<li>
								<i class="flaticon-bed"></i>
								<h4>Bed 3</h4>
							</li>
							<li>
								<i class="flaticon-bathroom"></i>
								<h4>Beds 2</h4>
							</li>
							<li>
								<i class="flaticon-area"></i>
								<h4>SQ.FT 3500</h4>
							</li>
							<li>
								<i class="flaticon-car"></i>
								<h4>Garage 1</h4>
							</li>
						</ul> -->
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="about-text">
					<?php
					if (($option = $this->aboutUs_model->getOption('first_title')) != null) {
						?>
						<h3><?= $option ?></h3>
						<?php
					}
					?>
					<p><?= $this->aboutUs_model->getOption('first_content') ?></p>
					<!--0-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- About city estate end -->


<!-- Counters 2 strat -->
<div class="counters-2 overview-counter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="media counter-box">
					<div class="icon">
						<i class="flaticon-sale"></i>
					</div>
					<div class="media-body align-self-center">
						<h2 class="counter Starting">967</h2>
						<p>Apartment</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="media counter-box">
					<div class="icon">
						<i class="flaticon-rent"></i>
					</div>
					<div class="media-body align-self-center">
						<h2 class="counter Starting">967</h2>
						<p>Villas</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="media counter-box">
					<div class="icon">
						<i class="flaticon-user"></i>
					</div>
					<div class="media-body align-self-center">
						<h2 class="counter Starting">967</h2>
						<p>Plots</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="media counter-box">
					<div class="icon">
						<i class="flaticon-broker"></i>
					</div>
					<div class="media-body align-self-center">
						<h2 class="counter Starting">967</h2>
						<p>Independent House</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Counters 2 end -->

<!-- Services start -->
<div class="services content-area bg-grea-3">
	<div class="container">
		<!-- Main title -->
		<div class="main-title text-center">
			<h1>What Are You Looking For</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
		<div class="row ">

			<div class=" col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">
							<div class="icon">
								<i class="flaticon-apartment"></i>
							</div>
							<h3>
								<a href="">Apartments</a>
							</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt</p>
							<a href="<?=base_url('listing').'?place=apartments'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">
							<div class="icon">
								<i class="flaticon-broker"></i>
							</div>
							<h3>
								<a href="">
									Houses
								</a>
							</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt</p>
							<a href="<?=base_url('listing').'?place=houses'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">
							<div class="icon">
								<i class="flaticon-empire-state-building"></i>
							</div>
							<h3>
								<a href="">
									Villas
								</a>
							</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt</p>
							<a href="<?=base_url('listing').'?place=villas'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">0
							<div class="icon">
								<i class="flaticon-area"></i>
							</div>
							<h3>
								<a href="">
									Plots
								</a>
							</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt</p>
							<a href="<?=base_url('listing').'?place=plots'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
<!-- Services end -->

<!-- Testimonial start -->
<div class="testimonial testimonial-2 t4 Home-content-area bg-grea-3">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6 align-self-center mb-30">
				<!-- Main title -->
				<div class="main-title main-title-3">

					<center>
						<h1>Our Testimonial</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
						<a href="<?= base_url('contact') ?>" class="btn important-btn btn-theme btn-md">Contact us</a>
					</center>

				</div>
			</div>
			<div class="col-lg-12">
				<!-- Slick slider area start -->
				<div class="slick-slider-area">
					<div class="row slick-carousel">
						<?php
						/**
						 * @var array $testimonials
						 */
						if (count($testimonials) > 0) {
							foreach ($testimonials as $testimonial) {
								?>
								<div class="slick-slide-item">
									<div class="testimonial-info-box">
										<div class="profile-user">
											<div class="avatar">
												<img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>"
													 alt="testimonial-2">
											</div>
										</div>
										<h5>
											<a href="#"><?= $testimonial->name ?></a>
										</h5>
										<h6> <?= $testimonial->job_desc ?></h6>
										<p><i class="fa fa-quote-left"></i><?= $testimonial->comment ?> <i
													class="fa fa-quote-right"></i></p>
									</div>
								</div>

								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Testimonial end -->
