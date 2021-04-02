<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/career'));

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
        $base_url = site_url('admin/career');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadPropertyCareer(0, 0, TRUE, $content);

        $this->data['careers'] = $this->properties_model->loadPropertyCareer($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('career title career'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/career/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('experience', 'Experience', 'trim|required');
            $this->form_validation->set_rules('bangalore_vacancy', 'Bangalore Vacancy', 'trim|required');
            $this->form_validation->set_rules('pune_vacancy', 'Pune Vacancy', 'trim|required');
            $this->form_validation->set_rules('qualities', 'Qualities', 'trim|required');
            $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $this->properties_model->insertRow($this->input->post(), 'careers');

                $this->session->set_flashdata('message', 'Career added Successfully');
                redirect('admin/career');
            }
        }

        // setup page header data
        $this->set_title(lang('career title add_career'))
            ->add_external_js(array(
                '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                base_url($this->settings->themes_folder . '/admin/js/career.js'
                )));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/career/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $career = $this->properties_model->getOneWhere(array('id' => $id), 'careers');
        if (!$career) {
            redirect('admin/career');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('experience', 'Experience', 'trim|required');
            $this->form_validation->set_rules('bangalore_vacancy', 'Bangalore Vacancy', 'trim|required');
            $this->form_validation->set_rules('pune_vacancy', 'Pune Vacancy', 'trim|required');
            $this->form_validation->set_rules('qualities', 'Qualities', 'trim|required');
            $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array();
                foreach ($this->input->post() as $k => $post) {
                    $data[$k] = ($post || $post == 0) ? $post : $career->{$k};
                }
                $this->properties_model->updateWhere(array('id' => $id), $data, 'careers');

                $this->session->set_flashdata('message', 'Career Updated Successfully');
                redirect('admin/career');
            }
        }
        $this->data['career'] = $this->properties_model->getOneWhere(array('id' => $id), 'careers');
        // setup page header data
        $this->set_title(lang('career title edit_career'))
            ->add_external_js(array(
                '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                base_url($this->settings->themes_folder . '/admin/js/career.js'
                )));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/career/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_career = $this->properties_model->getOneWhere(array('id' =>$id), 'careers');
        if (!$get_career) {
            redirect(site_url());
        }else{
            $this->properties_model->deleteRow($id, 'id', 'careers');
            $this->session->set_flashdata('message', 'Career Deleted Successfully');
            redirect(site_url('admin/career'));
        }
    }


}