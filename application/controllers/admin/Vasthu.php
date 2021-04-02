<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vasthu extends Admin_Controller {

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
    	define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/Vasthu'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "created");
        define('DEFAULT_DIR', "DESC");
        $this->load->model("Vasthu_model");
        $this->load->library('upload');

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
    public function index($value='')
    {
    	if($this->input->post())
    	{
    		$filename  = $this->input->post("filname");
    		$content = $this->input->post("vasthu_content");
    		 if (isset($_FILES) && isset($_FILES["uploadfile"]['tmp_name']) && $_FILES["uploadfile"]['tmp_name']) {
                    $file = $_FILES["uploadfile"]['tmp_name'];
                    $path = './uploads/vasthu/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }
                    $file_type = 'gif|jpg|jpeg|png';
                    $config = $this->set_upload_options($path, $file_type);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('uploadfile')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/properties/add');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                 }
                 if($image=="")
                 	{
                 		$data = array(
                 		"image"=>$filename,
                 		"content" => $content,
                 	);
                 	}
                 	else
                 	{
                 		$data = array(
                 		"image"=>$image?$image:$filename,
                 		"content" => $content,
                 	);
                 	}
                 	$bool = $this->Vasthu_model->updateWhere(array("id"=>1),$data,"vasthu");
                 	if($bool)
                 	{
                 		$this->session->set_flashdata('success', 'Vasthu Page Updated Successfully');
                    redirect('admin/vasthu');
                } else {
                    $this->session->set_flashdata('error', 'Updation  Failed');
                    redirect('admin/vasthu');
                }

    	}
    	 $this->add_external_js(array('//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.2/ckeditor.js',
                                     '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js',
                                     base_url($this->settings->themes_folder.'/admin/js/aboutUs.js')))
            ->set_title(lang('aboutUs title aboutUsUpdate'));
        $data = $this->includes;
    	$content_data = array(
            'this_url'   => THIS_URL
        );

        $data['content'] = $this->load->view('admin/vasthu', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
}
