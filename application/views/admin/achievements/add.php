
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Achievement</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/achievements/add') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10 <?= form_error('comment') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="comment" id="editor1" placeholder="Type the Comment Here" rows="5"><?= set_value('comment'); ?></textarea>
                                <span class="<?= form_error('comment') ? 'text-danger' : '' ?>"><?= form_error('comment') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alt_title" class="col-sm-2 control-label">Alt Title</label>
                            <div class="col-sm-10 <?= form_error('alt_title') ? 'has-error' : '' ?>">
                                <input name="alt_title" type="text" class="form-control" id="alt_title" placeholder="add title" />
                                <span class="<?= form_error('alt_title') ? 'text-danger' : '' ?>"><?= form_error('alt_title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                             <label   class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10  ">
                                <select class="form-control" name="cities">
                                    <option value="Select">Select</option>
                                    <?php
                                    foreach ($cities as $type) {
                                        if($type->status==1)
                                        {
                                        ?>
                                        <option value="<?= $type->id ?>"<?php if(($this->session->userdata("cities"))==$type->name) echo 'selected' ?>><?= $type->name ?></option>
                                        <?php
                                    }
                                }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label   class="col-sm-2 control-label">Builders</label>
                            <div class="col-sm-10  ">
                                <select class="form-control" name="builders">
                                    <option value="Select">Select</option>
                                    <?php
                                    foreach ($builders as $type) {
                                        if($type->status==1)
                                        {
                                        ?>
                                        <option value="<?= $type->id ?>"<?php if(($this->session->userdata("cities"))==$type->name) echo 'selected' ?>><?= $type->name ?></option>
                                        <?php
                                    }
                                }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label   class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-10  ">
                                <select class="form-control" name="date">
                                    <option value="Select">Select</option>
                                    <?php
                                    //print_r($cities);die;
                                    foreach ($date_range as $type => $value) { 
                                        ?>
                                        <option value="<?= $value?>"><?=$value ?></option>
                                        <?php
                                   
                                }
                                    ?>
                                </select>
                            </div>
                        </div>
 
                     

                         <div class="form-group">
                            <label for="image_description" class="col-sm-2 control-label">Image Description</label>
                            <div class="col-sm-10 <?= form_error('image_description') ? 'has-error' : '' ?>">
                                <input name="image_description" type="text" class="form-control" id="image_description"  placeholder="Add description" />
                                <span class="<?= form_error('image_description') ? 'text-danger' : '' ?>"><?= form_error('image_description') ?></span>
                            </div>
                        </div>

                    </div>

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