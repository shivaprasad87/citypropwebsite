<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

<section class="content-header">
    <h1>
        Manage About Page
    </h1>
    <br/>
</section>
<section class="content">

    <?php
    if ($this->session->flashdata('success')) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong style="color: #3c763d;"><i class="fa fa-save" aria-hidden="true"></i></strong> <span
                    style="color: #3c763d;"><?= $this->session->flashdata('success') ?></span>
        </div>
        <?php
    }
    if ($this->session->flashdata('error')) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong style="color: #a94442;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong> <span
                    style="color: #a94442;"><?= $this->session->flashdata('error') ?></span>
        </div>
        <?php
    }

    ?>
    <form role="form" action="" method="post" role="form" enctype="multipart/form-data">
        <!--    First Column-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modify Top First Column</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="first_title" id="first_title" class="form-control"
                                   placeholder="Section Title"
                                   value="<?= $this->aboutUs_model->getOption('first_title') ?>" title="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="first_content" placeholder="Content"
                                      name="first_content"><?= $this->aboutUs_model->getOption('first_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="dropzone first_image">
                                <div id="hiddenfirstimages" class="hide"></div>
                            </div>
                            <span class="help-block">(Recommended Dimension : 527x388)</span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="first_facebook"
                                       placeholder="https://facebook.com/xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('first_facebook') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="first_twitter"
                                       placeholder="https://twitter.com/@xxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('first_twitter') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google-plus"
                                                                   aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="first_google"
                                       placeholder="https://plus.google.com/+xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('first_google') ?>">
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit1" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>

        <!--    Second Column-->
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modify Top Second Column</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="second_title" id="second_title" class="form-control"
                                   placeholder="Section Title" title=""
                                   value="<?= $this->aboutUs_model->getOption('second_title') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="second_content" placeholder="Content"
                                      name="second_content"><?= $this->aboutUs_model->getOption('second_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="dropzone second_image">
                                <div id="hiddensecondimages" class="hide"></div>
                            </div>
                            <span class="help-block">(Recommended Dimension : 527x388)</span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="second_facebook"
                                       placeholder="https://facebook.com/xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('second_facebook') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="second_twitter"
                                       placeholder="https://twitter.com/@xxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('second_twitter') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google-plus"
                                                                   aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="second_google"
                                       placeholder="https://plus.google.com/+xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('second_google') ?>">
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit2" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>
        
        <!--- Third Column -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modify Top Third Column</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="third_title" id="third_title" class="form-control"
                                   placeholder="Section Title" title=""
                                   value="<?= $this->aboutUs_model->getOption('third_title') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="third_content" placeholder="Content"
                                      name="third_content"><?= $this->aboutUs_model->getOption('third_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="dropzone third_image">
                                <div id="hiddenthirdimages" class="hide"></div>
                            </div>
                            <span class="help-block">(Recommended Dimension : 527x388)</span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="third_facebook"
                                       placeholder="https://facebook.com/xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('third_facebook') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="third_twitter"
                                       placeholder="https://twitter.com/@xxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('third_twitter') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google-plus"
                                                                   aria-hidden="true"></i></span>
                                <input type="url" class="form-control" name="third_google"
                                       placeholder="https://plus.google.com/+xxxxxxxxx"
                                       value="<?= $this->aboutUs_model->getOption('third_google') ?>">
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit3" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>
        <!---- Our vision & Our Mission -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Manage Our Vision & Misson Section</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <label>Our Vision  </label>
                            <input type="text" name="Vision_title" id="Vision_title" class="form-control"
                                   placeholder="Our Vision" title=""
                                   value="<?= $this->aboutUs_model->getOption('Vision_title') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="mision_title" placeholder="Content"
                                      name="vision_content"><?= $this->aboutUs_model->getOption('vision_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Our Mision</label>
                            <input type="text" name="mision_title" id="mision_title" class="form-control"
                                   placeholder="Our Mision" title=""
                                   value="<?= $this->aboutUs_model->getOption('mision_title') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="mision_content" placeholder="Content"
                                      name="mision_content"><?= $this->aboutUs_model->getOption('mision_content') ?></textarea>
                        </div>  
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit3" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>
        <!--- Core Value -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modify Core Values</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="core_title" id="core_title" class="form-control"
                                   placeholder="Section Title" title=""
                                   value="<?= $this->aboutUs_model->getOption('core_title') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="core_content" placeholder="Content"
                                      name="core_content"><?= $this->aboutUs_model->getOption('core_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="dropzone core_image">
                                <div id="hiddencoreimages" class="hide"></div>
                            </div>
                            <span class="help-block">(Recommended Dimension : 527x388)</span>
                        </div> 
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit3" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div> 
        <!--    Clients-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Manage Our Clients Section</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <label>Our Client #1</label>
                            <input type="text" name="client_title" id="client_title" class="form-control"
                                   placeholder="Our Client #1" title=""
                                   value="<?= $this->aboutUs_model->getOption('client_title_1') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="client_content" placeholder="Content"
                                      name="client_content"><?= $this->aboutUs_model->getOption('client_content') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Our Client #2</label>
                            <input type="text" name="client_title_2" id="client_title_2" class="form-control"
                                   placeholder="Our Client #2" title=""
                                   value="<?= $this->aboutUs_model->getOption('client_title_2') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="client_content_2" placeholder="Content"
                                      name="client_content_2"><?= $this->aboutUs_model->getOption('client_content_2') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Our Client #3</label>
                            <input type="text" name="client_title_3" id="client_title_3" class="form-control"
                                   placeholder="Our Client #3" title=""
                                   value="<?= $this->aboutUs_model->getOption('client_title_3') ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="client_content_3" placeholder="Content"
                                      name="client_content_3"><?= $this->aboutUs_model->getOption('client_content_3') ?></textarea>
                        </div>
                        <div class="form-group hide">
                            <div class="dropzone client_image">
                                <div id="hiddenclientimages" class="hide"></div>
                            </div>
                            <span class="help-block">(Recommended Dimension : 160x51)</span>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit3" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>

        <!--    Have A Closer Look-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Manage 'WORK WITH FUN' Section</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="closer_look_title" id="closer_look_title" class="form-control"
                                   placeholder="Closer Look Title"
                                   value="<?= $this->aboutUs_model->getOption('closer_look_title') ?>" title="">
                        </div>
                        <div class="form-group">
                            <!--                            <div class="dropzone closer_look_image">-->
                            <!--                                <div id="hiddencloserlookimages" class="hide"></div>-->
                            <!--                            </div>-->
                            <span class="help-block">(Recommended Dimension : 590x480)</span>
                        </div>
                        <?php
                        if (($images = $this->aboutUs_model->getWhere(array('name' => 'closer_look_images'),
                                'about_us_images')) != null) {
                            foreach ($images as $i => $image) {
                                ?>
                                <div class="clearfix"></div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="closer_look_images[caption][]" id="closer_look_1" class="form-control" value="<?=$image->title?>"
                                               title="" required placeholder="Image Caption">

                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <input type="file" name="upload_closer_image[<?=$i?>]" id="closer_look_image"
                                           class="form-control" accept="image/*"  title="">

                                </div>

                                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                                    <img src="<?=base_url($image->image)?>" class="img-responsive" style="display: inline-block" />
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                <?php
                            }
                        }else{
                            ?>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="closer_look_images[caption][]" id="closer_look_1" class="form-control" value=""
                                           title="" required placeholder="Image Caption">

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <input type="file" name="upload_closer_image[]" id="closer_look_image"
                                       class="form-control" accept="image/*"  title="" required>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="closer_look_images[caption][]" id="closer_look_1" class="form-control" value=""
                                           title="" required placeholder="Image Caption">

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <input type="file" name="upload_closer_image[]" id="closer_look_image"
                                       class="form-control" accept="image/*"  title="" required>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="closer_look_images[caption][]" id="closer_look_1" class="form-control" value=""
                                           title="" required placeholder="Image Caption">

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <input type="file" name="upload_closer_image[]" id="closer_look_image"
                                       class="form-control" accept="image/*"  title="" required>

                            </div>
                        <?php
                        }
                        ?>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit4" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section> 
<div class="clearfix"></div><br><br>