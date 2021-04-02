<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('class'=>'form-signin')); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label><?= lang('users input username_email') ?> </label>
		    	<?php echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'form-control', 'maxlength'=>256)); ?>
		    </div><br>
		    <div class="form-group">
		    	<label><?= lang('users input password') ?></label>
		    	<?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'maxlength'=>72, 'autocomplete'=>'off')); ?>
		    </div>
		    <div class="form-group">
		    	<div class="row">
		    		<div class="col-sm-6">
		    			<p style="margin-top:10px;"><a href="<?php echo base_url('user/forgot'); ?>" style="color: #e03400"><?php echo lang('users link forgot_password'); ?></a></p>
		    		</div>
		    		<div class="col-sm-6">
		    			<?php echo form_submit(array('name'=>'submit', 'class'=>'btn btn-success btn-block'), lang('core button login')); ?>
		    		</div>
		    	</div>
		    </div>
		    <div class="clearfix"></div><br>
		    <div class="row">
			    <div class="col-sm-12 text-center">
			    	<p style="font-size: 18px;"><a href="<?php echo base_url('user/register'); ?>" style="color: #e03400"><?php echo lang('users link register_account'); ?></a></p>
			    </div>
			</div>
		</div>
	   <!--  <div class="col-sm-1 hidden-xs text-center or_section">
	        <img src="<?= base_url('assets/themes/default/img/or.png') ?>" class="center-block">
	        <span>or</span>
	    </div>
	    <div class="col-sm-5">
            <div class="col-sm-12">
                <a href="<?= site_url('hauth/fb_login') ?>" class="facebook btn-block btn">
                	<span class="icon"><i class="fa fa-facebook"></i></span>
                	<span class="text">Sign in with Facebook</span>
                </a>
            </div>
            <div class="col-sm-12">
                <a href="<?= site_url('hauth/login/Google') ?>" class="google btn-block btn">
					<span class="icon"><i class="fa fa-google-plus"></i></span>
                	<span class="text">Sign in with Google</span>
                </a>
            </div>
	    </div> -->
	</div>
<?php echo form_close(); ?>
<div class="clearfix"></div><br><br><br>
