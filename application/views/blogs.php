<div class="clearfix"></div>
	<!-- Header Container / End -->
	<div class="parallax titlebar" data-background="../../../assets/images/listings-parallax.jpg" data-color="#333333" data-color-opacity="0.7" data-img-width="800" data-img-height="505" style="background-image: url(&quot;../../../assets/images/listings-parallax.jpg&quot;); background-attachment: fixed; background-size: 1349px 851.556px; background-position: 50% -496.819px;">
	<div class="parallax-overlay" style="background-color: rgb(51, 51, 51); opacity: 0.7;"></div>

	<div id="titlebar" style="    margin-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2>Blog</h2>
					<span></span>
					
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?=base_url();?>">Home</a></li>
							<li>Blog</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>
   </div>
   
   <?php
if($error)
{
	echo $error;
}
else
{
?>
	
	<div class="container property-details">

		<!-- Blog Posts -->
		<div class="blog-page">
			<div class="row">
				<div class="col-lg-8 mt-30 ">

					<div class="row">
						<?php
				        foreach ($blogs as $i => $blog) {
				            ?>
						<div class="col-lg-6">
							<!-- Blog Post -->
							<div class="blog-post">
								
								<!-- Img -->
								<a href="<?=site_url("blog/$blog->slug")?>" class="post-img">
									<img src="<?=base_url(($blog->image && is_file(FCPATH.'uploads/blog_images/'.$blog->image)) ? 'uploads/blog_images/'.$blog->image : 'assets/img/logo.png')?>" alt="">
								</a>
								
								<!-- Content -->
								<div class="post-content">
									<h3><a href="<?=site_url("blog/$blog->slug")?>"><?=$blog->title?></a></h3>
				
									<ul class="post-meta">
										<li><?= date('M d, Y',
                strtotime($blog->date ? $blog->date : $blog->date_added)) ?></li>
										<!-- <li><a href="#">5 Comments</a></li> -->
									</ul>
				
									<p><?=substr(strip_tags($blog->content),0,200)?>..</p>
				
									<a href="<?=site_url("blog/$blog->slug")?>" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
								</div>
				
							</div>
							<!-- Blog Post / End -->
						</div>

				          <?php		
			            }
					         
					        ?>

				
							<!-- Pagination -->
							<div class="clearfix"></div>
							<!-- <div class="pagination-container">
								<nav class="pagination">
									<ul>
										<li><a href="#" class="current-page">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
									</ul>
								</nav>
				
								<nav class="pagination-next-prev">
									<ul>
										<li><a href="#" class="prev">Previous</a></li>
										<li><a href="#" class="next">Next</a></li>
									</ul>
								</nav>
							</div> -->

							<div class="clearfix"></div>
				
					</div>
				
					<!-- Blog Posts / End -->
			
				</div>
				<!-- Sidebar / End -->

				<div class="col-md-4 mt-30">
					<div class="sidebar right">
			
						
						<!-- Widget -->
						<div class="widget">
			
							<h3>Popular Posts</h3>
							<ul class="widget-tabs">
			
								<!-- Post #1 -->
								<?php
                if (($blogs = $this->properties_model->db->where('id !=', $blog->id)->order_by('id',
                        'desc')->limit(3)->get('blog')->result()) != null) {
                    foreach ($blogs as $recentBlog) {
                        ?>
								<li>
									<div class="widget-content">
											<div class="widget-thumb">
											<a href="<?=site_url("blog/$recentBlog->slug")?>"><img src="<?= base_url(($recentBlog->image && is_file('uploads/blog_images/' . $recentBlog->image)) ? 'uploads/blog_images/' . $recentBlog->image: 'assets/img/logo.png') ?>" alt=""></a>
										</div>
										
										<div class="widget-text">
											<h5><a href="<?=site_url("blog/$recentBlog->slug")?>"><?= $recentBlog->title ?></a></h5>
											<span><?= date('M d, Y',
                strtotime($recentBlog->date ? $recentBlog->date : $recentBlog->date_added)) ?></span>
										</div>
										<div class="clearfix"></div>
									</div>
								</li>
								 <?php
				                    }
				                }
				                else
				                {
				                	echo "No Latest Blogs";
				                }
				                ?>
								 
							</ul>
			
						</div>
						<!-- Widget / End-->
			
					<!-- Widget -->
					<!-- <div class="widget">
						<h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
						<div class="search-blog-input">
							<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
						</div>
						<div class="clearfix"></div>
					</div> -->
					<!-- Widget / End -->
					<!-- Widget -->
			 
			<!-- Widget / End -->

					<!-- Widget --
					<div class="widget">
						<h3>Got any questions?</h3>
						<div class="info-box margin-bottom-10">
							<p>If you are having any questions, please feel free to ask.</p>
							<a href="contact.html" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
						</div>
					</div>
					<!-- Widget / End -->


						
			
						<div class="clearfix"></div>
						<div class="margin-bottom-40"></div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Flip banner -->
	<a href="<?=base_url('blog');?>" class="flip-banner parallax-home" data-background="../../../assets/images/single-property-03.jpg"  data-img-width="2500" data-img-height="1600">
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
<?php
}
?>