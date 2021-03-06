<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Default Public Template
 */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
	<link rel="icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
    <title><?php echo $page_title; ?> - <?php echo $this->settings->site_name; ?></title>
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
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css1/bootstrap.min.css">
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
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/style.css">
<link rel="icon" href="images/icon.png">

<style>
  .btn-white {
    color: #fff;
    border: 1px solid #fff;
    background: #9c7833;
}

</style>
    <?php // CSS files ?>
    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if ( ! is_null($css)) : ?>
                <?php $separator = (strstr($css, '?')) ? '&' : '?'; ?>
                <link rel="stylesheet" href="<?php echo $css; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?> 
</head>
<body>

    <?php // Fixed navbar ?>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"><?php echo lang('core button toggle_nav'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?php echo $this->settings->site_name; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php // Nav bar left ?>
                <ul class="nav navbar-nav">
                    <li class="<?php echo (uri_string() == '') ? 'active' : ''; ?>"><a href="<?php echo base_url('/'); ?>"><?php echo lang('core button home'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'contact') ? 'active' : ''; ?>"><a href="<?php echo base_url('/contact'); ?>"><?php echo lang('core button contact'); ?></a></li>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li class="<?php echo (uri_string() == 'profile') ? 'active' : ''; ?>"><a href="<?php echo base_url('/profile'); ?>"><?php echo lang('core button profile'); ?></a></li>
                    <?php endif; ?>
                </ul>
                <?php // Nav bar right ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <?php if ($this->user['is_admin']) : ?>
                            <li>
                                <a href="<?php echo base_url('admin'); ?>"><?php echo lang('core button admin'); ?></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo base_url('logout'); ?>"><?php echo lang('core button logout'); ?></a>
                        </li>
                    <?php else : ?>
                        <li class="<?php echo (uri_string() == 'login') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('login'); ?>"><?php echo lang('core button login'); ?></a>
                        </li>
                    <?php endif; ?>
                    <!-- <li>
                        <span class="dropdown">
                            <button id="session-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default">
                                <i class="fa fa-language"></i>
                                <span class="caret"></span>
                            </button>
                            <ul id="session-language-dropdown" class="dropdown-menu" role="menu" aria-labelledby="session-language">
                                <?php foreach ($this->languages as $key=>$name) : ?>
                                    <li>
                                        <a href="#" rel="<?php echo $key; ?>">
                                            <?php if ($key == $this->session->language) : ?>
                                                <i class="fa fa-check selected-session-language"></i>
                                            <?php endif; ?>
                                            <?php echo $name; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </span>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <?php // Main body ?>
    <div class="container theme-showcase" role="main">

        <?php // Page title ?>
        <div class="page-header">
            <h1><?php echo $page_header; ?></h1>
        </div>

        <?php // System messages ?>
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
    <?php $this->load->view('inc/footer');?>

<!--     <?php // Footer ?>
    <footer>
        <div class="container">
            <div class="clearfix"><hr /></div>
            <p class="text-muted">
                Copyright@ Prop Solutions Property Services Realtors <?=date('Y');?>
            </p>
        </div>
    </footer>

    <?php // Javascript files ?>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php $separator = (strstr($js, '?')) ? '&' : '?'; ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html> -->
