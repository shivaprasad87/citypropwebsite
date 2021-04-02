<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Builders extends Admin_Controller {

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
        $this->lang->load('builders');
        $this->load->library('upload');

        // load the aboutUs model
        $this->load->model('builders_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/builders'));

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
        $base_url = site_url('admin/builders');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->builders_model->loadBuilders(0, 0, TRUE, $content);

        $this->data['builders'] = $this->builders_model->loadBuilders($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('builders title builders'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/builders/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            if ($this->form_validation->run() != FALSE) {

                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'alt_title'=>$this->input->post('alt_title'),
                    'image_desc'=>$this->input->post('img_description'),
                    'location' => $this->input->post('location'),
                    'experience' => $this->input->post('experience')?$this->input->post('experience'):'0',
                    'ongoing' => $this->input->post('ongoing')?$this->input->post('ongoing'):'0',
                    'upcoming' => $this->input->post('upcoming')?$this->input->post('upcoming'):'0',
                    'completed' => $this->input->post('completed')?$this->input->post('completed'):'0',
                );
                if (isset($_FILES) && $_FILES["uploadfile"]['tmp_name']){
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/builders/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('uploadfile')) {
                        $data['image'] = $this->upload->data('file_name');
                    }
                }
                $this->builders_model->insertRow($data, 'builders');

                $this->session->set_flashdata('message', 'Builder added Successfully');
                redirect('admin/builders');
            }
        }

        // setup page header data
        $this->set_title(lang('builders title add_builder'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/builders/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $builder = $this->builders_model->getOneWhere(array('id' => $id), 'builders');
        if (!$builder) {
            redirect('admin/builders');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $builder->name,
                    'description' => $this->input->post('description') ? $this->input->post('description') : $builder->description,
                    'alt_title'=>$this->input->post('alt_title'),
                    'image_desc'=>$this->input->post('image_description'),
                    'location' => $this->input->post('location', $builder->location),
                    'experience' => $this->input->post('experience', $builder->experience),
                    'ongoing' => $this->input->post('ongoing', $builder->ongoing),
                    'upcoming' => $this->input->post('upcoming', $builder->upcoming),
                    'completed' => $this->input->post('completed', $builder->completed),
                );
                if (isset($_FILES) && $_FILES["uploadfile"]['tmp_name']){
                    if ($builder->image && is_file(FCPATH. 'uploads/amenities/'.$builder->image)){
                        @unlink(FCPATH. 'uploads/amenities/'.$builder->image);
                    }
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/builders/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('uploadfile')) {
                        $data['image'] = $this->upload->data('file_name');
                    }
                }
                $this->builders_model->updateWhere(array('id' => $id), $data, 'builders');

                $this->session->set_flashdata('message', 'Builder Updated Successfully');
                redirect('admin/builders');
            }
        }
        $this->data['builder'] = $this->builders_model->getOneWhere(array('id' => $id), 'builders');
        // setup page header data
        $this->set_title(lang('builders title edit_builder'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/builders/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_builder = $this->builders_model->getOneWhere(array('id' =>$id), 'builders');
        if (!$get_builder) {
            redirect(site_url());
        }else{
            $this->builders_model->updateWhere(array('id' => $id), array('status' => 0), 'builders');
            $this->session->set_flashdata('message', 'Builder Deleted Successfully');
            redirect(site_url('admin/builders'));
        }
    }

}