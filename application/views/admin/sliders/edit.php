<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Slider</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/sliders/edit/' . $slider->id) ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10 <?= form_error('title') ? 'has-error' : '' ?>">
                                <input type="text" name="title" class="form-control" placeholder="Type the title here" value="<?= $slider->title ?>">
                                <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="heading" class="col-sm-2 control-label">Meta Title</label>

                            <div class="col-sm-10 <?= form_error('heading') ? 'has-error' : '' ?>">
                                <input type="text" name="heading" class="form-control" placeholder="Type the meta title here" value="<?= $slider->heading ?>">
                                <span class="<?= form_error('heading') ? 'text-danger' : '' ?>"><?= form_error('heading') ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Page Type</label>
                            <div class="col-sm-10 ">
                                <select name="type" class="form-control">
                                    <option value="H" <?=  ($slider->type=='H') ? 'selected' : ''; ?>>Homepage</option>
                                    <option value="T" <?=  ($slider->type=='T') ? 'selected' : ''; ?>>Thank You</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Image</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/sliders/' . $slider->image) ?>" id="prevImage" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Change Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile">
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