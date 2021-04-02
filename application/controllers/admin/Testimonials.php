<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends Admin_Controller {

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
        $this->lang->load('testimonials');

        // load the aboutUs model
        $this->load->model('testimonials_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/testimonials'));

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
        $base_url = site_url('admin/testimonials');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->testimonials_model->loadTestimonials(0, 0, TRUE, $content);

        $this->data['testimonials'] = $this->testimonials_model->loadTestimonials($perpage, $page, FALSE, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('testimonials title testimonials'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/testimonials/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function add() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('job_desc', 'Job Description', 'trim|required');
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/testimonials/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/testimonials/add');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                    $data = array(
                        'name' => $this->input->post('name'),
                        'job_desc' => $this->input->post('job_desc'),
                        'comment' => $this->input->post('comment'),
                        'image' => $image,
                        'alt_title'=>$this->input->post('alt_title'),
                        'image_desc'=>$this->input->post('image_description'),
                        'date_added' => date('Y-m-d'),
                        'property_id'=>$this->input->post('prop')
                    );
                    $this->testimonials_model->insertRow($data, 'testimonials');

                    $this->session->set_flashdata('message', 'Testimonial added Successfully');
                    redirect('admin/testimonials');
                } else {
                    $this->session->set_flashdata('error', 'Image is mandatory');
                    redirect('admin/testimonials/add');
                }
            }
        }

        // setup page header data
        $this->set_title(lang('testimonials title addTestimonial'))
        ->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
            base_url($this->settings->themes_folder . '/admin/js/blogs.js')));
        $data = $this->includes;
        // set content data
        $content_data = '';
        $data['prop'] = json_decode(json_encode($this->properties_model->testmonial_properties()),true);
        $data['content'] = $this->load->view('admin/testimonials/add', $data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function edit($id) {
        $testimonial = $this->testimonials_model->getOneWhere(array('id' => $id), 'testimonials');
        if (!$testimonial) {
            redirect('admin/testimonials');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('job_desc', 'Job Description', 'trim|required');
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/testimonials/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/testimonials/add');
                    } else {
                        unlink('uploads/testimonials/' . $testimonial->image);
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $testimonial->image;
                }
                $data = array(
                    'name' => $this->input->post('name') ? $this->input->post('name') : $testimonial->name,
                    'job_desc' => $this->input->post('job_desc') ? $this->input->post('job_desc') : $testimonial->job_desc,
                    'comment' => $this->input->post('comment') ? $this->input->post('comment') : $testimonial->comment,
                    'image' => $image,
                    'alt_title'=>$this->input->post('alt_title') ? $this->post('alt_title') : $testimonial->alt_title,
                    'image_desc'=>$this->input->post('image_description') ? $this->post('image_description') : $testimonial->image_desc
                );
                $this->testimonials_model->updateWhere(array('id' => $id), $data, 'testimonials');

                $this->session->set_flashdata('message', 'Testimonial Updated Successfully');
                redirect('admin/testimonials');
            }
        }
        $this->data['testimonial'] = $this->testimonials_model->getOneWhere(array('id' => $id), 'testimonials');
        // setup page header data
        $this->set_title(lang('testimonials title editTestimonial'))
        ->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
            base_url($this->settings->themes_folder . '/admin/js/blogs.js')));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;
        
        $data['content'] = $this->load->view('admin/testimonials/edit', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    public function delete($id) {

        $get_testimonial = $this->testimonials_model->getOneWhere(array('id' => $id), 'testimonials');
        if (!$get_testimonial) {
            redirect(site_url());
        } else {
            unlink('uploads/testimonials/' . $get_testimonial->image);
            $this->testimonials_model->deleteWhere(array('id' => $id), 'testimonials');
            $this->session->set_flashdata('message', 'Testimonial Deleted Successfully');
            redirect(site_url('admin/testimonials'));
        }
    }

}
