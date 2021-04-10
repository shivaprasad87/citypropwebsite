<!-- Main header start -->
<header class="main-header header-transparent sticky-header">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand logo" href="<?=base_url();?>">
				<img src="<?=base_url();?>img/logos/black-logo.png" alt="logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav  ml-auto">
					<li class="nav-item <?=$this->uri->segment(1)?"":"active"?>">
						<a class="nav-link " href="<?=base_url();?>" >
							Home
						</a>

					</li>
					<li class="nav-item <?php if($this->uri->segment(1)=='about') echo 'active';?>">
						<a class="nav-link " href="<?=base_url('about');?>" >
							About Us
						</a>

					</li>
					<li class="nav-item <?php if($this->uri->segment(1)=='listing') echo 'active';?>">
						<a class="nav-link " href="<?=base_url('listing');?>" >
							Listing
						</a>

					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Location
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a href="<?= site_url('listing') ?>">All Cities</a></li>

							<?php /** @var array $cities */
							foreach ($cities as $city) { ?>
								<li class="dropdown-item <?= $this->session->userdata('city') == $city->name ? 'active' : '' ?>"><a href="<?= site_url('city/'.$city->url_name) ?>"><?= htmlentities(ucfirst($city->name)) ?></a></li>
							<?php } ?>
						</ul>

					</li>

					<li class="nav-item <?php if($this->uri->segment(1)=='contact') echo 'active';?>">
						<a class="nav-link " href="<?=base_url('contact');?>" >
							Contact Us
						</a>

					</li>

					<li class="nav-item navbar-buttons sp">
						<a class="btn btn-theme btn-md" href="<?=base_url('login');?>">Login/Register</a>

					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- Main header end -->
