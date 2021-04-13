<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?= str_replace(' ', ' ', substr(strip_tags($property->meta_title), 0, 1000)) ?>
	</title>
	<meta name="description" content="<?= substr(strip_tags($property->meta_desc), 0, 1000) ?>" />
	<meta name="keywords" content="<?= str_replace(' ', ' ', substr(strip_tags($property->meta_keywords), 0, 1000)) ?>" />
	<meta property="og:url" content="<?= current_url() ?>" />
	<meta property="og:title" content="<?= $property->title ? $property->title : '' ?>" />
	<meta property="og:site_name" content="City Prop Realtors" />
	<meta property="og:description" content="<?= substr(strip_tags($property->description), 0, 1000) ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"/>
	<meta property="og:locale" content="en_us" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@cityprop" />
	<meta name="twitter:title" content="<?= $property->title ? $property->title : '' ?>" />
	<meta name="twitter:description" content="<?= substr(strip_tags($property->description), 0, 1000) ?>" />
	<!-- <meta name="twitter:image" content="<?= base_url("uploads/$property->slug/$property->image") ?>"/>
        <script type='text/javascript' src='<?= base_url() ?>assets/property/unitegallery/js/jquery-11.0.min.js'></script> -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= site_url('') ?>assets/img/sp-logo.png" />

	<link rel="canonical" href="<?= current_url() ?>">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- External CSS libraries -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap-submenu.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/leaflet.css" type="text/css">
	<link rel="stylesheet" href="<?=base_url('assets/')?>css/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/map.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/linearicons/style.css">
	<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/jquery.mCustomScrollbar.css">
	<!-- <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/dropzone.css"> -->
	<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/slick.css">
	<!-- Custom stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" id="style_sheet" href="<?=base_url()?>assets/css/skins/default.css">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png" type="image/x-icon" >
	<!-- Google fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
	<?php
	$builder  = $this->bm->getBuilderById('name,description', ['id'=>$property->builder_id]);
	$price_range ='';
	$price = array();
	if (($flatTypes = $this->properties_model->getPropertyFlatType(null,$property->id)) != null){
		$i=0;
		foreach ($flatTypes as $flatType) {
			?>
			<?php if($flatType->price_on_request){ $price_range =''; }else{ $price_range ='no';
				$price[$i++] =  ( ($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', null, 'MIN(total) as amount')) != null ) ? ($row->amount) : 0; }
		}
	}
	$txt = '';
	$txt .='{
         "@type": "Question",
         "name": "What is the price for '.$property->title." ".$property->city_name. '?"'.'  ,
         "acceptedAnswer": {
         "@type": "Answer",
         "text": "'.$property->title." starts from Rs.".number_format(min($price)). '"'.'}
         },';
	$txt .='{
         "@type": "Question",
         "name": "What is the location of '.$property->title. '?"'.' ,
         "acceptedAnswer": {
         "@type": "Answer",
         "text": "'.$property->title." is located at ".$property->location.", ".$property->city_name. '"'.'}
         },';
	$p_status='';
	$ans='';
	if($property->issue_date =='Ready To Move' || $property->issue_date =='Resale')
	{
		$p_status ="Ready To Move In";
		$ans = "<b>".$property->title."</b> is now <b>".$p_status."</b>".'"';
	}

	else
	{
		$p_status = "Under Construction";
		$ans = "<b>".$property->title."</b> is now in <b>".$p_status."</b>".'"';
	}

	$txt .='{
         "@type": "Question",
         "name": "What is '.$property->title. " current status". '?"'.'  ,
         "acceptedAnswer": {
         "@type": "Answer",
         "text": "'.$ans.'}
         },';
	$txt .='{
         "@type": "Question",
         "name": "What are the amenities provided by '.$property->title. '?"'.'  ,
         "acceptedAnswer": {
         "@type": "Answer",
         "text": "'.$property->title.' provides amenities like <b>gym, swimming pool, club house, children play area etc.</b>"}
         },';
	$faq =json_decode("[".rtrim($txt,",")."]");
	foreach ($property->faq as $faq) {
		if(trim($faq->question)!=''){
			$txt .='{
         "@type": "Question",
         "name": "'.$faq->question.'",
         "acceptedAnswer": {
         "@type": "Answer",
         "text": "'.$faq->answer.'"}<project name> starts from <lower price> onwards
         },';
		}
	}

	if(trim($txt)!='')
	{
		?>
		<script type="application/ld+json">
         {
           "@context": "https://schema.org",
           "@type": "FAQPage",
           "mainEntity": [<?=rtrim($txt,',')?>]
         }
      </script>
	<?php }
	$logo_url ='';
	if(($logos = $this->properties_model->getWhere(array('property_id' => $property->id),'property_logo')) != null)
	{
		$logos=json_decode( json_encode($logos), true);
		$logo_url = base_url().'uploads/'.$property->slug.'/logos/'.$map[0];
	}
	else
	{
		//print_r($property);
		$map[0]= $property->builder_image;
		$logo_url = base_url().'uploads/builders/'.$map[0];
	}


	?>
	<script type="application/ld+json">
         {
           "@context": "https://schema.org",
           "@type": "Organization",
           "name": "<?=$property->title?>",
           "url": "<?=current_url();?>",
           "logo": "<?=$logo_url?>",
           "contactPoint": {
             "@type": "ContactPoint",
             "telephone": "<?= $social_links->mobile ?>",
             "contactType": "customer service",
             "contactOption": "TollFree",
             "areaServed": "IN",
             "availableLanguage": ["en","Hindi"]
           },
           "sameAs": [
             "<?= $social_links->facebook ?>",
             "<?= $social_links->twitter ?>",
             "<?= $social_links->instagram ?>",
             "<?= $social_links->youtube ?>",
             "<?= $social_links->linkedin ?>",
             "<?=base_url();?>"
           ]
         }
      </script>
	<script type="application/ld+json">
         {
           "@context": "https://schema.org/",
           "@type": "WebSite",
           "name": "<?=$property->title?>",
           "url": "<?=current_url();?>",
           "potentialAction": {
             "@type": "SearchAction",
             "target": "<?=current_url();?>#showPattern{search_term_string}",
             "query-input": "required name=search_term_string"
           }
         }
      </script>
	<?php
	if($property->walkthrough)
	{
		function get_youtube($url){

			$youtube = "http://www.youtube.com/oembed?url=". $url ."&format=json";

			$curl = curl_init($youtube);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$return = curl_exec($curl);
			curl_close($curl);
			return json_decode($return, true);

		}

		$youtube_data = get_youtube($property->walkthrough);
		?>
		<script type="application/ld+json">
         {
           "@context": "https://schema.org",
           "@type": "VideoObject",
           "name": "<?=$youtube_data['title']?>",
           "description": "<?= substr(strip_tags($property->meta_desc), 0, 1000) ?>",
           "thumbnailUrl": "https://img.youtube.com/vi/<?= getYoutubeVideoId($property->walkthrough) ?>/mqdefault.jpg",
           "uploadDate": "<?=$property->date_added?>",
           "publisher": {
             "@type": "Organization",
             "name": "City Prop Realtors",
             "logo": {
               "@type": "ImageObject",
               "url": "<?=$logo_url?>",
               "width": 60,
               "height": 60
             }
           },
           "contentUrl": "<?=$property->walkthrough?>"
         }
      </script>
		<?php
	}


	// echo min($price);
	// echo max($price);
	if(min($price)!='' && max($price))
	{

		?>
		<script data-react-helmet="true" type="application/ld+json">
         {
             "@context": "http://schema.org/",
             "@type": "Product",
             "name": "<?=$property->title?>",
             "image": "<?= base_url('uploads/'.$property->slug.'/'.$property->image) ?>",
             "description": "<?= substr(strip_tags($property->meta_desc), 0, 1000) ?>",
             "offers": {
                 "@type": "AggregateOffer",
                 "priceCurrency": "INR",
                 "lowPrice":"<?=min($price)?>",
                 "highPrice":"<?=max($price)?>",
                 "seller": [
                     { "@type": "Organization", "name": "City Prop Realtors" }
                 ]
             },
             "brand": {
                 "@type": "Organization",
                 "name": "<?=$builder['name']?>",
                 "url": "<?=current_url();?>",
                 "description": "<?=$builder['description']?>"
             }
         }
      </script>
		<?php
	}
	?>
	<script data-react-helmet="true" type="application/ld+json">
         { "@context": "http://schema.org/",
         "@type": "Residence",
          "address": { "@type": "PostalAddress",
           "addressLocality": "<?=$property->location?>",
            "addressRegion": "<?=$property->city_name?>" } }
      </script>
	<script type="application/ld+json">
         {
             "@context": "https:\/\/schema.org",
             "@type": "RealEstateAgent",
             "name": "<?=$property->title?>",
             "image": ["<?= base_url('uploads/'.$property->slug.'/'.$property->image) ?>"],
             "telephone": "<?= $social_links->mobile ?>",
             "url": "<?=base_url();?>",
             "address": { "@type": "PostalAddress","addressLocality": "<?=$property->location?>","addressRegion": "<?=$property->city_name?>", "addressCountry": "IN" },
             "priceRange": "<?=min($price)?>",
             "openingHoursSpecification": [
                 { "@type": "OpeningHoursSpecification", "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], "opens": "10:00", "closes": "18:30" },
                 { "@type": "OpeningHoursSpecification", "dayOfWeek": ["Sunday"], "opens": "10:00", "closes": "18:00" }
             ],
             "ContactPoint": {
                 "@type": "ContactPoint",
                 "contactType": "sales",
                 "telephone": "+91<?= $social_links->mobile ?>",
                 "url": "<?=current_url();?>",
                 "email": "<?= $social_links->email ?>",
                 "areaServed": "IN",
                 "contactOption": ["<?= $social_links->mobile ?>", "TollFree"],
                 "availableLanguage": "English"
             }
         }
      </script>
	<script type="application/ld+json">
         {
           "@context": "https://schema.org",
           "@type": "BreadcrumbList",
           "itemListElement": [{
             "@type": "ListItem",
             "position": 1,
             "name": "Home",
             "item": "<?=base_url();?>"
           },{
             "@type": "ListItem",
             "position": 2,
             "name": "<?=$property->city_name;?>",
             "item": "<?=current_url();?>"
           },{
             "@type": "ListItem",
             "position": 3,
             "name": "<?=$property->location?>",
             "item": "<?=current_url();?>"
           },{
             "@type": "ListItem",
             "position": 4,
             "name": "<?=$property->title?>"
           }]
         }
      </script>
</head>
