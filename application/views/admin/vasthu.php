<?php
$content_data = $this->Vasthu_model->GetData();
?>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

<section class="content-header">
    <h1>
        Manage Vasthu Page
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
                        <input type="file" class="form-control" name="uploadfile">
                        <input type="hidden" name="filname" value="<?=$content_data[0]->image;?>">
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        
                        <div class="form-group">
                            <textarea class="form-control" id="first_content" placeholder="Content"
                                      name="vasthu_content"><?= $content_data[0]->content; ?></textarea>
                        </div>
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" id="submit1" value="Submit"/>
                        <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back"/>
                    </div>
                </div>
            </div>
        </div>

       
        
         
    </form>
</section>
</div>
<div class="clearfix"></div><br><br>