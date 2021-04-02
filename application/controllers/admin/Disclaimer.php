<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Disclaimer extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/disclaimer'));
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
            $this->form_validation->set_rules('content', 'Content', 'required');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'content' =>$this->input->post('content')
                    );
                if (($row = $this->aboutUs_model->getAll('disclaimer')) != null){
                    $this->aboutUs_model->updateWhere(array('id' => isset($row[0]) ? $row[0]->id : 1), $data, 'disclaimer');
                }else{
                    $this->aboutUs_model->insertRow($data, 'disclaimer');
                }

                $this->session->set_flashdata('success', 'Disclaimer Updated Successfully');
                redirect(site_url('admin/disclaimer'));
            }
        }

        $terms = $this->aboutUs_model->getAll('disclaimer');
        // setup page header data
        $this->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                                     '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
                                     base_url($this->settings->themes_folder.'/admin/js/aboutUs.js')))
            ->set_title(lang('disclaimer title disclaimerUpdate'));
        $data = $this->includes;
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'terms'      => isset($terms[0]) ? $terms[0] : ""
        );

        $data['content'] = $this->load->view('admin/disclaimer', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

}