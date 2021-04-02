
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add City</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/cities/add') ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10 <?= form_error('name') ? 'has-error' : '' ?>">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Type the Name here" value="<?= set_value('name') ?>">
                                <span class="<?= form_error('name') ? 'text-danger' : '' ?>"><?= form_error('name') ?></span>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10 <?= form_error('email') ? 'has-error' : '' ?>">
                                <input type="text" name="email" class="form-control" placeholder="Type the email here" value="<?= set_value('email') ?>">
                                <span class="<?= form_error('email') ? 'text-danger' : '' ?>"><?= form_error('email') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10 <?= form_error('address') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="address" placeholder="Type the Address Here" rows="5"><?= set_value('address'); ?></textarea>
                                <span class="<?= form_error('address') ? 'text-danger' : '' ?>"><?= form_error('address') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>

                            <div class="col-sm-10 <?= form_error('phone') ? 'has-error' : '' ?>">
                                <input type="text" name="phone" class="form-control" placeholder="Type the phone here" value="<?= set_value('phone') ?>">
                                <span class="<?= form_error('phone') ? 'text-danger' : '' ?>"><?= form_error('phone') ?></span>
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