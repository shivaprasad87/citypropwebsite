<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Property</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="" method="post" action="<?= site_url('admin/properties/new_add') ?>"
                  enctype="multipart/form-data">
                  <div class="box-body">

                   <!-- <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="uid" class="control-label">Property Unique ID # <code>*</code></label>
                            <div class=" <?= form_error('uid') ? 'has-error' : '' ?>">
                                <input type="text" name="uid" class="form-control" id="uid"
                                placeholder="Type the Unique ID" value="<?= set_value('uid') ?>">
                                <span class="<?= form_error('uid') ? 'text-danger' : '' ?>"><?= form_error('uid') ?></span>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="rera_number" class="control-label">RERA Number</label>
                            <div class=" <?= form_error('rera_number') ? 'has-error' : '' ?>">
                                <input type="text" name="rera_number" class="form-control" id="rera_number"
                                placeholder="Type the RERA Number" value="<?= set_value('rera_number') ?>">
                                <span class="<?= form_error('rera_number') ? 'text-danger' : '' ?>"><?= form_error('rera_number') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="issue_date" class="control-label">Issue Date <code>*</code></label>
                            <div class=" <?= form_error('issue_date') ? 'has-error' : '' ?>">
                                <select name="issue_date" id="issue_date" class="form-control">
                                    <option value="Select">Select</option>
<option value="New Launch" <?php if(($this->session->userdata("issue_date"))=="New Launch") echo 'selected' ?>>New Launch</option>
<option value="Upcoming Projects" <?php if(($this->session->userdata("issue_date"))=="Upcoming Projects") echo 'selected' ?>>Upcoming Projects</option>
<option value="Under-Construction" <?php if(($this->session->userdata("issue_date"))=="Under-Construction") echo 'selected' ?>>Under-Construction</option>
<option value="Ready to move" <?php if(($this->session->userdata("issue_date"))=="Ready to move") echo 'selected' ?>>Ready to move</option>
<option value="Resale" <?php if(($this->session->userdata("issue_date"))=="Resale") echo 'selected' ?>>Resale</option>
<option value="Ready For Registration" <?php if(($this->session->userdata("issue_date"))=="Ready For Registration") echo 'selected' ?>>Ready For Registration</option>
<option value="Just Launched" <?php if(($this->session->userdata("issue_date"))=="Just Launched") echo 'selected' ?>>Just Launched</option>
                                </select>
                                <span class="<?= form_error('issue_date') ? 'text-danger' : '' ?>"><?= form_error('issue_date') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="property_status_id" class="control-label">Property Status <code>*</code></label>
                            <div class=" <?= form_error('property_status_id') ? 'has-error' : '' ?>">
                                <select name="property_status_id" id="property_status_id" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    if (($property_status = $this->properties_model->getPropertyStatus()) != null) {
                                        foreach ($property_status as $status) {
                                            ?>
                                            <option value="<?= $status->id ?>"  <?php if(($this->session->userdata("property_status_id"))==$status->id) echo 'selected' ?>><?= $status->name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="<?= form_error('property_status_id') ? 'text-danger' : '' ?>"><?= form_error('property_status_id') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="city" class="control-label">City <code>*</code></label>
                            <div class="">
                                <select class="form-control" name="city" id="add_city">
                                    <option value="Select">Select</option>
                                    <?php
                                    foreach ($cities as $city) {
                                        ?>
                                        <option value="<?= $city->id ?>" <?php if(($this->session->userdata("city_id"))==$city->id) echo 'selected' ?>><?= ucfirst($city->name) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="location" class="control-label">Location <code>*</code></label>
                            <div class="">
                                <select class="form-control" name="location" id="locations">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="builder" class="control-label">Builder <code>*</code></label>
                            <div class="">
                                <select class="form-control" name="builder">
                                    <option value="Select">Select</option>
                                    <?php
                                    foreach ($builders as $builder) {
                                        ?>
                                        <option value="<?= $builder->id ?>" <?php if(($this->session->userdata("builder_id"))== $builder->id) echo 'selected' ?>><?= ucfirst($builder->name) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputFile">Display Image <code>*</code> (Preferred Size 1350 x 570)</label>
                            <div class=" <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" class="form-control" name="uploadfile">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="title" class="control-label">Title <code>*</code></label>

                            <div class=" <?= form_error('title') ? 'has-error' : '' ?>">
                                <input type="text" name="title" class="form-control" id="inputEmail3"
                                placeholder="Type the title here" value="<?= set_value('title') ?>">
                                <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="type" class="control-label">Property Type <code>*</code></label>
                            <div class="">
                                <select class="form-control" name="type">
                                    <option value="Select">Select</option>
                                    <?php
                                    foreach ($property_types as $type) {
                                        ?>
                                        <option value="<?= $type->id ?>"<?php if(($this->session->userdata("property_type_id"))==$type->id) echo 'selected' ?>><?= $type->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="image_discription" class="control-label">Image Description</label>

                            <div class=" <?= form_error('image_discription') ? 'has-error' : '' ?>">
                                <input type="text" name="image discription" class="form-control" id="image_discription"
                                placeholder="Type the image_discription here" value="<?= set_value('image_discription') ?>">
                                <span class="<?= form_error('image_discription') ? 'text-danger' : '' ?>"><?= form_error('image_discription') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="area" class="control-label">Area</label>

                            <div class=" <?= form_error('area') ? 'has-error' : '' ?>">
                                <input type="text" name="area" class="form-control" id="inputEmail3"
                                placeholder="Type the area here" value="<?= set_value('area') ?>">
                                <span class="<?= form_error('area') ? 'text-danger' : '' ?>"><?= form_error('area') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="possession_date" class="control-label">Possession Date</label>

                            <div class=" <?= form_error('possession_date') ? 'has-error' : '' ?>">
                                <input type="text" name="possession_date" class="form-control" id="possession_date"
                                placeholder="Type the possession date here" value="<?= set_value('possession_date') ?>">
                                <span class="<?= form_error('possession_date') ? 'text-danger' : '' ?>"><?= form_error('possession_date') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="budget" class="control-label">Avg. price per Sqft area</label>

                            <div class=" <?= form_error('author') ? 'has-error' : '' ?>">
                                <input type="text" name="budget" class="form-control" id="inputEmail3"
                                placeholder="Type the Avg. price per Sqft area here" value="<?= set_value('budget') ?>">
                                <span class="<?= form_error('budget') ? 'text-danger' : '' ?>"><?= form_error('budget') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="alt" class="control-label">Image ALT text</label>

                            <div class=" <?= form_error('alt') ? 'has-error' : '' ?>">
                                <input type="text" name="alt" class="form-control" id="alt"
                                placeholder="ALT Text" value="<?= set_value('alt') ?>">
                                <span class="<?= form_error('alt') ? 'text-danger' : '' ?>"><?= form_error('alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_title" class="control-label">Meta Title</label>

                            <div class=" <?= form_error('meta_title') ? 'has-error' : '' ?>">
                                <input type="text" name="meta_title" class="form-control" id="inputEmail3"
                                placeholder="Type the meta title here"
                                value="<?= set_value('meta_title') ?>">
                                <span class="<?= form_error('meta_title') ? 'text-danger' : '' ?>"><?= form_error('meta_title') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_keywords" class="control-label">Meta Keywords</label>

                            <div class=" <?= form_error('meta_keywords') ? 'has-error' : '' ?>">
                                <input type="text" name="meta_keywords" class="form-control" id="inputEmail3"
                                placeholder="Type the meta keywords here"
                                value="<?= set_value('meta_keywords') ?>">
                                <span class="<?= form_error('meta_keywords') ? 'text-danger' : '' ?>"><?= form_error('meta_keywords') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_desc" class="control-label">Meta Description</label>
                            <div class=" <?= form_error('meta_desc') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="meta_desc" id="editor2"
                                placeholder="Type the Meta Description Here"
                                rows="5"><?= set_value('meta_desc'); ?></textarea>
                                <span class="<?= form_error('meta_desc') ? 'text-danger' : '' ?>"><?= form_error('meta_desc') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Gallery</label>
                            <div class="">
                                <div class="dropzone gallery">
                                    <div id="hiddenimages" class="hide"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="gallery_alt" class="control-label">Gallery Alt</label>

                            <div class=" <?= form_error('gallery_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="gallery_alt" class="form-control" id="gallery_alt"
                                placeholder="Type the alt title here" value="<?= set_value('gallery_alt') ?>">
                                <span class="<?= form_error('gallery_alt') ? 'text-danger' : '' ?>"><?= form_error('gallery_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="gallery_description" class="control-label">Gallery Description</label>

                            <div class=" <?= form_error('gallery_description') ? 'has-error' : '' ?>">
                                <input type="text" name="gallery_description" class="form-control" id="gallery_description"
                                placeholder="Type the gallery description here" value="<?= set_value('gallery_description') ?>">
                                <span class="<?= form_error('gallery_description') ? 'text-danger' : '' ?>"><?= form_error('gallery_description') ?></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-stripped">
                                <caption><strong>Choose Amenities</strong></caption>
                                <tr>
                                    <?php
                                    foreach ($amenities as $i => $amenity) {
                                       
                                        ?>

                                        <td>
                                            <input type="checkbox" name="amenities[]"
                                            value="<?= $amenity->id ?>" <?php if(($this->session->userdata('amenities'.$amenity->id))==$amenity->id) echo 'checked';  
else echo "unchecked";
                                      $b++;      ?> > <img
                                            src="<?= $amenity->image ? base_url('uploads/amenities/' . $amenity->image) : 'https://placehold.it/32x32' ?>"
                                            style="width: 32px"
                                            class="img-rounded"> <?= $amenity->name ?>
                                        </td>

                                        <?php
                                        if (($i + 1) % 4 == 0) {
                                            echo "</tr><tr>";
                                        }
                                        

                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="property_for" class="control-label">Property For <code>*</code></label>
                            <div class=" <?= form_error('property_for') ? 'has-error' : '' ?>">
                                <select name="property_for" id="property_for" class="form-control">
                                    <option value="Select">Select</option>
                                    <option value="Sell" <?php if(($this->session->userdata("property_for"))=="Sell") echo 'selected' ?> >Sell</option>
                                    <option value="Rent" <?php if(($this->session->userdata("property_for"))=="Rent") echo 'selected' ?>>Rent</option>
                                    <option value="Sell/Rent" <?php if(($this->session->userdata("property_for"))=="Sell/Rent") echo 'selected' ?>>Sell/Rent</option>
                                </select>
                                <span class="<?= form_error('property_for') ? 'text-danger' : '' ?>"><?= form_error('property_for') ?></span>
                            </div>
                            <span class="<?= form_error('property_for') ? 'text-danger' : '' ?>"><?= form_error('property_for') ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="price_per_unit" class="control-label">Price Per Unit <code>*</code></label>
                            <div class=" <?= form_error('price_per_unit') ? 'has-error' : '' ?>">
                                <input type="text" name="price_per_unit" class="form-control" id="price_per_unit"
                                placeholder="Type the price per unit"
                                value="<?= set_value('price_per_unit') ?>">
                                <span class="<?= form_error('price_per_unit') ? 'text-danger' : '' ?>"><?= form_error('price_per_unit') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="build" class="control-label">Build <code>*</code></label>
                            <div class=" <?= form_error('build') ? 'has-error' : '' ?>">
                                <select name="build" id="build" class="form-control">
                                    <option value="Select">Select</option>
                                    <option value="Newly Built" <?php if(($this->session->userdata("build"))=="Newly Built") echo 'selected' ?>>Newly Built</option>
                                    <option value="Used" <?php if(($this->session->userdata("build"))=="Used") echo 'selected' ?>>Used</option>
                                </select>
                                <span class="<?= form_error('build') ? 'text-danger' : '' ?>"><?= form_error('build') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="face" class="control-label">Direction Facing</label>
                            <div class=" <?= form_error('face') ? 'has-error' : '' ?>">
                                <select name="face" id="face" class="form-control">
                                    <option value="Select">Select</option>
                                    <option value="East" <?php if(($this->session->userdata("face"))=="East") echo 'selected' ?>>East</option>
                                    <option value="West" <?php if(($this->session->userdata("face"))=="West") echo 'selected' ?>>West</option>
                                    <option value="North" <?php if(($this->session->userdata("face"))=="North") echo 'selected' ?>>North</option>
                                    <option value="South" <?php if(($this->session->userdata("face"))=="South") echo 'selected' ?>>South</option>
                                </select>
                                <span class="<?= form_error('face') ? 'text-danger' : '' ?>"><?= form_error('face') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="builtup_area" class="control-label">Builtup Area</label>
                            <div class=" <?= form_error('builtup_area') ? 'has-error' : '' ?>">
                                <input type="text" name="builtup_area" class="form-control" id="builtup_area"
                                placeholder="Type the builtup area"
                                value="<?= set_value('builtup_area') ?>">
                                <span class="<?= form_error('builtup_area') ? 'text-danger' : '' ?>"><?= form_error('builtup_area') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="builtup_area_unit" class="control-label">&nbsp;</label>
                            <div class=" <?= form_error('builtup_area_unit') ? 'has-error' : '' ?>">
                                <select name="builtup_area_unit" id="builtup_area_unit" class="form-control">
                                    <option value="Select">Select</option>
                                    <option value="Sq. Feet" <?php if(($this->session->userdata("builtup_area_unit"))=="Sq. Feet") echo 'selected' ?>>Sq. Feet</option>
                                    <option value="Sq. Yards" <?php if(($this->session->userdata("builtup_area_unit"))=="Sq. Yards") echo 'selected' ?>>Sq. Yards</option>
                                    <option value="Sq. Meters" <?php if(($this->session->userdata("builtup_area_unit"))=="Sq. Meters") echo 'selected' ?>>Sq. Meters</option>
                                    <option value="Acres" <?php if(($this->session->userdata("builtup_area_unit"))=="Acres") echo 'selected' ?>>Acres</option>
                                    <option value="Hectares" <?php if(($this->session->userdata("builtup_area_unit"))=="Hectares") echo 'selected' ?>>Hectares</option>
                                    <option value="Grounds" <?php if(($this->session->userdata("builtup_area_unit"))=="Grounds") echo 'selected' ?>>Grounds</option>
                                    <option value="Cents" <?php if(($this->session->userdata("builtup_area_unit"))=="Cents") echo 'selected' ?>>Cents</option>
                                </select>
                                <span class="<?= form_error('builtup_area_unit') ? 'text-danger' : '' ?>"><?= form_error('builtup_area_unit') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="carpet_area" class="control-label">Carpet Area</label>
                            <div class=" <?= form_error('carpet_area') ? 'has-error' : '' ?>">
                                <input type="text" name="carpet_area" class="form-control" id="carpet_area"
                                placeholder="Type the carpet area"
                                value="<?= set_value('carpet_area') ?>">
                                <span class="<?= form_error('carpet_area') ? 'text-danger' : '' ?>"><?= form_error('carpet_area') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="carpet_area_unit" class="control-label">&nbsp;</label>
                            <div class=" <?= form_error('carpet_area_unit') ? 'has-error' : '' ?>">
                                <select name="carpet_area_unit" id="carpet_area_unit" class="form-control">
                                    <option value="Select">Select</option>
                                  <option value="Sq. Feet" <?php if(($this->session->userdata("carpet_area_unit"))=="Sq. Feet") echo 'selected' ?>>Sq. Feet</option>
                                    <option value="Sq. Yards" <?php if(($this->session->userdata("carpet_area_unit"))=="Sq. Yards") echo 'selected' ?>>Sq. Yards</option>
                                    <option value="Sq. Meters" <?php if(($this->session->userdata("carpet_area_unit"))=="Sq. Meters") echo 'selected' ?>>Sq. Meters</option>
                                    <option value="Acres" <?php if(($this->session->userdata("carpet_area_unit"))=="Acres") echo 'selected' ?>>Acres</option>
                                    <option value="Hectares" <?php if(($this->session->userdata("carpet_area_unit"))=="Hectares") echo 'selected' ?>>Hectares</option>
                                    <option value="Grounds" <?php if(($this->session->userdata("carpet_area_unit"))=="Grounds") echo 'selected' ?>>Grounds</option>
                                    <option value="Cents" <?php if(($this->session->userdata("carpet_area_unit"))=="Cents") echo 'selected' ?>>Cents</option>
                                </select>
                                <span class="<?= form_error('carpet_area_unit') ? 'text-danger' : '' ?>"><?= form_error('carpet_area_unit') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="plot_area" class="control-label">Plot Area</label>
                            <div class=" <?= form_error('plot_area') ? 'has-error' : '' ?>">
                                <input type="text" name="plot_area" class="form-control" id="plot_area"
                                placeholder="Type the plot area"
                                value="<?= set_value('plot_area') ?>">
                                <span class="<?= form_error('plot_area') ? 'text-danger' : '' ?>"><?= form_error('plot_area') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="plot_area_unit" class="control-label">&nbsp;</label>
                            <div class=" <?= form_error('plot_area_unit') ? 'has-error' : '' ?>">
                                <select name="plot_area_unit" id="plot_area_unit" class="form-control">
                                    <option value="Select">Select</option>
                                           <option value="Sq. Feet" <?php if(($this->session->userdata("plot_area_unit"))=="Sq. Feet") echo 'selected' ?>>Sq. Feet</option>
                                    <option value="Sq. Yards" <?php if(($this->session->userdata("plot_area_unit"))=="Sq. Yards") echo 'selected' ?>>Sq. Yards</option>
                                    <option value="Sq. Meters" <?php if(($this->session->userdata("plot_area_unit"))=="Sq. Meters") echo 'selected' ?>>Sq. Meters</option>
                                    <option value="Acres" <?php if(($this->session->userdata("plot_area_unit"))=="Acres") echo 'selected' ?>>Acres</option>
                                    <option value="Hectares" <?php if(($this->session->userdata("plot_area_unit"))=="Hectares") echo 'selected' ?>>Hectares</option>
                                    <option value="Grounds" <?php if(($this->session->userdata("plot_area_unit"))=="Grounds") echo 'selected' ?>>Grounds</option>
                                    <option value=
                                </select>
                                <span class="<?= form_error('plot_area_unit') ? 'text-danger' : '' ?>"><?= form_error('plot_area_unit') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="lat" class="control-label">Latitude</label>
                            <div class=" <?= form_error('lat') ? 'has-error' : '' ?>">
                                <input type="text" name="lat" class="form-control" id="lat"
                                placeholder="Type the location latitude"
                                value="<?= set_value('lat') ?>">
                                <span class="<?= form_error('lat') ? 'text-danger' : '' ?>"><?= form_error('lat') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="lng" class="control-label">Longitude</label>
                            <div class=" <?= form_error('lng') ? 'has-error' : '' ?>">
                                <input type="text" name="lng" class="form-control" id="lng"
                                placeholder="Type the location longitude"
                                value="<?= set_value('lng') ?>">
                                <span class="<?= form_error('lng') ? 'text-danger' : '' ?>"><?= form_error('lng') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="bedrooms" class="control-label">Bedrooms</label>
                            <div class=" <?= form_error('bedrooms') ? 'has-error' : '' ?>">
                                <select name="bedrooms" id="bedrooms" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("bedrooms"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('bedrooms') ? 'text-danger' : '' ?>"><?= form_error('bedrooms') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="bathrooms" class="control-label">Bathrooms</label>
                            <div class=" <?= form_error('bathrooms') ? 'has-error' : '' ?>">
                                <select name="bathrooms" id="bathrooms" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("bathrooms"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('bathrooms') ? 'text-danger' : '' ?>"><?= form_error('bathrooms') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="facades" class="control-label">Balcony</label>
                            <div class=" <?= form_error('bathrooms') ? 'has-error' : '' ?>">
                                <select name="facades" id="facades" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("facades"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('facades') ? 'text-danger' : '' ?>"><?= form_error('facades') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="floors" class="control-label">Floors</label>
                            <div class=" <?= form_error('floors') ? 'has-error' : '' ?>">
                                <select name="floors" id="floors" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("floors"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('floors') ? 'text-danger' : '' ?>"><?= form_error('floors') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="towers" class="control-label">Towers</label>
                            <div class=" <?= form_error('towers') ? 'has-error' : '' ?>">
                                <select name="towers" id="towers" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("towers"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('towers') ? 'text-danger' : '' ?>"><?= form_error('towers') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="units" class="control-label">Units</label>
                            <div class=" <?= form_error('units') ? 'has-error' : '' ?>">
                                <select name="units" id="units" class="form-control">
                                    <option value="Select">Select</option>
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php if(($this->session->userdata("units"))==$i) echo 'selected' ?>><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Multiple">Multiple</option>
                                </select>
                                <span class="<?= form_error('units') ? 'text-danger' : '' ?>"><?= form_error('units') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label class="control-label" for="map">Location Map</label>
                            <div class=" <?= form_error('map') ? 'has-error' : '' ?>">
                                <input type="file" id="map" accept="image/*" class="form-control" name="map">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="location_alt" class="control-label">location Alt</label>

                            <div class=" <?= form_error('location_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="location_alt" class="form-control" id="location_alt"
                                placeholder="Type the location alt title here" value="<?= set_value('location_alt') ?>">
                                <span class="<?= form_error('location_alt') ? 'text-danger' : '' ?>"><?= form_error('location_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="location_description" class="control-label">Location Description</label>

                            <div class=" <?= form_error('location_description') ? 'has-error' : '' ?>">
                                <input type="text" name="location_description" class="form-control" id="location_description"
                                placeholder="Type the location description here" value="<?= set_value('location_description') ?>">
                                <span class="<?= form_error('location_description') ? 'text-danger' : '' ?>"><?= form_error('location_description') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label class="control-label" for="brochure">Brochure</label>
                            <div class=" <?= form_error('brochure') ? 'has-error' : '' ?>">
                                <input type="file" id="brochure" accept="image/*" class="form-control"
                                name="brochure">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="brochure_alt" class="control-label">Brochure Alt</label>

                            <div class=" <?= form_error('brochure_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="brochure_alt" class="form-control" id="brochure_alt"
                                placeholder="Type the brochure alt title here" value="<?= set_value('brochure_alt') ?>">
                                <span class="<?= form_error('brochure_alt') ? 'text-danger' : '' ?>"><?= form_error('brochure_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="brochure_description" class="control-label">Brochure Description</label>

                            <div class=" <?= form_error('brochure_description') ? 'has-error' : '' ?>">
                                <input type="text" name="brochure_description" class="form-control" id="brochure_description"
                                placeholder="Type the brochure description here" value="<?= set_value('brochure_description') ?>">
                                <span class="<?= form_error('brochure_description') ? 'text-danger' : '' ?>"><?= form_error('brochure_description') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Floor Plans (Preferred Size 775 x 520)</label>
                            <div class="">
                                <div class="dropzone floor">
                                    <div id="hiddenfloorimages" class="hide"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Master Plans (Preferred Size 775 x 520)</label>
                            <div class="">
                                <div class="dropzone master">
                                    <div id="hiddenmasterimages" class="hide"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="floor_alt" class="control-label">FLoor Alt</label>

                            <div class=" <?= form_error('floor_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="floor_alt" class="form-control" id="floor_alt"
                                placeholder="Type the floor alt title here" value="<?= set_value('floor_alt') ?>">
                                <span class="<?= form_error('floor_alt') ? 'text-danger' : '' ?>"><?= form_error('floor_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="floor_description" class="control-label">Floor Description</label>

                            <div class=" <?= form_error('floor_description') ? 'has-error' : '' ?>">
                                <input type="text" name="floor_description" class="form-control" id="floor_description"
                                placeholder="Type the floor description here" value="<?= set_value('floor_description') ?>">
                                <span class="<?= form_error('floor_description') ? 'text-danger' : '' ?>"><?= form_error('floor_description') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="master_alt" class="control-label">Master Alt</label>

                            <div class=" <?= form_error('master_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="master_alt" class="form-control" id="master_alt"
                                placeholder="Type the master alt title here" value="<?= set_value('master_alt') ?>">
                                <span class="<?= form_error('master_alt') ? 'text-danger' : '' ?>"><?= form_error('master_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="master_description" class="control-label">Master Description</label>

                            <div class=" <?= form_error('master_description') ? 'has-error' : '' ?>">
                                <input type="text" name="master_description" class="form-control" id="master_description"
                                placeholder="Type the master description here" value="<?= set_value('master_description') ?>">
                                <span class="<?= form_error('master_description') ? 'text-danger' : '' ?>"><?= form_error('master_description') ?></span>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Construction Updates (Preferred Size 775 x 520)</label>
                            <div class="">
                                <div class="dropzone construction">
                                    <div id="hiddenconstructionimages" class="hide"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Elevations (Preferred Size 775 x 520)</label>
                            <div class="">
                                <div class="dropzone elevations">
                                    <div id="hiddenelevationsimages" class="hide"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="construction_alt" class="control-label">Construction Alt</label>

                            <div class=" <?= form_error('construction_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="construction_alt" class="form-control" id="construction_alt"
                                placeholder="Type the construction alt title here" value="<?= set_value('construction_alt') ?>">
                                <span class="<?= form_error('construction_alt') ? 'text-danger' : '' ?>"><?= form_error('construction_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="construction_description" class="control-label">Construction Description</label>

                            <div class=" <?= form_error('construction_description') ? 'has-error' : '' ?>">
                                <input type="text" name="construction_description" class="form-control" id="construction_description"
                                placeholder="Type the master description here" value="<?= set_value('construction_description') ?>">
                                <span class="<?= form_error('construction_description') ? 'text-danger' : '' ?>"><?= form_error('construction_description') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="elevations_alt" class="control-label">Elevations Alt</label>

                            <div class=" <?= form_error('elevations_alt') ? 'has-error' : '' ?>">
                                <input type="text" name="elevations_alt" class="form-control" id="master_alt"
                                placeholder="Type the elevations alt title here" value="<?= set_value('elevations_alt') ?>">
                                <span class="<?= form_error('elevations_alt') ? 'text-danger' : '' ?>"><?= form_error('elevations_alt') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="master_description" class="control-label">Master Description</label>

                            <div class=" <?= form_error('master_description') ? 'has-error' : '' ?>">
                                <input type="text" name="master_description" class="form-control" id="master_description"
                                placeholder="Type the master description here" value="<?= set_value('master_description') ?>">
                                <span class="<?= form_error('master_description') ? 'text-danger' : '' ?>"><?= form_error('master_description') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <div class=" <?= form_error('description') ? 'has-error' : '' ?>">
                                <textarea id="description" class="form-control"
                                name="description"><?=set_value('description')?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="usp">USP (Heighlights)</label>
                            <div class=" <?= form_error('usp') ? 'has-error' : '' ?>">
                                <textarea id="usp" class="form-control"
                                name="usp"><?=set_value('usp')?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <div class="form-group <?= form_error('walkthrough') ? 'has-error' : '' ?>">
                                <label class="control-label" for="walkthrough">Walkthrough (YouTube Video)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-youtube"></i></div>
                                    <input type="url" value="<?= set_value('walkthrough') ?>" placeholder="https://youtube.com/watch?v=abcdQASH" name="walkthrough" id="walkthrough" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group <?= form_error('facebook') ? 'has-error' : '' ?>">
                            <label class="control-label" for="facebook">Facebook</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                <input type="url" value="<?= set_value("facebook") ?>" placeholder="https://facebook.com/username" name="facebook" id="facebook" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group <?= form_error('twitter') ? 'has-error' : '' ?>">
                            <label class="control-label" for="twitter">Twitter</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                                <input type="url" value="<?= set_value("twitter") ?>" placeholder="https://twitter.com/@username" name="twitter" id="twitter" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group <?= form_error('google') ? 'has-error' : '' ?>">
                            <label class="control-label" for="google">Google+</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-google-plus"></i></div>
                                <input type="url" value="<?= set_value("google") ?>" placeholder="https://google.com/+profileID" name="google" id="google" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-stripped">
                                <caption><strong>Specifications</strong></caption>
                                <?php
                                if (($specifications = $this->properties_model->getPropertySpecification()) != null) {
                                    foreach ($specifications as $specification) {
                                        ?>
                                        <tr>
                                            <th><?= $specification->name ?></th>
                                            <td>
                                                <textarea name="specification[<?= $specification->id ?>]"
                                                   class="form-control" title=""
                                                   placeholder="Provide specifications for <?= $specification->name ?>"></textarea>
                                               </td>
                                           </tr>
                                           <?php
                                       }
                                   }
                                   ?>
                               </table>
                           </div>
                       </div>

                       <div class="clearfix"></div>
                       <!--                        Add Flat Types-->
                       <?php
                       if (($flat_types = $this->properties_model->getPropertyFlatType()) != null) {
                        foreach ($flat_types as $flat_type) {
                            ?>
                            <hr />
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><?= $flat_type->name ?></h4>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <?php
                            for ($i = 1; $i < 7; $i++) {
                                ?>
                                <div class="col-sm-1 col-md-1">
                                    <label for="" class="control-label">&nbsp;</label>
                                    <div><?= $i ?></div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <div>
                                            <input type="text" class="form-control"
                                            name="flat_type[<?= $flat_type->id ?>][name][]" placeholder="name e.g 2BHK + 1T"

                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2 no-padding">
                                    <div class="form-group no-padding">
                                        <label class="control-label">Size</label>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 no-padding">
                                            <input type="text" class="form-control"
                                            name="flat_type[<?= $flat_type->id ?>][size][]" placeholder="Size">
                                        </div>
                                        <div class="col-md-6 no-padding">
                                            <select class="form-control"
                                            name="flat_type[<?= $flat_type->id ?>][unit][]">
                                                <option value="Select">Select</option>
                                            <option value="Sqft" >Sqft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Carpet Area</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Carpet Area"
                                        name="flat_type[<?= $flat_type->id ?>][carpet_area][]" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Price (<i class="fa fa-inr"
                                       aria-hidden="true"></i>)</label>
                                       <div>
                                        <input type="text" class="form-control"
                                        placeholder="Price / sqft in INR"
                                        name="flat_type[<?= $flat_type->id ?>][price][]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""
                                            name="flat_type[<?= $flat_type->id ?>][price_on_request][]">
                                            Price On Request
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <div class="alert alert-info text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <strong>Sorry! there is no flat type available</strong>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default" id="submit2" onclick="history.go(-1);">Back
                </button>
                <button type="submit" class="btn btn-info pull-right">ADD</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <div class="clearfix"></div>
    <br><br><br>
    <!-- /.box -->
</div>
</div>
</section>