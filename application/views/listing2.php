<div class="clearfix"></div>
<!-- Header Container / End -->

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
						<li><a href="<?=base_url('listing');?>">Listing (<?= isset($total) ? $total : 0 ?>)</a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
</div>


<div class="container ">
  <div class="row">
     <?php 
          $i=1;
          $j=1;
          if(count($properties)>0)
          {
          foreach ($properties as $property) {
            if($j!=2)
            {
           ?>

    <div class="col-lg-8 mt-10">
      <div class="div-shadow">
        <div class="col-pad">
          <div class="property-banner">
            <a href="<?=site_url(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/")?>" target="_blank"><img src="<?= base_url('uploads/'.$property->slug.'/'.$property->image) ?>" class="img-responsive"></a>
            <div class="prop-status">
              Under Construction
            </div>
          </div>
        </div>

        <div class="property-title1 mt-10">
          <p><?= $property->title ?></p>
          <h6><?= $property->builder ?></h6>
          <span><?php echo $property->area.", ".$property->city_name; ?></span>
          <p class="font9">RERA : <br> <?=$property->rera_number?$property->rera_number:'-'?></p>
        </div>
        <hr>
        <div class="mt-10">
          <div class="project_price_details_info">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <p>Starting Price</p><h6><span class="rupee_font">`</span> 
                  <?php
                    if($this->properties_model->hasPriceRequest($property->id)){
                        ?>
                        Price On Request
                        <?php
                    }else{
                      echo "Rs. ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
                  'property_flat_types', null,
                  'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0 
             ." - ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
                  'property_flat_types', null,
                  'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ;
                 } ?>
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
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <p>Configurations</p><h6><?php echo $bhk; $bhk=''; ?></h6>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <p>Type</p><h6><?= $property->prop_type ?></h6>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <p>Price per Sq Ft</p><h6><span class="rupee_font">`</span> <?= $property->budget ?>*</h6>
              </div>
            </div>
          </div>
        
        </div>

      </div>

    </div>
     <?php }
     else
     {
      ?>
          <div class="col-lg-4 mt-10">
      <div id="sideform" class="needhelp_form sideform ">
        <div class="needhelp_form_close  mt-10">
  
        </div>
        <h5>Need help in your house search?</h5>
          
          <style type="text/css">.g-recaptcha{transform:scale(.77);-webkit-transform:scale(.77);transform-origin:0 0;-webkit-transform-origin:0 0}.needhelp_form h5{margin:0}.needhelp_form .needhelp_form_list .submit_btn{margin-top:0}.needhelp_form .needhelp_form_list ul li input{height:28px}.needhelp_form .needhelp_form_list ul li input[type=checkbox]{height:12px}.needhelp_form .needhelp_form_list ul li{margin:0 0 5px}</style>
          
          <div class="needhelp_form_list">
            
            <form action="<?=base_url('home/sendEmail');?>" name="WebForm-1498709213622" method="POST" id="elqform2">
                <div class="throwerror" style="color:red;font-size:15px;padding-bottom:18px;"></div>
                <ul>
                  <li class="form-sec"> 
                    <input type="text" placeholder="Name*" id="" required="" name="name"></li>
                  <li class="form-sec">
                
                <input type="tel" placeholder="Phone Number*" id="" required="" name="phone">
              </li>
                <li class="form-sec">
                  <input type="email" placeholder="Email ID*" required="" name="email" id="fcemail" autocomplete="off" class="emailcheck">
                </li>
                <li style="margin-top:20px !Important;">
                  <center><div class="btn btn-submit" data-toggle="modal" data-target="#main-pop" onclick="document.getElementById('elqform2').submit();">Enquire Now</div></center>
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
    <?php
     }
     $j++;
   }
        }
        else{
          echo "No Property Found";
        } ?>

       <!--        <div class="div-shadow mt-30">
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

    </div>
  </div>
</div>
<div class="padding_bottom text-center"> 
          <?= isset($pagination) && $pagination ? $pagination : '' ?>
</div>
<br>
<!-- Flip banner -->
<a href="" class="flip-banner parallax-home" data-background="<?=base_url('assets/')?>images/single-property-03.jpg" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
  <div class="flip-banner-content" style="color:rgb(219 18 57)">
    <h2 class="flip-visible">We help people and homes find each other</h2>
    <h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
  </div>
</a>
<!-- Flip banner / End -->


