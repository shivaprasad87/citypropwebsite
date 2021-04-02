<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Admin Template
 */
?><!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
    <link rel="icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
    <script type="text/javascript"> var base_url = "<?= base_url() ?>" </script>
    <script type="text/javascript"> var site_url = "<?= site_url() ?>" </script>
    <title><?php echo $page_title; ?> - <?php echo $this->settings->site_name; ?></title>

    <?php // CSS files ?>
    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if (!is_null($css)) : ?>
                <?php $separator = (strstr($css, '?')) ? '&' : '?'; ?>
                <link rel="stylesheet" href="<?php echo $css; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?= $keywords ?>">
<meta name="description" content="<?= $description ?>"> 
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/reality-icon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/settings.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/range-Slider.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/search.css">

<!-- <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/style.css"> / End -->
<link rel="stylesheet" href="<?=base_url('assets/');?>themes/admin/css/admin.css">
<link rel="stylesheet" href="<?=base_url('assets/');?>themes/admin/css/summernote-bs3.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>themes/admin/css/adminlte.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>themes/admin/css/__all-skins.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>themes/admin/css/bootstrap-tagsinput.css">
<link rel="icon" href="images/icon.png">

<style>
  .btn-white {
    color: #fff;
    border: 1px solid #fff;
    background: #9c7833;
}

</style>
    </head>
    <body class="skin-blue">

        <?php // Fixed navbar  ?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"><?php echo lang('core button toggle_nav'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('admin') ?>"><?php echo $this->settings->site_name; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('logout'); ?>"><?php echo lang('core button logout'); ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/dashboard') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin'); ?>"><?php echo lang('admin button dashboard'); ?></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-building"></i> <span>Cities</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/cities/add') ?>"><i class="fa fa-circle-o"></i> Add City </a></li>
                            <li><a href="<?= site_url('admin/cities') ?>"><i class="fa fa-list"></i> View/Edit Cities </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Builders</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/builders/add') ?>"><i class="fa fa-circle-o"></i> Add Builder </a></li>
                            <li><a href="<?= site_url('admin/builders') ?>"><i class="fa fa-list"></i> View/Edit Builders </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Locations</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/locations/add') ?>"><i class="fa fa-circle-o"></i> Add Location </a></li>
                            <li><a href="<?= site_url('admin/locations') ?>"><i class="fa fa-list"></i> View/Edit Locations </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Property Types</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/property_types/add') ?>"><i class="fa fa-circle-o"></i> Add Property Type </a></li>
                            <li><a href="<?= site_url('admin/property_types') ?>"><i class="fa fa-list"></i> View/Edit Property Types </a></li>
                        </ul>
                    </li>
                    <li class="treeview <?= $this->uri->segment(2) === 'status' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Property Status</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/status/add') ?>"><i class="fa fa-circle-o"></i> Add Property Status </a></li>
                            <li><a href="<?= site_url('admin/status') ?>"><i class="fa fa-list"></i> View/Edit Property Status </a></li>
                        </ul>
                    </li>

                    <li class="treeview <?= $this->uri->segment(2) === 'specification' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Property Specification</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/specification/add') ?>"><i class="fa fa-circle-o"></i> Add Specification </a></li>
                            <li><a href="<?= site_url('admin/specification') ?>"><i class="fa fa-list"></i> Manage Specification </a></li>
                        </ul>
                    </li>

                    <li class="treeview <?= $this->uri->segment(2) === 'flat_type' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Flat types</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/flat_type/add') ?>"><i class="fa fa-circle-o"></i> Add Flat Type </a></li>
                            <li><a href="<?= site_url('admin/flat_type') ?>"><i class="fa fa-list"></i> Manage Flat Types </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Amenities</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/amenities/add') ?>"><i class="fa fa-circle-o"></i> Add Amenity </a></li>
                            <li><a href="<?= site_url('admin/amenities') ?>"><i class="fa fa-list"></i> View/Edit Amenities </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Properties</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/properties/add') ?>"><i class="fa fa-circle-o"></i> Add Property </a></li>
                            <li><a href="<?= site_url('admin/properties') ?>"><i class="fa fa-list"></i> View/Edit Properties </a></li>
                            <li><a href="<?= site_url('admin/properties/rera') ?>"><i class="fa fa-list"></i> RERA Approval </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Blogs</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/blogs/add_blog_category') ?>"><i class="fa fa-circle-o"></i> Add Category </a></li>
                            <li><a href="<?= site_url('admin/blogs/blog_categories') ?>"><i class="fa fa-list"></i> View Category List </a></li>
                            <li class="active"><a href="<?= site_url('admin/blogs/add_blog') ?>"><i class="fa fa-circle-o"></i> Add Post </a></li>
                            <li><a href="<?= site_url('admin/blogs') ?>"><i class="fa fa-list"></i> View Posts </a></li>
                    
                            <li><a href="<?= site_url('admin/blogs/add_blog_type') ?>"><i class="fa fa-circle-o"></i> Add Blog Type </a></li>
                            <li><a href="<?= site_url('admin/blogs/blog_types') ?>"><i class="fa fa-list"></i> View Blog Type List </a></li> 
                        </ul>

                    </li>

                    <li class="treeview <?= $this->uri->segment(2) === 'career' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-graduation-cap"></i> <span>Careers</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/career/add') ?>"><i class="fa fa-circle-o"></i> Add Career Option </a></li>
                            <li><a href="<?= site_url('admin/career') ?>"><i class="fa fa-list"></i> Manage Careers </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Achievements</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/achievements/add') ?>"><i class="fa fa-circle-o"></i> Add Achievement </a></li>
                            <li><a href="<?= site_url('admin/achievements') ?>"><i class="fa fa-list"></i> View/Edit Achievements </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Testimonials</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/testimonials/add') ?>"><i class="fa fa-circle-o"></i> Add Testimonial </a></li>
                            <li><a href="<?= site_url('admin/testimonials') ?>"><i class="fa fa-list"></i> View/Edit Testimonials </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Footer Proprty Links</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/FooterLinks/add') ?>"><i class="fa fa-circle-o"></i> Add Footer Link </a></li>
                            <li><a href="<?= site_url('admin/FooterLinks') ?>"><i class="fa fa-list"></i> View/Edit Footer Link </a></li>
                        </ul>
                    </li>
                    <li class="<?php echo (uri_string() == 'admin/users') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/users'); ?>"><?php echo lang('admin button users'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/settings') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/settings'); ?>"><?php echo lang('admin button settings'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/aboutUs') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/aboutUs'); ?>">About Us</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/nri') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/Nri'); ?>">Nri</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/vasthu') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/vasthu'); ?>">Vasthu</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/socialMedia') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/socialMedia'); ?>">Social Media</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/allCities') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/allCities'); ?>">All City Details</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/terms') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/terms'); ?>"><i class="fa fa-legal" aria-hidden="true"></i> Privacy Policy</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/disclaimer') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/disclaimer'); ?>"><i class="fa fa-legal" aria-hidden="true"></i> Disclaimer</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/faq') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/faq'); ?>">Faq</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/stayInTouch') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/stayInTouch'); ?>">Stay In Touch</a></li>
                    <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/display_images') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/display_images'); ?>">Display Images</a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Sliders</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= site_url('admin/sliders/add') ?>"><i class="fa fa-circle-o"></i> Add Slider </a></li>
                            <li><a href="<?= site_url('admin/sliders') ?>"><i class="fa fa-list"></i> Sliders List </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <?php // Main body  ?>
        <div class="content-wrapper theme-showcase" role="main">
            <div class="page-header">
                <h1><!-- <?php echo $page_header; ?> --></h1>
            </div>

            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php elseif (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php elseif ($this->error) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->error; ?>
                </div>
            <?php endif; ?>

            <?php // Main content ?>
            <?php echo $content; ?>

        </div>

        <?php // Footer  ?>
        <footer class="sticky-footer">
            <div class="container">
                <p class="text-muted">
                    Copyright@ Holdingbricks Pvt Ltd <?=date('Y');?>
                </p>
            </div>
        </footer>

        <?php // Javascript files ?>
        <?php if (isset($js_files) && is_array($js_files)) : ?>
            <?php foreach ($js_files as $js) : ?>
                <?php if (!is_null($js)) : ?>
                    <?php $separator = (strstr($js, '?')) ? '&' : '?'; ?>
                    <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
            <?php foreach ($js_files_i18n as $js) : ?>
                <?php if (!is_null($js)) : ?>
                    <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <script type="text/javascript" src="<?= base_url('assets/themes/admin/js/adminlte.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/themes/admin/js/bootstrap-tagsinput.js') ?>"></script>
        
    </body>
    </html>
