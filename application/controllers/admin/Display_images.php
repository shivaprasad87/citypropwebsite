<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Display_images extends Admin_Controller {

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
        $this->lang->load('blogs');

        // load the display_images model
        $this->load->model('blogs_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/display_images'));
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

        $details = $this->blogs_model->getAll('display_images');
        $display = $details[0];
        $update_flag = false;

        if (isset($_FILES) && isset($_FILES["builders"]['tmp_name']) && $_FILES["builders"]['tmp_name']) {
            $file = $_FILES["builders"]['tmp_name'];
            $path = './uploads/display_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_type = 'gif|jpg|jpeg|png';
            $config = $this->set_upload_options($path, $file_type);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('builders')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/display_images');
            } else {
                // unlink('uploads/display_images/'.$display->builders);
                $update_flag = true;
                $builders = $this->upload->data('file_name');
            }
        }else{
            $builders = $display->builders;
        }

        if (isset($_FILES) && isset($_FILES["projects"]['tmp_name']) && $_FILES["projects"]['tmp_name']) {
            $file = $_FILES["builders"]['tmp_name'];
            $path = './uploads/display_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_type = 'gif|jpg|jpeg|png';
            $config = $this->set_upload_options($path, $file_type);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('projects')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/display_images');
            } else {
                // unlink('uploads/display_images/'.$display->projects);
                $update_flag = true;
                $projects = $this->upload->data('file_name');
            }
        }else{
            $projects = $display->projects;
        }

        if (isset($_FILES) && isset($_FILES["blogs"]['tmp_name']) && $_FILES["blogs"]['tmp_name']) {
            $file = $_FILES["blogs"]['tmp_name'];
            $path = './uploads/display_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_type = 'gif|jpg|jpeg|png';
            $config = $this->set_upload_options($path, $file_type);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('blogs')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/display_images');
            } else {
                // unlink('uploads/display_images/'.$display->blogs);
                $update_flag = true;
                $blogs = $this->upload->data('file_name');
            }
        }else{
            $blogs = $display->blogs;
        }

        if (isset($_FILES) && isset($_FILES["cities"]['tmp_name']) && $_FILES["cities"]['tmp_name']) {
            $file = $_FILES["cities"]['tmp_name'];
            $path = './uploads/display_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_type = 'gif|jpg|jpeg|png';
            $config = $this->set_upload_options($path, $file_type);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('cities')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/display_images');
            } else {
                // unlink('uploads/display_images/'.$display->cities);
                $update_flag = true;
                $cities = $this->upload->data('file_name');
            }
        }else{
            $cities = $display->cities;
        }

        if (isset($_FILES) && isset($_FILES["locations"]['tmp_name']) && $_FILES["locations"]['tmp_name']) {
            $file = $_FILES["locations"]['tmp_name'];
            $path = './uploads/display_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $file_type = 'gif|jpg|jpeg|png';
            $config = $this->set_upload_options($path, $file_type);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('locations')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/display_images');
            } else {
                // unlink('uploads/display_images/'.$display->locations);
                $update_flag = true;
                $locations = $this->upload->data('file_name');
            }
        }else{
            $locations = $display->locations;
        }
        $data = array(
            'builders' => $builders,
            'projects' => $projects,
            'blogs' => $blogs,
            'cities' => $cities,
            'locations' => $locations,
            );

        if ($update_flag) {
            $this->blogs_model->updateWhere(array('status' => 1), $data, 'display_images');
        }
        $display_images = $this->blogs_model->getAll('display_images');


        $this->set_title(lang('display_images title display_images'));
        $data = $this->includes;
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'display_images'      => $display_images[0],
            );

        $data['content'] = $this->load->view('admin/display_images', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

}