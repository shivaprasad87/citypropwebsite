
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Footer Links</h3>
                </div>
                <!-- /.box-header -->
                <div class="box box-primary">
                    <form name="searchform" method="get" action="">
                        <div class="box-body">
                            <div class="input-group">
                                <div class="" style="padding-left: 0;">
                                    <input type="text" name="content" placeholder="Enter the search key" class="form-control" value="<?= $this->input->get('content') ?>"/>
                                </div>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" name="search" value="true">Search</button>
                                    <a class="btn btn-danger class_for_clear" >Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Link Name</th>
                                <th>Search Key Word</th>
                                <th>City</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($property_links) {
                                foreach ($property_links as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= (($page - 1) * $perpage + ($key + 1)) ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->search_key ?></td>
                                        <td><?= $value->city ?></td>
                                        <td style="width:10%;">
                                            <a href="<?= site_url('admin/FooterLinks/delete/' . $value->id) ?>" onclick="return confirm('Are you sure you want to delete the Location');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            <a href="<?= site_url('admin/FooterLinks/edit/' . $value->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger text-center">
                                            <strong><i class="fa fa-exclamation-triangle"></i> No Results found </strong>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="row text-center">
                    <?= isset($pagination) && $pagination ? $pagination : '' ?>
                </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="clearfix"></div><br><br><br>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>