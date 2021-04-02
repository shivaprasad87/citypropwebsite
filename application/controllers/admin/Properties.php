<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends Admin_Controller
{

    /**
     * @var string
     */
    private $_redirect_url;

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');

        // load the language files
        $this->lang->load('properties');

        // load the aboutUs model
        $this->load->model('properties_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/properties'));

        // use the url in session (if available) to return to the previous filter/sorted/paginated list
        if ($this->session->userdata(REFERRER)) {
            $this->_redirect_url = $this->session->userdata(REFERRER);
        } else {
            $this->_redirect_url = THIS_URL;
        }
    }

    public function index()
    {
        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/properties');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadProperties(0, 0, true, $content);

        $this->data['properties'] = $this->properties_model->loadProperties($perpage, $page, false, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('properties title propertyList'))
        ->add_external_js(array(
            '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
            base_url($this->settings->themes_folder . '/admin/js/properties.js')
        ));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;
        // print_r($content_data);die;
        $data['content'] = $this->load->view('admin/properties/index', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function rera()
    {
        $content = $this->input->get('content');
        if ($this->input->post('id') && ($property = $this->properties_model->getOneWhere(array('id' => $this->input->post('id')), 'properties')) != null){
            $this->properties_model->updateRow($this->input->post('id'),array('rera_status' => !$property->rera_status), 'id', 'properties');
        }
        $perpage = 100;
        $base_url = site_url('admin/properties/rera');
        $uri_segment = 4;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadProperties(0, 0, true, $content);

        $this->data['properties'] = $this->properties_model->loadProperties($perpage, $page, false, $content, true);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('properties title propertyList'))
        ->add_external_js(array(
            '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
            base_url($this->settings->themes_folder . '/admin/js/properties.js')
        ));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/properties/rera_status', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function add()
    {
        $image='';
        $slug='';
        $builderName ='';
        $cityName = '';
        $locationName ='';

        if ($this->input->post()) {
            $builderName = $this->properties_model->getWhere(array('id'=>$this->input->post('builder')),'builders');
            $cityName = $this->properties_model->getWhere(array('id'=>$this->input->post('city')),'cities');
            $locationName = $this->properties_model->getWhere(array('id'=>$this->input->post('location')),'locations');
            $builderName = str_replace(" ","-",strtolower($builderName[0]->name));
            $cityName = str_replace(" ","-",strtolower($cityName[0]->name));
            $locationName = str_replace(" ","-",strtolower($locationName[0]->name));
            $data = array(
                        'builder_id' => $this->input->post('builder'),
                        'location_id' => $this->input->post('location'),
                        'title' => $this->input->post('title'),
                        'meta_title' => $this->input->post('meta_title'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'meta_desc' => $this->input->post('meta_desc'),
                        'area' => $this->input->post('area'),
                        'budget' => $this->input->post('budget'),
                        'property_type_id' => $this->input->post('type'),
                        'city_id' => $this->input->post('city'),
                        'alt' => $this->input->post('alt'),
                        'image' => $image,
                        'alt_title'=>$this->input->post('alt_title'),
                        'image_desc'=>$this->input->post('image_description'),
                        'gallery_alt'=>$this->input->post('gallery_alt'),
                        'gallery_desc'=>$this->input->post('gallery_description'),
                        'brochure_alt'=>$this->input->post('brochure_alt'),
                        'brochure_desc'=>$this->input->post('brochure_description'),
                        'floor_alt'=>$this->input->post('floor_alt'),
                        'floor_desc'=>$this->input->post('floor_description'),
                        'location_alt'=>$this->input->post('location_alt'),
                        'location_desc'=>$this->input->post('location_description'),
                        'master_alt'=>$this->input->post('master_alt'),
                        'master_desc'=>$this->input->post('master_description'),
                        'construction_alt'=>$this->input->post('construction_alt'),
                        'construction_desc'=>$this->input->post('construction_description'),
                        'elevations_alt'=>$this->input->post('elevations_alt'),
                        'elevations_desc'=>$this->input->post('elevations_description'),
                        'rera_number'=>$this->input->post('rera_number'),
                        'slug' => $slug,
                        'date_added' => date('Y-m-d'),
                        /**  Additional property details added on 02/02/2018 by Vineeth Krishnan */
                        'uid' =>/* $this->input->post('uid')*/2019,
                        'rera_number' => $this->input->post('rera_number'),
                        'issue_date' => $this->input->post('issue_date'),
                        'property_for' => $this->input->post('property_for'),
                        'price_per_unit' => $this->input->post('price_per_unit'),
                        'build' => $this->input->post('build'),
                        'face' => $this->input->post('face'),
                        'builtup_area' => $this->input->post('builtup_area'),
                        'builtup_area_unit' => $this->input->post('builtup_area_unit'),
                        'carpet_area' => $this->input->post('carpet_area'),
                        'carpet_area_unit' => $this->input->post('carpet_area_unit'),
                        'plot_area' => $this->input->post('plot_area'),
                        'plot_area_unit' => $this->input->post('plot_area_unit'),
                        'lat' => $this->input->post('lat'),
                        'lng' => $this->input->post('lng'),
                        'bathrooms' => $this->input->post('bathrooms'),
                        'bedrooms' => $this->input->post('bedrooms'),
                        'units' => $this->input->post('units'),
                        'floors' => $this->input->post('floors'),
                        'towers' => $this->input->post('towers'),
                        'facades' => $this->input->post('facades'),
                        'property_status_id' => $this->input->post('property_status_id'),
                        'description' => $this->input->post('description'),
                        'usp' => $this->input->post('usp'),
                        'facebook' => $this->input->post('facebook'),
                        'twitter' => $this->input->post('twitter'),
                        'google' => $this->input->post('google'),
                        'possession_date' => $this->input->post('possession_date'),
                        'walkthrough' => $this->input->post('walkthrough'),
                        'ref_domain' => $this->input->post('ref_domain'),
                        /** Additional properties ends here */
                    );
                    $prop = $data;
                    $amenities = $this->input->post('amenities');
                    $b=array();
                    if(isset($amenities))
                    {
                    foreach ($amenities as $am) {
                      $b['amenities'.($am)]=$am;
                      
                    }
                    }
                    
                    $this->session->set_flashdata($data);
                    $this->session->set_userdata($b);
                    $this->session->set_userdata($prop);
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('area', 'Area', 'trim|required');
            $this->form_validation->set_rules('amenities[]', 'Amenities', 'trim|required');
            $this->form_validation->set_rules('budget', 'Budget', 'trim|required');

            if ($this->form_validation->run() != false) {
                $slug = strtolower(url_title($this->input->post('title')));
                $check = $this->properties_model->getOneWhere(array('slug' => $slug), 'properties');
                if ($check) {
                    $slug = strtolower(url_title($this->input->post('title'))) . uniqid(5);
                }
                
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/properties/add');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                 
 $data = array(
                        'builder_id' => $this->input->post('builder'),
                        'location_id' => $this->input->post('location'),
                        'title' => $this->input->post('title'),
                        'meta_title' => $this->input->post('meta_title'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'meta_desc' => $this->input->post('meta_desc'),
                        'area' => $this->input->post('area'),
                        'budget' => $this->input->post('budget'),
                        'property_type_id' => $this->input->post('type'),
                        'city_id' => $this->input->post('city'),
                        'alt' => $this->input->post('alt'),
                        'image' => $image,
                        'alt_title'=>$this->input->post('alt_title'),
                        'image_desc'=>$this->input->post('image_description'),
                        'gallery_alt'=>$this->input->post('gallery_alt'),
                        'gallery_desc'=>$this->input->post('gallery_description'),
                        'brochure_alt'=>$this->input->post('brochure_alt'),
                        'brochure_desc'=>$this->input->post('brochure_description'),
                        'floor_alt'=>$this->input->post('floor_alt'),
                        'floor_desc'=>$this->input->post('floor_description'),
                        'location_alt'=>$this->input->post('location_alt'),
                        'location_desc'=>$this->input->post('location_description'),
                        'master_alt'=>$this->input->post('master_alt'),
                        'master_desc'=>$this->input->post('master_description'),
                        'construction_alt'=>$this->input->post('construction_alt'),
                        'construction_desc'=>$this->input->post('construction_description'),
                        'elevations_alt'=>$this->input->post('elevations_alt'),
                        'elevations_desc'=>$this->input->post('elevations_description'),
                        'rera_number'=>$this->input->post('rera_number'),
                        'slug' => $slug,
                        'date_added' => date('Y-m-d'),
                        /**  Additional property details added on 02/02/2018 by Vineeth Krishnan */
                        'uid' =>/* $this->input->post('uid')*/2019,
                        'rera_number' => $this->input->post('rera_number'),
                        'issue_date' => $this->input->post('issue_date'),
                        'property_for' => $this->input->post('property_for'),
                        'price_per_unit' => $this->input->post('price_per_unit'),
                        'build' => $this->input->post('build'),
                        'face' => $this->input->post('face'),
                        'builtup_area' => $this->input->post('builtup_area'),
                        'builtup_area_unit' => $this->input->post('builtup_area_unit'),
                        'carpet_area' => $this->input->post('carpet_area'),
                        'carpet_area_unit' => $this->input->post('carpet_area_unit'),
                        'plot_area' => $this->input->post('plot_area'),
                        'plot_area_unit' => $this->input->post('plot_area_unit'),
                        'lat' => $this->input->post('lat'),
                        'lng' => $this->input->post('lng'),
                        'bathrooms' => $this->input->post('bathrooms'),
                        'bedrooms' => $this->input->post('bedrooms'),
                        'units' => $this->input->post('units'),
                        'floors' => $this->input->post('floors'),
                        'towers' => $this->input->post('towers'),
                        'facades' => $this->input->post('facades'),
                        'property_status_id' => $this->input->post('property_status_id'),
                        'description' => $this->input->post('description'),
                        'usp' => $this->input->post('usp'),
                        'facebook' => $this->input->post('facebook'),
                        'twitter' => $this->input->post('twitter'),
                        'google' => $this->input->post('google'),
                        'possession_date' => $this->input->post('possession_date'),
                        'walkthrough' => $this->input->post('walkthrough'),
                        /** Additional properties ends here */
                    );
if (isset($_FILES) && isset($_FILES["map"]['tmp_name']) && $_FILES["map"]['tmp_name']) {
    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/map/';
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_type = '*';
    $config = $this->set_upload_options($path, $file_type);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('map')) {
        $data['map'] = $this->upload->data('file_name');
    }
}

if (isset($_FILES) && isset($_FILES["brochure"]['tmp_name']) && $_FILES["brochure"]['tmp_name']) {
    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/brochure/';
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_type = '*';
    $config = $this->set_upload_options($path, $file_type);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('brochure')) {
        $data['brochure'] = $this->upload->data('file_name');
    }
}



$property_id = $this->properties_model->insertRow($data, 'properties'); 
                if (isset($_FILES) && isset($_FILES["banners"]['tmp_name']) && $_FILES["banners"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug ;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                     $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('banners')) { 
                        $banner = $this->upload->data('file_name');
                    }
                    //$this->properties_model->updateWhere(array('property_id' => $id), $data1, 'properties');
                    $data1 = array(
                    "property_id"=>$property_id,
                    "banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$banner
                    );
                    $this->properties_model->insertRow($data1, 'property_desktop_banners');
                }
                if (isset($_FILES) && isset($_FILES["mobilebanners"]['tmp_name']) && $_FILES["mobilebanners"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug ;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                     $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('mobilebanners')) { 
                        $mobilebanners = $this->upload->data('file_name');
                    }
                     $data1 = array(
                    "property_id"=>$property_id,
                    "mobile_banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$mobilebanners
                    );
                    $this->properties_model->insertRow($data1, 'property_mobile_banners');

                }
                if (isset($_FILES) && isset($_FILES["logo_1"]['tmp_name']) && $_FILES["logo_1"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/logos/';
                   // print_r($this->upload->data());die;
                    $this->properties_model->insertRow(array(
                            'property_id' => $property_id,
                            'logo_1' => $this->upload->data('file_name'),
                        ), 'property_logo');
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('logo_1')) {
                        $data['logo_1'] = $this->upload->data('file_name');
                    }
                }

/** attach the specifications if any */
if ($this->input->post('specification')) {
    foreach ($this->input->post('specification') as $id => $specification) {
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'specification_id' => $id,
            'content' => $specification,
            'created_at' => date('Y-m-d H:i:s')
        ), 'property_specification_relation');
    }
}

$amenities = $this->input->post('amenities');
if ($amenities) {
    foreach ($amenities as $amenity) {
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'amenity_id' => $amenity
        ), 'property_amenities');
    }
}

/** Gallery Images */
$gallery = $this->input->post('images');
if ($gallery) {
    foreach ($gallery as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/images/' . end($exploded)
        ), 'property_images');
        $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/images/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
                    
        rename($image, 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/images/'.end($exploded));
    }
}


/** Floor Plan Images */
$floorImages = $this->input->post('floorimages');
if ($floorImages) {
    foreach ($floorImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/floorimages/' . end($exploded)
        ), 'property_floor_plans');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/floorimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/floorimages/' . end($exploded));
    }
}

/** Master Plan Images */
$masterImages = $this->input->post('masterimages');
if ($masterImages) {
    foreach ($masterImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'image' => 'uploads/'.$cityName."/".$builderName."/" . $slug . '/masterimages/' . end($exploded)
        ), 'property_master_plans');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/masterimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/masterimages/' . end($exploded));
    }
}

/** Construction Update Images */
$constructionImages = $this->input->post('constructionimages');
if ($constructionImages) {
    foreach ($constructionImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $property_id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/constructionimages/' . end($exploded)
        ), 'property_construction_updates');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/constructionimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/constructionimages/' . end($exploded));
    }
}

                    /** Construction Update Images
                    $walkthroughImages = $this->input->post('walkthroughimages');
                    if ($walkthroughImages) {
                        foreach ($walkthroughImages as $image) {
                            $exploded = explode('/', $image);
                            $this->properties_model->insertRow(array(
                                'property_id' => $property_id,
                                'image' => 'uploads/' . $slug . '/' . end($exploded)
                            ), 'property_project_walkthrough');
                            rename($image, 'uploads/' . $slug . '/' . end($exploded));
                        }
                    }
                    */
                    /** Elevations Images */
                    $elevationsImages = $this->input->post('elevationsimages');

                    if ($elevationsImages) {
                        foreach ($elevationsImages as $image) {
                            $exploded = explode('/', $image);
                            $this->properties_model->insertRow(array(
                                'property_id' => $property_id,
                                'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/elevationsimages/' . end($exploded)
                            ), 'property_elevations');
                             $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/elevationsimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
                            rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/elevationsimages/' . end($exploded));
                        }
                    }


                    // add property flat types
                    $property_flat_types = $this->input->post('flat_type');
                    if (isset($property_flat_types) && is_array($property_flat_types)) {
                        foreach ($property_flat_types as $flat_type_id => $property_flat_type) {
                            if (isset($property_flat_type['name']) && $property_flat_type['name']) {
                                foreach ($property_flat_type['name'] as $index => $item) {
                                    if (isset($property_flat_type['name'][$index]) && $property_flat_type['name'][$index]) {
                                        $flatData = array(
                                            'property_id' => $property_id,
                                            'flat_type_id' => $flat_type_id,
                                            'name' => isset($property_flat_type['name'][$index]) ? $property_flat_type['name'][$index] : "",
                                            'size' => isset($property_flat_type['size'][$index]) ? $property_flat_type['size'][$index] : 0,
                                            'unit' => isset($property_flat_type['unit'][$index]) ? $property_flat_type['unit'][$index] : "Sqft",
                                            'price' => isset($property_flat_type['price'][$index]) ? $property_flat_type['price'][$index] : 0,
                                            'carpet_area' => isset($property_flat_type['carpet_area'][$index]) ? $property_flat_type['carpet_area'][$index] : 0,
                                            'price_on_request' => isset($property_flat_type['price_on_request'][$index]) ? 1 : 0
                                        );
                                        $flatData['total'] = floatval($flatData['size']) * floatval($flatData['price']);
                                        $this->properties_model->insertRow($flatData, 'property_flat_types');
                                    }
                                }
                            }
                        }
                    }


                    if ($this->input->post('fq')) {
                        foreach ($this->input->post('fa') as $fq) {
                            $this->properties_model->insertRow(array(
                                'p_id' => $property_id,
                                'fq' => $fq,
                                'fa' => $this->input->post('fa'), 
                            ), 'faq');
                        }
                    }
                   
                    foreach ($prop as $am => $value) {
                          $this->session->unset_userdata($am);
                        }
                    foreach ($b as $am => $value) {
                       $this->session->unset_userdata($am);
                    }
                    $this->session->set_flashdata('message', 'Property added Successfully');
                    if($this->session->set_flashdata('message', 'Property added Successfully'))
                    
                    redirect('admin/properties');
                } else {
                    $this->session->set_flashdata('error', 'Image is mandatory');
                    redirect('admin/properties/add');
                }
            }
        }

        $this->data['property_types'] = $this->properties_model->getWhere(array('status' => 1), 'property_types');
        $this->data['cities'] = $this->properties_model->getWhere(array('status' => 1), 'cities');
        $this->data['builders'] = $this->properties_model->getWhere(array('status' => 1), 'builders');
        $this->data['amenities'] = $this->properties_model->getWhere(array('status' => 1), 'amenities');
        // setup page header data
        $this->set_title(lang('properties title add_property'))
        ->add_external_js(array(
            '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
            '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
            base_url($this->settings->themes_folder . '/admin/js/bootstrap-datepicker.js'),
            base_url($this->settings->themes_folder . '/admin/js/properties.js')
        ))
        ->add_external_css(array(
            base_url($this->settings->themes_folder . '/admin/css/bootstrap-datepicker.css')
        ));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/properties/add', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function edit($id)
    {
        $blog = $this->properties_model->getProperty($id);
        $builderName ='';
        $cityName = '';
        $locationName ='';
        if (!$blog) {
            //redirect('admin/properties');
            echo "Property Doesn't exist";die();
        }

        $blog->flat_types = $this->properties_model->getPropertyFlatType(null, $id);

        if ($this->input->post()) {
            $builderName = $this->properties_model->getWhere(array('id'=>($this->input->post('builder') ? $this->input->post('builder') : $blog->builder_id)),'builders');
            $cityName = $this->properties_model->getWhere(array('id'=>$this->input->post('city') ? $this->input->post('city') : $blog->city_id),'cities');
            $locationName = $this->properties_model->getWhere(array('id'=>$this->input->post('location') ? $this->input->post('location') : $blog->location_id),'locations');
            $builderName = str_replace(" ","-",strtolower($builderName[0]->name));
            $cityName = str_replace(" ","-",strtolower($cityName[0]->name));
            $locationName = str_replace(" ","-",strtolower($locationName[0]->name));
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('area', 'Area', 'trim|required');
            $this->form_validation->set_rules('amenities[]', 'Amenities', 'trim|required');
            $this->form_validation->set_rules('budget', 'Budget', 'trim|required');
           // $this->form_validation->set_rules('uid', 'Property Unique ID #', 'trim|required');

            if ($this->form_validation->run() != false) {

                $slug = $blog->slug;

                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        //redirect('admin/properties');
                        echo "Unsupported file please contact Developer";
                    } else {
                        unlink('uploads/'.$cityName."/".$builderName."/"  . $slug . '/' . $blog->image);
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $blog->image;
                }
                $data = array(
                    'builder_id' => $this->input->post('builder') ? $this->input->post('builder') : $blog->builder_id,
                    'location_id' => $this->input->post('location') ? $this->input->post('location') : $blog->location_id,
                    'title' => $this->input->post('title') ? $this->input->post('title') : $blog->title,
                    'slug' => $slug,
                    'meta_title' => $this->input->post('meta_title') ? $this->input->post('meta_title') : $blog->meta_title,
                    'meta_keywords' => $this->input->post('meta_keywords') ? $this->input->post('meta_keywords') : $blog->meta_keywords,
                    'meta_desc' => $this->input->post('meta_desc') ? $this->input->post('meta_desc') : $blog->meta_desc,
                    'area' => $this->input->post('area') ? $this->input->post('area') : $blog->area,
                    'budget' => $this->input->post('budget') ? $this->input->post('budget') : $blog->budget,
                    'property_type_id' => $this->input->post('type') ? $this->input->post('type') : $blog->property_type_id,
                    'city_id' => $this->input->post('city') ? $this->input->post('city') : $blog->city_id,
                    'alt' => $this->input->post('alt') ? $this->input->post('alt') : $blog->alt,
                    'image' => $image,
                    'alt_title'=>$this->input->post('alt_title') ? $this->input->post('alt_title') : $blog->alt_title,
                    'image_desc'=>$this->input->post('image_description')? $this->input->post('image_description') : $blog->image_desc,
                    'gallery_alt'=>$this->input->post('gallery_alt') ? $this->input->post('gallery_alt') : $blog->gallery_alt,
                    'gallery_desc'=>$this->input->post('gallery_description')? $this->input->post('gallery_description') : $blog->gallery_desc,
                    'brochure_alt'=>$this->input->post('brochure_alt') ? $this->input->post('brochure_alt') : $blog->brochure_alt,
                    'brochure_desc'=>$this->input->post('brochure_description')? $this->input->post('brochure_description') : $blog->brochure_desc,
                    
                    'floor_alt'=>$this->input->post('floor_alt') ? $this->input->post('floor_alt') : $blog->floor_alt,
                    'floor_desc'=>$this->input->post('floor_description')? $this->input->post('floor_description') : $blog->floor_desc,
                    'location_alt'=>$this->input->post('location_alt') ? $this->input->post('location_alt') : $blog->location_alt,
                    'location_desc'=>$this->input->post('location_description')? $this->input->post('location_description') : $blog->location_desc,
                    'master_alt'=>$this->input->post('master_alt') ? $this->input->post('master_alt') : $blog->master_alt,
                    'master_desc'=>$this->input->post('master_description')? $this->input->post('master_description') : $blog->master_desc,
                    'construction_alt'=>$this->input->post('construction_alt') ? $this->input->post('construction_alt') : $blog->construction_alt,
                    'construction_desc'=>$this->input->post('construction_description')? $this->input->post('construction_description') : $blog->construction_desc,
                    'elevations_alt'=>$this->input->post('elevations_alt') ? $this->input->post('elevations_alt') : $blog->elevations_alt,
                    'elevations_desc'=>$this->input->post('elevations_description')? $this->input->post('elevations_description') : $blog->elevations_desc,
                    /**  Additional property details added on 02/02/2018 by Vineeth Krishnan */
                    'uid' => /*$this->input->post('uid') ? $this->input->post('uid') : $blog->uid*/2019,
                    'rera_number' => $this->input->post('rera_number') ? $this->input->post('rera_number') : $blog->rera_number,
                    'issue_date' => $this->input->post('issue_date') ? $this->input->post('issue_date') : $blog->issue_date,
                    'property_for' => $this->input->post('property_for') ? $this->input->post('property_for') : $blog->property_for,
                    'price_per_unit' => $this->input->post('price_per_unit') ? $this->input->post('price_per_unit') : $blog->price_per_unit,
                    'build' => $this->input->post('build') ? $this->input->post('build') : $blog->build,
                    'face' => $this->input->post('face') ? $this->input->post('face') : $blog->face,
                    'builtup_area' => $this->input->post('builtup_area') ? $this->input->post('builtup_area') : $blog->builtup_area,
                    'builtup_area_unit' => $this->input->post('builtup_area_unit') ? $this->input->post('builtup_area_unit') : $blog->builtup_area_unit,
                    'carpet_area' => $this->input->post('carpet_area') ? $this->input->post('carpet_area') : $blog->carpet_area,
                    'carpet_area_unit' => $this->input->post('carpet_area_unit') ? $this->input->post('carpet_area_unit') : $blog->carpet_area_unit,
                    'plot_area' => $this->input->post('plot_area') ? $this->input->post('plot_area') : $blog->plot_area,
                    'plot_area_unit' => $this->input->post('plot_area_unit') ? $this->input->post('plot_area_unit') : $blog->plot_area_unit,
                    'lat' => $this->input->post('lat') ? $this->input->post('lat') : $blog->lat,
                    'lng' => $this->input->post('lng') ? $this->input->post('lng') : $blog->lng,
                    'bathrooms' => $this->input->post('bathrooms') ? $this->input->post('bathrooms') : $blog->bathrooms,
                    'bedrooms' => $this->input->post('bedrooms') ? $this->input->post('bedrooms') : $blog->bedrooms,
                    'units' => $this->input->post('units') ? $this->input->post('units') : $blog->units,
                    'floors' => $this->input->post('floors') ? $this->input->post('floors') : $blog->floors,
                    'towers' => $this->input->post('towers') ? $this->input->post('towers') : $blog->towers,
                    'facades' => $this->input->post('facades') ? $this->input->post('facades') : $blog->facades,
                    'property_status_id' => $this->input->post('property_status_id') ? $this->input->post('property_status_id') : $blog->property_status_id,
                    'description' => $this->input->post('description') ? $this->input->post('description') : $blog->description,
                    'usp' => $this->input->post('usp') ? $this->input->post('usp') : $blog->usp,
                    'facebook' => $this->input->post('facebook') ? $this->input->post('facebook') : $blog->facebook,
                    'twitter' => $this->input->post('twitter') ? $this->input->post('twitter') : $blog->twitter,
                    'google' => $this->input->post('google') ? $this->input->post('google') : $blog->google,
                    'possession_date' => $this->input->post('possession_date') ? $this->input->post('possession_date') : $blog->possession_date,
                    'walkthrough' => $this->input->post('walkthrough') ? $this->input->post('walkthrough') :  $blog->walkthrough,
                    'ref_domain' => $this->input->post('ref_domain') ? $this->input->post('ref_domain') : $blog->ref_domain,
                    /** Additional properties ends here */
                );
$this->session->set_flashdata($data);
$this->properties_model->updateWhere(array('id' => $id), $data, 'properties');
$img = $this->properties_model->getWhere(array("property_id"=>$id),"property_desktop_banners");

if (isset($_FILES) && isset($_FILES["banners"]['tmp_name']) && $_FILES["banners"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug ;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                     $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('banners')) { 
                        $banner = $this->upload->data('file_name');
                    }
                    //$this->properties_model->updateWhere(array('property_id' => $id), $data1, 'properties');
                    $data1 = array(
                    "property_id"=>$id,
                    "banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$banner
                    );
                    $data2 =  array( 
                    "banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$banner
                    );
                    if(empty($img))
                    $this->properties_model->insertRow($data1, 'property_desktop_banners');
                    else
                    $this->properties_model->updateRow($id, $data2, 'property_id','property_desktop_banners');
                }
                if (isset($_FILES) && isset($_FILES["mobilebanners"]['tmp_name']) && $_FILES["mobilebanners"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug ;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                     $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('mobilebanners')) { 
                        $mobilebanners = $this->upload->data('file_name');
                    }
                     $data1 = array(
                    "property_id"=>$id,
                    "mobile_banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$mobilebanners
                    );
                     $data2 =  array( 
                   "mobile_banner_path" =>"uploads/".$cityName."/".$builderName."/" .$slug."/".$mobilebanners
                    );
                     if(empty($img))
                    $this->properties_model->insertRow($data1, 'property_mobile_banners');
                    else
                    $this->properties_model->updateRow($id, $data2, 'property_id','property_mobile_banners');

                }
if (isset($_FILES) && isset($_FILES["map"]['tmp_name']) && $_FILES["map"]['tmp_name']) {
    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/map/';
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_type = '*';
    $config = $this->set_upload_options($path, $file_type);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('map')) {
        if ($blog->map && is_file(FCPATH . "uploads/$slug/map/$blog->map")) {
            @unlink(FCPATH . "uploads/$slug/map/$blog->map");
        }
        $data['map'] = $this->upload->data('file_name');
        //print_r($data['map']);die;
        $this->properties_model->update_map($id,$data['map'] );
    }
}

 
if (isset($_FILES) && isset($_FILES["brochure"]['tmp_name']) && $_FILES["brochure"]['tmp_name']) {
    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/brochure/';
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_type = '*';
    $config = $this->set_upload_options($path, $file_type);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('brochure')) {
        if ($blog->brochure && is_file(FCPATH . "uploads/$slug/brochure/$blog->brochure")) {
            @unlink(FCPATH . "uploads/$slug/brochure/$blog->brochure");
        }
        $data['brochure'] = $this->upload->data('file_name');
    }
}

$this->properties_model->deleteWhere(array('property_id' => $id), 'property_amenities');

$amenities = $this->input->post('amenities');
if ($amenities) {
    foreach ($amenities as $amenity) {
        $this->properties_model->insertRow(array('property_id' => $id, 'amenity_id' => $amenity),
            'property_amenities');
    }
}


$gallery = $this->input->post('images');
if ($gallery) {
    foreach ($gallery as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/images/' . end($exploded)
        ), 'property_images');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/images/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/' . $slug . '/' . end($exploded));
    }
}

/**  Additional property details added on 02/02/2018 by Vineeth Krishnan */

/** Floor Plan Images */
$floorImages = $this->input->post('floorimages');
if ($floorImages) {
    foreach ($floorImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/floorimages/' . end($exploded)
        ), 'property_floor_plans');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/floorimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/floorimages/' . end($exploded));
    }
}

/** Master Plan Images */
$masterImages = $this->input->post('masterimages');
if ($masterImages) {
    foreach ($masterImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/masterimages/' . end($exploded)
        ), 'property_master_plans');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/masterimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/masterimages/' . end($exploded));
    }
}

/**  Additional property details added on 19/03/2018 by Vineeth Krishnan */

/** Construction Updates Images */
$constructionImages = $this->input->post('constructionimages');
if ($constructionImages) {
    foreach ($constructionImages as $image) {
        $exploded = explode('/', $image);
        $this->properties_model->insertRow(array(
            'property_id' => $id,
            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/constructionimages/' . end($exploded)
        ), 'property_construction_updates');
         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/constructionimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/constructionimages/' . end($exploded));
    }
}
                /** Project Walkthrough Images
                $walkthroughImages = $this->input->post('walkthroughimages');
                if ($walkthroughImages) {
                    foreach ($walkthroughImages as $image) {
                        $exploded = explode('/', $image);
                        $this->properties_model->insertRow(array(
                            'property_id' => $id,
                            'image' => 'uploads/' . $slug . '/' . end($exploded)
                        ), 'property_project_walkthrough');
                        rename($image, 'uploads/' . $slug . '/' . end($exploded));
                    }
                }
                */
                /** Elevations Images */

$img = $this->properties_model->getWhere(array("property_id"=>$id),"property_logo");

                if (isset($_FILES) && isset($_FILES["logo_1"]['tmp_name']) && $_FILES["logo_1"]['tmp_name']) {
                    $path = './uploads/'.$cityName."/".$builderName."/" . $slug . '/logos/';
                   // print_r($this->upload->data());die;
                   
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        } 
                    $file_type = '*';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('logo_1')) {
                        $data['logo_1'] = $this->upload->data('file_name');
                    } 
                     if(empty($img))
                    $this->properties_model->insertRow(array(
                            'property_id' => $id,
                            'logo_1' => $this->upload->data('file_name'),
                        ), 'property_logo');
                    else
                    $this->properties_model->updateRow($id, array("logo_1"=>$this->upload->data('file_name')), 'property_id','property_logo');
                     
                }
                $elevationsImages = $this->input->post('elevationsimages');
                if ($elevationsImages) {
                    foreach ($elevationsImages as $image) {
                        $exploded = explode('/', $image);
                        $this->properties_model->insertRow(array(
                            'property_id' => $id,
                            'image' => 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/elevationsimages/' . end($exploded)
                        ), 'property_elevations');
                         $path = 'uploads/'. $cityName .'/'.$builderName .'/'. $slug .'/elevationsimages/';
        if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                        }
                        rename($image, 'uploads/'.$cityName."/".$builderName."/"  . $slug . '/elevationsimages/' . end($exploded));
                    }
                }


                /** detach all specifications */
                $this->properties_model->deleteWhere(array('property_id' => $id), 'property_specification_relation');
                /** re-attach the specifications if any */
                if ($this->input->post('specification')) {
                    foreach ($this->input->post('specification') as $spec_id => $specification) {
                        $this->properties_model->insertRow(array(
                            'property_id' => $id,
                            'specification_id' => $spec_id,
                            'content' => $specification,
                            'created_at' => date('Y-m-d H:i:s')
                        ), 'property_specification_relation');
                    }
                }
                // print_r($this->input->post('fq'));
                // print_r($this->input->post('fa'));
                if ($this->input->post('fq')) {
                    $a=0;
                        foreach ($this->input->post('fq') as $fq) {
                            if($fq!='')
                            {
                            $this->properties_model->insertRow(array(
                                'p_id' => $id,
                                'fq' => $fq,
                                'fa' => $this->input->post('fa')[$a], 
                            ), 'faq');
                            }
                            $a++;
                        }
                        $a=0;
                    } 

                /**
                 * Detach and re-attach property flat types to update with new data
                 */
                $this->properties_model->deleteWhere(array('property_id' => $id), 'property_flat_types');
                $property_flat_types = $this->input->post('flat_type');
                if (isset($property_flat_types) && is_array($property_flat_types)) {
                    foreach ($property_flat_types as $flat_type_id => $property_flat_type) {
                        if (isset($property_flat_type['name']) && $property_flat_type['name']) {
                            foreach ($property_flat_type['name'] as $index => $item) {
                                if (isset($property_flat_type['name'][$index]) && $property_flat_type['name'][$index]) {
                                    $flatData = array(
                                        'property_id' => $id,
                                        'flat_type_id' => $flat_type_id,
                                        'name' => isset($property_flat_type['name'][$index]) ? $property_flat_type['name'][$index] : "",
                                        'size' => isset($property_flat_type['size'][$index]) ? $property_flat_type['size'][$index] : 0,
                                        'unit' => isset($property_flat_type['unit'][$index]) ? $property_flat_type['unit'][$index] : "Sqft",
                                        'price' => isset($property_flat_type['price'][$index]) ? $property_flat_type['price'][$index] : 0,
                                        'carpet_area' => isset($property_flat_type['carpet_area'][$index]) ? $property_flat_type['carpet_area'][$index] : 0,
                                        'price_on_request' => isset($property_flat_type['price_on_request'][$index]) ? 1 : 0
                                    );
                                    $flatData['total'] = floatval($flatData['size']) * floatval($flatData['price']);
                                    $this->properties_model->insertRow($flatData, 'property_flat_types');
                                }
                            }
                        }
                    }
                }

                /** Additional properties ends here */

                $this->session->set_flashdata('message', 'Property Updated Successfully');
                redirect('admin/properties');
            }
        }
        $this->data['property_types'] = $this->properties_model->getWhere(array('status' => 1), 'property_types');
        $this->data['cities'] = $this->properties_model->getWhere(array('status' => 1), 'cities');
        $this->data['locations'] = $this->properties_model->getWhere(array('city_id' => $blog->city_id), 'locations');
        $this->data['builders'] = $this->properties_model->getWhere(array('status' => 1), 'builders');
        $this->data['amenities'] = $this->properties_model->getWhere(array('status' => 1), 'amenities');
        $this->data['faq'] = $this->properties_model->getWhere(array('p_id' => $id), 'faq');
        $property = $this->properties_model->getProperty($id);
        $banners=$this->properties_model->getWhere(array('property_id' => $property->id),
                                                'property_desktop_banners');
        $property->amenities = $this->properties_model->getWhere(array('property_id' => $id), 'property_amenities');
        $this->data['property'] = $property;
        // setup page header data
        $this->set_title(lang('properties title edit_property'))
        ->add_external_js(array(
            '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
            '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
            base_url($this->settings->themes_folder . '/admin/js/bootstrap-datepicker.js'),
            base_url($this->settings->themes_folder . '/admin/js/property_edit.js')
        ))
        ->add_external_css(array(
            base_url($this->settings->themes_folder . '/admin/css/bootstrap-datepicker.css')
        ));;
        $data = $this->includes;
        // set content data
        $content_data = $this->data;
        $data['content'] = $this->load->view('admin/properties/edit', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function delete($id)
    {

        $get_property = $this->properties_model->getOneWhere(array('id' => $id), 'properties');
        if (!$get_property) {
            redirect(site_url());
        } else {
            unlink('uploads/' . $get_property->slug . '/' . $get_property->image);
            $this->properties_model->deleteWhere(array('id' => $id), 'properties');
            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_amenities');
            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_specification_relation');
            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_flat_types');
            /**
            $images = $this->properties_model->getWhere(array('property_id' => $id), 'property_images');
            foreach ($images as $image) {
                @unlink($image->image);
            }

            foreach ($this->properties_model->getWhere(array('property_id' => $id), 'property_floor_plans') as $item) {
                @unlink($image->image);
            }

            foreach ($this->properties_model->getWhere(array('property_id' => $id), 'property_master_plans') as $item) {
                @unlink($image->image);
            }
             **/

            /** Remove directory with content */
            $dir = 'uploads/' . $get_property->slug;
            if (is_dir($dir)){
                $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
                $files = new RecursiveIteratorIterator($it,
                    RecursiveIteratorIterator::CHILD_FIRST);
                foreach($files as $file) {
                    if ($file->isDir()){
                        rmdir($file->getRealPath());
                    } else {
                        unlink($file->getRealPath());
                    }
                }
                rmdir($dir);
            }

            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_images');
            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_floor_plans');
            $this->properties_model->deleteWhere(array('property_id' => $id), 'property_master_plans');
            $this->session->set_flashdata('message', 'Property ' . $get_property->title . ' Deleted Successfully');
            redirect(site_url('admin/properties'));
        }
    }

    public function get_images($id, $table_of_image = 'property_images')
    {
        $result = array();
        $images = $this->properties_model->getWhere(array('property_id' => $id), $table_of_image);
        foreach ($images as $key => $file) { //get an array which has the names of all the files and loop through it 
            if ($file->image && is_file($file->image)){
                $obj['name'] = basename($file->image); //get the filename in array
                $obj['path'] = base_url($file->image);
                $obj['image_id'] = $file->id;
                $obj['size'] = filesize("./" . $file->image); //get the flesize in array
                $result[$key] = $obj ? $obj : ''; // copy it to another array
            }
        }
        echo json_encode($result);
    }

    public function upload_files($folder = 'properties')
    {
        if (empty($_FILES['file']['name'])) {

        } else {
            if ($_FILES['file']['error'] == 0) {
                $filetype = null;
                //upload and update the file
                $config['upload_path'] = './uploads/'.$cityName."/".$builderName."/" . $folder . '/';
                $config['max_size'] = '102428800';
                $type = $_FILES['file']['type'];
                // switch ($type) {
                //     case 'image/gif':
                //     case 'image/jpg':
                //     case 'image/png':
                //     case 'image/jpeg':
                //     {
                //         $filetype = 0;
                //         $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //         break;
                //     }
                // }
                $config['allowed_types'] = '*';
                $config['overwrite'] = false;
                $config['remove_spaces'] = true;
                if (!file_exists('./uploads/'.$cityName."/".$builderName."/" . $folder)) {
                    if (!mkdir('./uploads/'.$cityName."/".$builderName."/" . $folder . '/', 0755, true)) {

                    }
                }
                $microtime = microtime(true) * 10000;
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file', $microtime)) {
                    echo json_encode(array(
                        'type' => $filetype,
                        'path' => 'uploads/' . $folder . '/' . $this->upload->file_name
                    ));
                }
            }
        }
        exit;
    }

    public function delete_files($table_of_image = 'property_images')
    {
        $path = $this->input->post('path');
        $this->properties_model->deleteWhere(array('image' => $path), $table_of_image);
        echo unlink('./' . $path);
    }

    public function get_locations()
    {
        $id = $this->input->post('id');
        $locations = $this->properties_model->getWhere(array('city_id' => $id), 'locations');
        echo json_encode($locations);
    }

    public function manage_highlight()
    {
        $id = $this->input->post('id');
        $locations = $this->properties_model->updateWhere(array('id' => $id),
            array('highlight' => $this->input->post('val')), 'properties');
        echo true;
    }
        public function manage_best_deal()
    {
        $id = $this->input->post('id');
        $locations = $this->properties_model->updateWhere(array('id' => $id),
            array('best_deal' => $this->input->post('val')), 'properties');
        //echo $this->db->last_query();
        echo true;
    }

    public function favourites($id)
    {
        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/properties/favourites/index');
        $uri_segment = 5;
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->user_favourites(0, 0, true, $content, $id);

        $this->data['favourites'] = $this->properties_model->user_favourites($perpage, $page, false, $content, $id);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('favourites title favourites'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/properties/favourites', $content_data, true);
        $this->load->view($this->template, $data);
    }
    public function DeleteLocation()
     {
        $id=$this->input->post('id'); 
        $img_src = $this->input->post('path');
         $data['map'] = '';
        echo $id; 
        $bool = $this->properties_model->map_delete($id,$data);
        delete_files($img_src);
        
     }


}
