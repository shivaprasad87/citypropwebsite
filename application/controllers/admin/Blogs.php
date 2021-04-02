<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Admin_Controller
{

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
        $this->lang->load('blogs');

        // load the aboutUs model
        $this->load->model('blogs_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/blogs'));

        // use the url in session (if available) to return to the previous filter/sorted/paginated list
        if ($this->session->userdata(REFERRER)) {
            $this->_redirect_url = $this->session->userdata(REFERRER);
        } else {
            $this->_redirect_url = THIS_URL;
        }
    }

    public function index()
    {
        
        $blogs = $this->blogs_model->getAll('blog');
        
        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/blogs');
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->blogs_model->loadBlogs(0, 0, true, $content);

        $this->data['blogs'] = $this->blogs_model->loadBlogs($perpage, $page, false, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('blogs title blogs'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/blogs', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function add_blog()
    {
        
        $blogs = $this->blogs_model->getAll('blog');
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('author', 'Author', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            if ($this->form_validation->run() != false) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/blog_images/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/blogs/add_blog');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                    $slug = strtolower(url_title($this->input->post('title')));
                    $check = $this->blogs_model->getOneWhere(array('slug' => $slug), 'blog');
                    if ($check) {
                        $slug = strtolower(url_title($this->input->post('title'))) . uniqid(5);
                    }
                    $data = array(
                        'title' => $this->input->post('title'),
                        'meta_title' => $this->input->post('meta_title'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'meta_desc' => $this->input->post('meta_desc'),
                        'author' => $this->input->post('author'),
                        'slug' => $slug,
                        'blog_type' =>  $this->input->post('blog_type'),
                        'category_id' => $this->input->post('category'),
                        'content' => $this->input->post('content'),
                        'image' => $image,
                        'alt_title'=>$this->input->post('alt_title'),
                        'image_desc'=>$this->input->post('image_description'),
                        'date_added' => date('Y-m-d h:i:s'),
                        'date' => $this->input->post('date', date('Y-m-d'))
                    );
                    $blog_id = $this->blogs_model->insertRow($data, 'blog');
                    $blogdata = $this->blogs_model->getOneWhere(array('id' => $blog_id), 'blog');

                    if (!empty($this->input->post('tags'))) {
                        $tags = explode(',', $this->input->post('tags'));
                        foreach ($tags as $value) {
                            $is_tag_exists = $this->blogs_model->getOneWhere(array('name' => trim($value)), 'tags');
                            if (!$is_tag_exists) {
                                $tag_id = $this->blogs_model->insertRow(array('name' => strtolower($value)), 'tags');
                                $this->blogs_model->insertRow(array('blog_id' => $blog_id, 'tag_id' => $tag_id),
                                    'blog_tag_relation');
                            } else {
                                $tagged = $this->blogs_model->getOneWhere(array(
                                    'tag_id' => $is_tag_exists->id,
                                    'blog_id' => $blog_id
                                ), 'blog_tag_relation');
                                if (!$tagged) {
                                    $this->blogs_model->insertRow(array(
                                        'blog_id' => $blog_id,
                                        'tag_id' => $is_tag_exists->id
                                    ), 'blog_tag_relation');
                                }
                            }
                        }
                    }

                    $this->session->set_flashdata('message', 'Blog added Successfully');
                    redirect('admin/blogs/add_blog');
                } else {
                    $this->session->set_flashdata('error', 'Image is mandatory');
                    redirect('admin/blogs/add_blog');
                }
            }
        }

        $this->data['blog_categories'] = $this->blogs_model->getWhere(array('status' => 1), 'blog_category');
        $this->data['blog_types'] = $this->blogs_model->getWhere(array('status' => 1), 'blog_type');
        // setup page header data
        $this->set_title(lang('blogs title addBlog'))
            ->add_external_js(array(
                '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                base_url($this->settings->themes_folder . '/admin/js/bootstrap-datepicker.js'),
                base_url($this->settings->themes_folder . '/admin/js/blogs.js'
                )))
            ->add_external_css(array(
                base_url($this->settings->themes_folder . '/admin/css/bootstrap-datepicker.css')
            ));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/add_blog', $content_data, true);
        $this->load->view($this->template, $data);
    }


    public function edit_blog($blog_id)
    {
        $blog = $this->blogs_model->getBlog($blog_id);
        if (!$blog) {
            redirect('admin/blogs');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');

            if ($this->form_validation->run() != false) {
                if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/blog_images/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/blogs/add_blog');
                    } else {
                        unlink('uploads/blog_images/' . $blog->image);
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $blog->image;
                }
                if ($this->input->post('title')) {
                    $slug = strtolower(url_title($this->input->post('title')));
                    $check = $this->blogs_model->checkIfSlugExists($slug, $blog_id);
                    if ($check) {
                        $slug = strtolower(url_title($this->input->post('title'))) . uniqid(5);
                    }
                } else {
                    $slug = $blog->slug;
                }
                $data = array(
                    'title' => $this->input->post('title') ? $this->input->post('title') : $blog->title,
                    'meta_title' => $this->input->post('meta_title') ? $this->input->post('meta_title') : $blog->meta_title,
                    'meta_keywords' => $this->input->post('meta_keywords') ? $this->input->post('meta_keywords') : $blog->meta_keywords,
                    'meta_desc' => $this->input->post('meta_desc') ? $this->input->post('meta_desc') : $blog->meta_desc,
                    'author' => $this->input->post('author') ? $this->input->post('author') : $blog->author,
                    'slug' => $slug,
                    'category_id' => $this->input->post('category') ? $this->input->post('category') : $blog->category_id,
                    'content' => $this->input->post('content') ? $this->input->post('content') : $blog->content,
                    'image' => $image,
                    'blog_type' =>  $this->input->post('blog_type'),
                    'alt_title'=>$this->input->post('alt_title') ? $this->input->post('alt_title') : $blog->alt_title,
                    'image_desc'=>$this->input->post('image_description') ? $this->input->post('image_description') : $blog->image_desc,
                    'date' => $this->input->post('date', $blog->date)
                );
                $this->blogs_model->updateWhere(array('id' => $blog_id), $data, 'blog');

                $this->blogs_model->deleteWhere(array('blog_id' => $blog_id), 'blog_tag_relation');
                if (!empty($this->input->post('tags'))) {
                    $tags = explode(',', $this->input->post('tags'));
                    foreach ($tags as $value) {
                        $is_tag_exists = $this->blogs_model->getOneWhere(array('name' => trim($value)), 'tags');
                        if (!$is_tag_exists) {
                            $tag_id = $this->blogs_model->insertRow(array('name' => strtolower($value)), 'tags');
                            $this->blogs_model->insertRow(array('blog_id' => $blog_id, 'tag_id' => $tag_id),
                                'blog_tag_relation');
                        } else {
                            $tagged = $this->blogs_model->getOneWhere(array(
                                'tag_id' => $is_tag_exists->id,
                                'blog_id' => $blog_id
                            ), 'blog_tag_relation');
                            if (!$tagged) {
                                $this->blogs_model->insertRow(array(
                                    'blog_id' => $blog_id,
                                    'tag_id' => $is_tag_exists->id
                                ), 'blog_tag_relation');
                            }
                        }
                    }
                }

                $this->session->set_flashdata('message', 'Blog Updated Successfully');
                redirect('admin/blogs');
            }
        }
        $this->data['blog'] = $this->blogs_model->getBlog($blog_id);
        $this->data['blog_categories'] = $this->blogs_model->getWhere(array('status' => 1), 'blog_category');
        $this->data['blog_types'] = $this->blogs_model->getWhere(array('status' => 1), 'blog_type');
        
        $this->data['tags'] = $this->blogs_model->getTags($blog_id);
        // setup page header data
        $this->set_title(lang('blogs title editBlog'))
            ->add_external_js(array(
                '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                base_url($this->settings->themes_folder . '/admin/js/bootstrap-datepicker.js'),
                base_url($this->settings->themes_folder . '/admin/js/blogs.js'
                )))
            ->add_external_css(array(
                base_url($this->settings->themes_folder . '/admin/css/bootstrap-datepicker.css')
            ));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/edit_blog', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function delete_blog($blog_id)
    {

        $get_blog = $this->blogs_model->getOneWhere(array('id' => $blog_id), 'blog');
        if (!$get_blog) {
            redirect(site_url());
        } else {
            unlink('uploads/blog_images/' . $get_blog->image);
            $this->blogs_model->deleteWhere(array('id' => $blog_id), 'blog');
            $this->session->set_flashdata('message', 'Blog ' . $get_blog->title . ' Deleted Successfully');
            redirect(site_url('admin/blogs'));
        }
    }

    public function add_blog_category()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('categ_name', 'Category Name', 'trim|required');
            if ($this->form_validation->run() != false) {
                $slug = strtolower(url_title($this->input->post('categ_name')));
                $check = $this->blogs_model->getOneWhere(array('slug' => $slug), 'blog_category');
                if ($check) {
                    $slug = strtolower(url_title($this->input->post('categ_name'))) . uniqid(5);
                }
                $this->blogs_model->insertRow(array('name' => $this->input->post('categ_name'), 'slug' => $slug),
                    'blog_category');
                $this->session->set_flashdata('message', 'Blog Category Added Successfully');
                redirect(site_url('admin/blogs/blog_categories'));
            }
        }
        // setup page header data
        $this->set_title(lang('blogs title addCategory'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/blogs/add_blog_category', $content_data, true);
        $this->load->view($this->template, $data);
    }
     public function blog_categories()
    {

        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/blogs/blog_categories');
        $uri_segment = 4;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->blogs_model->loadBlogCategories(0, 0, true, $content);

        $this->data['categories'] = $this->blogs_model->loadBlogCategories($perpage, $page, false, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('blogs title blogCategories'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/blog_categories', $content_data, true);
        $this->load->view($this->template, $data);
    }
        public function edit_blog_category($id)
    {
        $get_categ = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_category');
        if (!$get_categ) {
            redirect(site_url());
        } else {
            if ($this->input->post()) {
                $this->form_validation->set_rules('categ_name', 'Category Name', 'trim|required');

                if ($this->form_validation->run() != false) {
                    if ($this->input->post('categ_name')) {
                        $slug = strtolower(url_title($this->input->post('categ_name')));
                        $check = $this->blogs_model->checkIfCategSlugExists($slug, $id);
                        if ($check) {
                            $slug = strtolower(url_title($this->input->post('categ_name'))) . uniqid(5);
                        }
                    } else {
                        $slug = $get_categ->slug;
                    }
                    $name = $this->input->post('categ_name') ? $this->input->post('categ_name') : $get_categ->name;
                    $this->blogs_model->updateWhere(array('id' => $id), array('name' => $name, 'slug' => $slug),
                        'blog_category');
                    $this->session->set_flashdata('message', 'Category ' . $get_categ->name . ' Edited Successfully');
                    redirect(site_url('admin/blogs/blog_categories'));
                }
            }
        }
        $this->data['blog_category'] = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_category');
        // setup page header data
        $this->set_title(lang('blogs title editCategory'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/edit_blog_category', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function delete_blog_category($id)
    {
        $get_categ = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_category');
        if (!$get_categ) {
            redirect(site_url());
        } else {
            $this->blogs_model->updateWhere(array('id' => $id), array('status' => 0), 'blog_category');
            $this->session->set_flashdata('message', 'Category ' . $get_categ->name . ' Deleted Successfully');
            redirect(site_url('admin/blogs/blog_categories'));
        }
    }

    public function add_blog_type()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('type_name', 'Blog Type Name', 'trim|required');
            if ($this->form_validation->run() != false) {
                $slug = strtolower(url_title($this->input->post('type_name')));
                $check = $this->blogs_model->getOneWhere(array('blog_type' => $slug), 'blog_type');
                if ($check) {
                    $slug = strtolower(url_title($this->input->post('type_name'))) . uniqid(5);
                }
                $this->blogs_model->insertRow(array('blog_type' => $this->input->post('type_name'), 'slug' => $slug,'date_created'=> date('Y-m-d')),
                    'blog_type');
                $this->session->set_flashdata('message', 'Blog Type Added Successfully');
                redirect(site_url('admin/blogs/add_blog_type'));
            }
        }
        // setup page header data
        $this->set_title(lang('blogs title addCategory'));
        $data = $this->includes;
        // set content data
        $content_data = '';

        $data['content'] = $this->load->view('admin/blogs/blog_types/add_blog_type', $content_data, true);
        $this->load->view($this->template, $data);
    }
    
    public function blog_types()
    {

        $content = $this->input->get('content');

        $perpage = 10;
        $base_url = site_url('admin/blogs/blog_types');
        $uri_segment = 4;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

        if ($this->input->get('search')) {
            $page = 1;
            unset($_GET['search']);
        }

        $total = $this->blogs_model->loadBlogTypes(0, 0, true, $content);

        $this->data['blog_type'] = $this->blogs_model->loadBlogTypes($perpage, $page, false, $content);
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['perpage'] = $perpage;

        // setup page header data
        $this->set_title(lang('blogs title blogCategories'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/blog_types/blog_types', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function edit_blog_type($id)
    {
        $get_categ = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_type');
        if (!$get_categ) {
            redirect(site_url());
        } else {
            if ($this->input->post()) {
                $this->form_validation->set_rules('blog_type_name', 'Blog Type  Name', 'trim|required');

                if ($this->form_validation->run() != false) {
                    if ($this->input->post('blog_type_name')) {
                        $slug = strtolower(url_title($this->input->post('blog_type_name')));
                        $check = $this->blogs_model->checkIfCategSlugExists($slug, $id);
                        if ($check) {
                            $slug = strtolower(url_title($this->input->post('blog_type_name'))) . uniqid(5);
                        }
                    } else {
                        $slug = $get_categ->slug;
                    }
                    $name = $this->input->post('blog_type_name') ? $this->input->post('blog_type_name') : $get_categ->name;
                    $this->blogs_model->updateWhere(array('id' => $id), array('blog_type' => $name, 'slug' => $slug),
                        'blog_type');
                    $this->session->set_flashdata('message', 'Type ' . $get_categ->name . ' Edited Successfully');
                    redirect(site_url('admin/blogs/blog_types'));
                }
            }
        }
        $this->data['blog_type'] = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_type');
        // setup page header data
        $this->set_title(lang('blogs title editCategory'));
        $data = $this->includes;
        // set content data
        $content_data = $this->data;

        $data['content'] = $this->load->view('admin/blogs/blog_types/edit_blog_type', $content_data, true);
        $this->load->view($this->template, $data);
    }

    public function delete_blog_type($id)
    {
        $get_categ = $this->blogs_model->getOneWhere(array('id' => $id), 'blog_type');
        if (!$get_categ) {
            redirect(site_url());
        } else {
            $this->blogs_model->updateWhere(array('id' => $id), array('status' => 0), 'blog_type');
            $this->session->set_flashdata('message', 'Blog Type ' . $get_categ->name . ' Deleted Successfully');
            redirect(site_url('admin/blogs/blog_types'));
        }
    }

}