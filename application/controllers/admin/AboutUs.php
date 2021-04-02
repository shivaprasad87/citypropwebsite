<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends Admin_Controller {

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

        // load the language files
        $this->lang->load('aboutUs');

        // load the aboutUs model
        $this->load->model('aboutUs_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/aboutUs'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "created");
        define('DEFAULT_DIR', "DESC");

        // use the url in session (if available) to return to the previous filter/sorted/paginated list
        if ($this->session->userdata(REFERRER))
        {
            $this->_redirect_url = $this->session->userdata(REFERRER);
        }
        else
        {
            $this->_redirect_url = THIS_URL;
        }
    }

    public function index(){

        if ($this->input->post()) {
            // save if there is any work with fun images
            $uploadedImages =  array();
            if (isset($_FILES['upload_closer_image']) && isset($_FILES['upload_closer_image']) && $_FILES['upload_closer_image']['name']){
                $folder = 'about_us/closer_look';
                if (!file_exists('./uploads/'.$folder)) {
                    if (!mkdir('./uploads/'.$folder.'/', 0755, TRUE)) {
                        //echo 'false';
                    }
                }
                foreach ($_FILES['upload_closer_image']['name'] as $i => $name) {
                    if ($name){
                        if (move_uploaded_file($_FILES['upload_closer_image']['tmp_name'][$i], FCPATH ."uploads/$folder/$name")){
                            $uploadedImages[$i] = "uploads/$folder/$name";
                        }
                    }else{
                        $uploadedImages[$i] = '';
                    }
                }
            }

            
            foreach ($this->input->post() as $k => $v) {
                /** We receive images as array so check first whether we have an array of images or key-value pair */
                if (is_array($v)){
                   if ($k === 'closer_look_images'){
                        if ($this->input->post('closer_look_images')){
                            $closerImagesWithCaption = array_merge($this->input->post('closer_look_images'), array('images' => $uploadedImages));
                            if (isset($closerImagesWithCaption['caption'])){
                                $currentItmes = $this->aboutUs_model->getWhere(array('name' => 'closer_look_images'),
                                    'about_us_images');
//                                debug_continue($currentItmes);debug($closerImagesWithCaption);
                                foreach ($closerImagesWithCaption['caption'] as $index => $item) {
                                    if (isset($currentItmes[$index])){
                                        //update the current item
                                        $this->aboutUs_model->updateWhere(
                                            array(
                                                'id'=>$currentItmes[$index]->id
                                            ),
                                            array(
                                                'name' => $k,
                                                'image' => (isset($closerImagesWithCaption['images'][$index]) && $closerImagesWithCaption['images'][$index] ? $closerImagesWithCaption['images'][$index] : $currentItmes[$index]->image),
                                                'title' =>  $item
                                            ),
                                            'about_us_images');
                                    }else{
                                        $this->aboutUs_model->insertRow(array('name' => $k, 'image' => (isset($closerImagesWithCaption['images'][$index]) ? $closerImagesWithCaption['images'][$index] : ''), 'title' =>  $item), 'about_us_images');
                                    }
                                }
                            }
                        }
                   }else{
                       foreach ($v as $image) {
                           $this->aboutUs_model->insertRow(array('name' => $k, 'image' => $image), 'about_us_images');
                       }
                   }
                }else{/** We have a key - value pair */
                    /** Insert option only if the value is available */
                    if ($this->aboutUs_model->getOneWhere(array('name' => $k)) == null) {
                        $this->aboutUs_model->insertRow(array('name' => $k, 'value' => $v));
                    }else{
                        $this->aboutUs_model->updateWhere(array('name' => $k),array( 'value' => $v));
                    }
                }
            }
            $this->session->set_flashdata('success', 'About Us Updated Successfully');
            redirect(site_url('admin/aboutUs'));
        }

        // setup page header data
        $this->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                                     '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
                                     base_url($this->settings->themes_folder.'/admin/js/aboutUs.js')))
            ->set_title(lang('aboutUs title aboutUsUpdate'));
        $data = $this->includes;
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL
        );

        $data['content'] = $this->load->view('admin/aboutUs', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
    public function get_images($table_of_image = 'about_us_images') {
        $result = array();
        $images = $this->aboutUs_model->getWhere(array('name'=>$this->input->get('type')),$table_of_image);
        foreach ($images as $key => $file) { //get an array which has the names of all the files and loop through it 
            $obj['name'] = basename($file->image); //get the filename in array
            $obj['path'] = base_url($file->image);
            $obj['image_id'] = $file->id;
            $obj['size'] = filesize("./" . $file->image); //get the flesize in array
            $result[$key] = $obj ? $obj : ''; // copy it to another array
        }
        echo json_encode($result);
    }

    public function upload_files($folder = 'about_us') {
        if (empty($_FILES['file']['name'])) {

        } else if ($_FILES['file']['error'] == 0) {
            $filetype = NULL;
            //upload and update the file
            $config['upload_path'] = './uploads/'.$folder.'/';
            $config['max_size'] = '102428800';
            $type = $_FILES['file']['type'];
            switch ($type) {
                case 'image/gif':
                case 'image/jpg':
                case 'image/png':
                case 'image/jpeg': {
                    $filetype = 0;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    break;
                }
            }
            $config['overwrite'] = false;
            $config['remove_spaces'] = true;
            if (!file_exists('./uploads/'.$folder)) {
                if (!mkdir('./uploads/'.$folder.'/', 0755, TRUE)) {
                    //echo 'false';
                }
            }
            $microtime = microtime(TRUE) * 10000;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file', $microtime)) {
                echo json_encode(array('type' => $filetype, 'path' => 'uploads/'.$folder.'/'.$this->upload->file_name));
            }
        }
        exit;
    }

    public function delete_files($table_of_image = 'about_us_images') {
        $path = $this->input->post('path');
        $this->aboutUs_model->deleteWhere(array('image' => $path), $table_of_image);
        echo unlink('./' . $path);
    }

}