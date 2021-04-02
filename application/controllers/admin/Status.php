<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/status'));

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
        $base_url = site_url('admin/status');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadPropertyStatus(0, 0, TRUE, $content);

        $this->data['statuses'] = $this->properties_model->loadPropertyStatus($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('status title status'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/status/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if ($this->form_validation->run() != FALSE) {

                $data = array(
                    'name' => $this->input->post('name')
                );
                $this->properties_model->insertRow($data, 'property_status');

                $this->session->set_flashdata('message', 'Property status added Successfully');
                redirect('admin/status');
            }
        }

        // setup page header data
        $this->set_title(lang('status title add_status'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/status/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $status = $this->properties_model->getOneWhere(array('id' => $id), 'property_status');
        if (!$status) {
            redirect('admin/status');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $status->name
                    );
                $this->properties_model->updateWhere(array('id' => $id), $data, 'property_status');

                $this->session->set_flashdata('message', 'Property Status Updated Successfully');
                redirect('admin/status');
            }
        }
        $this->data['status'] = $this->properties_model->getOneWhere(array('id' => $id), 'property_status');
        // setup page header data
        $this->set_title(lang('status title edit_status'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/status/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_status = $this->properties_model->getOneWhere(array('id' =>$id), 'property_status');
        if (!$get_status) {
            redirect(site_url());
        }else{
            $this->properties_model->deleteRow($id, 'id', 'property_status');
            $this->session->set_flashdata('message', 'Property Status Deleted Successfully');
            redirect(site_url('admin/status'));
        }
    }

}