<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Blog Type</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/blogs/add_blog_type') ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="type_name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10 <?= form_error('type_name') ? 'has-error' : '' ?>">
                                <input type="text" name="type_name" class="form-control" id="inputEmail3" placeholder="Type the category name" value="<?= set_value('type_name') ?>">
                                <span class="<?= form_error('type_name') ? 'text-danger' : '' ?>"><?= form_error('type_name') ?></span>
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
            <!-- /.box -->
        </div>
    </div>
</section>