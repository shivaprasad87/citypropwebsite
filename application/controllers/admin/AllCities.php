<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AllCities extends Admin_Controller {

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
        $this->lang->load('aboutUs');

        // load the aboutUs model
        $this->load->model('aboutUs_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/allCities'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "created");
        define('DEFAULT_DIR', "DESC");

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

        if ($this->input->post()) {
                $data = array(
                    'email' =>$this->input->post('email'),
                    'phone' =>$this->input->post('phone')
                    );
                $this->aboutUs_model->updateWhere(array('status' =>1), $data, 'all_cities');
                $this->session->set_flashdata('success', 'Social Media Links Updated Successfully');
                redirect(site_url('admin/allCities'));
        }

        $all_cities = $this->aboutUs_model->getAll('all_cities');
        // setup page header data
        $this->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                                     '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
                                     base_url($this->settings->themes_folder.'/admin/js/aboutUs.js')))
            ->set_title(lang('aboutUs title allCities'));
        $data = $this->includes;
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'all_cities'      => $all_cities[0]
        );

        $data['content'] = $this->load->view('all_cities', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

}