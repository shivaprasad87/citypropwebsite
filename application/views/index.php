<!-- Banner start -->
<div class="banner banner" id="banner">
	<div id="bannerCarousole" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $desk = 0;
			/** @var array $sliders */
			foreach ($sliders as $slider) {
				$img = array();
				$img = explode('.', $slider->image);

				?>
				<div class="carousel-item banner-max-height item-bg <?= ($desk == 0) ? 'active' : ''; ?>">
					<img class="d-block w-100 h-100" src="<?= base_url('uploads/sliders/' . $slider->image) ?>"
						 alt="banner">
					<div class="carousel-caption banner-slider-inner d-flex h-100">
						<div class="carousel-content container">
							<div class="text-c">
								<h3><?= $slider->heading ?></h3>
								<p>
									<?= $slider->title ?>
								</p>
								<!-- <a href="#" class="btn btn-lg btn-white-lg-outline btn-half site-button"><span>Get Started Now</span></a>
								<a href="#"
								   class="btn btn-lg btn-white-lg-outline btn-half site-button"><span>Free Download</span></a> -->
							</div>
						</div>
					</div>
				</div>
				<?php
				$desk++;
			}
			?>
		</div>
		<div class="btn-secton">
			<ol class="carousel-indicators">
				<?php
				$i = 0;
				foreach ($sliders as $slider) {
					?>
					<li data-target="#bannerCarousole" data-slide-to="<?= $i ?>>"
						class="<?= ($desk == 0) ? 'active' : ''; ?>"></li>
					<?php
					$i++;
				}
				?>
			</ol>
		</div>
	</div>
	<div class="container search-options-btn-area">
		<a class="search-options-btn d-lg-none d-xl-none">
			<div class="search-options">Search Options</div>
			<div class="icon"><i class="fa fa-chevron-up"></i></div>
		</a>
	</div>
	<!-- Search Section start -->
	<div class="search-section ss-2" id="search-style-2">
		<div class="container">
			<div class="search-section-area ssa2">
				<div class="search-area-inner">
					<div class="search-contents">
						<form action="<?= base_url('searchListing') ?>" method="post">
							<div class="row">

								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<select class="selectpicker search-fields" name="property_type">
											<option value="">--Select Type--</option>
											<?php
											foreach ($property_types as $property_types) {
												echo "<option value='" . $property_types->id . "'>" . $property_types->name . "</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<select class="selectpicker search-fields" name="city">
											<option value="">--Select City--</option>
											<?php
											foreach ($cities as $cities) {
												echo "<option value='" . $cities->id . "'>" . $cities->name . "</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<div class="range-slider">
											<div data-min="0" data-max="15000000" data-unit="Rs" data-min-name="min_price"
												 data-max-name="max_price" class="range-slider-ui ui-slider"
												 aria-disabled="false"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<button class="search-button">Search</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner end -->

<!-- Search Section start -->
<div class="search-section search-area bg-grea animated fadeInDown" id="search-style-1">
	<div class="container">
		<div class="search-section-area">
			<div class="search-area-inner">
				<div class="search-contents">
					<form method="GET">
						<div class="row">

							<div class="col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="all-type">
										<option>All Type</option>
										<option>Apartments</option>
										<option>Plots</option>
										<option>Commertial</option>
										<option>Villa</option>
									</select>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="location">
										<option>location</option>
										<option>Bangalore</option>
										<option>Pune</option>
										<option>Hydrabad</option>

									</select>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<div class="range-slider">
										<div data-min="0" data-max="15000000" data-unit="INR" data-min-name="min_price"
											 data-max-name="max_price" class="range-slider-ui ui-slider"
											 aria-disabled="false"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<button class="search-button">Search</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Search Section end -->
<br>
<br>
<!-- Services start -->
<div class="services content-area bg-grea-3">
	<div class="container">
		<!-- Main title -->
		<div class="main-title text-center">
			<h1>What Are You Looking For</h1>
			<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
		</div>
		<div class="row ">

			<div class="col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">
							<div class="icon">
								<i class="flaticon-apartment"></i>
							</div>
							<h3>
								<a href="">Apartments</a>
							</h3>
							<p>Explore The Best In Class Luxury Apartments With Best Deals In Bangalore</p>
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
							<p>Explore The Best In Class Independent Houses With Best Deals In Bangalore</p>
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
							<p>Explore The Best In Class Luxurious Villa Properties With Best Deals In Bangalore</p>
							<a href="<?=base_url('listing').'?place=villas'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-6">
				<div class="Looking-For btn-6">
					<div class="bo">
						<div class="service-info-4">
							<div class="icon">
								<i class="flaticon-area"></i>
							</div>
							<h3>
								<a href="">
									Plots
								</a>
							</h3>
							<p>Checkout The Selected Plotted Development From Top Builders In Bangalore</p>
							<a href="<?=base_url('listing').'?place=plots'?>" class="btn btn-theme btn-half site-button btn-md"><span>Read more</span></a>
						</div>
					</div>
				</div>
			</div>


		</div>

	</div>
</div>
<!-- Services end -->

<!-- Featured Properties start -->
<div class="featured-properties content-area">
	<div class="container">
		<!-- Main title -->
		<div class="main-title">
			<h1>Featured Properties In Your City</h1>
			<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
		</div>
		<!-- Slick slider area start -->
		<div class="slick-slider-area">
			<div class="row slick-carousel"
				 data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
				<?php
				$i=1;
				$j=1;
				/** @var array $properties */
				if(count($properties)>0) {
				foreach ($properties as $property) {

				?>
				<div class="slick-slide-item">
					<div class="property-box-3">
						<div class="property-thumbnail">
							<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>" class="property-img">
								<div class="tag"><?=$property->prop_type?></div>
								<img class="d-block w-100" src="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"
									 alt="properties">
								<div class="price-box"><span><?php echo "Rs. " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
														'property_flat_types', null,
														'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0
										. " - " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
														'property_flat_types', null,
														'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0; ?>
													*</span></div>
								<div class="ratings">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<span>(23 reviews)</span>
								</div>
							</a>
						</div>
						<div class="details">
							<div class="top">
								<h1 class="title">
									<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>"><?= $property->title ?></a>
								</h1>
								<div class="location">
									<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>" tabindex="0">
										<i class="fa fa-map-marker"></i><?php echo $property->area . ", " . $property->city_name; ?>
									</a>
								</div>
							</div>
							<div class="facilities-list">
								<ul class="clearfix">
									<li>
										<span>Unit</span>2,3,4 BHK Apartments
									</li>


									<li>
										<span>Status</span><?= $property->issue_date; ?>
									</li>
								</ul>
							</div>
							<div class="footer clearfix">
								<div class="pull-left days">
									<p><a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>" class="btn btn-sm button-theme">Know More</a></p>
								</div>
								<ul class="pull-right">
									<li><a href="#"><i class="flaticon-heart"></i></a></li>
									<li><a href="#"><i class="flaticon-share"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php }
				} else {
					echo "No Properties Found!";
				}
				?>
			</div>
			<div class="slick-prev slick-arrow-buton clip-home">
				<i class="fa fa-angle-left"></i>
			</div>
			<div class="slick-next slick-arrow-buton clip-home">
				<i class="fa fa-angle-right"></i>
			</div>
		</div>
	</div>
</div>
<!-- Featured Properties end -->

<!-- Categories strat -->
<div class="categories content-area-7">
	<div class="container">
		<!-- Main title -->
		<div class="main-title text-center">
			<h1>Most Popular In City</h1>
			<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-12 col-md-6 col-pad" onclick="location.href='city/bangalore'">
						<div class="category">
							<div class="category_bg_box cat-1-bg">
								<div class="category-overlay">
									<div class="category-content">
										<h3 class="category-title">
											<a href="">Whitefield</a>
										</h3>
										<?php
										$content['city'] = 2;
										?>
										<h4 class="category-subtitle"><?php print($this->home_model->loadProperties(0, 0, true, $content));?> Properties</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-6 col-pad">
						<div class="category">
							<div class="category_bg_box cat-3-bg">
								<div class="category-overlay">
									<div class="category-content">
										<h3 class="category-title">
											<a href="#">K.R Puram</a>
										</h3>
										<h4 class="category-subtitle">98 Properties</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 col-pad">
				<div class="category">
					<div class="category_bg_box category_long_bg cat-4-bg">
						<div class="category-overlay">
							<div class="category-content">
								<h3 class="category-title">
									<a href="#">Sarjapur Road</a>
								</h3>
								<?php
								$content['city'] = 1;
								?>
								<h4 class="category-subtitle"><?php print($this->home_model->loadProperties(0, 0, true, $content));?> Properties</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-12 col-md-6 col-pad">
						<div class="category">
							<div class="category_bg_box cat-5-bg">
								<div class="category-overlay">
									<div class="category-content">
										<h3 class="category-title">
											<a href="#">South Bangalore</a>
										</h3>
										<h4 class="category-subtitle">98 Properties</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-6 col-pad">
						<div class="category">
							<div class="category_bg_box cat-2-bg">
								<div class="category-overlay">
									<div class="category-content">
										<h3 class="category-title">
											<a href="#">North Bangalore</a>
										</h3>
										<h4 class="category-subtitle">98 Properties</h4>
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
<!-- Categories end -->


<!-- Testimonial start -->
<div class="testimonial Home-content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 align-self-center">
				<!-- Main title -->
				<div class="main-title main-title-3">
					<h1>Our Testimonial</h1>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p> -->
					<a href="<?=base_url('contact')?>" class="btn important-btn btn-theme btn-md">Contact us</a>
				</div>
			</div>
			<div class="col-lg-7 offset-lg-1">
				<!-- Slick slider area start -->
				<div class="slick-slider-area">
					<div class="row slick-carousel"
						 data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

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
												<img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>" alt="testimonial-2">
											</div>
										</div>
										<h5>
											<a href="#"><?= $testimonial->name ?></a>
										</h5>
										<h6><?= $testimonial->job_desc ?></h6>
										<p><i class="fa fa-quote-left"></i> <?= $testimonial->comment ?><i class="fa fa-quote-right"></i></p>
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

<br>

<!-- Intro info start -->
<div class="intro-info ">
	<div class="container">
		<div class="row intro-section-2">
			<div class="col-lg-8 col-md-12 col-sm-12">
				<div class="intro-text">
					<h3>Talk To Our Property Adviser</h3>
				
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="Subscribe-box">
					<div class="form-inline" >
						<!-- <input type="text" class="form-control mb-sm-0" name="email" 
							   placeholder="Email Address"> -->
						<div class="form-control call-form mb-sm-0" id="inlineFormInputName4"><i class="fa fa-phone"></i>+91 874 684 2086</div>
						<button class="btn"><a href="tel:+918746842086">Call Now</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Intro section end -->

