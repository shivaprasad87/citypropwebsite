<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Property_types extends Admin_Controller {

    /**
     * @var string
     */
    private $_redirect_url;

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->library('upload');

        // load the language files
        $this->lang->load('properties');

        // load the aboutUs model
        $this->load->model('properties_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/property_types'));

        // use the url in session (if available) to return to the previous filter/sorted/paginated list
        if ($this->session->userdata(REFERRER)) {
            $this->_redirect_url = $this->session->userdata(REFERRER);
        } else {
            $this->_redirect_url = THIS_URL;
        }
    }

    public function index() {
        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/property_types');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadPropertyTypes(0, 0, TRUE, $content);

        $this->data['property_types'] = $this->properties_model->loadPropertyTypes($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('property_types title property_types'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/property_types/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name')
                );
                $this->properties_model->insertRow($data, 'property_types');

                $this->session->set_flashdata('message', 'Property Type added Successfully');
                redirect('admin/property_types');
            }
        }

        // setup page header data
        $this->set_title(lang('property_types title add_property_type'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/property_types/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function edit($id) {
        $property_type = $this->properties_model->getOneWhere(array('id' => $id), 'property_types');
        if (!$property_type) {
            redirect('admin/blogs');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $property_type->name
                );
                $this->properties_model->updateWhere(array('id' => $id), $data, 'property_types');

                $this->session->set_flashdata('message', 'Property Type Updated Successfully');
                redirect('admin/property_types');
            }
        }
        $this->data['property_type'] = $this->properties_model->getOneWhere(array('id' => $id), 'property_types');
        // setup page header data
        $this->set_title(lang('testimonials title editTestimonial'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/property_types/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id) {

        $get_property_type = $this->properties_model->getOneWhere(array('id' => $id), 'property_types');
        if (!$get_property_type) {
            redirect(site_url());
        } else {
            $this->properties_model->updateWhere(array('id' => $id), array('status' => 0), 'property_types');
            $this->session->set_flashdata('message', 'Property Type Deleted Successfully');
            redirect(site_url('admin/property_types'));
        }
    }

}
