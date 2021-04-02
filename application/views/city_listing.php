<div class="clearfix"></div>


<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
data-background="<?=base_url('assets/')?>images/listings-parallax.jpg"
data-color="#333333"
data-color-opacity="0.7"
data-img-width="800"
data-img-height="505">

<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Listings</h2>
				<span></span>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?=base_url();?>">Home</a></li>
						<li><a href="<?=base_url('listing');?>">Listings</a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
</div>



<div class="container property-details" id="wrapper1">
	<div class="row">
		<div class="col-lg-8 mt-10">
			<!-- <div class="div-shadow">
				<div class="col-pad">
					<div class="property-banner">
						<img src="<?=base_url('assets/')?>images/popular-location-04.jpg" class="img-responsive">
						<div class="prop-status">
							Under Construction
						</div>
					</div>
				</div>

				<div class="property-title1 mt-10">
					<p>Project Title</p>
					<h6>Project Name</h6>
					<span>Project Location</span>
					<p class="font9">RERA : <br> 1234556788999</p>
				</div>
				<hr>
				<div class="mt-10">
					<div class="project_price_details_info">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Starting Price</p><h6><span class="rupee_font">`</span> 74 Lakhs*</h6>
							</div>
								
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Configurations</p><h6>2 &amp; 3 BHK</h6>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Sq Ft</p><h6>1165 -1590</h6>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Price per Sq Ft</p><h6><span class="rupee_font">`</span> 5649*</h6>
							</div>
						</div>
					</div>
				
				</div>

			</div>

	
			<div class="div-shadow mt-30">
				<div class="col-pad">
					<div class="property-banner">
						<img src="<?=base_url('assets/')?>images/popular-location-04.jpg" class="img-responsive">
						<div class="prop-status">
							Under Construction
						</div>
					</div>
				</div>

				<div class="property-title1 mt-10">
					<p>Project Title</p>
					<h6>Project Cyberscape</h6>
					<span>Project Location</span>
					<p class="font9">RERA : <br> 1234556788999</p>
				</div>
				<hr>
				<div class=" mt-10">
					<div class="project_price_details_info">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Starting Price</p><h6><span class="rupee_font">`</span> 74 Lakhs*</h6>
							</div>
								
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Configurations</p><h6>2 &amp; 3 BHK</h6>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Sq Ft</p><h6>1165 -1590</h6>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<p>Price per Sq Ft</p><h6><span class="rupee_font">`</span> 5649*</h6>
							</div>
						</div>
					</div>
				
				</div>

				</div> -->
	
					<!-- Sorting / Layout Switcher -->
		<div class="row margin-bottom-15">

			<div class="col-md-6">
				<!-- Sort by -->
				<div class="sort-by">
					<label>Sort by:</label>

					<div class="sort-by-select">
						<select data-placeholder="Default order" class="chosen-select-no-single" >
							<option>Default Order</option>	
							<option>Price Low to High</option>
							<option>Price High to Low</option>
							<option>Newest Properties</option>
							<option>Oldest Properties</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<!-- Layout Switcher -->
				<div class="layout-switcher">
					<a href="#" class="list"><i class="fa fa-th-list"></i></a>
					<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
				</div>
			</div>
		</div>

		
		<!-- Listings -->
		<div class="listings-container list-layout">

			<?php 
          $i=1;
          $j=1;
          if(count($properties)>0)
          {
          foreach ($properties as $property) {
            
           ?>
			<!-- Listing Item -->
			<div class="listing-item">

				<div class="listing-img-container">

					<div class="listing-badges badges-page">
						<!-- <span class="featured">Featured</span> -->
						<span class="rera">Rera Approved</span>
						<span>For Sale</span>
					</div>

					

					<div class="listing-img-content">
						<span class="listing-price">35 Lakhs <i>Onwards</i></span>
						
						<div  data-tip-content="Rating"><fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset></div>
						
					</div>

					

					<img src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($property->city_name))."/".str_replace(" ","-",strtolower($property->builder))."/" .$property->slug.'/'.$property->image) ?>" alt="">

				</div>

				
				
				<div class="listing-content">

					<div class="listing-title">
						<h4><a href="<?=strtolower(site_url(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/"))?>" target="_blank"><?= $property->title ?></a></h4>
						<a href="">
							<i class="fa fa-map-marker"></i>
							<?php echo $property->area.", ".$property->city_name; ?>
						</a>

						<a  href="<?=strtolower(site_url(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/"))?>" target="_blank" class="details button border">View Details</a>
					</div>
					<?php
                  if (($flatTypes = $this->properties_model->getPropertyFlatType(null, $property->id)) != null) {
                        $bhk='';
                        $i=0;
                        foreach ($flatTypes as $flatType) {
                            if($i==0)
                                $bhk.=$flatType->flat_type;
                            else
                            $bhk.=', '.$flatType->flat_type;
                        $i++;
                        }
                    } 
                   $propType   = $this->properties_model->getPropertyType(['id'=>$property->property_type_id]);
                   ?>
					<ul class="listing-details">
						<li><?php echo $bhk; $bhk=''; ?></li>
						<li></li>
						
						
					</ul>

					<div class="listing-footer">
						<a href="#"><i class="fa fa-building"></i> Type <?= $property->prop_type ?></a>
						<span><i class="fa fa-calendar-o"></i> Possession <?php
                if($property->possession_date!='0000-00-00')
                {
                    $date1 = date("Y-m-d");
                    $date2 = date("Y-m-d", strtotime($property->possession_date)); 
                    if($date1 > $date2)
                        echo "Ready";
                    else
                echo  date('M, Y', strtotime($property->possession_date));
                }
                else 
                echo "Ready"; 
                ?></span>
					</div>

				</div>
				<!-- Listing Item / End -->

			</div>
		<?php } } 
		else
		{
			echo "No Properties Found!";
		}
		?>
			<!-- Listing Item / End -->
 
		

		</div>

		<div class="clearflix"></div>
		<!-- Listings Container / End -->

		<br>
		<!-- Pagination -->
		<div class="pagination-container margin-top-20">
			<!-- <nav class="pagination">
				<ul>
					<li><a href="#" class="current-page">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li class="blank">...</li>
					<li><a href="#">22</a></li>
				</ul>
			</nav>

			<nav class="pagination-next-prev">
				<ul>
					<li><a href="#" class="prev">Previous</a></li>
					<li><a href="#" class="next">Next</a></li>
				</ul>
			</nav> -->
			<?= isset($pagination) && $pagination ? $pagination : '' ?>
		</div>
		<!-- Pagination / End -->

		</div>

		

		<div class="col-lg-4 mt-10" >
			<div id="sideform" class="needhelp_form sideform my-sticky-form  ">
				<div class="needhelp_form_close  mt-10">
	
				</div>
				<h5>Need help in your house search?</h5>
					
					<style type="text/css">.g-recaptcha{transform:scale(.77);-webkit-transform:scale(.77);transform-origin:0 0;-webkit-transform-origin:0 0}.needhelp_form h5{margin:0}.needhelp_form .needhelp_form_list .submit_btn{margin-top:0}.needhelp_form .needhelp_form_list ul li input{height:28px}.needhelp_form .needhelp_form_list ul li input[type=checkbox]{height:12px}.needhelp_form .needhelp_form_list ul li{margin:0 0 5px}</style>
					
					<div class="needhelp_form_list">
						
						<form action="" name="WebForm-1498709213622" method="POST" id="elqform2">
								<div class="throwerror" style="color:red;font-size:15px;padding-bottom:18px;"></div>
								<ul>
									<li class="form-sec">	
										<input type="text" placeholder="Name*" id="" required="" name="Name*"></li>
									<li class="form-sec">
								
								<input type="tel" placeholder="Phone Number*" id="" required="" name="phone*">
							</li>
								<li class="form-sec">
									<input type="email" placeholder="Email ID*" required="" name="emailAddress" id="fcemail" autocomplete="off" class="emailcheck">
								</li>
								<li style="margin-top:20px !Important;">
									<center><div class="btn btn-submit" data-toggle="modal" data-target="#main-pop">Enquire Now</div></center>
								</li>
							</ul>
						</form>
						<div class="mb-40">
							<div class="offers-wrap lead-offer no-bg-style"> 
								<div class="spl-img va-top bg-img-default bg-img-contain"  style=" background-image:url('<?=base_url('assets/')?>images/cashback.png')">
								</div>  
								<div class="spl-txt-wrap va-middle"> 
									<div class="spl-title va-top">Assured Callback in 5 mins</div> 
									<ul class="va-top reset-ul offer-ul"> 
										<li class="offer">Get an assured callback in 5 mins from sales expert (9 AM - 6 PM IST)</li> 
									</ul> 
									</div>      
							</div>
							<div class="offers-wrap lead-offer no-bg-style">
								<div class="spl-img va-top bg-img-default bg-img-contain"  style=" background-image:url('<?=base_url('assets/')?>images/offer.png')"> 
								</div>                 
								<div class="spl-txt-wrap va-middle"> 
									<div class="spl-title va-top">Authorised Channel Partner</div>
									<ul class="va-top reset-ul offer-ul"> 
										<li class="offer">Holding Bricks is an authorised channel partner for this project</li>
									</ul> 
									</div>            
							</div>
						</div>	
					</div>
			</div>

			

		</div>

		</div>
	</div>
</div>


<div class="margin-top-50"></div>
<!-- Flip banner -->
<a href="" class="flip-banner parallax-home" data-background="<?=base_url('assets/')?>images/single-property-03.jpg"  data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
	<div class="flip-banner-content" style="color:rgb(219 18 57)">
		<h2 class="flip-visible">We help people and homes find each other</h2>
		<h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->


<div class="modal Home-pupup fade in" tabindex="-1" role="dialog" id="main-pop" style="opacity: 1;">
	<!-- data-backdrop="static" data-keyboard="false" -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
      
		<div class="modal-body text-center needhelp_form-modal" style="margin: auto;">
		<li class="left_col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>	
		<li class="right_col"><h5>Project Name Brochure</h5></li>
		
			<div class="needhelp_form_list">
					
				<form action="" name="WebForm-1498709213622" method="POST" id="elqform2">
						<div class="throwerror" style="color:red;font-size:15px;padding-bottom:18px;"></div>
						<ul>
							<li class="form-sec">	
								<input type="text" placeholder="Name*" id="" required="" name="Name*"></li>
							
					
							<li class="form-sec">
						
						<input type="tel" placeholder="Phone Number*" id="" required="" name="phone*">
					</li>
						<li class="form-sec">
							<input type="email" placeholder="Email ID*" required="" name="emailAddress" id="fcemail" autocomplete="off" class="emailcheck">
						</li>

						<li style="margin-top:20px!important">
						<center><div class="btn btn-submit" data-toggle="modal" data-target="#main-pop">Download</div></center>
					</li>
					</ul>
				</form>
			</div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


