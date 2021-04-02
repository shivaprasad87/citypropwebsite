<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SocialMedia extends Admin_Controller {

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
        define('THIS_URL', base_url('admin/socialMedia'));
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
                    'facebook' =>$this->input->post('facebook'),
                    'twitter' =>$this->input->post('twitter'),
                    'vine' =>$this->input->post('vine'),
                    'dribble' => $this->input->post('dribble'),
                    'linked_in' => $this->input->post('linked_in'),
                    'instagram' => $this->input->post('instagram'),
                    'google' => $this->input->post('google'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'whatsapp' => $this->input->post('whatsapp')
                    );
                $this->aboutUs_model->updateWhere(array('status' =>1), $data, 'social_media');
                $this->session->set_flashdata('success', 'Social Media Links Updated Successfully');
                //redirect(site_url('admin/socialMedia'));
        }
       //else
       // echo "no post";die;

        $social = $this->aboutUs_model->getAll('social_media');
        // setup page header data
        $this->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                                     '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
                                     base_url($this->settings->themes_folder.'/admin/js/aboutUs.js')))
            ->set_title(lang('aboutUs title socialMedia'));
        $data = $this->includes;
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'social'      => $social[0]
        );

        $data['content'] = $this->load->view('social_links', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

}