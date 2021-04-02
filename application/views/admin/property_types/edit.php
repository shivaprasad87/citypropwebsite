
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Property Type</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/property_types/edit/' . $property_type->id) ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10 <?= form_error('name') ? 'has-error' : '' ?>">
                                <input type="text" name="name" class="form-control" placeholder="Type the Name here" value="<?= $property_type->name ?>">
                                <span class="<?= form_error('name') ? 'text-danger' : '' ?>"><?= form_error('name') ?></span>
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