<!-- Sub banner start -->
<div class="Home-sub-banner">
	<div class="container">
		<div class="breadcrumb-area">
			<h1>Properties Details</h1>
			<ul class="breadcrumbs">
				<li><a href="<?=base_url()?>">Home</a></li>
				<li class="active">Properties Details</li>
			</ul>
		</div>
	</div>
</div>
<!-- Sub Banner end -->

<!-- Properties section body start -->
<div class="properties-section content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<!-- Option bar start -->
				<div class="option-bar d-xl-block d-lg-block d-md-block d-sm-block">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="sorting-options2">
								<span class="sort">Sort by:</span>
								<select class="selectpicker search-fields" name="default-order">
									<option>Default Order</option>
									<option>Price High to Low</option>
									<option>Price: Low to High</option>
									<option>Newest Properties</option>
									<option>Oldest Properties</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 d-none d-lg-block d-md-block d-sm-none">
							<div class="sorting-options">
								<a href="#" class="change-view-btn list active-view-btn"><i class="fa fa-th-list"></i></a>
								<a href="#" class="change-view-btn grid "><i class="fa fa-th-large"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- Property box 2 start -->
				<div class="listings-container list-layout property-box-2">
					<?php
					$i=1;
					$j=1;
					/** @var array $properties */
					if(count($properties)>0) {
						foreach ($properties as $property) {

							?>
							<div class="listing-item">
								<div class="row">
									<div class="listing-img-container col-pad">
										<div class="property-thumbnail">
											<a href="<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>"
											   class="property-img">
												<img src="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"
													 alt="properties" class="img-fluid">
												<div class="tag">Apartments</div>
												<div class="listing-badges">
													<span class="featured">Featured</span>
												</div>
												<div class="price-box"><?php echo "Rs. ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
																	'property_flat_types', null,
																	'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0
													." - ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
																	'property_flat_types', null,
																	'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ;?>* <i>Onwards</i></div>
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
															src="assets/img/rera-tag.svg" alt="Rera Approved Project">
												</div>
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
														$bhk = ''; ?>
													</li>

													<li>
														<span>Sqft</span> 35,000
													</li>
													<li>
														<span>Status</span><?=$property->issue_date;?>
													</li>
												</ul>
											</div>
											<div class="footer">
												<a href="#" tabindex="0">
													<?php
													if($property->possession_date!='0000-00-00')
														echo  "Possession by ".date('M, Y', strtotime($property->possession_date));
													else
														echo "Ready"; ?>
												</a>
												<div class="div-line"><span tabindex="0">
												New
											</span></div>

												<div class="disclaimer"><a href="#" tabindex="0">
<!--														2 BHK in Sector 3 Vasundhar a Ghaziabad:Well designed ...-->
													</a></div>
											</div>
											<div class="hdg">
												<span itemprop="name">By <?=$property->builder?></span>
												<button class="btn-detail ">
													<a href=<?= strtolower(site_url(url_title($property->city_name) . "/" . (url_title($property->area)) . "/$property->slug/")) ?>" target="_blank">
														View More
													</a>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }
					}
					else
					{
						echo "No Properties Found!";
					}
					?>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<!-- Page navigation start -->
					<div class="pagination-box hidden-mb-45 text-center">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#">Prev</a>
								</li>
								<li class="page-item"><a class="page-link active" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="">2</a></li>
								<li class="page-item"><a class="page-link" href="">3</a></li>
								<li class="page-item">
									<a class="page-link" href="">Next</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="sidebar-right">
					<!-- Advanced search start -->
					<div class="widget advanced-search">
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
								<div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
								<div class="clearfix"></div>
							</div>
							<div class="range-slider clearfix form-group mb-30">
								<label>Price</label>
								<div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="Rs" class="range-slider-ui ui-slider" aria-disabled="false"></div>
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
						<div class="media mb-4">
							<a class="pr-3" href="<?=strtolower(site_url(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/"))?>">
								<img class="media-object" src="img/properties/small-properties-1.jpg" alt="small-properties">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="<?=strtolower(site_url(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/"))?>">Modern Family Home</a>
								</h5>
								<div class="listing-post-meta">
									Rs345,000 | <a href="#"><i class="fa fa-calendar"></i> Oct 27,  </a>
								</div>
							</div>
						</div>
						<div class="media mb-4">
							<a class="pr-3" href="properties-details.html">
								<img class="media-object" src="img/properties/small-properties-2.jpg" alt="small-properties">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Beautiful Single Home</a>
								</h5>
								<div class="listing-post-meta">
									Rs415,000 | <a href="#"><i class="fa fa-calendar"></i> Feb 14,  </a>
								</div>
							</div>
						</div>
						<div class="media">
							<a class="pr-3" href="properties-details.html">
								<img class="media-object" src="img/properties/small-properties-3.jpg" alt="small-properties">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Real Luxury Villa</a>
								</h5>
								<div class="listing-post-meta">
									Rs345,000 | <a href="#"><i class="fa fa-calendar"></i> Oct 12,  </a>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- Properties section body end -->
