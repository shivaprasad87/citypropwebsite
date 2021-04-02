<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/cities'));

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
        $base_url = site_url('admin/cities');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadCities(0, 0, TRUE, $content);

        $this->data['cities'] = $this->properties_model->loadCities($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('cities title cities'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/cities/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                        'name' => $this->input->post('name'),
                        'url_name' => urlencode($this->input->post('name')),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'phone' => $this->input->post('phone')
                        );
                $this->properties_model->insertRow($data, 'cities');

                $this->session->set_flashdata('message', 'City added Successfully');
                redirect('admin/cities');
            }
        }

        // setup page header data
        $this->set_title(lang('cities title add_city'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/cities/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $city = $this->properties_model->getOneWhere(array('id' => $id), 'cities');
        if (!$city) {
            redirect('admin/cities');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $city->name,
                    'url_name' => $this->input->post('name') ? urlencode($this->input->post('name')) : $city->url_name,
                    'email' => $this->input->post('email') ? $this->input->post('email') : $city->email,
                    'address' => $this->input->post('address') ? $this->input->post('address') : $city->address,
                    'phone' => $this->input->post('phone') ? $this->input->post('phone') : $city->phone
                    );
                $this->properties_model->updateWhere(array('id' => $id), $data, 'cities');

                $this->session->set_flashdata('message', 'City Updated Successfully');
                redirect('admin/cities');
            }
        }
        $this->data['city'] = $this->properties_model->getOneWhere(array('id' => $id), 'cities');
        // setup page header data
        $this->set_title(lang('cities title edit_city'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/cities/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_city = $this->properties_model->getOneWhere(array('id' =>$id), 'cities');
        if (!$get_city) {
            redirect(site_url());
        }else{
            $this->properties_model->updateWhere(array('id' => $id), array('status' => 0), 'cities');
            $this->session->set_flashdata('message', 'City Deleted Successfully');
            redirect(site_url('admin/cities'));
        }
    }

}