<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FlatTypes extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/flat_type'));

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
        $base_url = site_url('admin/flat_type');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadPropertyFlatTypes(0, 0, TRUE, $content);

        $this->data['flat_types'] = $this->properties_model->loadPropertyFlatTypes($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('flat_type title flat_type'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/flat_type/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if ($this->form_validation->run() != FALSE) {

                $data = array(
                    'name' => $this->input->post('name')
                );
                $this->properties_model->insertRow($data, 'flat_types');

                $this->session->set_flashdata('message', 'Property Flat Type added Successfully');
                redirect('admin/flat_type');
            }
        }

        // setup page header data
        $this->set_title(lang('flat_type title add_flat_type'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/flat_type/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $status = $this->properties_model->getOneWhere(array('id' => $id), 'flat_types');
        if (!$status) {
            redirect('admin/flat_type');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $status->name
                    );
                $this->properties_model->updateWhere(array('id' => $id), $data, 'flat_types');

                $this->session->set_flashdata('message', 'Property Flat Type Updated Successfully');
                redirect('admin/flat_type');
            }
        }
        $this->data['flat_type'] = $this->properties_model->getOneWhere(array('id' => $id), 'flat_types');
        // setup page header data
        $this->set_title(lang('flat_type title edit_flat_type'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/flat_type/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_flat_type = $this->properties_model->getOneWhere(array('id' =>$id), 'flat_types');
        if (!$get_flat_type) {
            redirect(site_url());
        }else{
            $this->properties_model->deleteRow($id, 'id', 'flat_types');
            $this->session->set_flashdata('message', 'Property Flat Type Deleted Successfully');
            redirect(site_url('admin/flat_type'));
        }
    }


    /**
     * Change Specification Status
     *
     * @param null $id
     */
    public function status($id = null)
    {
        if (is_null($id)){
            $this->session->set_flashdata('message', 'Invalid flat_type or selection');
            redirect(site_url('admin/flat_type'));
        }

        if (($flat_type = $this->properties_model->getOneWhere(array('id' =>$id), 'flat_types')) != null){
            $this->properties_model->updateRow($id,array('status' =>!$flat_type->status) , 'id', 'flat_types');
            redirect(site_url('admin/flat_type'));
        }
        $this->session->set_flashdata('message', 'Invalid flat_type or selection');
        redirect(site_url('admin/flat_type'));
    }

}