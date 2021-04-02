
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Builder</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?= site_url('admin/builders/edit/' . $builder->id) ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>

                                <div class=" <?= form_error('name') ? 'has-error' : '' ?>">
                                    <input type="text" name="name" class="form-control" placeholder="Type the Name here" value="<?= $builder->name ?>">
                                    <span class="<?= form_error('name') ? 'text-danger' : '' ?>"><?= form_error('name') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>

                               <div class=" <?= form_error('description') ? 'has-error' : '' ?>">
                                    <textarea name="description" class="form-control" placeholder="Type the Description here"><?= $builder->description ?></textarea>
                                    <span class="<?= form_error('description') ? 'text-danger' : '' ?>"><?= form_error('description') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group <?= $builder->image ? '' : 'hide' ?>">
                                <label class="control-label" for="exampleInputFile">Image <code>*</code> (Preferred Size 225 x 90)</label>
                                <div class="">
                                    <img src="<?= base_url('uploads/builders/' . $builder->image) ?>" id="prevImage" style="height: 90px; width: 90px;">
                                </div>
                            </div>
                        </div>


                       <!--  <div class="clearfix"></div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class=control-label" for="exampleInputFile">Change Image</label>
                                <div class="<?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                    <input type="file" name="uploadfile">
                                </div>
                            </div>
                        </div> -->
                        <div class="clearfix"></div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputFile">Image <code>*</code> (Preferred Size 225 x 90)</label>
                                <div class=" <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                    <input type="file" name="uploadfile" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="alt_title" class="control-label">Alt Title</label>

                                <div class=" <?= form_error('alt_title') ? 'has-error' : '' ?>">
                                    <input type="text" name="alt_title" class="form-control" id="alt_title" placeholder="Type the image alt title here" value="<?= $builder->alt_title ?>">
                                    <span class="<?= form_error('alt_title') ? 'text-danger' : '' ?>"><?= form_error('alt_title') ?></span>
                                </div>
                            </div>
                        </div>

                       <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="alt_title" class="control-label">Image Description</label>

                                <div class=" <?= form_error('image_description') ? 'has-error' : '' ?>">
                                    <input type="text" name="image_description" class="form-control" id="image_description" placeholder="Type the image alt title here" value="<?= $builder->image_desc?>">
                                    <span class="<?= form_error('image_description') ? 'text-danger' : '' ?>"><?= form_error('image_description') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="location" class="control-label">Location</label><!-- ) -->

                                <div class=" <?= form_error('location') ? 'has-error' : '' ?>">
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Type the location here" value="<?= $builder->location ?>">
                                    <span class="<?= form_error('location') ? 'text-danger' : '' ?>"><?= form_error('location') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="experience" class="control-label">Experience</label>

                                <div class=" <?= form_error('experience') ? 'has-error' : '' ?>">
                                    <input type="text" name="experience" class="form-control" id="experience" placeholder="Type the experience here" value="<?= $builder->experience?>">
                                    <span class="<?= form_error('experience') ? 'text-danger' : '' ?>"><?= form_error('experience') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="ongoing" class="control-label">On-Going Projects</label>

                                <div class=" <?= form_error('ongoing') ? 'has-error' : '' ?>">
                                    <input type="text" name="ongoing" class="form-control" id="ongoing" placeholder="Type the ongoing here" value="<?= $builder->ongoing ?>">
                                    <span class="<?= form_error('ongoing') ? 'text-danger' : '' ?>"><?= form_error('ongoing') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="upcoming" class="control-label">Up-Coming Projects</label>

                                <div class=" <?= form_error('upcoming') ? 'has-error' : '' ?>">
                                    <input type="text" name="upcoming" class="form-control" id="upcoming" placeholder="Type the upcoming here" value="<?=$builder->upcoming?>">
                                    <span class="<?= form_error('upcoming') ? 'text-danger' : '' ?>"><?= form_error('upcoming') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="experience" class="control-label">Completed Projects</label>

                                <div class=" <?= form_error('completed') ? 'has-error' : '' ?>">
                                    <input type="text" name="completed" class="form-control" id="completed" placeholder="Type the completed here" value="<?=$builder->completed ?>">
                                    <span class="<?= form_error('completed') ? 'text-danger' : '' ?>"><?= form_error('completed') ?></span>
                                </div>
                            </div>
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