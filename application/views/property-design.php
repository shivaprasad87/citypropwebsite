<?php
$property->gallery = json_decode(json_encode($property->gallery), true);
$gallery_images = array();
foreach ($property->gallery as $gallery) {
	if (is_array($gallery)) {
		foreach ($gallery as $gal) {
			array_push($gallery_images, $gal['image']);
		}
	} else {
		array_push($gallery_images, $gallery['image']);
	}
}
if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
				'property_desktop_banners')) != null) {
	if (($m_images = $this->properties_model->getWhere(array('property_id' => $property->id),
					'property_mobile_banners')) != null) {

		$images = json_decode(json_encode($images), true);
		$m_images = json_decode(json_encode($m_images), true);
		$total_images = array_merge($images);
		//  print_r($m_images);die;

		$ban = 0;
		$side_image = '';
		//print_r($total_images);die;
		foreach ($total_images as $image) {
			array_push($gallery_images, $images[$ban]['banner_path']);
			array_push($gallery_images, $m_images[$ban]['mobile_banner_path']);


		}
	}
}
$this->load->view('inc/head2');
$this->load->view('inc/header');

?>
<!-- Properties details Slider -->
<div class="properties-details-Slider">
	<div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide">
		<div class="carousel-inner">
			<?php
			$i = 0;
			foreach ($gallery_images as $gallery) {
				?>
				<div class="<?= ($i == 0) ? 'active ' : '' ?>item carousel-item overview-counter-2"
					 data-slide-number="<?= $i ?>>">
					<img src="<?= base_url() . $gallery ?>" class="img-fluid slider-listing" alt="slider-properties">
				</div>
				<?php
				$i++;
			}
			?>


			<!--			<div class="item carousel-item overview-counter-2" data-slide-number="1">-->
			<!--				<img src="-->
			<? //=base_url()?><!--assets/img/img-2.jpg" class="img-fluid slider-listing" alt="slider-properties">-->
			<!--			</div>-->
			<!--			<div class="item carousel-item overview-counter-2" data-slide-number="2">-->
			<!--				<img src="-->
			<? //=base_url()?><!--assets/img/img-3.jpg" class="img-fluid slider-listing" alt="slider-properties">-->
			<!--			</div>-->
		</div>
		<ul class="carousel-indicators smail-properties list-inline nav nav-justified">
			<?php
			$i = 0;
			foreach ($gallery_images as $gallery) {
				?>
				<li class="list-inline-item <?= ($i == 0) ? 'active ' : '' ?>">
					<a id="carousel-selector-0" class="selected" data-slide-to="<?= $i ?>"
					   data-target="#propertiesDetailsSlider">
						<img src="<?= base_url() . $gallery ?>" class="img-fluid" alt="properties-small">
					</a>
				</li>
				<?php
				$i++;
			}
			?>
		</ul>

	</div>
</div>

<!-- Properties details page start -->
<div class="properties-details-page content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<!-- Advanced search start -->
				<div class="widget-2 advanced-search  bg-grea-2 d-lg-none d-xl-none">
					<h3 class="sidebar-title">Advanced Search</h3>
					<div class="s-border"></div>
					<div class="m-border"></div>
					<form method="GET">
						<div class="form-group">
							<select class="selectpicker search-fields" name="all-status">
								<option>All Status</option>
								<option>For Sale</option>
								<option>For Rent</option>
							</select>
						</div>
						<div class="form-group">
							<select class="selectpicker search-fields" name="all-type">
								<option>All Type</option>
								<option>Apartments</option>
								<option>Shop</option>
								<option>Restaurant</option>
								<option>Villa</option>
							</select>
						</div>
						<div class="form-group">
							<select class="selectpicker search-fields" name="commercial">
								<option>Commercial</option>
								<option>Residential</option>
								<option>Commercial</option>
								<option>Land</option>
							</select>
						</div>
						<div class="form-group">
							<select class="selectpicker search-fields" name="location">
								<option>location</option>
								<option>United States</option>
								<option>American Samoa</option>
								<option>Belgium</option>
								<option>Canada</option>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="bedrooms">
										<option>Bedrooms</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="bathroom">
										<option>Bathroom</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="balcony">
										<option>Balcony</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<select class="selectpicker search-fields" name="garage">
										<option>Garage</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
						</div>
						<div class="range-slider clearfix form-group">
							<label>Area</label>
							<div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area"
								 data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
							<div class="clearfix"></div>
						</div>
						<div class="range-slider clearfix form-group mb-30">
							<label>Price</label>
							<div data-min="0" data-max="150000" data-min-name="min_price" data-max-name="max_price"
								 data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
							<div class="clearfix"></div>
						</div>
						<div class="form-group mb-0">
							<button class="search-button">Search</button>
						</div>
					</form>
				</div>
				<!-- Tabbing box start -->
				<div class="tabbing tabbing-box mb-40">
					<ul class="nav nav-tabs" id="carTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab"
							   aria-controls="one" aria-selected="false">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6"
							   aria-selected="true">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
							   aria-controls="two" aria-selected="false">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab"
							   aria-controls="three" aria-selected="true">Details</a>
						</li>
						<?php
						if ($property->map) {
							?>
							<li class="nav-item">
								<a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5"
								   aria-selected="true">Location</a>
							</li>
							<?php
						}
						if ($property->walkthrough) {
							?>
							<li class="nav-item">
								<a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4"
								   aria-selected="true">Video</a>
							</li>
							<?php
						}
						?>
					</ul>
					<div class="tab-content" id="carTabContent">
						<div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
							<div class="properties-description mb-50">
								<h3 class="heading-2">
									<?= $property->title ?>
								</h3>
								<?= $property->description ?>
							</div>
						</div>
						<div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
							<div class="center">
								<ul class="nav nav-tabs" id="galleryTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active show" id="one-tab" data-toggle="tab" href="#elvation"
										   role="tab" aria-controls="8" aria-selected="false">Elevation</a>
									</li>
									<?php
									if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
											'property_floor_plans'))) {
										?>
										<li class="nav-item">
											<a class="nav-link" id="6-tab" data-toggle="tab" href="#floorplan"
											   role="tab"
											   aria-controls="8" aria-selected="true">Floorplan</a>
										</li>
										<?php
									}
									if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
											'property_master_plans'))) {
										?>
										<li class="nav-item">
											<a class="nav-link" id="6-tab" data-toggle="tab" href="#masterplan"
											   role="tab"
											   aria-controls="8" aria-selected="true">Masterplan</a>
										</li>
										<?php
									}
									?>
								</ul>
							</div>
							<div class="tab-content" id="galleryTabContent">
								<div class="tab-pane fade active show" id="elvation" role="tabpanel"
									 aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<div class="gallery">
											<?php
											if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
															'property_elevations')) != null) {
												foreach ($images as $i => $image) {
													?>
													<a class="fancybox-button" rel="fancybox-button"
													   href="<?= base_url($image->image) ?>"
													   title="image 1">
														<img src="<?= base_url($image->image) ?>"
															 alt=""/>
													</a>
													<?php
												}
											} else {
												echo "<center>No Image Found<center>";
											}
											?>
										</div>

									</div>
								</div>

								<div class="tab-pane fade " id="floorplan" role="tabpanel" aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<h3 class="heading-2">
											Floor Plans
										</h3>
										<div class="floor-plans mb-50">
											<div class="gallery">
												<?php
												if (($images = $this->properties_model->getWhere(array('property_id' => $property->id), 'property_floor_plans'))) {
													foreach ($images as $i => $image) {
														?>
														<a class="fancybox-button" rel="fancybox-button"
														   href="<?= base_url() ?>assets/img/floor-plans.png"
														   title="image 1">
															<img src="<?= base_url() ?>assets/img/floor-plans.png"
																 alt=""/>
														</a>
														<?php
													}
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade " id="masterplan" role="tabpanel" aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<div class="gallery">
											<?php
											if (($images = $this->properties_model->getWhere(array('property_id' => $property->id), 'property_master_plans'))) {
												foreach ($images as $i => $image) {
													?>
													<a class="fancybox-button" rel="fancybox-button"
													   href="<?= base_url($image->image) ?>" title="image 1">
														<img src="<?= base_url($image->image) ?>" alt=""
															 style=" width: 100%; height: 50%;">
													</a>
													<?php
												}
											}
											?>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
							<div class="property-details mb-40">
								<h3 class="heading-2">Property Pricing Details</h3>
								<div class="row">
									<div class="floor-plans mb-50 col-md-12">
										<table>
											<tbody>
											<thead>
											<tr>
												<th class="her" style="background: #53ABBD;">Unit Type
												</th>
												<th class="her" style="background: #53ABBD;">Size(SBA)
												</th>
												<th class="her" style="background: #53ABBD;">Carpet Area</th>
												<th class="her" style="background: #53ABBD;">Price</th>
												<th class="her" style="background: #53ABBD;">Whatsapp</th>
											</tr>
											</thead>
											<tbody style="color: #5c5c5c;">
											<?php
											if (($flatTypes = $this->properties_model->getPropertyFlatType(null,
															$property->id)) != null) {
												foreach ($flatTypes as $flatType) {
													?>
													<tr style="background: #ededed;">
														<td>
															<?= $flatType->flat_type ?>
														</td>
														<td>
															<?= $this->properties_model->getPropertyRange(array(
																	'property_id' => $property->id,
																	'flat_type_id' => $flatType->flat_type_id
															), 'property_flat_types',
																	'size') ?>
															<?= $this->properties_model->getPropertyParam(array(
																	'property_id' => $property->id,
																	'flat_type_id' => $flatType->flat_type_id
															), 'property_flat_types', 'unit') ?>
														</td>
														<td>
															<?= $this->properties_model->getPropertyRange(array(
																	'property_id' => $property->id,
																	'flat_type_id' => $flatType->flat_type_id
															), 'property_flat_types', 'carpet_area') ?> Sq.ft
														</td>
														<td>
															<?php
															if ($flatType->price_on_request) {
																echo "Price on Request";
															} else {
																?>
																<i class="fa fa-inr" aria-hidden="true"></i>
																<?= (($row = $this->properties_model->getPropertyParam(array(
																				'property_id' => $property->id,
																				'flat_type_id' => $flatType->flat_type_id
																		), 'property_flat_types', null,
																				'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
																-
																<?= (($row = $this->properties_model->getPropertyParam(array(
																				'property_id' => $property->id,
																				'flat_type_id' => $flatType->flat_type_id
																		), 'property_flat_types', null,
																				'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
																<?php
															}
															?>
														</td>
														<td align="center"><a
																	href="https://api.whatsapp.com/send?phone=+91<?= $social_links->whatsapp ?>&text=Hi Team Cityprop, I would be interested in%20<?= $property->title ? $property->title : '' ?>%20 <?= $flatType->flat_type ?>"
																	target="_blank"><img
																		src="<?= base_url('assets/banner_patch/whatsapp.png') ?>">
															</a></td>
													</tr>
													<?php
												}
											} else {
												?>
												<tr style="background: #ededed;">
													<td colspan="6" class="text-center">No data available</td>
												</tr>
												<?php
											}
											?>

											</tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
							<div class="properties-amenities mb-30">
								<h3 class="heading-2">Features</h3>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<ul class="amenities">
											<?php
											if (isset($property->amenities) && $property->amenities) {
												foreach ($property->amenities as $amenity) {
													?>
													<li>
														<i class="fa fa-check"></i><?= ucwords($amenity->name) ?>
													</li>
													<?php
												}

											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
							<div class="location mb-50">
								<div class="map">
									<h3 class="heading-2">Property Location</h3>
									<div id="map" class="contact-map">
										<img src="<?= base_url("uploads/" . "/$property->slug/map/$property->map") ?>"
											 draggable="false" style="user-select: none;">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
							<div class="inside-properties mb-50">
								<h3 class="heading-2">
									Property Video
								</h3>
								<iframe src="https://www.youtube.com/embed/<?= getYoutubeVideoId($property->walkthrough) ?>?rel=0&amp;showinfo=0"
										allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<hr>

				<!-- Contact 2 start -->
				<div class="contact-2 ca mtb-50">
					<h3 class="heading">Contact Form</h3>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group name col-md-6">
								<input type="text" name="name" class="form-control" placeholder="Name">
							</div>
							<div class="form-group email col-md-6">
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group number col-md-6">
								<input type="text" name="phone" class="form-control" placeholder="Number">
							</div>
							<div class="form-group number col-md-6">
								<input type="text" name="subject" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group message col-md-12">
								<textarea class="form-control" name="message" placeholder="Write message"></textarea>
							</div>
							<div class="send-btn col-md-12">
								<button type="submit" class="btn btn-md button-theme">Send Message</button>
							</div>
						</div>
					</form>
				</div>
				<!-- Similar Properties start -->
				<h3 class="heading-2">Similar Properties</h3>
				<div class=" similar-properties">

					<div class="listings-container grid-layout property-box-1">
						<?php

						if (($projects = $this->home_model->getsameLocationProjects($property->location_id, $property->id,
										3)) != null) {
							foreach ($projects as $property) {
								?>
								<div class="listing-item">
									<div class="row">
										<div class="listing-img-container col-pad">
											<div class="property-thumbnail">
												<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>"
												   class="property-img">
													<img src="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"
														 alt="properties" class="img-fluid">
													<div class="tag"><?= $property->prop_type ?></div>
													<div class="listing-badges">
														<span class="featured">Featured</span>
													</div>
													<div class="price-box"><span><?php echo "Rs. " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
																			'property_flat_types', null,
																			'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0
															. " - " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
																			'property_flat_types', null,
																			'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0; ?>*</span>
													</div>
												</a>
											</div>
										</div>
										<div class="listing-content col-pad">
											<div class="detail">
												<div class="hdg">
													<h3 class="title">
														<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>"><?= $property->title ?></a>
													</h3>
													<h5 class="location">
														<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>">
															<i class="flaticon-pin"></i><?php echo $property->area . ", " . $property->city_name; ?>
														</a>
													</h5>
													<div class="rera-tag-new" title="Rera Approved Project"><img
																src="<?= base_url() ?>assets/img/rera-tag.svg"
																alt="Rera Approved Project"></div>
												</div>
												<div class="facilities-list">
													<ul class="clearfix">
														<?php
														if (($flatTypes = $this->properties_model->getPropertyFlatType(null, $property->id)) != null) {
															$bhk = '';
															$i = 0;
															foreach ($flatTypes as $flatType) {
																if ($i == 0)
																	$bhk .= $flatType->flat_type;
																else
																	$bhk .= ', ' . $flatType->flat_type;
																$i++;
															}
														}
														$propType = $this->properties_model->getPropertyType(['id' => $property->property_type_id]);
														?>
														<li>
															<span>Unit</span><?php echo $bhk;
															$bhk = ''; ?> <?= $property->prop_type ?>
														</li>
														<li>
															<span>Status</span><?= $property->issue_date; ?>
														</li>
													</ul>
												</div>
												<div class="footer">
													<a href="#" tabindex="0">
														<?php
														if ($property->possession_date != '0000-00-00')
															echo "Possession by " . date('M, Y', strtotime($property->possession_date));
														else
															echo "Ready"; ?>
													</a>
													<div class="div-line"><span tabindex="0">
                                                New
                                            </span></div>

													<div class="disclaimer"><a href="#" tabindex="0">
															2 BHK in Sector 3 Vasundhar a Ghaziabad:Well designed ...
														</a></div>
												</div>
												<div class="hdg">
													<span itemprop="name">By <?= $property->builder ?></span>
													<button class="btn-detail ">
														<a href="property-detail.html" target="_blank">
															View More
														</a>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
						} else {
							?>
							<div class="alert alert-info text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
								</button>
								<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Currnelty no
									property listing available from <?= $property->builder ?>.</strong>
							</div>
							<?php
						}
						?>

					</div>

				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="sidebar-right">
					<!-- Advanced search start -->
					<div class="widget advanced-search d-none">
						<h3 class="sidebar-title">Advanced Search</h3>
						<div class="s-border"></div>
						<div class="m-border"></div>
						<form method="GET">
							<div class="form-group">
								<select class="selectpicker search-fields" name="all-status">
									<option>All Status</option>
									<option>Ready to Move In</option>
									<option>Under Construction</option>
									<option>New launch</option>
								</select>
							</div>
							<div class="form-group">
								<select class="selectpicker search-fields" name="all-type">
									<option>All Type</option>

									<option>Apartments</option>
									<option>Villa</option>
									<option>Plots</option>
									<option>Commercial</option>

								</select>
							</div>

							<div class="form-group">
								<select class="selectpicker search-fields" name="location">
									<option>Location</option>
									<option>Bangalore</option>
									<option>Bangalore</option>
									<option>Bangalore</option>
									<option>Bangalore</option>
								</select>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<select class="selectpicker search-fields" name="bedrooms">
											<option>Bedrooms</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<select class="selectpicker search-fields" name="bathroom">
											<option>Bathroom</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<select class="selectpicker search-fields" name="balcony">
											<option>Balcony</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
								</div>

							</div>
							<div class="range-slider clearfix form-group">
								<label>Area</label>
								<div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area"
									 data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
								<div class="clearfix"></div>
							</div>
							<div class="range-slider clearfix form-group mb-30">
								<label>Price</label>
								<div data-min="0" data-max="150000" data-min-name="min_price" data-max-name="max_price"
									 data-unit="Rs" class="range-slider-ui ui-slider" aria-disabled="false"></div>
								<div class="clearfix"></div>
							</div>
							<a class="show-more-options" data-toggle="collapse" data-target="#options-content">
								<i class="fa fa-plus-circle"></i> Other Features
							</a>
							<div id="options-content" class="collapse">
								<h3 class="sidebar-title">Features</h3>
								<div class="s-border"></div>
								<div class="m-border"></div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox2" type="checkbox">
									<label for="checkbox2">
										Air Condition
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox3" type="checkbox">
									<label for="checkbox3">
										Places to seat
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox4" type="checkbox">
									<label for="checkbox4">
										Swimming Pool
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox1" type="checkbox">
									<label for="checkbox1">
										Free Parking
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox7" type="checkbox">
									<label for="checkbox7">
										Central Heating
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox5" type="checkbox">
									<label for="checkbox5">
										Laundry Room
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox6" type="checkbox">
									<label for="checkbox6">
										Window Covering
									</label>
								</div>
								<div class="checkbox checkbox-theme checkbox-circle">
									<input id="checkbox8" type="checkbox">
									<label for="checkbox8">
										Alarm
									</label>
								</div>
								<br>
							</div>
							<div class="form-group mb-0">
								<button class="search-button">Search</button>
							</div>
						</form>
					</div>
					<!-- Recent properties start -->
					<div class="widget recent-properties">
						<h3 class="sidebar-title">Recent Properties</h3>
						<div class="s-border"></div>
						<div class="m-border"></div>
						<?php
						if (count($properties) > 0) {
							foreach ($properties as $property) {
								?>
								<div class="media mb-4">
									<a class="pr-3"
									   href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>">
										<img class="media-object"
											 src="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"
											 alt="small-properties">
									</a>
									<div class="media-body align-self-center">
										<h5>
											<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>"><?= $property->title ?></a>
										</h5>
										<div class="listing-post-meta">
											<?php echo "Rs. " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
															'property_flat_types', null,
															'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0
											. " - " . (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
															'property_flat_types', null,
															'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0; ?>
											* | <a href="#"><i class="fa fa-calendar"></i> <?php
												if ($property->possession_date != '0000-00-00')
													echo "Possession by " . date('M, Y', strtotime($property->possession_date));
												else
													echo "Ready"; ?> </a>
										</div>
									</div>
								</div>
							<?php }
						} else {
							echo "No Properties Found!";
						}
						?>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- Properties details page end -->


<?php
$this->load->view('inc/footer');
?>
