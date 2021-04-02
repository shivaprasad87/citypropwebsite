
<section class="content">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Blog Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?= site_url('admin/blogs/edit_blog_category/' . $blog_category->id) ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="categ_name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10 <?= form_error('categ_name') ? 'has-error' : '' ?>">
                            <input type="text" name="categ_name" class="form-control" id="inputEmail3" placeholder="Type the category name" value="<?= $blog_category->name ?>">
                            <span class="<?= form_error('categ_name') ? 'text-danger' : '' ?>"><?= form_error('categ_name') ?></span>
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
        <!-- /.box -->
    </div>
</section>