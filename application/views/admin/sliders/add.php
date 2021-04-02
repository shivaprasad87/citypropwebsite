
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Destop Slider</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/sliders/add') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10 <?= form_error('title') ? 'has-error' : '' ?>">
                                <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Type the title here" value="<?= set_value('title') ?>">
                                <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="heading" class="col-sm-2 control-label">Heading</label>

                            <div class="col-sm-10 <?= form_error('heading') ? 'has-error' : '' ?>">
                                <input type="text" name="heading" class="form-control" id="inputEmail3" placeholder="Type the heading here" value="<?= set_value('heading') ?>">
                                <span class="<?= form_error('heading') ? 'text-danger' : '' ?>"><?= form_error('heading') ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Page Type</label>
                            <div class="col-sm-10 ">
                                <select name="type" class="form-control">
                                    <option value="H">Homepage</option>
                                    <option value="T">Thank You</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Display Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile"><p style="color:red">max allowed size 2 mb*</p>
                            </div>
                        </div>
                    </div>
                     <input type="hidden" name="banner_type" value="desk">
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" onclick="history.go(-1);">Back</button>
                        <button type="submit" class="btn btn-info pull-right">ADD</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Mobile Slider</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/sliders/addmobilebanner') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10 <?= form_error('title') ? 'has-error' : '' ?>">
                                <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Type the title here" value="<?= set_value('title') ?>">
                                <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="heading" class="col-sm-2 control-label">Heading</label>

                            <div class="col-sm-10 <?= form_error('heading') ? 'has-error' : '' ?>">
                                <input type="text" name="heading" class="form-control" id="inputEmail3" placeholder="Type the heading here" value="<?= set_value('heading') ?>">
                                <span class="<?= form_error('heading') ? 'text-danger' : '' ?>"><?= form_error('heading') ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Page Type</label>
                            <div class="col-sm-10 ">
                                <select name="type" class="form-control">
                                    <option value="H">Homepage</option>
                                    <option value="T">Thank You</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Display Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile"><p style="color:red">max allowed size 2 mb*</p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="banner_type" value="mobile">
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" onclick="history.go(-1);">Back</button>
                        <button type="submit" class="btn btn-info pull-right">ADD</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                
            </div>
            <div class="clearfix"></div><br><br><br>
            <!-- /.box -->
        </div>
    </div>
</section>