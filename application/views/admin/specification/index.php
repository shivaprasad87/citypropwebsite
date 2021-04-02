<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Property Specifications</h3>
                </div>
                <!-- /.box-header -->
                <div class="box box-primary">
                    <form name="searchform" method="get" action="">
                        <div class="box-body">
                            <div class="input-group">
                                <div class="" style="padding-left: 0;">
                                    <input type="text" name="content" placeholder="Enter the search key"
                                           class="form-control" value="<?= $this->input->get('content') ?>"/>
                                </div>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" name="search" value="true">Search
                                    </button>
                                    <a class="btn btn-danger class_for_clear">Clear</a>
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
                            <th>Specification</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($specifications) {
                            foreach ($specifications as $key => $value) {
                                ?>
                                <tr>
                                    <td><?= (($page - 1) * $perpage + ($key + 1)) ?></td>
                                    <td><?= $value->name ?></td>
                                    <td>
                                        <span class="label label-<?= $value->status ? 'success' : 'danger' ?>"><?= $value->status ? 'Active' : 'Disabled' ?></span>
                                    </td>
                                    <td style="width:20%;">
                                        <a href="<?= site_url('admin/specification/delete/' . $value->id) ?>"
                                           onclick="return confirm('Are you sure you want to delete the Property Specification');"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?= site_url('admin/specification/edit/' . $value->id) ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?= site_url('admin/specification/status/' . $value->id) ?>"
                                           class="btn btn-<?=$value->status ? 'danger':'success'?> btn-sm"><i class="fa fa-<?=$value->status ? 'ban':'key'?>"></i> <?=$value->status ? 'Disable':'Enable'?></a>

                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">
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
                    <?= isset($pagination) && $pagination ? $pagination : '' ?>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="clearfix"></div>
            <br><br><br>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>