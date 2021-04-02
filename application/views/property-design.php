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
<div class="reserveserenityforever_info fixed">
  <div class=container>
  
    <div class="reserveserenityforever_list">
      <div class="serenepark_info">
        <div class="serenepark_img">
          <?php
                                                if(($logos = $this->properties_model->getWhere(array('property_id' => $property->id),
                                                                                                'property_logo')) != null)
                                                {
                                                    $logos=json_decode( json_encode($logos), true);
                                                    //builder_image;
                                                    ?> 
                                                <img src="<?= base_url().'uploads/'.$property->slug.'/logos/'.$map[0] ?>" alt="">
                                                                <?php

                                                }
                                                else
                                                {
                                                    $map[0]= '' ;
                                                ?>
                                                <img src="<?= base_url().'uploads/builders/'.$map[0] ?>" alt="">
                                                                    
                                                                    <?php
                                                }
//print_r($gallery_images);
                                                ?>
         </div>
        <div class="serenepark_cont">
          <h6><?= $property->title ? $property->title : '' ?></h6>
          <p><?= $property->location . ', ' . $property->city_name ?></p>
        </div>
      </div>
      <div class="clearflix"></div>
      <div class="reserveserenityforever_left">
        <div class="show_interior_exterior_info">
          <ul></ul>
        </div>
        
        <div class="reserveserenityforever_video demo-gallery">
					<!-- <a  href="#myVideo" style="background-image: url('images//popular-location-01.jpg');">
					</a>-->

					<ul class="lightgallery" class="list-unstyled row">
						<li data-src="<?=base_url($gallery_images[0]);?>" >
							<a><img class="img-responsive" src="<?=base_url($gallery_images[0]);?>"></a>
            </li>
            
					</ul>
				</div>
      
      </div>
      <div class="reserveserenityforever_right">
        <div class="show_interior_exterior_info">
          <ul></ul>
        </div>
        <div class="show_interior_exterior_list">
          <div class="show_interior_exterior_listinner demo-gallery showall_list">
            
              
              
            <ul class="lightgallery" class="list-unstyled row">
            <?php
            $i=1;
            foreach ($gallery_images as $gallery) {
            ?>
              <li data-src="<?=base_url($gallery);?>" >
                <a><img class="img-responsive" src="<?=base_url($gallery);?>"></a>
              
              </li> 
              <?php
                # code...
            }
            ?>
            
            
            </ul>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<div class="container ">
  <div class="highlights">
    <ul>
      <li>
        <p>Starting Price</p><?php echo "Rs. ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
                  'property_flat_types', null,
                  'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0 
             ." - ".  (($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id),
                  'property_flat_types', null,
                  'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ;?>*</h6>
      </li>
      <?php
          if (($flatTypes = $this->properties_model->getPropertyFlatType(null,
                                                        $property->id)) != null) {
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
      <li>
        <p>Configurations</p>
        <h6><?php echo $bhk; $bhk=''; ?></h6>
      </li>
      <li>
        <p>Possession Time</p>
        <h6><?php
            if($property->possession_date!='0000-00-00')
            echo  date('M, Y', strtotime($property->possession_date));
            else 
            echo "Ready"; ?></h6>
      </li>
    
    </ul>
  </div>

</div>

<div class="container property-details ">
<div class="row">
  <div class="col-lg-8 ">
    <div class="div-shadow">
      <div class="col-pad">
        <div class="property-banner">
          <img src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($property->city_name))."/".str_replace(" ","-",strtolower($property->builder))."/" .$property->slug.'/'.$property->image) ?>" class="img-responsive">
          <div class="prop-status">
            <?=$property->issue_date;?>
          </div>
        </div>
      </div>

      <div class="property-title1 mt-10">
        <p><?= $property->title ? $property->title : '' ?></p>
        <h1></h1>
        <span><?= $property->location . ', ' . $property->city_name ?></span>
        <p class="font9">RERA : <br> <?=$property->rera_number?$property->rera_number:'Not Updated'?></p>
      </div>
      <hr>
      <div class=" mt-10">
        <div class="project_price_details_info">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <p>SBA</p><h6> 5649 sqft</h6>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <p>No. Of Units</p><h6> <?=$property->units?> Units</h6>
            </div>
              
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <p>No. Of Floors</p><h6><?=$property->floors?> Floors</h6>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <p>No. Of Towers</p><h6> <?=$property->towers?> Towers</h6>
            </div>

            
          </div>
        </div>
      
      </div>
      <div class="projectoverview_info  mt-10">
        <h6>Project Overview:</h6>
        <?= $property->description?$property->description:''; ?>
        <!-- <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a> -->
        <center><div class="btn btn-info" data-toggle="modal" data-target="#Brochure-pop">Download Brochure</div></center>
      </div>
    </div>

    <div class="div_info mt-10" id="Pricing">
			<div class="row">
				<div class="col-md-12">
					<div class="individualproject_title">
		
						<h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Pricing</h5>
						
					</div>
					<table class="table">
						<thead class="table-head">
						  <tr>
							<th>Type</th>
							<th>SBA (sqft)</th>
							<th>Carpet Area (sqft)</th>
							<th>Price</th>
						  </tr>
						</thead>
						<tbody>
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
					  </table>
			
		
				
					<center class="mt-10"><div class="btn btn-info" data-toggle="modal" data-target="#Price-pop">Download Costsheet</div></center>
		
				</div>
			</div>
		</div>

<!--     <div class="div_info mt-10" id="Offers">
      <div class="row">
        <div class="col-md-12">
          <div class="individualproject_title">
    
            <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Special Offers</h5>
            
          </div>
    
      
    
          <div class=" specification_list">
            <div class="col-md-6">
              <ul class="list-4 color">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                
              </ul>


            </div>
            <div class="col-md-6">
              <ul class="list-4 color">
                
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                
              </ul>
            </div>
          
          </div>
          <center class="mt-10"><div class="btn btn-offer" data-toggle="modal" data-target="#">Talk To Us</div></center>
    
        </div>
      </div>
    </div> -->

    <div class="div_info mt-10" id="Amenities">
      <span class="hashtag_top"> &nbsp; </span>
      
      <div class="individualproject_title">
      
          
        <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Amenities</h5>
      
      </div>
      <div class="amenities_list" id="content-1">
        <ul>
          <?php
    if (isset($property->amenities) && $property->amenities) {
        foreach ($property->amenities as $amenity) {
            ?>
          <li>
            <div class="amenities_img">
               <?php
                if ($amenity->image) {
                    ?>
                    <img class="animated fadeInUp wow"  alt="<?= $amenity->alt_title ?>"
                            title="<?=$amenity->image_desc?>"
                          
                          src="<?= base_url('uploads/amenities/' . $amenity->image) ?>">
                             <?php
                } 
                else {
                    ?>
                    <img class="animated fadeInUp wow" alt="<?= $amenity->image ?>"
                         src="https://placehold.it/58x58">
                    <?php
                }
                ?>
            </div>
            <div class="amenities_cont"><?= ucwords($amenity->name) ?></div>
          </li>
          <?php
        }
      }
      ?>
         
        
        </ul>
      </div>
      </div>

    <div class="div_info mt-10" id="Gallery">
      <span class="hashtag_top"> &nbsp; </span>
      
      <div class="individualproject_title">
      
        <a class="link" href="" title="" target="_blank" itemprop="url">
          
        <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Gallery</h5>
        </a>
      </div>

      <div class="sppb-row">

        <ul class="nav-gallery nav-tabs mytab" role="tablist"
          style="margin-top: 20px; margin-bottom: 35px;">
  
          <li role="presentation" class="active">
            <a href="#General" aria-controls="settings" role="tab"
              data-toggle="tab" aria-expanded="false">Elevation
            </a>
          </li>
  
          <?php  
 if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
  'property_floor_plans')))
{
?>
  
          <li role="presentation" class="">
            <a href="#floorplan" aria-controls="profile" role="tab"
              data-toggle="tab" aria-expanded="true"> Floorplan
            </a>
          </li>
          <?php
          }
           if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
                                                                                 'property_master_plans')))
    {
?>
  
          <li role="presentation" class="">
            <a href="#Masterplan" aria-controls="profile" role="tab"
              data-toggle="tab" aria-expanded="true">Masterplan
            </a>
          </li>
          <?php
        }
        ?>
  
        </ul>
  
        <div class="tab-content delay-09s animated wow animated"
          style="visibility: visible; animation-name: fadeInDown;">
  
          <div role="tabpanel" class="tab-pane fade active in" id="General">
          
            <div class="row general bottom40">
            <div class="demo-gallery">
              <ul class="lightgallery" class="list-unstyled row">
                <?php
             if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
               'property_elevations')) != null) {
             // print_r($images);
                  foreach ($images as $i => $image) {
                    ?>
                <li class="col-xs-6 col-sm-4 col-md-6 col-lg-6" data-src="<?= base_url($image->image) ?>"  >
                  <a href="">
                    <img class="img-responsive" src="<?= base_url($image->image) ?>">
                  </a>
                </li>  
                <?php
                      }
                      }
                      else
                      {
                      echo  "<center>No Image Found<center>";
                      }
                      ?>           
              </ul>
            </div>
           
          </div>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade  " id="Masterplan">
  
            <div class="row masterplan bottom40">
            <div class="demo-gallery">
              <ul class="lightgallery" class="list-unstyled row">
                <?php
               if (($images = $this->properties_model->getWhere(array('property_id' => $property->id),
                'property_master_plans'))) {

                 foreach ($images as $i => $image) {
                  ?>
                <li class="col-xs-12 col-sm-4 col-md-6 col-lg-12" data-src="<?= base_url($image->image) ?>"  >
                  <a href="">
                    <img class="img-responsive" src="<?= base_url($image->image) ?>">
                  </a>
                </li>
                <?php
                  }
                  }

                  ?>
              </ul>
            </div>
            </div>      
          </div>
  
  
          <div role="tabpanel" class="tab-pane fade  " id="floorplan">
            <div class="row general bottom40">
            <div class="demo-gallery">
              <ul class="lightgallery" class="list-unstyled row">
                   <?php
      if (($images =  $this->properties_model->getWhere(array('property_id' => $property->id),'property_floor_plans'))) {
          foreach ($images as $i => $image) {
              ?>
                <li class="col-xs-6 col-sm-4 col-md-6 col-lg-6" data-src="<?= base_url($image->image) ?>"  >
                  <a href="">
                    <img class="img-responsive" src="<?= base_url($image->image) ?>">
                  </a>
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
  
  
        </div>

        
    </div>

    <div class="row div_info mt-10" id="Specification">
      <div class="individualproject_title">
      
        <a class="link" href="" title="" target="_blank" itemprop="url">
          
        <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Specification</h5>
        </a>
      </div>
  
      <div class="col-md-12 Specification">
      
        <!-- Toggles Container -->
        <div class="style-2">
          <?php
          if (($specifications = $this->properties_model->getPropertySpecification($property->id)) != null) 
          {           
            foreach ($specifications as $k => $specification) {
              if (($items = $this->properties_model->getPropertySpecification($property->id,
                                                                $specification->id)) != null) {
          ?>
          <div class="toggle-wrap">
            <span class="trigger "><a href="#"><?= $specification->name ?><i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><?php
                    $s=1;
                foreach (explode(',', $items) as $item) {
                    ?>
                                            <?= $s.". ".$item ."<br />"?>

                                                <?php
                    $s++;
                }
                ?></p>
            </div>
          </div>
         
          <?php
}
 }
}
          ?>
  
          <!-- <div class="toggle-wrap">
            <span class="trigger"><a href="#">Flooring<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Living, Dining, Kitchen &amp; Bedrooms- Vitrified tiles – Varmora / AGL or equivalent brand</li>
                <li>Toilet flooring  - Anti skid Ceramic tiles – Varmora / AGL or equivalent brand </li>
                <li>Toilet dadoing up to 7 feet- ceramic glazed tiles – Varmora / AGL or equivalent brand</li>
                <li>Kitchen dadoing above the counter to height of 2 feet- ceramic glazed tiles – 
                  Varmora/AGL or equivalent brand (only supply)</li>
                <li>Balcony -   Anti skid Ceramic tiles – Varmora / AGL or equivalent brand</li>
                <li>Common Area- Anti skid Ceramic tiles – flooring and skirting</li></ul></p>
            </div>
          </div>
          <div class="toggle-wrap">
            <span class="trigger "><a href="#">Toilet<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Sanitary fittings - American standard or equivalent brand -  Wall hung EWC, wash   basin</li>
                <li>CP fittings - Jaquar or equivalent make – Shower spout, Diverter, Shower head, Pillar cock,concealed cistern, Flush plate, angle value, health faucet</li>
                <li>Provision for geyser and Exhaust fan in toilets.</li></ul></p>
            </div>
          </div>
  
          <div class="toggle-wrap">
            <span class="trigger"><a href="#">Kitchen<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Granite top &amp; single bowl Futura / Jayna sink with drain board or equivalent brand to be provided (only supply)
              </li>
              <li>Provision for Chimney in kitchen.</li>
              <li>Provision for Water purifier
              </li></ul></p>
            </div>
          </div>
          <div class="toggle-wrap">
            <span class="trigger "><a href="#">Windows<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>2 Track UPVC windows with glazed shutters and mosquito mesh 
                Kommerling or equivalent brand 
               
               </li></ul></p>
            </div>
          </div>

          <div class="toggle-wrap">
            <span class="trigger"><a href="#">Doors<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Main Door -Tata steel or equivalent brand -Super Quality steel door &amp; frame                        
              </li>                      
              <li>Internal doors - Tata steel or equivalent brand </li>
              <li>Toilet doors - FRP door</li>
              <li>Balcony doors - Kommerling or equivalent brand- 2 Track UPVC glazed shutter with mosquito mesh</li>
              <li>Common door - Fire rated steel doors for fire exit</li></ul></p>
            </div>
          </div>

          <div class="toggle-wrap">
            <span class="trigger "><a href="#">Electrical<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Modular switches of Schneider or Equivalent Brand
              </li>
              <li> ELCB and MCB with independent EB meter of approved brand</li>
              <li>Good quality concealed copper wiring of approved brand</li>
              <li>Provision for Washing Machine point.</li></ul></p>
            </div>
          </div>
  
        
          <div class="toggle-wrap">
            <span class="trigger"><a href="#">Elevator<i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Schindler / Johnson lifts or equivalent brand
            
              </li></ul></p>
            </div>
          </div>
          <div class="toggle-wrap">
            <span class="trigger"><a href="#"> Water Supply  <i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Bore well water supply / Municipal water supply if available
              </li>
              </ul></p>
            </div>
          </div>

          <div class="toggle-wrap">
            <span class="trigger "><a href="#"> Power Backup <i class="sl sl-icon-plus"></i></a></span>
            <div class="toggle-container">
              <p><ul><li>Power backup for common areas, lift lobbies and
                0.5 KW power backup for each flat through limiter switch
                
                </li></ul></p>
            </div>
          </div>
   -->
  
        </div>
        <!-- Toggles Container / End -->
      </div>
    
    </div>

    
             <?php
              if($property->walkthrough)
              {
              ?>
    <div class="div_info mt-10" id="Video">
      
        <!-- Video -->
        <div class="individualproject_title ">
      
          
            
          <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Walkthrough Video</h5>
          
        </div>
        
        <div class="responsive-iframe">
          
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= getYoutubeVideoId($property->walkthrough) ?>?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
        </div>
    
    </div>
            <?php
                                        }

    if($property->map)
    {
      ?>

    <div class="div_info mt-10" id="Location">
      <div class="property-description">
  
        <div class="individualproject_title">
      
          
            
          <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Location  Map</h5>
          
        </div>
  
          <div id="propertyMap-container">
            <!-- <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"></div><div class="gm-err-title">Oops! Something went wrong.</div><div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div></div>
            <a href="#" id="streetView">Street View</a>-->
          </div> 
          <img src="<?= base_url("uploads/".strtolower($property->city_name)."/".str_replace(' ','-',strtolower($property->builder))."/$property->slug/map/$property->map") ?>" draggable="false" style="user-select: none;">
      </div>
    </div>
                             <?php 
    }                                           
?>

      <!--
      <div class="div_info mt-10" id="Location-Advantages">
        <div class="row">
          <div class="col-md-12">
            <div class="individualproject_title">
      
              <h5 itemprop="name"><?= $property->title ? $property->title : '' ?> Location Advantage</h5>
              
            </div>
      
        
      
            <div class=" specification_list">
              
      
              <div class="col-md-6">
                <ul class="list-3 color">
                  <li>Lorem ipsum dolor sit amet <span>10 min</span></li>
                  <li>Consectetur adipiscing elit <span>10 min</span></li>
                  <li>Integer molestie lorem at massa <span>10 min</span></li>
                  <li>Facilisis in pretium nisl aliquet <span>10 min</span></li>
                  <li>Lorem ipsum dolor sit amet <span>10 min</span></li>
                
                </ul>
              </div>
      
              <div class="col-md-6">
                <ul class="list-3 color">
                  <li>Lorem ipsum dolor sit amet <span>10 min</span></li>
                  <li>Consectetur adipiscing elit <span>10 min</span></li>
                  <li>Integer molestie lorem at massa <span>10 min</span></li>
                  <li>Facilisis in pretium nisl aliquet <span>10 min</span></li>
                  <li>Lorem ipsum dolor sit amet <span>10 min</span></li>
                </ul>
              </div>
            </div>
      
          </div>
        </div>
      </div>
      -->

      <div class="div_info mt-10" id="About_project">
        <div class="individualproject_title">
      
          
          <h5 itemprop="name">About The Builder</h5>
          <div class="project-logo mt-10"><img src="<?= base_url().'uploads/builders/'.$property->builder_image?>" class="img-responsive">
            <p><?=$property->builder?></p>
          </div>
        
        </div>
        
         <?=$property->builder_description?>
        
      </div>
      <?php
      if(count($property->faq)>=1)
      {
        ?>
      
      <div class="div_info mt-10" id="FAQ">
        <div class="FAQ-title">
        
          <h5 itemprop="name">FAQ's</h5>
          
        </div>
        <div class="panel-group" id="accordion">
          <?php
          $a=1; 
          foreach ($property->faq as $faq) {
            if($a==1)
            {
         ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle text-left" data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><?=$faq->fq?></a>
              </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse in">
              <div class="panel-body"><?=$faq->fa?>
              </div>
            </div>
          </div>
          <?php
           }
           else
            {
              ?>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle text-left collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><?=$faq->fq?></a>
              </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
              <div class="panel-body">
              <?=$faq->fa?>
              </div>
            </div>
          </div>
          <?php 
        }
        $a++;
          }
          ?>

        </div>
      </div> 
      <?php
    }
    ?>
  </div>

  
  

  <div class="col-lg-4">
    <div id="sideform" class="needhelp_form sideform ">
      <div class="needhelp_form_close  mt-10">

        </div><h5>Need help in your house search?</h5>
        
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
              <div class="spl-img va-top  bg-img-default bg-img-contain"  style=" background-image:url('<?=base_url('assets/')?>images/cashback.png')">
              </div>  
              <div class="spl-txt-wrap va-middle"> 
                <div class="spl-title va-top">Assured Callback in 5 mins</div> 
                <ul class="va-top reset-ul offer-ul"> 
                  <li class="offer">Get an assured callback in 5 mins from sales expert (9 AM - 6 PM IST)</li> 
                </ul> 
                </div>      
            </div>
            <div class="offers-wrap lead-offer no-bg-style">
              <div class="spl-img va-top  bg-img-default bg-img-contain"  style=" background-image:url('<?=base_url('assets/')?>images/offer.png')"> 
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
      
    <!-- Widget -->
			<div class="widget margin-top-20 margin-bottom-30">
				<h3 class="">Projects Nearby :</h3>
				<div class="underline margin-bottom-35"></div>

				<div class="outer" id="scroll-nearby">
          <?php

        if (($projects = $this->home_model->getsameLocationProjects($property->location_id, $property->id,
                3)) != null) { 
                  foreach ($projects as $project) { 
                    ?>
					<!-- Item -->
					<div class="item">
						<div class="listing-item compact box">

							<a href="<?= site_url(url_title($project->city_name) . "/" . (url_title($project->area)) . "/$project->slug/") ?>" class="listing-img-container corner-box">

								<div class="corner"><h2><span>
                 <?php
                    if ($this->properties_model->hasPriceRequest($project->id->id)) {
                        echo "Price on Request";
                    } else {
                        ?>
                        &#8377; <?= (($row = $this->properties_model->getPropertyParam(array('property_id' => $project->id),
                                'property_flat_types', null,
                                'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
                        - <?= (($row = $this->properties_model->getPropertyParam(array('property_id' => $project->id),
                                'property_flat_types', null,
                                'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
                        <?php
                    }
                    ?>
                                                          
                  </span></h2></div>
								<div class="listing-corner-badges">
									<span class="featured">Onwards*</span>
									
								</div>
								<div class="listing-img-content">
									<span class="listing-compact-title"><?= $project->title ?> <i><?= $project->location ?></i></span>

									<!-- <ul class="listing-hidden-content">
										<li>Area <span></span></li>
										
										<li>Price <span>1 Cr</span></li>
									</ul> -->
								</div>

								<img src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($project->city_name))."/".str_replace(" ","-",strtolower($project->builder))."/" .$project->slug.'/'.$project->image) ?>" alt="">
							</a>

						</div>
					</div>
					<!-- Item / End -->
        <?php
      }
      }
      else
        { echo "No Properties Found!";  }

					?>
   
				</div>
				<center>
					<button class="btn btn-view"><a href="<?php echo base_url('listing') ?>" style="color: white;">See More</a></button>
				</center>

			</div>
			<!-- Widget / End -->

			<!-- Widget -->
			<div class="widget margin-top-20 margin-bottom-30">
				<h3 class="">Best Deals In Your City :</h3>
				<div class="underline-widget margin-bottom-35"></div>

				<div class="outer" id="scroll-bestdeals"> 
          <?php

        if (($projects = $this->home_model->getBestdealProperties($property->city_id, $property->id,3)) != null) { 
                  foreach ($projects as $project) { 
                    ?>
          <!-- Item -->
          <div class="item">
            <div class="listing-item compact box">

              <a href="<?= site_url(url_title($project->city_name) . "/" . (url_title($project->area)) . "/$project->slug/") ?>" class="listing-img-container corner-box">

                <div class="corner"><h2><span>
                 <?php
                    if ($this->properties_model->hasPriceRequest($project->id->id)) {
                        echo "Price on Request";
                    } else {
                        ?>
                        &#8377; <?= (($row = $this->properties_model->getPropertyParam(array('property_id' => $project->id),
                                'property_flat_types', null,
                                'MIN(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
                        - <?= (($row = $this->properties_model->getPropertyParam(array('property_id' => $project->id),
                                'property_flat_types', null,
                                'MAX(total) as amount')) != null) ? number_format_short($row->amount) : 0 ?>
                        <?php
                    }
                    ?>
                                                          
                  </span></h2></div>
                <div class="listing-corner-badges">
                  <span class="featured">Onwards*</span>
                  
                </div>
                <div class="listing-img-content">
                  <span class="listing-compact-title"><?= $project->title ?> <i><?= $project->location ?></i></span>

                  <!-- <ul class="listing-hidden-content">
                    <li>Area <span></span></li>
                    
                    <li>Price <span>1 Cr</span></li>
                  </ul> -->
                </div>

                <img src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($project->city_name))."/".str_replace(" ","-",strtolower($project->builder))."/" .$project->slug.'/'.$project->image) ?>" alt="">
              </a>

            </div>
          </div>
          <!-- Item / End -->
        <?php
      }
      }
      else
        { echo "No Properties Found!";  }

          ?>
   
        </div>
				<center>
					<button class="btn btn-view"><a style="color: white;">See More</a></button>
				</center>

			</div>
			<!-- Widget / End -->

			<!-- Widget -->
			<div class="widget margin-top-20 margin-bottom-30">
				<h3 class="">Latest Blogs :</h3>
				<div class="underline-blog margin-bottom-35"></div>

				<div class="outer" id="scroll-Blogs">
           <?php

        if (($blogs = $this->blogs_model->loadBlogslimit(3)) != null) { 
                  foreach ($blogs as $blog) { 
                    ?>
					<!-- Item -->
					<div class="item">
						
						<div class="listing-item compact">

							<a href="<?=base_url('blog/').$blog->slug?>" class="listing-img-container">

							
								<div class="listing-img-content">
									<span class="listing-compact-title"><?=$blog->title?> </span> 
								</div>

								<img src="<?=base_url('uploads/')?>blog_images/<?=$blog->image?>" alt="">
							</a>

						</div>
					</div>
					 
				</div>
        <?php
          }

          }
        ?>
				<center>
					<button class="btn btn-view"><a style="color: white;">See More</a></button>
				</center>

			</div>
			<!-- Widget / End -->
        
        </div>
    </div>
</div>
<!-- Flip banner -->
<a href="" class="flip-banner parallax-home" data-background="<?=base_url('assets/')?>images/single-property-03.jpg"  data-img-width="2500" data-img-height="1600">
  <div class="flip-banner-content" style="color:rgb(219 18 57)">
    <h2 class="flip-visible">We help people and homes find each other</h2>
    <h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
  </div>
</a>
<!-- Flip banner / End -->


<div class="modal Home-pupup fade in" tabindex="-1" role="dialog" id="Brochure-pop" style="opacity: 1;">
  <!-- data-backdrop="static" data-keyboard="false" -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
      
    <div class="modal-body text-center needhelp_form-modal" style="margin: auto;">
    <li class="property-col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>
    
    <li class="left_col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>  
    <li class="right_col"><h5><?=$property->title?> Brochure</h5></li>
    
      <div class="needhelp_form_list">
          
        <form action="" name="WebForm-1498709213622" method="POST" id="elqform2">
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

            <li style="margin-top:20px!important">
            <center><input type="submit" class="btn btn-submit" name=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nav><!-- <div class="btn btn-submit" data-toggle="modal" data-target="#main-pop">Close</div> --></center>
          </li>
          </ul>
        </form>
      </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal Home-pupup fade in" tabindex="-1" role="dialog" id="main-pop" style="opacity: 1;">
  <!-- data-backdrop="static" data-keyboard="false" -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
      
    <div class="modal-body text-center needhelp_form-modal" style="margin: auto;">
    <li class="property-col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>
    
    <li class="left_col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>  
    <li class="right_col"><h5><?=$property->title?> Brochure</h5></li>
    
      <div class="needhelp_form_list">
          
        <form action="" name="WebForm-1498709213622" method="POST" id="elqform2">
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

            <li style="margin-top:20px!important">
            <center><input type="submit" class="btn btn-submit" name=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nav><!-- <div class="btn btn-submit" data-toggle="modal" data-target="#main-pop">Close</div> --></center>
          </li>
          </ul>
        </form>
      </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal Home-pupup fade in" tabindex="-1" role="dialog" id="Price-pop" style="opacity: 1;">
  <!-- data-backdrop="static" data-keyboard="false" -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
      
    <div class="modal-body text-center needhelp_form-modal" style="margin: auto;">
    <li class="property-col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>
    <li class="left_col"><img class="text-center modal-logo" src="<?=base_url('assets/')?>images/Holding-bricks.png"></li>  
    <li class="right_col"><h5><?=$property->title?> Download Costsheet</h5></li>
    
      <div class="needhelp_form_list">
          
        <form action="" name="WebForm-1498709213622" method="POST" id="elqform2">
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

            <li style="margin-top:20px!important">
            <center><input type="submit" class="btn btn-submit" name=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nav><!-- <div class="btn btn-submit" data-toggle="modal" data-target="#main-pop">Close</div> --></center>
          </li>
          </ul>
        </form>
      </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<?php $this->load->view('inc/footer'); ?>

<script>
	$(document).ready(function(){
		$('.lightgallery').lightGallery(); 
	});
</script>