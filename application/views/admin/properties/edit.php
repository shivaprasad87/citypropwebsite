<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Property</h3>
                </div>
                <!-- /.box-header -->
                <input type="hidden" name="prop_id" id="prop_id" value="<?= $property->id ?>">
                <!-- form start -->
                <form method="post" action="<?= site_url('admin/properties/edit/' . $property->id) ?>"
                  enctype="multipart/form-data">
                  <div class="box-body">
                    <!--<div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="uid" class="control-label">Property Unique ID # <code>*</code></label>
                            <div class=" <?= form_error('uid') ? 'has-error' : '' ?>">
                                <input type="text" name="uid" class="form-control" id="uid"
                                placeholder="Type the Unique ID" value="<?= $property->uid ?>">
                                <span class="<?= form_error('uid') ? 'text-danger' : '' ?>"><?= form_error('uid') ?></span>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="rera_number" class="control-label">RERA Number</label>
                            <div class=" <?= form_error('rera_number') ? 'has-error' : '' ?>">
                                <input type="text" name="rera_number" class="form-control" id="rera_number"
                                placeholder="Type the RERA Number" value="<?= $property->rera_number ?>">
                                <span class="<?= form_error('rera_number') ? 'text-danger' : '' ?>"><?= form_error('rera_number') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputFile">Project Logo(If you don't upload logo Builder logo will be show)</label>
                            <div class=" <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" class="form-control" id="logo_1" name="logo_1">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="control-label" for="map">Desktop Banners</label>
                        <?php
                        $images = $this->properties_model->getWhere(array('property_id' => $property->id),'property_desktop_banners'); 

                       // $total_images =array_merge($images);
                        $total_images = json_decode( json_encode($images), true);  
                        foreach ($total_images as $image) {
                       
                            ?>
                            <div>
                                <img class="img-responsive thumbnail"
                                src="<?=  base_url().$image['banner_path']; ?>" style="width: 200Px;height: 200px;"/>
                            </div>
                            <?php
                    }
                        ?>
                        <div class=" <?= form_error('map') ? 'has-error' : '' ?>">
                            <input type="file" id="banners" accept="image/*" class="form-control" name="banners">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="control-label" for="map">Mobile Banners</label>
                        <?php 
                        $m_images = $this->properties_model->getWhere(array('property_id' => $property->id),'property_mobile_banners');
                       // $total_images =array_merge($images);
                        $total_images = json_decode( json_encode($m_images), true);  
                        foreach ($total_images as $image) {
                       
                            ?>
                            <div>
                                <img class="img-responsive thumbnail"
                                src="<?=  base_url().$image['mobile_banner_path']; ?>"/ style="width: 200Px;height: 200px;">
                            </div>
                            <?php
                    }
                        ?>
                        <div class=" <?= form_error('map') ? 'has-error' : '' ?>">
                            <input type="file" id="mobilebanners" accept="image/*" class="form-control" name="mobilebanners">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="issue_date" class="control-label">Issue Date <code>*</code></label>
                            <div class=" <?= form_error('issue_date') ? 'has-error' : '' ?>">
                                <select name="issue_date" id="issue_date" class="form-control">
                                    <option <?= $property->issue_date === "New Launch" ? 'selected' : '' ?>
                                    value="New Launch">New Launch
                                </option>
                                <option <?= $property->issue_date === "Upcoming Projects" ? 'selected' : '' ?>
                                value="Upcoming Projects">Upcoming Projects
                            </option>
                            <option <?= $property->issue_date === "Under-Construction" ? 'selected' : '' ?>
                            value="Under-Construction">Under-Construction
                        </option>
                        <option <?= $property->issue_date === "Ready to move" ? 'selected' : '' ?>
                        value="Ready to move">Ready to move
                    </option>
                    <option <?= $property->issue_date === "Resale" ? 'selected' : '' ?>
                    value="Resale">Resale
                </option>
                <option <?= $property->issue_date === "Ready For Registration" ? 'selected' : '' ?>
                value="Ready For Registration">Ready For Registration
            </option>
            <option <?= $property->issue_date === "Just Launched" ? 'selected' : '' ?>
            value="Just Launched">Just Launched
        </option>
    </select>
    <span class="<?= form_error('issue_date') ? 'text-danger' : '' ?>"><?= form_error('issue_date') ?></span>
</div>
</div>
</div>
<!-- <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="property_status_id" class="control-label">Property Status <code>*</code></label>
        <div class=" <?= form_error('property_status_id') ? 'has-error' : '' ?>">
            <select name="property_status_id" id="property_status_id" class="form-control">
                <?php
                if (($property_status = $this->properties_model->getPropertyStatus()) != null) {
                    foreach ($property_status as $status) {
                        ?>
                        <option <?= $property->property_status_id === $status->id ? 'selected' : '' ?>
                        value="<?= $status->id ?>"><?= $status->name ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <span class="<?= form_error('property_status_id') ? 'text-danger' : '' ?>"><?= form_error('property_status_id') ?></span>
        </div>
    </div>
</div> -->
<div class="clearfix"></div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="city" class="control-label">City <code>*</code></label>
        <select class="form-control" name="city" id="edit_city">
            <?php
            foreach ($cities as $city) {
                ?>
                <option <?= $city->id == $property->city_id ? 'selected' : '' ?>
                value="<?= $city->id ?>"><?= ucfirst($city->name) ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="location" class="control-label">Location <code>*</code></label>
        <select class="form-control" name="location" id="locations">
            <?php foreach ($locations as $location) { ?>
                <option <?= $property->location_id == $location->id ? 'selected' : '' ?>
                value="<?= $location->id ?>"><?= $location->name ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="builder" class="control-label">Builder <code>*</code></label>
        <select class="form-control" name="builder">
            <?php
            foreach ($builders as $builder) {
                ?>
                <option <?= $builder->id == $property->builder_id ? 'selected':'' ?> value="<?= $builder->id ?>"><?= ucfirst($builder->name) ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label class="control-label" for="exampleInputFile">Change Image <code>*</code> (Preferred Size 1350 x 570)</label>
        <div class="clearfix"></div>
        <div class="<?= form_error('uploadImage') ? 'has-error' : '' ?> col-sm-6">
            <input type="file" name="uploadfile" class="form-control">
        </div>
        <div class="col-sm-6 text-center">
            <img src="<?= base_url('uploads/'.str_replace(" ","-",strtolower($property->city_name))."/".str_replace(" ","-",strtolower($property->builder))."/" . $property->slug . '/' . $property->image) ?>"
            id="prevImage" style="height: 90px; width: 90px; display: inline-block;">
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="title" class="control-label">Title <code>*</code></label>

        <div class="<?= form_error('title') ? 'has-error' : '' ?>">
            <input type="text" name="title" class="form-control" id="inputEmail3"
            placeholder="Type the title here" value="<?= $property->title ?>">
            <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="type" class="control-label">Property Type <code>*</code></label>
        <select class="form-control" name="type">
            <?php
            foreach ($property_types as $type) {
                ?>
                <option <?= $type->id == $property->property_type_id ? 'selected' : '' ?>
                value="<?= $type->id ?>"><?= $type->name ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="image_discription" class="control-label">Image Description</label>

        <div class=" <?= form_error('image_description') ? 'has-error' : '' ?>">
            <input type="text" name="image_description" class="form-control" id="image_description"
            placeholder="Type the image_description here" value="<?= $property->image_desc ?>">
            <span class="<?= form_error('image_description') ? 'text-danger' : '' ?>"><?= form_error('image_description') ?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="area" class="control-label">Area</label>

        <div class=" <?= form_error('area') ? 'has-error' : '' ?>">
            <input type="text" name="area" class="form-control" id="inputEmail3"
            placeholder="Type the area here" value="<?= $property->area ?>">
            <span class="<?= form_error('area') ? 'text-danger' : '' ?>"><?= form_error('area') ?></span>
        </div>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="possession_date" class="control-label">Possession Date</label>

        <div class=" <?= form_error('possession_date') ? 'has-error' : '' ?>">
            <input type="text" name="possession_date" class="form-control" id="possession_date"
            placeholder="Type the possession date here" value="<?= $property->possession_date ?>">
            <span class="<?= form_error('possession_date') ? 'text-danger' : '' ?>"><?= form_error('possession_date') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="budget" class="control-label">Avg. price per Sqft area</label>

        <div class=" <?= form_error('author') ? 'has-error' : '' ?>">
            <input type="text" name="budget" class="form-control" id="inputEmail3"
            placeholder="Type the Avg. price per Sqft area here" value="<?= $property->budget ?>">
            <span class="<?= form_error('budget') ? 'text-danger' : '' ?>"><?= form_error('budget') ?></span>
        </div>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="alt" class="control-label">Image ALT text</label>

        <div class=" <?= form_error('alt') ? 'has-error' : '' ?>">
            <input type="text" name="alt" class="form-control" id="alt"
            placeholder="ALT Text" value="<?= set_value('alt',$property->alt) ?>">
            <span class="<?= form_error('alt') ? 'text-danger' : '' ?>"><?= form_error('alt') ?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="meta_title" class="control-label">Meta Title</label>

        <div class=" <?= form_error('meta_title') ? 'has-error' : '' ?>">
            <input type="text" name="meta_title" class="form-control"
            placeholder="Type the meta title here" value="<?= $property->meta_title ?>">
            <span class="<?= form_error('meta_title') ? 'text-danger' : '' ?>"><?= form_error('meta_title') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="meta_keywords" class="control-label">Meta Keywords</label>

        <div class=" <?= form_error('meta_keywords') ? 'has-error' : '' ?>">
            <input type="text" name="meta_keywords" class="form-control"
            placeholder="Type the meta keywords here"
            value="<?= $property->meta_keywords ?>">
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
            rows="5"><?= $property->meta_desc ?></textarea>
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

<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="gallery_alt" class="control-label">Gallery Alt</label>

        <div class="<?= form_error('gallery_alt') ? 'has-error' : '' ?>">
            <input type="text" name="gallery_alt" class="form-control" id="gallery_alt"
            placeholder="Type the gallery alt here" value="<?= $property->gallery_alt ?>">
            <span class="<?= form_error('gallery_alt') ? 'text-danger' : '' ?>"><?= form_error('gallery_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="gallery_description" class="control-label">Gallery Description</label>

        <div class="<?= form_error('gallery_description') ? 'has-error' : '' ?>">
            <input type="text" name="gallery_description" class="form-control" id="gallery_description"
            placeholder="Type the gallery description here" value="<?= $property->gallery_desc ?>">
            <span class="<?= form_error('gallery_description') ? 'text-danger' : '' ?>"><?= form_error('gallery_description') ?></span>
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
                    $array = [];
                    foreach ($property->amenities as $value) {
                        array_push($array, $value->amenity_id);
                    }
                    foreach ($amenities as $i => $amenity) {
                        ?>

                        <td class="<?= in_array($amenity->id, $array) ? 'success' : '' ?>">
                            <input type="checkbox"
                            <?= in_array($amenity->id, $array) ? 'checked' : '' ?>
                            name="amenities[]"
                            value="<?= $amenity->id ?>"> <img
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

    <!-- Additional Data -->
<!--     <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="property_for" class="control-label">Property For <code>*</code></label>
            <div class=" <?= form_error('property_for') ? 'has-error' : '' ?>">
                <select name="property_for" id="property_for" class="form-control">
                    <option <?= $property->property_for == "Sell" ? "selected" : "" ?> value="Sell">
                        Sell
                    </option>
                    <option <?= $property->property_for == "Rent" ? "selected" : "" ?> value="Rent">
                        Rent
                    </option>
                    <option <?= $property->property_for == "Sell/Rent" ? "selected" : "" ?>
                    value="Sell/Rent">Sell/Rent
                </option>
            </select>
            <span class="<?= form_error('property_for') ? 'text-danger' : '' ?>"><?= form_error('property_for') ?></span>
        </div>
        <span class="<?= form_error('property_for') ? 'text-danger' : '' ?>"><?= form_error('property_for') ?></span>
    </div>
</div> -->
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="price_per_unit" class="control-label">Price Per Unit <code>*</code></label>
        <div class=" <?= form_error('price_per_unit') ? 'has-error' : '' ?>">
            <input type="text" name="price_per_unit" class="form-control" id="price_per_unit"
            placeholder="Type the price per unit"
            value="<?= $property->price_per_unit ?>">
            <span class="<?= form_error('price_per_unit') ? 'text-danger' : '' ?>"><?= form_error('price_per_unit') ?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="build" class="control-label">Build <code>*</code></label>
        <div class=" <?= form_error('build') ? 'has-error' : '' ?>">
            <select name="build" id="build" class="form-control">
                <option <?= $property->build == "Newly Built" ? "selected" : "" ?>
                value="Newly Built">Newly Built
            </option>
            <option <?= $property->build == "Used" ? "selected" : "" ?> value="Used">Used
            </option>
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
                <option <?= $property->face == "East" ? "selected" : "" ?> value="East">East
                </option>
                <option <?= $property->face == "West" ? "selected" : "" ?> value="West">West
                </option>
                <option <?= $property->face == "North" ? "selected" : "" ?> value="North">
                    North
                </option>
                <option <?= $property->face == "South" ? "selected" : "" ?> value="South">
                    South
                </option>
            </select>
            <span class="<?= form_error('face') ? 'text-danger' : '' ?>"><?= form_error('face') ?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div> -->
<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="builtup_area" class="control-label">Builtup Area</label>
        <div class=" <?= form_error('builtup_area') ? 'has-error' : '' ?>">
            <input type="text" name="builtup_area" class="form-control" id="builtup_area"
            placeholder="Type the builtup area"
            value="<?= $property->builtup_area ?>">
            <span class="<?= form_error('builtup_area') ? 'text-danger' : '' ?>"><?= form_error('builtup_area') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="builtup_area_unit" class="control-label">&nbsp;</label>
        <div class=" <?= form_error('builtup_area_unit') ? 'has-error' : '' ?>">
            <select name="builtup_area_unit" id="builtup_area_unit" class="form-control">
                <option <?= $property->builtup_area_unit == "Sq. Feet" ? "selected" : "" ?>
                value="Sq. Feet">Sq. Feet
            </option>
            <option <?= $property->builtup_area_unit == "Sq. Yards" ? "selected" : "" ?>
            value="Sq. Yards">Sq. Yards
        </option>
        <option <?= $property->builtup_area_unit == "Sq. Meters" ? "selected" : "" ?>
        value="Sq. Meters">Sq. Meters
    </option>
    <option <?= $property->builtup_area_unit == "Acres" ? "selected" : "" ?>
    value="Acres">Acres
</option>
<option <?= $property->builtup_area_unit == "Hectares" ? "selected" : "" ?>
value="Hectares">Hectares
</option>
<option <?= $property->builtup_area_unit == "Grounds" ? "selected" : "" ?>
value="Grounds">Grounds
</option>
<option <?= $property->builtup_area_unit == "Cents" ? "selected" : "" ?>
value="Cents">Cents
</option>
</select>
<span class="<?= form_error('builtup_area_unit') ? 'text-danger' : '' ?>"><?= form_error('builtup_area_unit') ?></span>
</div>
</div>
</div>
<!-- <div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="carpet_area" class="control-label">Carpet Area</label>
        <div class=" <?= form_error('carpet_area') ? 'has-error' : '' ?>">
            <input type="text" name="carpet_area" class="form-control" id="carpet_area"
            placeholder="Type the carpet area"
            value="<?= $property->carpet_area ?>">
            <span class="<?= form_error('carpet_area') ? 'text-danger' : '' ?>"><?= form_error('carpet_area') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="carpet_area_unit" class="control-label">&nbsp;</label>
        <div class=" <?= form_error('carpet_area_unit') ? 'has-error' : '' ?>">
            <select name="carpet_area_unit" id="carpet_area_unit" class="form-control">
                <option <?= $property->carpet_area_unit == "Sq. Feet" ? "selected" : "" ?>
                value="Sq. Feet">Sq. Feet
            </option>
            <option <?= $property->carpet_area_unit == "Sq. Yards" ? "selected" : "" ?>
            value="Sq. Yards">Sq. Yards
        </option>
        <option <?= $property->carpet_area_unit == "Sq. Meters" ? "selected" : "" ?>
        value="Sq. Meters">Sq. Meters
    </option>
    <option <?= $property->carpet_area_unit == "Acres" ? "selected" : "" ?>
    value="Acres">Acres
</option>
<option <?= $property->carpet_area_unit == "Hectares" ? "selected" : "" ?>
value="Hectares">Hectares
</option>
<option <?= $property->carpet_area_unit == "Grounds" ? "selected" : "" ?>
value="Grounds">Grounds
</option>
<option <?= $property->carpet_area_unit == "Cents" ? "selected" : "" ?>
value="Cents">Cents
</option>
</select>
<span class="<?= form_error('carpet_area_unit') ? 'text-danger' : '' ?>"><?= form_error('carpet_area_unit') ?></span>
</div>
</div>
</div>
<div class="clearfix"></div> -->
<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="plot_area" class="control-label">Plot Area</label>
        <div class=" <?= form_error('plot_area') ? 'has-error' : '' ?>">
            <input type="text" name="plot_area" class="form-control" id="plot_area"
            placeholder="Type the plot area"
            value="<?= $property->plot_area ?>">
            <span class="<?= form_error('plot_area') ? 'text-danger' : '' ?>"><?= form_error('plot_area') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="plot_area_unit" class="control-label">&nbsp;</label>
        <div class=" <?= form_error('plot_area_unit') ? 'has-error' : '' ?>">
            <select name="plot_area_unit" id="plot_area_unit" class="form-control">
                <option <?= $property->plot_area_unit == "Sq. Feet" ? "selected" : "" ?>
                value="Sq. Feet">Sq. Feet
            </option>
            <option <?= $property->plot_area_unit == "Sq. Yards" ? "selected" : "" ?>
            value="Sq. Yards">Sq. Yards
        </option>
        <option <?= $property->plot_area_unit == "Sq. Meters" ? "selected" : "" ?>
        value="Sq. Meters">Sq. Meters
    </option>
    <option <?= $property->plot_area_unit == "Acres" ? "selected" : "" ?>
    value="Acres">Acres
</option>
<option <?= $property->plot_area_unit == "Hectares" ? "selected" : "" ?>
value="Hectares">Hectares
</option>
<option <?= $property->plot_area_unit == "Grounds" ? "selected" : "" ?>
value="Grounds">Grounds
</option>
<option <?= $property->plot_area_unit == "Cents" ? "selected" : "" ?>
value="Cents">Cents
</option>
</select>
<span class="<?= form_error('plot_area_unit') ? 'text-danger' : '' ?>"><?= form_error('plot_area_unit') ?></span>
</div>
</div>
</div>
<!-- <div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="lat" class="control-label">Latitude</label>
        <div class=" <?= form_error('lat') ? 'has-error' : '' ?>">
            <input type="text" name="lat" class="form-control" id="lat"
            placeholder="Type the location latitude"
            value="<?= $property->lat ?>">
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
            value="<?= $property->lng ?>">
            <span class="<?= form_error('lng') ? 'text-danger' : '' ?>"><?= form_error('lng') ?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div> -->
<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="form-group">
        <label for="bedrooms" class="control-label">Bedrooms</label>
        <div class=" <?= form_error('bedrooms') ? 'has-error' : '' ?>">
            <select name="bedrooms" id="bedrooms" class="form-control">
                <?php
                for ($i = 1; $i < 6; $i++) {
                    ?>
                    <option <?= $property->bedrooms == $i ? "selected" : "" ?>
                    value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
                <option <?= $property->bedrooms == "Multiple" ? "selected" : "" ?>
                value="Multiple">Multiple
            </option>
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
                <?php
                for ($i = 1; $i < 6; $i++) {
                    ?>
                    <option <?= $property->bathrooms == $i ? "selected" : "" ?>
                    value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
                <option <?= $property->bathrooms == "Multiple" ? "selected" : "" ?>
                value="Multiple">Multiple
            </option>
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
                <?php
                for ($i = 1; $i < 6; $i++) {
                    ?>
                    <option <?= $property->facades == $i ? "selected" : "" ?>
                    value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
                <option <?= $property->facades == "Multiple" ? "selected" : "" ?>
                value="Multiple">Multiple
            </option>
        </select>
        <span class="<?= form_error('facades') ? 'text-danger' : '' ?>"><?= form_error('facades') ?></span>
    </div>
</div>
</div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="floors" class="control-label">No of Floors</label>
                            <div class=" <?= form_error('floors') ? 'has-error' : '' ?>">
                                <input type="text" name="floors" class="form-control" id="floors"
                                placeholder="No of Floors" value="<?= $property->floors; ?>">
                                <span class="<?= form_error('floors') ? 'text-danger' : '' ?>"><?= form_error('floors') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="towers" class="control-label">No of towers</label>
                            <div class=" <?= form_error('towers') ? 'has-error' : '' ?>">
                                <input type="text" name="towers" class="form-control" id="towers"
                                placeholder="No of Towers" value="<?= $property->towers; ?>">
                                <span class="<?= form_error('towers') ? 'text-danger' : '' ?>"><?= form_error('towers') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="units" class="control-label">No of units</label>
                            <div class=" <?= form_error('units') ? 'has-error' : '' ?>">
                                <input type="text" name="units" class="form-control" id="units"
                                placeholder="No of Units" value="<?= $property->units;?>">
                                <span class="<?= form_error('units') ? 'text-danger' : '' ?>"><?= form_error('units') ?></span>
                            </div>
                        </div>
                    </div>


<div class="clearfix"></div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label class="control-label" for="map">Location Map</label>
        <?php
        if ($property->map) {
            ?>
            <div>
                <img class="img-responsive thumbnail location"
                src="<?= base_url("uploads/$property->slug/map/$property->map") ?>"/>
            </div>
            <?php
        }
        ?>
        <span class="remove_file">remove file</span>
        <div class=" <?= form_error('map') ? 'has-error' : '' ?>">
            <input type="file" id="map" accept="image/*" class="form-control" name="map" style="height: 38px !important;">
        </div>

    </div>
</div>


<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label class="control-label" for="brochure">Brochure</label>
        <div class=" <?= form_error('brochure') ? 'has-error' : '' ?>">
            <input type="file" id="brochure" accept="image/*" class="form-control"
            name="brochure">
        </div>
        <?php
        if ($property->brochure) {
            ?>
            <div>
                <a class="btn btn-block btn-primary"
                href="<?= base_url("uploads/$property->slug/brochure/$property->brochure") ?>" target="_blank"><?=basename($property->brochure)?></a>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="clearfix"></div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="location_alt" class="control-label">Location Alt</label>

        <div class="<?= form_error('location_alt') ? 'has-error' : '' ?>">
            <input type="text" name="location_alt" class="form-control" id="location_alt"
            placeholder="Type the location alt here" value="<?= $property->location_alt ?>">
            <span class="<?= form_error('location_alt') ? 'text-danger' : '' ?>"><?= form_error('location_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="location_description" class="control-label">Location Description</label>

        <div class="<?= form_error('location_description') ? 'has-error' : '' ?>">
            <input type="text" name="location_description" class="form-control" id="location_description"
            placeholder="Type the location description here" value="<?= $property->location_desc ?>">
            <span class="<?= form_error('location_description') ? 'text-danger' : '' ?>"><?= form_error('location_description') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="brochure_alt" class="control-label">Brochure Alt</label>

        <div class="<?= form_error('brochure_alt') ? 'has-error' : '' ?>">
            <input type="text" name="brochure_alt" class="form-control" id="brochure_alt"
            placeholder="Type the brochure alt here" value="<?= $property->brochure_alt ?>">
            <span class="<?= form_error('brochure_alt') ? 'text-danger' : '' ?>"><?= form_error('brochure_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="brochure_description" class="control-label">Brochure Description</label>

        <div class="<?= form_error('brochure_description') ? 'has-error' : '' ?>">
            <input type="text" name="brochure_description" class="form-control" id="brochure_description"
            placeholder="Type the brochure description here" value="<?= $property->brochure_desc ?>">
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
        <label for="floor_alt" class="control-label">Floor Alt</label>

        <div class="<?= form_error('floor_alt') ? 'has-error' : '' ?>">
            <input type="text" name="master_alt" class="form-control" id="floor_alt"
            placeholder="Type the floor alt here" value="<?= $property->floor_alt ?>">
            <span class="<?= form_error('floor_alt') ? 'text-danger' : '' ?>"><?= form_error('floor_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="floor_description" class="control-label">Floor Description</label>

        <div class="<?= form_error('floor_description') ? 'has-error' : '' ?>">
            <input type="text" name="floor_description" class="form-control" id="floor_description"
            placeholder="Type the master description here" value="<?= $property->floor_desc ?>">
            <span class="<?= form_error('floor_description') ? 'text-danger' : '' ?>"><?= form_error('floor_description') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="master_alt" class="control-label">Master Alt</label>

        <div class="<?= form_error('master_alt') ? 'has-error' : '' ?>">
            <input type="text" name="master_alt" class="form-control" id="master_alt"
            placeholder="Type the master alt here" value="<?= $property->master_alt ?>">
            <span class="<?= form_error('master_alt') ? 'text-danger' : '' ?>"><?= form_error('master_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="master_description" class="control-label">Master Description</label>

        <div class="<?= form_error('master_description') ? 'has-error' : '' ?>">
            <input type="text" name="master_description" class="form-control" id="master_description"
            placeholder="Type the master description here" value="<?= $property->master_desc ?>">
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

        <div class="<?= form_error('construction_alt') ? 'has-error' : '' ?>">
            <input type="text" name="construction_alt" class="form-control" id="construction_alt"
            placeholder="Type the construction alt here" value="<?= $property->construction_alt ?>">
            <span class="<?= form_error('construction_alt') ? 'text-danger' : '' ?>"><?= form_error('construction_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="construction_description" class="control-label">Construction Description</label>

        <div class="<?= form_error('construction_description') ? 'has-error' : '' ?>">
            <input type="text" name="construction_description" class="form-control" id="construction_description"
            placeholder="Type the master construction description here" value="<?= $property->construction_desc ?>">
            <span class="<?= form_error('construction_description') ? 'text-danger' : '' ?>"><?= form_error('construction_description') ?></span>
        </div>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="elevations_alt" class="control-label">Elevations Alt</label>

        <div class="<?= form_error('elevations_alt') ? 'has-error' : '' ?>">
            <input type="text" name="elevations_alt" class="form-control" id="elevations_alt"
            placeholder="Type the master alt here" value="<?= $property->elevations_alt ?>">
            <span class="<?= form_error('elevations_alt') ? 'text-danger' : '' ?>"><?= form_error('elevations_alt') ?></span>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="form-group">
        <label for="elevations_description" class="control-label">Elevations Description</label>

        <div class="<?= form_error('elevations_description') ? 'has-error' : '' ?>">
            <input type="text" name="elevations_description" class="form-control" id="elevations_description"
            placeholder="Type the master elevations description here" value="<?= $property->elevations_desc ?>">
            <span class="<?= form_error('elevations_description') ? 'text-danger' : '' ?>"><?= form_error('elevations_description') ?></span>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label class="control-label" for="description">Description</label>
        <div class=" <?= form_error('description') ? 'has-error' : '' ?>">
            <textarea id="description" class="form-control"
            name="description"><?= $property->description ?></textarea>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <label class="control-label" for="usp">USP</label>
        <div class=" <?= form_error('usp') ? 'has-error' : '' ?>">
            <textarea id="usp" class="form-control"
            name="usp"><?= $property->usp ?></textarea>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="form-group <?= form_error('walkthrough') ? 'has-error' : '' ?>">
        <label class="control-label" for="walkthrough">Walkthrough (YouTube Video)</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-youtube"></i></div>
            <input type="url" value="<?= $property->walkthrough ?>" placeholder="https://youtube.com/watch?v=abcdQASH" name="walkthrough" id="walkthrough" class="form-control">
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- <div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group <?= form_error('facebook') ? 'has-error' : '' ?>">
        <label class="control-label" for="facebook">Facebook</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
            <input type="url" value="<?= $property->facebook ?>" placeholder="https://facebook.com/username" name="facebook" id="facebook" class="form-control">
        </div>
    </div>
</div>


<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group <?= form_error('twitter') ? 'has-error' : '' ?>">
        <label class="control-label" for="twitter">Twitter</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
            <input type="url" value="<?= $property->twitter ?>" placeholder="https://twitter.com/@username" name="twitter" id="twitter" class="form-control">
        </div>
    </div>
</div>

<div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group <?= form_error('google') ? 'has-error' : '' ?>">
        <label class="control-label" for="google">Google+</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-google-plus"></i></div>
            <input type="url" value="<?= $property->google ?>" placeholder="https://google.com/+profileID" name="google" id="google" class="form-control">
        </div>
    </div>
</div>
<div class="clearfix"></div> -->
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
                               class="form-control"  title=""
                               placeholder="Provide specifications for <?= $specification->name ?>"><?=$this->properties_model->getPropertySpecification($property->id, $specification->id)?></textarea>
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
        <hr/>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4><?= $flat_type->name ?></h4>
        </div>
        <div class="clearfix"></div>
        <hr/>
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
                        name="flat_type[<?= $flat_type->id ?>][name][]"
                        value="<?=$this->properties_model->getPropertyFlatType($flat_type->id, $property->id, $i - 1, 'name')?>"
                        placeholder="name e.g 2BHK + 1T">
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-md-2 no-padding">
                <div class="form-group no-padding">
                    <label class="control-label">Size</label>
                    <div class="clearfix"></div>
                    <div class="col-md-6 no-padding">
                        <input type="text" class="form-control"
                        value="<?=$this->properties_model->getPropertyFlatType($flat_type->id, $property->id, $i - 1, 'size')?>"
                        name="flat_type[<?= $flat_type->id ?>][size][]" placeholder="Size">
                    </div>
                    <div class="col-md-6 no-padding">
                        <select class="form-control"
                        name="flat_type[<?= $flat_type->id ?>][unit][]">
                        <option value="Sqft">Sqft</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="form-group">
                <label class="control-label">Carpet Area</label>
                <div>
                    <input type="text" class="form-control"
                    placeholder="Carpet Area"
                    value="<?=$this->properties_model->getPropertyFlatType($flat_type->id, $property->id, $i - 1, 'carpet_area')?>"
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
                    value="<?=$this->properties_model->getPropertyFlatType($flat_type->id, $property->id, $i - 1, 'price')?>"
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
                        <?=$this->properties_model->getPropertyFlatType($flat_type->id, $property->id, $i - 1, 'price_on_request') ? 'checked' : ''?>
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
<!-- End Additional Data-->
 <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-stripped">
                                <caption><strong>FAQ</strong></caption>
                                 <?php
                                 $a=1;
                                if(count($faq)>=1)
                                {
                                    foreach ($faq as $faq) {
                                        ?>
                                        <tr>
                                            <td><?=$a?></td>

                                            <td>
                                    
                                    <textarea name="fq[]"
                                       class="form-control" title=""
                                       placeholder="Freuently Asked Question"><?=$faq->fq; ?></textarea>
                                   </td>
                                    <td>
                                    <textarea name="fa[]"
                                       class="form-control" title=""
                                       placeholder="Answer"><?=$faq->fa; ?></textarea>
                                   </td>
                               </tr>
                               <?php
                               $a++;
                               }
                                }
                                
                                for($i=$a;$i<=$a+6;$i++)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$i?>.
                                        </td>
                                    <td>
                                    <textarea name="fq[]"
                                       class="form-control" title=""
                                       placeholder="Freuently Asked Question"></textarea>
                                   </td>
                                    <td>
                                    <textarea name="fa[]"
                                       class="form-control" title=""
                                       placeholder="Answer"></textarea>
                                   </td>
                               </tr>
                                    <?php
                                }?>
                               </table>
                           </div>
                       </div>

</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-default" id="submit2" onclick="history.go(-1);">Back
    </button>
    <button type="submit" class="btn btn-info pull-right">UPDATE</button>
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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js?v=3.4.5"></script>
<script type="text/javascript">
  $('.remove_file').click(function(){
    var id = $(this).data('id');
    var imgElement_src = $( '.location' ).attr("src");
    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];
    //alert(imgElement_src);
    $.ajax({
      url: '<?php echo base_url()?>admin/properties/DeleteLocation',
      type: 'post',
      data: {path: imgElement_src,id:last_part},
      success: function(response){
        alert('success');
        location.reload();
      }
    });
  });
</script>