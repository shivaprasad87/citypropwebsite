<!-- Banner Img -->
<img class="post-img" src="<?= base_url('uploads/blog_images/' . $blog->image) ?>" alt="">

	<div class="clearfix"></div>
	<!-- Header Container / End -->

	
	<div class="container">
		<!-- Blog Post -->
		<div class=" single-post ">

			<div class="blog-post">


			<!-- Content -->
			<div class="post-content">
				<h3><?= $blog->title ?></h3>

				<ul class="post-meta">
					<li><?= date('M d, Y',strtotime($blog->date ? $blog->date : $blog->date_added)) ?></li>
					
				</ul>
				<?= $blog->content ?>
				<div class="clearfix"></div>

			</div>
		</div>
		</div>
		<!-- Blog Post / End -->
		  <div class="text-center">
                <?php
                if ($prev_blog) {
                    ?>
                    <a href="<?= site_url("blog/$prev_blog->slug") ?>" class="btn btn-primary"><i
                                class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a> &emsp;
                    <?php
                } else {
                    ?>
                    <a href="#" class="btn btn-primary disabled" disabled><i class="fa fa-chevron-left"
                                                                             aria-hidden="true"></i> Previous</a> &emsp;
                    <?php
                }
                if ($next_blog) {
                    ?>
                    <a href="<?= site_url("blog/$next_blog->slug") ?>" class="btn btn-primary">Next <i
                                class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    <?php
                } else {
                    ?>
                    <a href="#" class="btn btn-primary disabled" disabled>Next <i class="fa fa-chevron-right"
                                                                                  aria-hidden="true"></i></a>
                    <?php
                }
                ?>

                <br/>
            </div>
	</div>

	<div class="margin-top-50"></div>


	<a href="" class="flip-banner parallax-home" data-background="../../../assets/images/single-property-03.jpg"  data-img-width="2500" data-img-height="1600">
		<div class="flip-banner-content" style="color:rgb(219 18 57)">
			<h2 class="flip-visible">We help people and homes find each other</h2>
			<h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
		</div>
	</a>
	

	<div class="modal Home-pupup fade in" tabindex="-1" role="dialog" id="main-pop" style="opacity: 1;">
		<!-- data-backdrop="static" data-keyboard="false" -->
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		
			<div class="modal-body text-center needhelp_form-modal" style="margin: auto;">
			<li class="left_col"><img class="text-center modal-logo" src="../../../assets/images/Holding-bricks.png"></li>	
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