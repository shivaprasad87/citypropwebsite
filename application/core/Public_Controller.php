<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Public Class - used for all public pages
 */
class Public_Controller extends MY_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_model');
        $this->db->limit(3)->order_by('id', 'desc');
        $this->data['blogs'] = $this->home_model->getWhere(array('status' => 1), 'blog', 3);
        $this->data['cities'] = $this->home_model->getWhere(array('status' => 1), 'cities');
        $social = $this->home_model->getAll('social_media');
        $this->data['social_links'] = $social[0];
        $all_cities = $this->home_model->getAll('all_cities');
        $this->data['all_cities'] = $all_cities[0];
        $stay_in_touch = $this->home_model->getAll('stay_in_touch');
		if(!isset($stay_in_touch[0])){
		$stay_in_touch[0]= '';}
        $this->data['stay_in_touch'] = $stay_in_touch[0];


        // prepare theme name
        $this->settings->theme = strtolower($this->config->item('public_theme'));

        // set up global header data
        $this
            ->add_css_theme("{$this->settings->theme}.css")
            ->add_js_theme("{$this->settings->theme}_i18n.js", TRUE);

        // declare main template
        $this->template = "../../{$this->settings->themes_folder}/{$this->settings->theme}/template.php";
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
