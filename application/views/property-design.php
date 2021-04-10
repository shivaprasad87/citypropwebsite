<?php
$property->gallery = json_decode(json_encode($property->gallery),true);
$gallery_images = array();
foreach($property->gallery as $gallery) {
  if(is_array($gallery))
  {
    foreach ($gallery as $gal) {
     array_push($gallery_images, $gal['image']);
    }
  }
  else
  {
  array_push($gallery_images, $gallery['image']);
  }
}
if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
                                                'property_desktop_banners')) != null ) {
    if(($m_images = $this->properties_model->getWhere(array('property_id' => $property->id),
        'property_mobile_banners')) != null)
    {

    $images = json_decode( json_encode($images), true);
    $m_images = json_decode( json_encode($m_images), true);
    $total_images =array_merge($images);
  //  print_r($m_images);die;

    $ban=0;
    $side_image='';
    //print_r($total_images);die;
    foreach ($total_images as $image) {
          array_push($gallery_images, $images[$ban]['banner_path']);
          array_push($gallery_images, $m_images[$ban]['mobile_banner_path']);


      }
    }
  }
         $this->load->view('inc/head2'); $this->load->view('inc/header');

?>
<!-- Properties details Slider -->
<div class="properties-details-Slider">
	<div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide">
		<div class="carousel-inner">
			<?php
			$i=0;
			foreach ($gallery_images as $gallery) {
			?>
			<div class="<?=($i==0)?'active ':''?>item carousel-item overview-counter-2" data-slide-number="<?=$i?>>">
				<img src="<?=base_url().$gallery?>" class="img-fluid slider-listing" alt="slider-properties">
			</div>
				<?php
				$i++;
				}
				?>



<!--			<div class="item carousel-item overview-counter-2" data-slide-number="1">-->
<!--				<img src="--><?//=base_url()?><!--assets/img/img-2.jpg" class="img-fluid slider-listing" alt="slider-properties">-->
<!--			</div>-->
<!--			<div class="item carousel-item overview-counter-2" data-slide-number="2">-->
<!--				<img src="--><?//=base_url()?><!--assets/img/img-3.jpg" class="img-fluid slider-listing" alt="slider-properties">-->
<!--			</div>-->
		</div>
		<ul class="carousel-indicators smail-properties list-inline nav nav-justified">
			<?php
			$i=0;
			foreach ($gallery_images as $gallery) {
			?>
			<li class="list-inline-item <?=($i==0)?'active ':''?>">
				<a id="carousel-selector-0" class="selected" data-slide-to="<?=$i?>" data-target="#propertiesDetailsSlider">
					<img src="<?=base_url().$gallery?>" class="img-fluid" alt="properties-small">
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
							<div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
							<div class="clearfix"></div>
						</div>
						<div class="range-slider clearfix form-group mb-30">
							<label>Price</label>
							<div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
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
							<a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
						</li>
					</ul>
					<div class="tab-content" id="carTabContent">
						<div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
							<div class="properties-description mb-50">
								<h3 class="heading-2">
									Prestige Greenwoods
								</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.</p>
								<p>pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.</p>
								<p>Aliquam ultricies nunc porta metus interdum mollis. Donec porttitor libero augue, vehicula tincidunt lectus placerat a. Sed tincidunt dolor non sem dictum dignissim. Nulla vulputate orci felis, ac ornare purus ultricies a. Fusce euismod magna orci, sit amet aliquam turpis dignissim ac. In at tortor at ligula pharetra sollicitudin. Sed tincidunt, purus eget laoreet elementum, felis est pharetra ante, tincidunt feugiat libero enim sed risus.Sed at leo sit amet mi bibendum aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent cursus varius odio, non faucibus dui. Nunc vehicula lectus sed velit suscipit aliquam vitae eu ipsum. adipiscing elit.</p>
							</div>
						</div>
						<div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
							<ul class="nav nav-tabs" id="galleryTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active show" id="one-tab" data-toggle="tab" href="#elvation" role="tab" aria-controls="8" aria-selected="false">Elevation</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="6-tab" data-toggle="tab" href="#floorplan" role="tab" aria-controls="8" aria-selected="true">Floorplan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="6-tab" data-toggle="tab" href="#masterplan" role="tab" aria-controls="8" aria-selected="true">Masterplan</a>
								</li>
							</ul>
							<div class="tab-content" id="galleryTabContent">
								<div class="tab-pane fade active show" id="elvation" role="tabpanel" aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<h3 class="heading-2">
											Elevation
										</h3>
										
									</div>
								</div>

								<div class="tab-pane fade " id="floorplan" role="tabpanel" aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<h3 class="heading-2">
										Floor Plans
										</h3>
										<div class="floor-plans mb-50">
								
											<table>
												<tbody><tr>
													<td><strong>Size</strong></td>
													<td><strong>Rooms</strong></td>
													<td><strong>Bathrooms</strong></td>
													<td><strong>Garage</strong></td>
												</tr>
												<tr>
													<td>1600</td>
													<td>3</td>
													<td>2</td>
													<td>1</td>
												</tr>
												</tbody>
											</table>
											<img src="<?=base_url()?>assets/img/floor-plans.png" alt="floor-plans" class="img-fluid">
										</div>
									</div>
								</div>
								<div class="tab-pane fade " id="masterplan" role="tabpanel" aria-labelledby="one-tab">
									<div class="properties-description mb-50">
										<h3 class="heading-2">
										Master Plans
										</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
							<div class="property-details mb-40">
								<h3 class="heading-2">Property Details</h3>
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<ul>
											<li>
												<strong>Property Id:</strong>215
											</li>
											<li>
												<strong>Price:</strong>$1240/ Month
											</li>
											<li>
												<strong>Property Type:</strong>House
											</li>
											<li>
												<strong>Bathrooms:</strong>3
											</li>
											<li>
												<strong>Bathrooms:</strong>2
											</li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-6">
										<ul>
											<li>
												<strong>Property Lot Size:</strong>800 ft2
											</li>
											<li>
												<strong>Land area:</strong>230 ft2
											</li>
											<li>
												<strong>Year Built:</strong>
											</li>
											<li>
												<strong>Available From:</strong>
											</li>
											<li>
												<strong>Garages:</strong>2
											</li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-6">
										<ul>
											<li>
												<strong>Sold:</strong>Yes
											</li>
											<li>
												<strong>City:</strong>Usa
											</li>
											<li>
												<strong>Parking:</strong>Yes
											</li>
											<li>
												<strong>Property Owner:</strong>Sohel Rana
											</li>
											<li>
												<strong>Zip Code: </strong>2451
											</li>
										</ul>
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
											<li>
												<i class="fa fa-check"></i>Air conditioning
											</li>
											<li>
												<i class="fa fa-check"></i>Balcony
											</li>
											<li>
												<i class="fa fa-check"></i>Pool
											</li>
											<li>
												<i class="fa fa-check"></i>Room service
											</li>
											<li>
												<i class="fa fa-check"></i>Gym
											</li>
										</ul>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<ul class="amenities">
											<li>
												<i class="fa fa-check"></i>Wifi
											</li>
											<li>
												<i class="fa fa-check"></i>Parking
											</li>
											<li>
												<i class="fa fa-check"></i>Double Bed
											</li>
											<li>
												<i class="fa fa-check"></i>Home Theater
											</li>
											<li>
												<i class="fa fa-check"></i>Electric
											</li>
										</ul>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<ul class="amenities">
											<li>
												<i class="fa fa-check"></i>Telephone
											</li>
											<li>
												<i class="fa fa-check"></i>Jacuzzi
											</li>
											<li>
												<i class="fa fa-check"></i>Alarm
											</li>
											<li>
												<i class="fa fa-check"></i>Garage
											</li>
											<li>
												<i class="fa fa-check"></i>Security
											</li>
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
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497698.660072568!2d77.35073295903771!3d12.954517012303143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1613576953712!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
							<div class="inside-properties mb-50">
								<h3 class="heading-2">
									Property Video
								</h3>
								<iframe src="https://www.youtube.com/embed/r2x4lL9M2Rk" allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<hr>

				<!-- Contact 2 start -->
				<div class="contact-2 ca mtb-50">
					<h3 class="heading">Contact Form</h3>
					<form action="#" method="GET" enctype="multipart/form-data">
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
						<div class="listing-item" >
							<div class="row">
								<div class="listing-img-container col-pad">
									<div class="property-thumbnail">
										<a href="properties-details.html" class="property-img">
											<img src="<?=base_url()?>assets/img/properties/properties-list-1.jpg" alt="properties" class="img-fluid">
											<div class="tag">Apartments</div>
											<div class="listing-badges">
												<span class="featured">Featured</span>
											</div>
											<div class="price-box"><span>Rs850.00</span> Per month</div>
										</a>
									</div>
								</div>
								<div class="listing-content col-pad">
									<div class="detail">
										<div class="hdg">
											<h3 class="title">
												<a href="properties-details.html">Prestige Greenwoods</a>
											</h3>
											<h5 class="location">
												<a href="properties-details.html">
													<i class="flaticon-pin"></i>Whitefiled ,Bangalore
												</a>
											</h5>
											<div class="rera-tag-new" title="Rera Approved Project"><img src="<?=base_url()?>assets/img/rera-tag.svg" alt="Rera Approved Project"></div>
										</div>
										<div class="facilities-list">
											<ul class="clearfix">
												<li>
													<span>Unit</span>2,3,4 BHK Apartments
												</li>

												<li>
													<span>Sqft</span> 35,000
												</li>
												<li>
													<span>Status</span>Under Construction
												</li>
											</ul>
										</div>
										<div class="footer">
											<a href="#" tabindex="0">
												Possession by  May 2021
											</a>
											<div class="div-line"><span tabindex="0">
                                                New
                                            </span></div>

											<div class="disclaimer"> <a href="#" tabindex="0">
													2 BHK in Sector 3 Vasundhar a Ghaziabad:Well designed ...
												</a></div>
										</div>
										<div class="hdg">
											<span itemprop="name">By Prestige Group</span>
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
						<div class="listing-item" >
							<div class="row">
								<div class="listing-img-container col-pad">
									<div class="property-thumbnail">
										<a href="properties-details.html" class="property-img">
											<img src="<?=base_url()?>assets/img/properties/properties-list-1.jpg" alt="properties" class="img-fluid">
											<div class="tag">Apartments</div>
											<div class="listing-badges">
												<span class="featured">Featured</span>
											</div>
											<div class="price-box"><span>Rs850.00</span> Per month</div>
										</a>
									</div>
								</div>
								<div class="listing-content col-pad">
									<div class="detail">
										<div class="hdg">
											<h3 class="title">
												<a href="properties-details.html">Prestige Greenwoods</a>
											</h3>
											<h5 class="location">
												<a href="properties-details.html">
													<i class="flaticon-pin"></i>Whitefiled ,Bangalore
												</a>
											</h5>
											<div class="rera-tag-new" title="Rera Approved Project"><img src="<?=base_url()?>assets/img/rera-tag.svg" alt="Rera Approved Project"></div>
										</div>
										<div class="facilities-list">
											<ul class="clearfix">
												<li>
													<span>Unit</span>2,3,4 BHK Apartments
												</li>

												<li>
													<span>Sqft</span> 35,000
												</li>
												<li>
													<span>Status</span>Under Construction
												</li>
											</ul>
										</div>
										<div class="footer">
											<a href="#" tabindex="0">
												Possession by  May 2021
											</a>
											<div class="div-line"><span tabindex="0">
                                                New
                                            </span></div>

											<div class="disclaimer"> <a href="#" tabindex="0">
													2 BHK in Sector 3 Vasundhar a Ghaziabad:Well designed ...
												</a></div>
										</div>
										<div class="hdg">
											<span itemprop="name">By Prestige Group</span>
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
							<a class="pr-3" href="properties-details.html">
								<img class="media-object" src="<?=base_url()?>assets/img/properties/small-properties-1.jpg" alt="small-properties">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Modern Family Home</a>
								</h5>
								<div class="listing-post-meta">
									Rs345,000 | <a href="#"><i class="fa fa-calendar"></i> Oct 27,  </a>
								</div>
							</div>
						</div>
						<div class="media mb-4">
							<a class="pr-3" href="properties-details.html">
								<img class="media-object" src="<?=base_url()?>assets/img/properties/small-properties-2.jpg" alt="small-properties">
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
								<img class="media-object" src="<?=base_url()?>assets/img/properties/small-properties-3.jpg" alt="small-properties">
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
<!-- Properties details page end -->



<?php
$this->load->view('inc/footer');
?>
