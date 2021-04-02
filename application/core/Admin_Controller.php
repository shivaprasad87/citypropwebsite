<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Admin Class - used for all administration pages
 */
class Admin_Controller extends MY_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // must be logged in\
         //print_r($this->user);die;
        if ( ! $this->user)
        {

            if (current_url() != base_url())
            {
                //store requested URL to session - will load once logged in
                $data = array('redirect' => current_url());
                $this->session->set_userdata($data);
            }

            redirect('login');
        }

        // make sure this user is setup as admin
        if ( ! $this->user['is_admin'])
        {
            redirect(base_url());
        }

        // load the admin language file
        $this->lang->load('admin');

        // prepare theme name
        $this->settings->theme = strtolower($this->config->item('admin_theme'));

        // set up global header data
        $this
            ->add_css_theme("{$this->settings->theme}.css, summernote-bs3.css")
            ->add_js_theme("summernote.min.js" )
            ->add_js_theme("{$this->settings->theme}_i18n.js", TRUE);

        // declare main template
        $this->template = "../../{$this->settings->themes_folder}/{$this->settings->theme}/template.php";
    }
    
    function set_upload_options($path, $file_type) {
        // upload an image options
        $config = array();
        $config['upload_path'] = $path; //give the path to upload the image in folder
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE; // for encrypting the name
        $config['allowed_types'] = $file_type;
        $config['max_size'] = '78000';
        $config['overwrite'] = FALSE;
        return $config;
    }
    
    //for pagination
protected function paginate($perpage, $total, $base_url, $uri_segment, $class = "") {
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total;
    $config['per_page'] = $perpage;
    $config["uri_segment"] = $uri_segment;
    $config["reuse_query_string"] = TRUE;
    $config["page_query_string"] = FALSE;
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = 4;
    $config['use_page_numbers'] = true;
        //config for bootstrap pagination class integration
    $config['full_tag_open'] = '<ul class="pager">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>'; 
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    return $this->pagination->create_links();
}

}
