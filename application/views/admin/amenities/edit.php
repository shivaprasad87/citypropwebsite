
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Amenity</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/amenities/edit/' . $amenity->id) ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10 <?= form_error('name') ? 'has-error' : '' ?>">
                                <input type="text" name="name" class="form-control" placeholder="Type the Name here" value="<?= $amenity->name ?>">
                                <span class="<?= form_error('name') ? 'text-danger' : '' ?>"><?= form_error('name') ?></span>
                            </div>
                        </div>

                        <div class="form-group <?= $amenity->image ? '' : 'hide' ?>">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Image</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/amenities/' . $amenity->image) ?>" id="prevImage" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Change Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Alt_Title</label>

                            <div class="col-sm-10 <?= form_error('alt_title') ? 'has-error' : '' ?>">
                                <input type="text" name="alt_title" class="form-control" placeholder="Type the Name here" value="<?= $amenity->alt_title ?>">
                                <span class="<?= form_error('alt_title') ? 'text-danger' : '' ?>"><?= form_error('alt_title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Image_Descripton</label>

                            <div class="col-sm-10 <?= form_error('image_discription') ? 'has-error' : '' ?>">
                                <input type="text" name="image_discription" class="form-control" placeholder="Type the Name here" value="<?= $amenity->image_desc ?>">
                                <span class="<?= form_error('image_discription') ? 'text-danger' : '' ?>"><?= form_error('image_discription') ?></span>
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