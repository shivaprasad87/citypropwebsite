<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends Admin_Controller {

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
        $this->lang->load('locations');

        // load the aboutUs model
        $this->load->model('locations_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/locations'));

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
        $base_url = site_url('admin/locations');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->locations_model->loadLocations(0, 0, TRUE, $content);
      //  echo $total;die;

        $this->data['locations'] = $this->locations_model->loadLocations($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        //$this>data['total']= $total;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('locations title locations'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/locations/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                        'city_id' => $this->input->post('city'),
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description')
                        );
                $this->locations_model->insertRow($data, 'locations');

                $this->session->set_flashdata('message', 'Location added Successfully');
                redirect('admin/locations');
            }
        }

        $this->data['cities'] = $this->locations_model->getWhere(array('status' => 1), 'cities');

        // setup page header data
        $this->set_title(lang('locations title add_location'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/locations/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $location = $this->locations_model->getLocation($id);
        if (!$location) {
            redirect('admin/locations');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'city_id' => $this->input->post('city') ? $this->input->post('city') : $location->city_id,
                    'name' => $this->input->post('name') ? $this->input->post('name') : $location->name,
                    'description' => $this->input->post('description') ? $this->input->post('description') : $location->description
                    );
                $this->locations_model->updateWhere(array('id' => $id), $data, 'locations');

                $this->session->set_flashdata('message', 'Location Updated Successfully');
                redirect('admin/locations');
            }
        }
        $this->data['location'] = $this->locations_model->getOneWhere(array('id' => $id), 'locations');
        $this->data['cities'] = $this->locations_model->getWhere(array('status' => 1), 'cities');
        // setup page header data
        $this->set_title(lang('locations title edit_location'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/locations/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_location = $this->locations_model->getOneWhere(array('id' =>$id), 'locations');
        if (!$get_location) {
            redirect(site_url());
        }else{
            $this->locations_model->updateWhere(array('id' => $id), array('status' => 0), 'locations');
            $this->session->set_flashdata('message', 'Location Deleted Successfully');
            redirect(site_url('admin/locations'));
        }
    }

}