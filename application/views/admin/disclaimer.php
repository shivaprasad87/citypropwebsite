<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="box  box-primary">
                <div class="box-header">
                    <h3 class="box-title">Update Disclaimer</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <form role="form" action="" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group <?= form_error('content') ? 'has-error' : '' ?>">
                            <textarea name="content" class="form-control" id="aboutUsContent"><?= isset($terms->content) ? $terms->content : "" ?></textarea>
                            <span class="<?= form_error('content') ? 'text-danger' : '' ?>"><?= form_error('content') ?></span>
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
<script>
    var terms = true;
</script>