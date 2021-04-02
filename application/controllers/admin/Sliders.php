<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller {

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
        $this->lang->load('sliders');

        // load the aboutUs model
        $this->load->model('sliders_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/sliders'));

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
        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/sliders');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->sliders_model->loadSliders(0, 0, TRUE, $content);

        $this->data['sliders'] = $this->sliders_model->loadSliders($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('sliders title sliders'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;
        
        $data['content'] = $this->load->view('admin/sliders/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim');
            $this->form_validation->set_rules('heading', 'Heading', 'trim');
            if ($this->form_validation->run() != FALSE) {
               if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name'])) {
                        $file = $_FILES["uploadfile"]['tmp_name'];
                        $path = './uploads/sliders/';
                        if (!is_dir($path)) {
                            mkdir($path, 0777, TRUE);
                        }
                        $file_type = 'gif|jpg|jpeg|png';
                        $config = $this->set_upload_options($path, $file_type);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('uploadfile')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('admin/sliders/add');
                        } else {
                            $image = $this->upload->data('file_name');
                        }
                         $banner_type=$this->input->post('banner_type');
                        $data = array(
                                'title' => $this->input->post('title')?$this->input->post('title'):"",
                                'heading' => $this->input->post('heading')?$this->input->post('heading'):"",                                
                                'type' => $this->input->post('type'),
                                'image' => $image,
                                'banner_type'=>$banner_type
                                );
                        $this->sliders_model->insertRow($data, 'sliders');
               

                        $this->session->set_flashdata('message', 'Slider added Successfully');
                        redirect('admin/sliders');
                    }else{
                        $this->session->set_flashdata('error', 'Image is mandatory');
                        redirect('admin/sliders/add');
                    }
            }
        }

        // setup page header data
        $this->set_title(lang('sliders title addSlider'));
        $data = $this->includes;
        $this->data = '';
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/sliders/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
     public function addmobilebanner(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim');
            $this->form_validation->set_rules('heading', 'Heading', 'trim');
            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name'])) {
                        $file = $_FILES["uploadfile"]['tmp_name'];
                        $path = './uploads/sliders/';
                        if (!is_dir($path)) {
                            mkdir($path, 0777, TRUE);
                        }
                        $file_type = 'gif|jpg|jpeg|png';
                        $config = $this->set_upload_options($path, $file_type);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('uploadfile')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('admin/sliders/add');
                        } else {
                            $image = $this->upload->data('file_name');
                        }
                        $banner_type=$this->input->post('banner_type');
                    
                        $data = array(
                                'title' => $this->input->post('title')?$this->input->post('title'):"",
                                'heading' => $this->input->post('heading')?$this->input->post('heading'):"",                                
                                'type' => $this->input->post('type'),
                                'image' => $image,
                                'banner_type'=>$banner_type
                                );
                        $this->sliders_model->insertRow($data, 'sliders');
               

                        $this->session->set_flashdata('message', 'Slider added Successfully');
                        redirect('admin/sliders');
                    }else{
                        $this->session->set_flashdata('error', 'Image is mandatory');
                        redirect('admin/sliders/add');
                    }
            }
        }

        // setup page header data
        $this->set_title(lang('sliders title addSlider'));
        $data = $this->includes;
        $this->data = '';
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/sliders/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $slider = $this->sliders_model->getOneWhere(array('id' => $id), 'sliders');
        if (!$slider) {
            redirect('admin/sliders');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim');
            $this->form_validation->set_rules('heading', 'Heading', 'trim');

            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                        $file = $_FILES["uploadfile"]['tmp_name'];
                        $path = './uploads/sliders/';
                        if (!is_dir($path)) {
                            mkdir($path, 0777, TRUE);
                        }
                        $file_type = 'gif|jpg|jpeg|png';
                        $config = $this->set_upload_options($path, $file_type);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('uploadfile')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('admin/sliders/add');
                        } else {
                            unlink('uploads/sliders/'.$slider->image);
                            $image = $this->upload->data('file_name');
                        }
                    }else{
                        $image = $slider->image;
                    }
                $data = array(
                            'title' => $this->input->post('title') ? $this->input->post('title') : $slider->title,
                            'heading' => $this->input->post('heading') ? $this->input->post('heading') : $slider->heading,
                            'type' => $this->input->post('type'),
                            'image' => $image
                    );
                $this->sliders_model->updateWhere(array('id' => $id), $data, 'sliders');

                $this->session->set_flashdata('message', 'Slider Updated Successfully');
                redirect('admin/sliders');
            }
        }
        $this->data['slider'] = $this->sliders_model->getOneWhere(array('id' => $id), 'sliders');
        // setup page header data
        $this->set_title(lang('sliders title editSlider'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/sliders/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){
        $get_slider = $this->sliders_model->getOneWhere(array('id' =>$id), 'sliders');
        if (!$get_slider) {
            redirect(site_url());
        }else{
            unlink('uploads/sliders/'.$get_slider->image);
            $this->sliders_model->deleteWhere(array('id' => $id), 'sliders');
            $this->session->set_flashdata('message', 'Slider '.$get_slider->title.' Deleted Successfully');
            redirect(site_url('admin/sliders'));
        }
    }

}