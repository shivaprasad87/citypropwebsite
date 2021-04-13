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
	<meta property="og:site_name" content="Fullbasket Property" />
	<meta property="og:description" content="<?= substr(strip_tags($property->description), 0, 1000) ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?= base_url('uploads/' . str_replace(" ", "-", strtolower($property->city_name)) . "/" . str_replace(" ", "-", strtolower($property->builder)) . "/" . $property->slug . '/' . $property->image) ?>"/>
	<meta property="og:locale" content="en_us" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@Fullbasketproperty" />
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
</head>
