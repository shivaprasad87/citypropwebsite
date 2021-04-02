
<img class="post-img" src="<?=base_url('assets/');?>images/popular-location-01.jpg" alt="">

	<div class="clearfix"></div>
	<!-- Header Container / End -->

	<!--  Body of Career -->

			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 column">
							<div class="row">
								<!-- Bangalore div -->
								<div class="col-lg-12">
									<?php
                                    if ($careers){
                                    ?>
									<div class="heading left">
										<h2>Position Open in Bangalore Office</h2>
									</div>
									<!-- Heading -->
									<?php
									foreach ($careers as $i => $career) {
                                    ?>
									<div class="toggle-widget experties">

										<h2>Hiring! <?=$career->title?></h2>

										<div class="content" style="display: none;">
											<div class="job-wide-devider">
												<div class="row">
													<div class="col-lg-8 column">
														<div class="job-details">
															<h3>Available Positions - <?=$career->bangalore_vacancy?$career->bangalore_vacancy:0?></h3>
															<h3>Job Description - <?=$career->role?></h3> 
														 
															<h3>Required Knowledge, Skills, and Abilities</h3>
															<?=$career->qualities?>
															<h3>Education + Experience</h3>
															<ul>
																<?php
                                            if ($career->type){
                                                ?>
                                                <li><strong>Job Type: </strong> <?=$career->type?>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <li><strong>Experience: </strong> <?=$career->experience?></li>
                                            <li><strong>Qualification: </strong> <?=$career->qualification?></li>
															</ul>
															<div class="apply-alternative" style="margin-bottom: 15px;">
																<a href="#" title="">Apply Here</a>

															</div>

														</div>

													</div> 
												</div>
											</div>
										</div> 

									</div>
									<?php
								}
							}
							?>
								</div>
								<!-- Pune div -->

								<div class="col-lg-12 mt-10">
									<?php
                                    if ($careers){
                                    ?>
									<div class="heading left">
										<h2>Position Open in Pune Office</h2>
									</div>
									<!-- Heading -->
									<?php
									foreach ($careers as $i => $career) {
                                    ?>
									<div class="toggle-widget experties">
										<h2>Hiring! <?=$career->title?></h2>
										<div class="content" style="display: none;">
											<div class="job-wide-devider">
												<div class="row">
													<div class="col-lg-8 column">
													<div class="job-details">
															<h3>Job Description</h3>
															<p><?=$career->role?></p>
														 
															<h3>Required Knowledge, Skills, and Abilities</h3>
														
																<?=$career->qualities?>
															 
															<h3>Education + Experience</h3>
															<ul>
																<?php
                                            if ($career->type){
                                                ?>
                                                <li><strong>Job Type: </strong> <?=$career->type?>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <li><strong>Experience: </strong> <?=$career->experience?></li>
                                            <li><strong>Qualification: </strong> <?=$career->qualification?></li>
															
															</ul>
															<div class="apply-alternative" style="margin-bottom: 15px;">
																<a href="#" title="">Apply Here</a>

															</div>

														</div>

													</div>
													<!-- <div class="col-lg-4 column">
														<div class="job-overview">
															<h3>Job Overview</h3>
															<ul>
																<li><i class="im im-icon-Money-2"></i>
																	<h3> Salary Offered </h3><span>Rs15,000 - Rs20,000</span></li>
																<li><i class="fa fa-shield"></i>
																	<h3>Experience</h3><span>2 Years</span></li>
																<li><i class="fa fa-pencil "></i>
																	<h3>Qualification</h3><span>Bachelor Degree</span></li>
															</ul>
														</div> 
													</div> -->
												</div>
											</div>
										</div> 

									</div>
									<?php
								}
							}
							?>
								</div>
							</div>
						</div>
						<div class="col-lg-5 column" id="apply-job-form">
							<div class="quick-form-job">
								<div class="heading left">
									<h2>Get In Touch</h2>
								</div>
								<!-- Heading -->
								<form action="" method="post" role="form" enctype="multipart/form-data">
									 <?php
                if ($this->session->flashdata('message')) {
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="alert alert-success text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <strong><?= $this->session->flashdata('message') ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php
                }
                ?>
									<div class="">
										<input type="text" placeholder="Enter your Name*" name="name" required><span class="text-danger"><?=form_error('name')?></span>
										<input type="text" placeholder="Email Address*" name="email" required>
										<span class="text-danger"><?=form_error('email')?></span>
										<input type="hidden" id="application_for" name="application_for" value="General">
										<input type="text" title="Please provide integer phone number with maximum length 10"
                               minlength="10" required class="form-control" maxlength="10" pattern="\d+" name="phone"
                               id="phone" placeholder="Your Mobile Number*">
                        <span class="text-danger"><?=form_error('phone')?></span>

										<div class="formfull">
											<p>Upload Resume:</p>
											 <input type="file" accept=".doc,.docx,.pdf" class="form-control" name="resume" id="resume" required="">
                        <p class="help-block">Attach .doc, .pdf files only (Min of 3MB)</p>
										</div>

										<textarea placeholder="Message should have more than 50 characters" name="self_introduction"></textarea>

										<div class="upload-doc">
											<button type="submit" class="text-center octf-btn octf-btn-icon octf-btn-primary">Submit</button>
										</div>
									</div>

									<h6 class="hide" id="contact-alert"><i class="fa fa-check" style="font-size: 20px;}" aria-hidden="true"></i>&emsp;We have received your Resume, we will get back to you soon!</h6>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		<!-- end Body of Career -->
	

	<div class="margin-top-50"></div>


	<a href="" class="flip-banner parallax-home" data-background="images/single-property-03.jpg"  data-img-width="2500" data-img-height="1600">
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
			<li class="left_col"><img class="text-center modal-logo" src="images/Holding-bricks.png"></li>	
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


	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#"></a></div>

</div>