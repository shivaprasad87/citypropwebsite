
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Display Images</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/display_images') ?>" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Builder</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/display_images/' . $display_images->builders) ?>" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change Builder</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="builders">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Project</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/display_images/' . $display_images->projects) ?>" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change Project</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="projects">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Blog</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/display_images/' . $display_images->blogs) ?>" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change Blog</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="blogs">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/display_images/' . $display_images->cities) ?>" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change City</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="cities">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Location</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/display_images/' . $display_images->locations) ?>" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change Location</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="locations">
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" onclick="history.go(-1);">Back</button>
                        <button type="submit" class="btn btn-info pull-right">UPDATE</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <div class="clearfix"></div><br><br><br>
            <!-- /.box -->
        </div>
    </div>
</section>