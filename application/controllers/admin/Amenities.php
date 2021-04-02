<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Amenities extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/amenities'));

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
        $base_url = site_url('admin/amenities');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->properties_model->loadAmenities(0, 0, TRUE, $content);

        $this->data['amenities'] = $this->properties_model->loadAmenities($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('amenities title amenities'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/amenities/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if ($this->form_validation->run() != FALSE) {

                $data = array(
                    'name' => $this->input->post('name'),
                    'alt_title'=>$this->input->post('alt_title'),
                    'image_desc'=>$this->input->post('image_description')
                );
                if (isset($_FILES) && $_FILES["uploadfile"]['tmp_name']){
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/amenities/';
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
                $this->properties_model->insertRow($data, 'amenities');

                $this->session->set_flashdata('message', 'Amenity added Successfully');
                redirect('admin/amenities');
            }
        }

        // setup page header data
        $this->set_title(lang('amenities title add_amenity'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/amenities/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $amenity = $this->properties_model->getOneWhere(array('id' => $id), 'amenities');
        if (!$amenity) {
            redirect('admin/amenities');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $amenity->name,
                    'alt_title'=>$this->input->post('alt_title'),
                     'image_desc'=>$this->input->post('image_discription'),
                );
                if (isset($_FILES) && $_FILES["uploadfile"]['tmp_name']){
                    if ($amenity->image && is_file(FCPATH. 'uploads/amenities/'.$amenity->image)){
                        @unlink(FCPATH. 'uploads/amenities/'.$amenity->image);
                    }
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/amenities/';
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
                $this->properties_model->updateWhere(array('id' => $id), $data, 'amenities');

                $this->session->set_flashdata('message', 'Amenity Updated Successfully');
                redirect('admin/amenities');
            }
        }
        $this->data['amenity'] = $this->properties_model->getOneWhere(array('id' => $id), 'amenities');
        // setup page header data
        $this->set_title(lang('amenities title edit_amenity'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/amenities/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_amenity = $this->properties_model->getOneWhere(array('id' =>$id), 'amenities');
        if (!$get_amenity) {
            redirect(site_url());
        }else{
            $this->properties_model->updateWhere(array('id' => $id), array('status' => 0), 'amenities');
            $this->session->set_flashdata('message', 'Amenity Deleted Successfully');
            redirect(site_url('admin/amenities'));
        }
    }

}