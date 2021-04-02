<?php

if ($properties){
    foreach ($properties as $property) { ?>
        <div class="item col-xs-12 col-sm-6 col-lg-6 <?= (isset($showPattern) && $showPattern) ? $showPattern : 'list-group-item' ?>">
            <div class="thumbnail">
                <div class="row">
                    <div class="prop-img col-md-3 col-sm-4">
                        <div class="group list-group-image img-responsive" style="background-image:url('<?= base_url('uploads/'.$property->slug.'/'.$property->image) ?>'"></div>
                        <input class="input-3" name="input-3" value="4" class="rating-loading">
                        <span class="prop-badge" <?= $property->rera_status ? '' : 'style="color: #de553a"' ?>><?= $property->rera_status ? 'RERA Approved' : 'RERA Not Approved' ?></span>
                        <div class="img-count"><i class="fa fa-camera"></i> <?=count($this->properties_model->getPropertyImages($property->id))?></div>
                        <div class="launching"><span><?= $property->property_status ? $property->property_status : '&emsp;&emsp;&emsp;&emsp;' ?></span></div>
                    </div>
                    <div class="prop-content col-sm-8 col-md-4">
                        <div class="caption">
                            <a href="<?=site_url("property/$property->slug")?>">
                                <h3 class="group inner list-group-item-heading">
                                    <?= $property->title ?></h3>
                            </a>
                            <p class="group inner list-group-item-text">
                                by <?= $property->builder ?>
                            </p>
                            <p><?= $property->location ?></p>
                        </div>
                        <div class="prop-details">
                            <p>
                                &#8377; <?=$property->budget?><br>
                                <span>Avg Price/sq.ft</span>
                            </p>
                            <p><?= date('M, Y', strtotime($property->possession_date)) ?><br><span>Possession</span></p>
                            <p><?= $property->prop_type ?></p>

                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 prop-book">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Unit</th>
                                    <th>Size</th>
                                    <th>Carpet Area</th>
                                    <th>Builder Prize</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (($flatTypes = $this->properties_model->getPropertyFlatType(null,$property->id)) != null){
                                    foreach ($flatTypes as $flatType) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?=$flatType->flat_type?>
                                            </td>
                                            <td><?=$this->properties_model->getPropertyRange(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', 'size')?> <?=$this->properties_model->getPropertyParam(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', 'unit')?></td>
                                            <td><?=$this->properties_model->getPropertyRange(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', 'carpet_area')?> Sq.ft</td>
                                            <td><?= ( ($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', null, 'MIN(total) as amount')) != null ) ? number_format_short($row->amount) : 0 ?> - <?= ( ($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id, 'flat_type_id' => $flatType->flat_type_id), 'property_flat_types', null, 'MAX(total) as amount')) != null ) ? number_format_short($row->amount) : 0 ?></td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No data available</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="price-details pull-right">
                            <h4>&#8377; <?= ( ($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id), 'property_flat_types', null, 'MIN(total) as amount')) != null ) ? number_format_short($row->amount) : 0 ?> - <?= ( ($row = $this->properties_model->getPropertyParam(array('property_id' => $property->id), 'property_flat_types', null, 'MAX(total) as amount')) != null ) ? number_format_short($row->amount) : 0 ?>
                                <i class="fa <?= (isset($property->class_heart) && $property->class_heart) ? $property->class_heart : 'fa-heart-o' ?> favourite" data-id="<?= $property->id ?>" data-access="<?= $this->session->userdata('logged_in') ? '' : 'denied' ?>" data-url="<?= $this->session->userdata('logged_in') ? site_url('home/manage_favourites') : site_url('user/login') ?>" style="cursor: pointer"></i>
                                <button class="btn btn-call btn-call-back" data-id="<?=$property->id?>">GET CALL BACK</button>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}else{
    ?>
    <div class="alert alert-danger text-center">
        No listing found!
    </div>
<?php
}

?>