<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Achievements extends Admin_Controller {

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
        $this->lang->load('achievements');

        // load the aboutUs model
        $this->load->model('achievements_model');
        $this->load->model('builders_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/achievements'));

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
        $base_url = site_url('admin/achievements');
        $uri_segment = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->achievements_model->loadAchievements(0, 0, TRUE, $content);

        $this->data['achievements'] = $this->achievements_model->loadAchievements($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('achievements title achievements'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/achievements/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('comment', 'Comment', 'trim');
            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/achievements/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/achievements/add');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                    $data = array(
                        'comment' => $this->input->post('comment')?$this->input->post('comment'):"",
                        'image' => $image,
                        'alt_title'=>$this->input->post('alt_title'),
                        'image_desc'=>$this->input->post('image_description'),
                        'date_added' => date('Y-m-d'),
                        'award_date' =>$this->input->post('date').'-01-01',
                        'city_id' => $this->input->post('cities'),
                        'b_id' => $this->input->post('builders')
                    );
                    print_r($data);die;
                    $this->achievements_model->insertRow($data, 'achievements');

                    $this->session->set_flashdata('message', 'Achievement added Successfully');
                    redirect('admin/achievements');
                } else {
                    $this->session->set_flashdata('error', 'Image is mandatory');
                    redirect('admin/achievements/add');
                }
            }
        }
        $current_year = date('Y');
        $data1['date_range'] = range($current_year, $current_year-10);
        $data1['cities'] = $this->achievements_model->getAll('cities');
        $data1['builders'] = $this->builders_model->getAll('builders');
        $this->set_title(lang('achievements title addAchievement'))
                ->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                    base_url($this->settings->themes_folder . '/admin/js/blogs.js')));
        $data = $this->includes;
        // set content data
        //$content_data = '';

        $data['content'] = $this->load->view('admin/achievements/add', /*$content_data*/$data1, TRUE);
        $this->load->view($this->template, $data);
    }

    public function edit($id) {
        $achievement = $this->achievements_model->getOneWhere(array('id' => $id), 'achievements');
        if (!$achievement) {
            redirect('admin/achievements');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('comment', 'Comment', 'trim');

            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/achievements/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/achievements/add');
                    } else {
                        unlink('uploads/achievements/' . $achievement->image);
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $achievement->image;
                }
                $data = array(
                    'comment' => $this->input->post('comment') ? $this->input->post('comment') : $achievement->comment,
                    'alt_title'=>$this->input->post('alt_title') ? $this->input->post('alt_title') : $achievement->alt_title,
                      'image_desc'=>$this->input->post('image_description') ? $this->input->post('image_description') : $achievement->image_desc,
                    'image' => $image,
                    'award_date' =>$this->input->post('date').'-01-01',
                    'city_id' =>$this->input->post('cities'),
                    'b_id' => $this->input->post('builders')

                );
                
                $this->achievements_model->updateWhere(array('id' => $id), $data, 'achievements');
                //echo $this->db->last_query();print_r($data);die;
                $this->session->set_flashdata('message', 'Achievement Updated Successfully');
                redirect('admin/achievements');
            }
        }
        $this->data['achievement'] = $this->achievements_model->getOneWhere(array('id' => $id), 'achievements');
        // setup page header data
        $this->set_title(lang('achievements title editAchievement'))
                ->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                    base_url($this->settings->themes_folder . '/admin/js/blogs.js')));
        $data = $this->includes;
         $current_year = date('Y');
       $this->data['date_range'] = range($current_year, $current_year-10);
        $this->data['cities'] = $this->achievements_model->getAll('cities');
        $this->data['builders'] = $this->builders_model->getAll('builders');
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/achievements/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id) {

        $get_achievement = $this->achievements_model->getOneWhere(array('id' => $id), 'achievements');
        if (!$get_achievement) {
            redirect(site_url());
        } else {
            unlink('uploads/achievements/' . $get_achievement->image);
            $this->achievements_model->deleteWhere(array('id' => $id), 'achievements');
            $this->session->set_flashdata('message', 'Achievement Deleted Successfully');
            redirect(site_url('admin/achievements'));
        }
    }

}
