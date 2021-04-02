
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Properties</h3>
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
                                <th>Builder</th>
                                <th>Location</th>
                                <th>Title</th>
                                <th>Property Type</th>
                                <th>City</th>
                                <th>Budget</th>
                                <th>Area</th>
                                <th>Image</th>
                                <th>Highlight</th>
                                <th>Best Deal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($properties) {
                                foreach ($properties as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= (($page - 1) * $perpage + ($key + 1)) ?></td>
                                        <td><?= $value->builder ?></td>
                                        <td><?= $value->location ?></td>
                                        <td><?= $value->title ?></td>
                                        <td><?= $value->prop_type ?></td>
                                        <td><?= ucfirst($value->city_name) ?></td>
                                        <td><?= $value->budget ?></td>
                                        <td><?= $value->area ?></td>
                                        <td><img style="height: 90px; width: 90px;" src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($value->city_name))."/".str_replace(" ","-",strtolower($value->builder))."/".$value->slug.'/' . $value->image) ?>"></td>
                                        <td><input <?= $value->highlight ? 'checked' : '' ?> type="checkbox" value="<?= $value->id ?>" class="highlight"></td>
                                        <td><input <?= $value->best_deal ? 'checked' : '' ?> type="checkbox" value="<?= $value->id ?>" onclick="bestdeal(this.value);" id="bestdeal"></td>
                                        <td><a href="<?= site_url('admin/properties/favourites/'.$value->id) ?>">Favourites</a></td>
                                        <td style="width:10%;">
                                            <a href="<?= site_url('admin/properties/delete/' . $value->id) ?>" onclick="return confirm('Are you sure you want to delete the property <?= $value->title ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            <a href="<?= site_url('admin/properties/edit/' . $value->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
                    <?= isset($pagination) && $pagination ? $pagination : '' ?>
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
<script>
    function bestdeal(id){  
        var checked = document.getElementById("bestdeal").checked;

    if (checked) {
        var val = 1;
    }else{
        var val = 0;
    }
   // alert(val);
    $.ajax({
        type: 'POST',
        url: "properties/manage_best_deal",
        data: {id: id, val:val},
        success: function (data) {

        }
    });
    }

</script>