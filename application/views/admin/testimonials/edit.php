<?php
$prop = json_decode(json_encode($this->properties_model->testmonial_properties()),true);
?>
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Testimonial</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/testimonials/edit/' . $testimonial->id) ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Client Name</label>

                            <div class="col-sm-10 <?= form_error('name') ? 'has-error' : '' ?>">
                                <input type="text" name="name" class="form-control" placeholder="Type the Name here" value="<?= $testimonial->name ?>">
                                <span class="<?= form_error('name') ? 'text-danger' : '' ?>"><?= form_error('name') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="job_desc" class="col-sm-2 control-label">Job Description</label>

                            <div class="col-sm-10 <?= form_error('job_desc') ? 'has-error' : '' ?>">
                                <input type="text" name="job_desc" class="form-control" placeholder="Type the Job Description name here" value="<?= $testimonial->job_desc ?>">
                                <span class="<?= form_error('job_desc') ? 'text-danger' : '' ?>"><?= form_error('job_desc') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prop" class="col-sm-2 control-label">Project Name</label>
                            <div class="col-sm-10 <?= form_error('propert_id') ? 'has-error' : '' ?>">
                            <select name="prop" class="form-control">
                                <option value="null"></option>
                                <?php
                                foreach ($prop as $p) {
                                  /* echo "<option value=".$p['id']."if($testimonial->property_id==$p['id']) echo 'selected'>".$p['title']."</option>";*/
                                   ?>
                                   <option value="<?= $p['id'] ?>"<?php if($testimonial->property_id==$p['id']) echo 'selected' ?> ><?= $p['title']?></option>
                                   <?php
                                   /*
                                    echo "<option value=".$p['id'].""if($testimonial->property_id!='') {echo 'selected'}">".$p['title']."</option>";
                                    */
                                }
                                ?>
                            </select>
                        </div>
 
                        </div>
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Client Feedback</label>
                            <div class="col-sm-10 <?= form_error('comment') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="comment" id="editor1" placeholder="Type the Comment Here" rows="5"><?= $testimonial->comment ?></textarea>
                                <span class="<?= form_error('comment') ? 'text-danger' : '' ?>"><?= form_error('comment') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Client Image</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>" id="prevImage" style="height: 90px; width: 90px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Change Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alt_title" class="col-sm-2 control-label">Alt Title</label>
                            <div class="col-sm-10 <?= form_error('alt_title') ? 'has-error' : '' ?>">
                                <input name="alt_title" type="text" class="form-control" placeholder="Add alt_title" value="<?=$testimonial->alt_title?>" />
                                <span class="<?= form_error('alt_title') ? 'text-danger' : '' ?>"><?= form_error('alt_title') ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image_description" class="col-sm-2 control-label">Image description</label>

                            <div class="col-sm-10 <?= form_error('image_description') ? 'has-error' : '' ?>">
                                <input type="text"  name="image_description" class="form-control" id ="image_description" placeholder="Add image_description"  value="<?=  set_value('image_description') ? set_value('image_description') : $testimonial->image_desc ?>" />
                                <span class="<?= form_error('image_description') ? 'text-danger' : '' ?>"><?= form_error('image_description') ?></span>
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