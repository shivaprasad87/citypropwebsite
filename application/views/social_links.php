    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Update Social Media Links</h3>
                    </div><!-- /.box-header -->
                    <div class="box box-primary"></div>
                    <!-- form start -->
                    
                    <form  action="<?=base_url('admin/socialMedia')?>" method="post" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="<?= $social->facebook ? $social->facebook : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="<?= $social->twitter ? $social->twitter : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="google">Google</label>
                                        <input type="text" name="google" class="form-control" value="<?= $social->google ? $social->google : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vine">Vine</label>
                                        <input type="text" name="vine" class="form-control" value="<?= $social->vine ? $social->vine : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="linked_in">Linked In</label>
                                        <input type="text" name="linked_in" class="form-control" value="<?= $social->linked_in ? $social->linked_in : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="dribble">Dribble</label>
                                        <input type="text" name="dribble" class="form-control" value="<?= $social->dribble ? $social->dribble : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="<?= $social->instagram ? $social->instagram : '' ?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="whatsapp">whatsapp</label>
                                        <input type="text" name="whatsapp" class="form-control" value="<?= $social->whatsapp ? $social->whatsapp : '' ?>" required>
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" value="<?= $social->mobile ? $social->mobile : '' ?>" required>
                                    </div>
                                </div>   
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $social->email ? $social->email : '' ?>" required>
                                    </div>
                                </div>   
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" id="submit2" value="Submit" />
                            <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
<div class="clearfix"></div><br><br>