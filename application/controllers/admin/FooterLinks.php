<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FooterLinks extends Admin_Controller {

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
        $this->load->model('Footer_Links_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/FlooterLinks'));

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
        $base_url = site_url('admin/FooterLinks');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->Footer_Links_model->loadFooterLinks(0, 0, TRUE, $content);
      //  echo $total;die();

        $this->data['property_links'] = $this->Footer_Links_model->loadFooterLinks($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        //$this>data['total']= $total;
        $this->data['perpage'] = $perpage;

        // setup page header data
        /////$this->set_title(lang('Propert footer Links'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/footerpropertylinks/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('search_key', 'Search Key Required', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                        'city' => $this->input->post('city'),
                        'name' => $this->input->post('name'),
                        'search_key' => $this->input->post('search_key'),
                        'line' => $this->input->post('coloum'),
                        'priority' => $this->input->post('priority'),
                        );
                $this->Footer_Links_model->insertRow($data, 'property_type');

                $this->session->set_flashdata('message', 'Property Footer Link added Successfully');
                redirect('admin/FooterLinks');
            }
        } 

        // setup page header data
        // $this->set_title(lang(' title add_property_footer_links'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/footerpropertylinks/add', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    public function edit($id){
        $Footerlinkdata = $this->Footer_Links_model->getFooterproperty($id);
        if (!$Footerlinkdata) {
            redirect('admin/FooterLinks');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('search_key', 'Search Key Is Required', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $Footerlinkdata->name,
                    'search_key' => $this->input->post('search_key') ? $this->input->post('search_key') : $Footerlinkdata->search_key,
                    'city' =>  $this->input->post('city') ? $this->input->post('city') : $Footerlinkdata->city,
                    'line' => $this->input->post('coloum'),
                    'priority' => $this->input->post('priority'),
                    );
                $this->Footer_Links_model->updateWhere(array('id' => $id), $data, 'property_type');

                $this->session->set_flashdata('message', 'Property Footer Link Updated Successfully');
                redirect('admin/FooterLinks');
            }
        }
        $this->data['footer_link'] = $this->Footer_Links_model->getOneWhere(array('id' => $id), 'property_type'); 
        // setup page header data
        //$this->set_title(lang('Property Footer title '));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/footerpropertylinks/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id){

        $get_location = $this->Footer_Links_model->getOneWhere(array('id' =>$id), 'property_type');
        if (!$get_location) {
            redirect(site_url());
        }else{
            $this->Footer_Links_model->updateWhere(array('id' => $id), array('status' => 0), 'property_type');
            $this->session->set_flashdata('message', 'Property Footer Link Deleted Successfully');
            redirect(site_url('admin/FooterLinks'));
        }
    }

}