<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= strip_tags($title) ?></title>
	<meta name="keywords" content="<?= $keywords ?>">
	<meta name="description" content="<?= $description ?>">
	<meta name="image" content="<?= isset($image) ? $image : "" ?>">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- External CSS libraries -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/bootstrap-submenu.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?=base_url('assets/home/')?>css/leaflet.css" type="text/css">
	<link rel="stylesheet" href="<?=base_url('assets/home/')?>css/map.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>fonts/linearicons/style.css">
	<link rel="stylesheet" type="text/css"  href="<?=base_url('assets/home/')?>css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css"  href="<?=base_url('assets/home/')?>css/slick.css">
	<!-- Custom stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/')?>css/style.css">
	<link rel="stylesheet" type="text/css" id="style_sheet" href="<?=base_url('assets/home/')?>css/skins/default.css">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?=base_url('assets/home/')?>img/favicon.png" type="image/x-icon" >
	<!-- Google fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
	<style>
		.price-box span {
			color: #ffffff;
			font-weight: 700;
		}
		.tag {
			background: rgb(255 193 43);
		}
	</style>

</head>
