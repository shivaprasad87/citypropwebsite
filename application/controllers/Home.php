<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->lang->load('welcome');
        $this->load->model('home_model');
        $this->load->model('properties_model');
        $this->load->model('achievements_model');
        $this->load->model('blogs_model');

        // $this->session->unset_userdata('city');
        $this->data['property_types'] = $this->home_model->getWhere(array('status' => 1), 'property_types');
        $this->data['locations'] = $this->home_model->getWhere(array('status' => 1), 'locations'); 
        $this->data['property_status'] = $this->home_model->getWhere(array('status' => 1), 'property_status');
        $this->data['cities'] = $this->home_model->getWhere(array('status' => 1), 'cities'); 
        //$this->data['property_type'] = $this->home_model->getWhere(array('status' => 1), 'property_type');
        $this->data['blog_type'] = $this->home_model->getWhere(array('status' => 1), 'blog_type');
        $this->load->vars($data);
        
    }

// echo 
    /**
     * Default
     */
    function index()
    {
        $this->data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : ''; 
        $this->session->unset_userdata('content');
        $this->data['meta'] = array('title' => 'Holding Bricks: Best Property Portal in India', 'description' => 'Buy Residential Properties in India at Holding Bricks, the best property agent in India. Choose from the list of top Real Estate Properties in India.  ','keywords' =>'Real Estate Websites in India, Property Sites in India, Property Portal in India, Property for Sale in India, Real Estate India, Properties in India, India Real Estate, Residential Properties in India, Property Agent in India, Apartments, Plots, Villas, Real Estate, India Property');
        $location_where = array('status' => 1);
        if($this->session->userdata('city_id')){
            $location_where["city_id"] = $this->session->userdata('city_id');
        }
        
        $this->data['testimonials'] = $this->home_model->get_testimonials();
        $this->data['achievements'] = $this->home_model->getWhere(array('status' => 1), 'achievements'); 
        $this->data['amenities'] = $this->home_model->getWhere(array('status' => 1), 'amenities');
        $this->data['properties'] = $this->home_model->getProperties('properties', 6);
        $this->data['bestdeal_properties'] = $this->home_model->getBestdealProperties('properties', 6);
        $this->data['sliders'] = $this->home_model->order_by('id', 'desc')->getWhere(array('status' => 1, 'type'=>'H','banner_type'=>'desk'), 'sliders');
        $this->data['mobilesliders'] = $this->home_model->order_by('id', 'desc')->getWhere(array('status' => 1, 'type'=>'H','banner_type'=>'mobile'), 'sliders');
        $this->data['builder_count'] = $this->home_model->countWhere(array('status' => 1), 'builders');
        $this->data['location_count'] = $this->home_model->countWhere(array('status' => 1), 'locations');
        $this->data['project_count'] = $this->home_model->countWhere(array('status' => 1), 'properties');
        $this->data['blog_count'] = $this->home_model->countWhere(array('status' => 1), 'blog');
        $this->data['display_images'] = $this->home_model->getOneWhere(array('status' => 1), 'display_images');
        $this->data['city_count'] = count($this->data['cities']);
        $this->data['price_range'] = $this->home_model->getPriceRanges(); 
        $content=$this->session->userdata('content');
        $total      = $this->home_model->loadProperties(0, 0, true, $content);
        $this->data['total'] = $total;
        $this->data['view_page'] = 'index';
        $this->load->view('template', $this->data);
    }

    public function get_locations($city_id=''){
       $id = $this->input->get_post('id');
        $locations = $this->properties_model->getWhere(array('city_id' => $id), 'locations');
        //echo json_encode($locations);
        echo "<option value=>---select---</option>";
        if(count($locations)>0)
        {
        foreach ($locations as $locations ) {
            echo "<option value=".$locations->id.">".$locations->name."</option>";
        }
    }
        else
        {
            echo "<option value=>---select---</option>";
        }
    }

    function listing()
    {
       
        $perpage = 10;
        $base_url = site_url('listing');
        $uri_segment = 2;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
        if($this->input->get('place')!='')
        {
       $place = array("keyword"=>urldecode($this->input->get('place')));
        }
       $content='';
        if(!empty($this->session->userdata('content')))
        {
       $content1 = $this->input->post();
       if(!empty($content1))
       {
           $this->session->set_userdata('content',$content1);
            $content=$this->session->userdata('content');
       }
       else
       {
        $content=$this->session->userdata('content');
       }
        }
        else
        {
             $content = $this->input->post() ? $this->input->post() : '';
              $this->session->set_userdata('content',$content);
              $content=$this->session->userdata('content');
              
        }
      //echo "<script>alert(".$content.")</script>";
      //  print_r($content);die; 
        // $content['bhk_range'] = explode(';', $content['bhk']);
        // $content['price_range'] = explode(';', $content['price']);
        // $content['baths_range'] = explode(';', $content['baths']);
        if($this->input->get('builder')!='' && (string)$this->input->get('builder') ) {
            $total      = $this->home_model->loadPropertiesUsingBuilder(0, 0, true, $this->input->get('builder'));
            $properties = $this->home_model->loadPropertiesUsingBuilder($perpage, $page, false, $this->input->get('builder'));
        }
        elseif (!empty($place)) {
             $total      = $this->home_model->loadProperties(0, 0, true, $place);
            $properties = $this->home_model->loadProperties($perpage, $page, false, $place);

        
        }
        else {
            $total      = $this->home_model->loadProperties(0, 0, true, $content);
            $properties = $this->home_model->loadProperties($perpage, $page, false, $content);
            //echo $this->db->last_query();die;
        }
        //print_r($content);
        // echo $content['price'];
        
        // print_r($content['bhk_range']);
        // die;
        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            foreach ($properties as $property) {
                $is_fav = $this->home_model->getOneWhere(array(
                    'user_id' => $user['id'],
                    'property_id' => $property->id
                ), 'favourites');
                $property->class_heart = $is_fav ? 'fa-heart' : 'fa-heart-o';
            }
        }
        if ($this->input->post('showPattern')) {
            $this->data['showPattern'] = $this->input->post('showPattern');
        } else {
            $this->data['showPattern'] = 'list-group-item';
        }
        $this->data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : '';
        $this->data['properties'] = $properties;

        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['total'] = $total;
        $this->data['perpage'] = $perpage;
        $this->data['price_range'] = $this->home_model->getPriceRanges();
        $this->data['amenities'] = $this->home_model->getWhere(array('status' => 1), 'amenities');
        $location_where = array('status' => 1);
        if($this->session->userdata('city_id')){
            $location_where["city_id"] = $this->session->userdata('city_id');
        }
        $this->data['locations'] = $this->home_model->getWhere($location_where, 'locations');
        
        $this->data['meta'] = array(
            'title' => 'Holding Bricks: Real Estate Properties for Sale in India',
            'description' => 'Find the best Real Estate Properties located in Bangalore, Pune, Hyderabad and Mumbai. Get advice from Expert Real Estate Agents with complete project details. ',
            'keywords' => 'Property for sale in India, Apartments for Sale, Flats for Sale, House for Sale, Residential Properties in India, Villas for Sale, Plots for Sale, Bangalore Real Estate, Pune Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Real Estate India, Property Site India'
        );

        $this->data['view_page'] = 'listing';
        $this->load->view('template', $this->data);
    }


    public function sendmail()
    {
        $this->config_email();
        $name = trim(stripslashes($_POST['name']));
        $email = trim(stripslashes($_POST['email']));
        $phone = trim(stripslashes($_POST['phone']));
        $message = trim(stripslashes($_POST['message']));
        $this->email->from($name, $email); 
        $this->email->to('ranjeet.singh@Holdingbrickservices.com');
        $this->email->bcc('shivas8787@gmail.com');
        $this->email->subject('Enquiry for you');
        $data = array('post' => array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message));
        $this->email->message($this->load->view('mail_template.php', $data, true));
        if ($this->email->send()) {
            $this->session->set_flashdata('message', 'Your enquiry has been sent successfully');
            redirect(base_url('thankyou?type=home')); 
        }
        debug($this->email->print_debugger());
    }
    public function send()
    {
        // if (!verify_captcha()) {
        //     $this->session->set_flashdata('error', 'Invalid Captcha');
        //     redirect($this->input->post('redirect', site_url()));
        // }

        $this->config_email();


        $this->email->from($this->input->post('name'), $this->input->post('email'));
//        $this->email->to('vineeth@soarmorrow.com');
        $this->email->to('ranjeet.singh@Holdingbrickservices.com');
$this->email->bcc('shivas8787@gmail.com');

        $this->email->subject('New Notification from Holdingbricks property');
        $this->email->subject('Resale property Submitted');
        $post = array();
        foreach ($this->input->post() as $key => $value) {
               if (!in_array($key, array('redirect','g-recaptcha-response'))){
                   $post[$key] = $value;
               }
        }
        $data = compact('post');

        $this->email->message($this->load->view('mail_template.php', $data, true));

        if ($this->email->send()) {
           /* $this->session->set_flashdata('message', 'Email sent successfully');
            redirect($this->input->post('redirect', site_url()));*/
            redirect(base_url('thankyou'));
        }
        debug($this->email->print_debugger());
    }

    function config_email()
    {
        $config = array(
            'mailtype' => 'html',
            'protocol' => 'mail',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '30',
            'smtp_user' => 'secondsdigitalsolutions@gmail.com', 
            'smtp_pass' => 'Password1982',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'validation' => true  // bool whether to validate email or not
        );
        // $config = Array(
        //     'protocol' => 'mail',
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n",
        //     'wordwrap' => TRUE,
        //     'validation' => TRUE
        //     );

        $this->load->library('email');
        $this->email->initialize($config);
    }
        public function project_contact()
    {
         
        $this->config_email();
        $name = trim(stripslashes($_POST['name']));
        $email = trim(stripslashes($_POST['email']));
        $phone = trim(stripslashes($_POST['phone']));
        $project = trim(stripslashes($_POST['enqproject']));

        $this->email->from($name, $email); 
        $this->email->to('ranjeet.singh@Holdingbrickservices.com');
$this->email->bcc('shivas8787@gmail.com');

        $this->email->subject($project.' Enquiry for you');
        $data = array('post' => array('name' => $name, 'email' => $email, 'phone' => $phone, 'Project' => $project));
        $this->email->message($this->load->view('mail_template.php', $data, true));

        if ($this->email->send()) {
            $this->session->set_flashdata('message', 'Your enquiry has been sent successfully');
            redirect(base_url('thankyou?type=home')); 
        }
        debug($this->email->print_debugger());
    }

    public function city($city)
    {
    $this->data['keywords'] = $this->input->post('keyword') ? $this->input->post('keyword') : ''; 
        if ($city == 'all') {
            $this->session->unset_userdata('city');
            $this->session->unset_userdata('city_id');
            redirect(site_url());
        } else {
            $city_details = $this->home_model->getOneWhere(array('url_name' => $city, 'status' => 1), 'cities');
            $this->session->set_userdata('city', $city_details->name);
            $this->session->set_userdata('city_id', $city_details->id);
        }

        $perpage = 10;
        $base_url = site_url('city/' . $city);
        $uri_segment = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        if($this->input->get('place')!='')
        {
       $place = array("keyword"=>urldecode($this->input->get('place')));
        }

        $content = $this->input->post() ? $this->input->post() : '';
        if ($this->input->post('showPattern')) {
            $this->data['showPattern'] = $this->input->post('showPattern');
        } else {
            $this->data['showPattern'] = 'list-group-item';
        }
        if (!empty($place)) {
             $this->db->where('p.city_id', $city_details->id);
           $total = $this->home_model->loadProperties(0, 0, true, $place);
           $properties = $this->home_model->loadProperties($perpage, $page, false, $place);
        }
        else
        {
        $this->db->where('p.city_id', $city_details->id);
        $total = $this->home_model->loadProperties(0, 0, true, $content);

         $this->db->where('p.city_id', $city_details->id);
        $properties = $this->home_model->loadProperties($perpage, $page, false, $content);
        }
        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            foreach ($properties as $property) {
                $is_fav = $this->home_model->getOneWhere(array(
                    'user_id' => $user['id'],
                    'property_id' => $property->id
                ), 'favourites');
                $property->class_heart = $is_fav ? 'fa-heart' : 'fa-heart-o';
            }
        }

        //$this->data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : '';
        $this->data['properties'] = $properties;
        $this->data['keyword']= $this->input->post('keyword') ? $this->input->post('keyword') : ''; 
        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->db->where('city_id', $city_details->id);
        $this->data['locations'] = $this->home_model->getWhere(array('status' => 1), 'locations');
        $this->data['page'] = $page;
        $this->data['total'] = $total;
        $this->data['perpage'] = $perpage;
        $this->data['price_range'] = $this->home_model->getPriceRanges();
        $this->data['amenities'] = $this->home_model->getWhere(array('status' => 1), 'amenities');
        $this->data['meta'] = array(
            'title' => $city_details->name . ' Based Listing - Holdingbricks ',
            'description' => 'Test City Based Listing Page Description'
        );

        $this->data['city_name'] = $city_details->name;
        $this->data['view_page'] = 'city_listing';
        $this->load->view('template', $this->data);
    }

    public function manage_favourites()
    {
        $user = $this->session->userdata('logged_in');
        if (!$user) {
            redirect(site_url());
        }

        $property_id = $this->input->post('id');
        $find = $this->home_model->getOneWhere(array('user_id' => $user['id'], 'property_id' => $property_id),
            'favourites');
        if ($find) {
            $this->home_model->deleteWhere(array('user_id' => $user['id'], 'property_id' => $property_id),
                'favourites');
            return true;
        } else {
            $this->home_model->insertRow(array('user_id' => $user['id'], 'property_id' => $property_id), 'favourites');
            return true;
        }
    }

    function searchListing()
    {

        $perpage = 0;
        $base_url = site_url('searchListing');
        $uri_segment = 2;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
        
        $content = $this->input->post() ? $this->input->post() : null;
        if ($this->input->post('showPattern')) {
            $this->data['showPattern'] = $this->input->post('showPattern');
        } else {
            $this->data['showPattern'] = 'list-group-item';
        }

        $total = $this->home_model->loadProperties(0, 0, true, $content);

        $properties = $this->home_model->loadProperties($perpage, $page, false, $content);
        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            foreach ($properties as $property) {
                $is_fav = $this->home_model->getOneWhere(array(
                    'user_id' => $user['id'],
                    'property_id' => $property->id
                ), 'favourites');
                $property->class_heart = $is_fav ? 'fa-heart' : 'fa-heart-o';
            }
        }

        $this->data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : '';
        $this->data['store_content'] = $content;
        $this->data['properties'] = $properties;

        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['total'] = $total;
        $this->data['perpage'] = $perpage;
        $this->data['price_range'] = $this->home_model->getPriceRanges();
        $this->data['amenities'] = $this->home_model->getWhere(array('status' => 1), 'amenities');
        $this->data['locations'] = $this->home_model->getWhere(array('status' => 1), 'locations');
        $this->data['meta'] = array(
            'title' => 'Searched Properties Listing - Holdingbricks ',
            'description' => 'Test Search Page Description'
        );

        $this->data['view_page'] = 'searchListing';
        $this->load->view('template', $this->data);
    }

    public function favourites()
    {
        $user = $this->session->userdata('logged_in');
        if (!$user) {
            redirect(site_url());
        }
        $perpage = 10;
        $base_url = site_url('favourites');
        $uri_segment = 2;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;

        $content = $this->input->post() ? $this->input->post() : null;

        $total = $this->home_model->loadFavourites(0, 0, true, $content);

        $properties = $this->home_model->loadFavourites($perpage, $page, false, $content);

        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            foreach ($properties as $property) {
                $is_fav = $this->home_model->getOneWhere(array(
                    'user_id' => $user['id'],
                    'property_id' => $property->id
                ), 'favourites');
                $property->class_heart = $is_fav ? 'fa-heart' : 'fa-heart-o';
            }
        }

        $this->data['properties'] = $properties;

        $this->data['pagination'] = $this->paginate($perpage, $total, $base_url, $uri_segment, $class = "");
        $this->data['page'] = $page;
        $this->data['total'] = $total;
        $this->data['perpage'] = $perpage;
        $this->data['meta'] = array(
            'title' => 'Favouite Properties Listing - Holdingbricks ',
            'description' => 'Favourite Properties Listing Page Description'
        );

        $this->data['view_page'] = 'favourites';
        $this->load->view('template', $this->data);
    }

    public function subscribers()
    {
        $email = $this->input->post('email');
        $find = $this->home_model->getOneWhere(array('email' => $email), 'subscribers');
        if($find)
        {
           $this->session->set_flashdata('info', 'Already Subscribed');
        }
        else
        {
            $this->home_model->insertRow(array('email' => $email, 'created_at' => date('Y-m-d H:i:s')), 'subscribers');
            $this->config_email();
            $this->email->from( 'no-reply@Holdingbricks.com','Holdingbricks  WebAdmin');
            $this->email->to('ranjeet.singh@Holdingbrickservices.com');
$this->email->bcc('shivas8787@gmail.com');

            $this->email->subject('You received a new subscriber at Holdingbricks .');
            $data = array(
                'post' => array(
                    'email' => $email,
                    'message' => $email.'just subscribed to Holdingbricks .'
                )
            );
            
            echo $this->email->message($this->load->view('mail_template.php', $data, true));
        if ($this->email->send()) {
            $this->session->set_flashdata('message', 'Subscribed Successfully');
        }
        else
        {
           $this->session->set_flashdata('message', 'Error sending mail'); 
        }
        }
      
      // redirect(site_url());
      $this->load->view('thank-you');
    }

    public function price_range()
    {

        $price_range = $this->home_model->getPriceRanges();
        echo json_encode($price_range);
    }

    public function about()
    {
        $this->data['meta'] = array(
            'title'         => 'Holding Bricks | Leading Real Estate Agent in India', 
            'description'   => 'Looking for a property in India? Our experts will guide you to select among best properties in your preferred location by analyzing every project in detail.',
            'keywords'      =>'Real Estate Websites in India, Property Portals in India, Property Experts in India, Properties in India, Real Estate Properties, Online Property Sites, India Real Estate, Real Estate Agents in India, Property Sites in India, Property for Sale in India. '
        );
            
        $this->data['view_page'] = 'about';
        $this->load->view('template', $this->data);
    }

    public function property_details()
    {
        $this->data['view_page'] = 'property-details';
        $this->load->view('template', $this->data);
    }

    public function property_old($slug = null)
    {

        if (is_null($slug) || ($property = $this->home_model->getProperty($slug)) == null) {
            show_404();
        }
        if ($this->input->post()) {
            
            $this->config_email();

            $this->email->from($this->input->post('name'), $this->input->post('email'));
            $this->email->to('ranjeet.singh@Holdingbrickservices.com');
$this->email->bcc('shivas8787@gmail.com');

            $this->email->subject($this->input->post('name') . ' has an interest in ' . $property->title);
            $data = array(
                'post' =>
                    array(
                        'Name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('mobile'),
                        'message' => $this->input->post('name') . "(" . $this->input->post('mobile') . ") has just showed an interest in the listed property <a href='" . site_url("property/$property->slug") . "'>" . $property->title . "</a> ($property->id)."
                    )
            );
            $this->email->message($this->load->view('mail_template.php', $data, true));

            if ($this->email->send()) {
                $this->data['mail_sent'] = true;
            }
        }
        $property->amenities = $this->properties_model->getAmenities($property->id);
        $property->gallery = $this->properties_model->getGallery($property->id);
        $this->data['property'] = $property;
        $this->data['view_page'] = 'property';
        $this->load->view('template', $this->data);
    }

    public function property_enquiry()
    {
        $this->load->model('Builders_model', 'bm');
        $property = $this->properties_model->getOneWhere(array('id' => $this->input->post('property_id')),'properties');
        $builder  = $this->bm->getBuilderById('name', ['id'=>$property->builder_id]);
        
       /* if (!verify_captcha()) {
            if ($this->input->is_ajax_request()) {
                die(json_encode(array('status' => 'failed')));
            } else {
                $this->session->set_flashdata('error', 'Invalid Captcha');
                redirect(site_url("property/$property->slug"));
            }
        }*/
        $this->config_email();

        $name = trim(stripslashes($_POST['name']));
        $email = trim(stripslashes($_POST['email']));
        $phone = trim(stripslashes($_POST['phone']));
        $message = trim(stripslashes($_POST['message'])); 
        $c_code =$this->input->post('countrycode') ? $this->input->post('countrycode') :'+91';
                        

        $this->email->from($name, $email);
//        $this->email->to('vineeth@soarmorrow.com');
        $this->email->to('shivas8787@gmail.com');

        $this->email->subject("You have received a new enquiry for $property->title");
        $data = array(
            'post' => array(
                'name' => $name,
                'email' => $email,
                'phone' => $c_code." - ".$phone,
                'property' => $property->title,
                'message' => $message,
                'city' => $this->uri->segment(1)
            )
        );

        $this->email->message($this->load->view('mail_template.php', $data, true));

        if ($this->email->send()) {
            if ($this->input->is_ajax_request()) {
                die(json_encode(array('status' => 'ok', 'url'=>base_url('thankyou?builder='.$builder['name'].'&location='.$property->area.'&property='.$property->slug.'&title='.$property->title))));
            } else {
                $this->session->set_flashdata('message', 'Your enquiry has been sent successfully');
                redirect(base_url('thankyou?builder='.$builder['name'].'&location='.$property->area.'&property='.$property->slug.'&title='.$property->title));
                //redirect(site_url("property/$property->slug"));
            }
        }
        debug($this->email->print_debugger());
    }

    /**
     * Privacy Page
     */
    public function privacy()
    {
        $this->data['meta'] = array(
            'title'         => 'Privacy Policy - Holdingbricks  ', 
            'description'   => 'Privacy policy of Holding Bricks, a leading property agent in India. For any support and concerns, please connect at support@Holdingbricks.com  ',
            'keywords'      =>'Bangalore Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Pune Real Estate, Real Estate Websites In India, Property Sites In India, Real Estate Agents In India, Property Portals In India, Real Estate, Indian Real Estate '
        );
        $privacy = $this->home_model->getAll('terms');
        $this->data['title'] = 'Privacy Policy';
        $this->data['content'] = isset($privacy[0]) ? $privacy[0]->content : '';
        $this->data['view_page'] = 'privacy';
        $this->load->view('template', $this->data);

    }

    /**
     * Disclaimer Page
     */
    public function disclaimer()
    {
        $this->data['meta'] = array(
            'title'         => 'Disclaimer - Holdingbricks  ', 
            'description'   => 'Holdingbricks  provides information regarding the Real Estate Projects in India.  ',
            'keywords'      =>'Bangalore Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Pune Real Estate, Property Portals In Bangalore, Property Portals In Pune, Property Portals In Hyderabad, Property Portals In Mumbai, Real Estate, Indian Real Estate '
        );
        $privacy = $this->home_model->getAll('disclaimer');
        $this->data['title'] = 'Disclaimer';
        $this->data['content'] = isset($privacy[0]) ? $privacy[0]->content : '';
        $this->data['view_page'] = 'privacy';
        $this->load->view('template', $this->data);

    }
  


     /**
     * Disclaimer Page
     */
    public function vastu()
    {
        $this->data['meta'] = array(
            'title'         => 'vastu - Holdingbricks  ', 
            'description'   => 'Holdingbricks  provides information regarding the Real Estate Projects in India.  ',
            'keywords'      =>'Bangalore Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Pune Real Estate, Property Portals In Bangalore, Property Portals In Pune, Property Portals In Hyderabad, Property Portals In Mumbai, Real Estate, Indian Real Estate '
        );
        $privacy =  $this->home_model->getAll('vasthu');

        //echo $privacy[0]->image;die;
        $this->data['title'] = 'Vastu';
        $this->data['content'] = isset($privacy[0]) ? $privacy[0]->content : '';
        $this->data['image'] = isset($privacy[0]) ? $privacy[0]->image : '';
        $this->data['view_page'] = 'vastu';
        $this->load->view('template', $this->data);

    }

    public function blog()
    {
        $this->data['meta'] = array(
            'title'         => 'Holding Bricks Blogs | Latest Property Updates and Trends', 
            'description'   => 'Get the latest real estate property updates, news, opinions and trends in India. Expert insights to the events in the Indian Real Estate Market. ',
            'keywords'      =>'Real Estate Blogs, Real Estate Blogs For Buyers, Latest Real Estate News, Real Estate News India 2018, Property Blog India, Property Blog, Property Related Blogs, Best Property Blogs In India, Real Estate Blogs India, Property Experts, Top Property Blogs, Property For Sale, Apartments For Sale'
        );
        $this->load->model('blogs_model');
        $blogs = $this->blogs_model->order_by('id', 'desc')->getAll('blog');
        if ($blogs && isset($blogs[0])) {
            $this->data['blogs'] = $blogs;
            $this->data['view_page'] = 'blogs';
            $this->load->view('template', $this->data);
        } else {
            $this->data['error'] = "No Blogs Found";
            $this->data['view_page'] = 'blogs';
            $this->load->view('template', $this->data);
            //redirect(site_url());
        }
    }

    public function blog_view($slug = "")
    {
        $this->load->model('blogs_model');
        $blog = $this->blogs_model->getOneWhere(array('slug' => trim($slug)), 'blog');
        if($slug!="all-blogs")
        $blog_type = $this->blogs_model->getOneWhere(array('slug' => trim($slug)), 'blog_type');
        else
        redirect('blog');
        if ($blog) {
            $this->data['next_blog'] = $this->blogs_model->getNextBlog($blog->id);
            $this->data['prev_blog'] = $this->blogs_model->getPrevBlog($blog->id);
            $this->data['blog'] = $blog;
            $this->data['meta'] = array(
                'title' => $blog->meta_title,
                'keywords' => $blog-> meta_keywords,
                //'description' => substr(strip_tags($blog->meta_desc), 0, 200) . '...',
                'description' => strip_tags($blog->meta_desc),
                'image' => base_url('uploads/blog_images/' . $blog->image),
            );
            $this->data['view_page'] = 'blog';
            $this->load->view('template', $this->data);
        }
        elseif ($blog_type){
           $this->data['meta'] = array(
            'title'         => 'Holding Bricks Blogs | Latest Property Updates and Trends', 
            'description'   => 'Get the latest real estate property updates, news, opinions and trends in India. Expert insights to the events in the Indian Real Estate Market. ',
            'keywords'      =>'Real Estate Blogs, Real Estate Blogs For Buyers, Latest Real Estate News, Real Estate News India 2018, Property Blog India, Property Blog, Property Related Blogs, Best Property Blogs In India, Real Estate Blogs India, Property Experts, Top Property Blogs, Property For Sale, Apartments For Sale'
        );
        $this->load->model('blogs_model');
        $where = array("blog_type" => trim($blog_type->id));
        $blogs = $this->blogs_model->getBlogType($where);
       // print_r($blogs);die;
        if ($blogs) {
            $this->data['blogs'] = $blogs;
            $this->data['view_page'] = 'blogs';
            $this->load->view('template', $this->data);
        } else {
            redirect(site_url());
        }

         } else {
            redirect(site_url());
        }
    }
    

    public function contact()
    {
        $this->data['meta'] = array(
            'title'         => 'Holding Bricks Contact and Address Details', 
            'description'   => 'Want to buy a home or looking for property advice? Contact us at Holdingbricks , best property portal in India. Find our contact details across India. ',
            'keywords'      =>'Holding Bricks Contact Details, Holding Bricks Address, Real Estate Bangalore, Real Estate Hyderabad, Real Estate Pune, Real Estate Mumbai, Real Estate Agent in Bangalore, Real Estate Agent in Hyderabad, Real Estate Agent in Pune, Real Estate Agent in Mumbai'
        );
        
        if ($this->input->post()) {
            // if (!verify_captcha()) {
            //     $this->session->set_flashdata('error', 'Invalid Captcha');
            //     redirect('contact');
            // }
            $this->config_email();

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $message = $this->input->post('message');

            $this->email->from($name, $email);
            $this->email->to('shivas8787@gmail.com');
//            $this->email->to('vineeth@soarmorrow.com');


            $this->email->subject("You have received a new enquiry for Holdingbricks ");
            $data = array(
                'post' => array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'type' => $this->input->post('type'),
                    'comment' => $message
                )
            );

            $this->email->message($this->load->view('mail_template.php', $data, true));

            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Your enquiry has been sent successfully');
                redirect(base_url('thankyou?type=home'));
                //redirect(site_url("contact"));
            }
            debug($this->email->print_debugger());
        }
        $this->data['view_page'] = 'contact';
        $this->load->view('template', $this->data);
    }

    /**
     * Careers
     */
    public function careers()
    {
        $this->data['meta'] = array(
            'title'         => 'Find Jobs – Holdingbricks  ', 
            'description'   => 'Career opportunities at Holding Bricks. Begin your journey in the world of Real Estate at a place where you can implement your ideas and make a difference.   ',
            'keywords'      =>'Bangalore Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Pune Real Estate, Jobs in Bangalore, Jobs in Hyderabad, Jobs in Pune, Jobs in Mumbai, Job Vacancies, Job Search, Real Estate Career, Career Opportunities in Real Estate, Find Jobs Real Estate'
        );
        
        if ($this->input->post()) { 
            $this->form_validation->set_rules('email', "Email Address", 'required|valid_email');
            $this->form_validation->set_rules('name', "Name", 'required');
            $this->form_validation->set_rules('phone', "Mobile Number", 'required'); 

            if ($this->form_validation->run() === true) {


                $this->config_email();

                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $self_introduction = $this->input->post('self_introduction');
                $address = $this->input->post('address');

                $this->email->from($name, $email);
                $this->email->to('shivas8787@gmail.com'); 
                $this->email->subject("You have received a new career request at Holdingbricks ");

                $data = array(
                    'post' => array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                        'application_for' => $this->input->post('application_for'),
                        'self_introduction' => $self_introduction
                    )
                );

                $this->email->message($this->load->view('mail_template.php', $data, true));
                if (isset($_FILES) && $_FILES) {
                    if (isset($_FILES["resume"]['name']) && $_FILES["resume"]['name']) {
                        $this->email->attach($_FILES['resume']['tmp_name'], 'attachment',
                            "$name's Resume" . strrchr($_FILES["resume"]['name'], '.'));
                    }
                }
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Your enquiry has been sent successfully');
                    redirect(site_url("careers#en-application"));
                }
                debug($this->email->print_debugger());
            }
            debug(validation_errors());
        }
        $this->data['careers'] = $this->home_model->getAll('careers');
        $this->data['view_page'] = 'careers';
        $this->load->view('template', $this->data);
    }

    public function refine_search()
    {
        $content = $this->input->post() ? $this->input->post() : '';
        $properties = $this->home_model->loadProperties(0, null, false, $content);
        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            foreach ($properties as $property) {
                $is_fav = $this->home_model->getOneWhere(array(
                    'user_id' => $user['id'],
                    'property_id' => $property->id
                ), 'favourites');
                $property->class_heart = $is_fav ? 'fa-heart' : 'fa-heart-o';
            }
        }
        $this->data['showPattern'] = $this->input->post('showPattern')?$this->input->post('showPattern') : 'list-group-item';
        $this->data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : '';
        $this->data['properties'] = $properties;
        echo $this->load->view('partials/property-list', $this->data, true);
        exit();
    }

    public function testimonials()
    {
        $this->data['meta'] = array(
            'title'         => 'Our Customer Reviews and Testimonials - Holding Bricks ', 
            'description'   => 'Our customers are very important to us. Read what they have to say about our services. Holding Bricks specializes in residential real estate in India.  ',
            'keywords'      =>'Bangalore Real Estate, Hyderabad Real Estate, Mumbai Real Estate, Pune Real Estate, Property in Bangalore, Property in Hyderabad, Property in Pune, Property in Mumbai, Customer Testimonials, Holding Bricks reviews, Client Testimonials'
        );
        $this->data['testimonials'] = $this->home_model->get_testimonials();
        $this->data['view_page'] = 'testimonial';
        $this->load->view('template', $this->data);
    }

    public function property($slug = null)
    {
        if (is_null($slug) || ($property = $this->home_model->getProperty($slug)) == null) {
            show_404();
        }
        if ($this->input->post()) {
            
            // if ($this->input->post('no-captcha') == null) {
            //     if (!verify_captcha()) {
            //         $this->session->set_flashdata('error', 'Invalid Captcha');
            //         redirect(site_url("property/$property->slug"));
            //     }
            // }

            $this->config_email();

            $this->email->from($this->input->post('name'), $this->input->post('email'));
            $this->email->to('shivas8787@gmail.com');

            $this->email->subject($this->input->post('name') . ' has an interest in ' . $property->title);
            $data = array(
                'post' =>
                    array(
                        'Name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'message' => $this->input->post('name') . "(" . $this->input->post('mobile') . ") has just showed an interest in the listed property <a href='" . site_url("property/$property->slug") . "'>" . $property->title . "</a> ($property->id)."
                    )
            );
            $units = '';
            if ($this->input->post('flat_types')){
                foreach ($this->input->post('flat_types') as $i => $id){
                    $flat_type = $this->home_model->getWhere(compact('id'),'property_flat_types');
                    if ($flat_type){
                        $units .= ($i+1).". ".$flat_type->name." (". $flat_type->size ." ". $flat_type->unit .")<br />";
                    }
                }
            }
            if ($units){
                $data['post']['units_interested'] = $units;
            }
            $this->email->message($this->load->view('mail_template.php', $data, true));

            if ($this->email->send()) {
                $this->data['mail_sent'] = true;
            }
        }
        $property->amenities = $this->properties_model->getAmenities($property->id);
        $property->gallery = $this->properties_model->getGallery($property->id);
        $property->gallery = $this->properties_model->getBanners($property->id);
        $property->testimonials = $this->home_model->get_testimonials($property->id);

        
        $this->data['property'] = $property;
        $this->data['view_page'] = 'property';
        $this->load->view('property-design', $this->data);
    }

    public function propertyDetails($city = null, $location = null, $slug = null)
    {
        
        if (is_null($slug) || ($property = $this->home_model->getProperty($slug)) == null) {
            show_404();
        } 
        if ($this->input->post()) {
            $this->load->model('Builders_model', 'bm');
            $builder  = $this->bm->getBuilderById('name', ['id'=>$property->builder_id]);     
           /* if (!verify_captcha()) {
                $this->session->set_flashdata('error', 'Invalid Captcha');
                redirect(site_url("property/$property->slug"));
            }*/
            $this->config_email();

            $this->email->from($this->input->post('name'), $this->input->post('email'));
            $this->email->to('shivas8787@gmail.com');
$this->email->bcc('shivas8787@gmail.com');

            $this->email->subject($this->input->post('name') . ' has an interest in ' . $property->title);
            $c_code =$this->input->post('countrycode') ? $this->input->post('countrycode') :'+91';
            $data = array(
                'post' =>
                    array(
                        'Name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $c_code." - ".$this->input->post('phone'),
                        'message' => $this->input->post('name') . "(" . $c_code." ".$this->input->post('phone') . ") has just showed an interest in the listed property <a href='" . site_url("property/$property->slug") . "'>" . $property->title . "</a> ($property->id)."
                    )
            );
                // $units = '';
                // if ($this->input->post('flat_types')){
                //     foreach ($this->input->post('flat_types') as $i => $id){
                //         $flat_type = $this->home_model->getWhere(compact('id'),'property_flat_types');
                //         if ($flat_type){
                //             $units .= ($i+1).". ".$flat_type->name." (". $flat_type->size ." ". $flat_type->unit .")<br />";
                //         }
                //     }
                // }
                // if ($units){
                //     $data['post']['units_interested'] = $units;
                // }
            $this->email->message($this->load->view('mail_template.php', $data, true));

            if ($this->email->send()) {
                //$this->data['mail_sent'] = true;
                redirect(base_url('thankyou'));
            }
            // $city = $this->input->post('city');
            // if($city=='Hyderabad')
            //      $this->data['image']= "thankyou-images/3.jpg"; 
            // redirect(base_url('thankyou?builder='.$builder['name'].'&location='.$property->area.'&property='.$property->slug.'&title='.$property->title.'&city='.$city));
              redirect(base_url('thankyou'));
        }
        $property->amenities = $this->properties_model->getAmenities($property->id);
        
        $property->gallery[] = $this->properties_model->getGallery($property->id);
        $property->gallery[] = $this->properties_model->getWhere(array("property_id"=>$property->id),"property_floor_plans");
        $property->gallery[] = $this->properties_model->getWhere(array("property_id"=>$property->id),"property_master_plans");
        $property->gallery[] = $this->properties_model->getWhere(array("property_id"=>$property->id),"property_elevations");
        $property->faq = $this->properties_model->getWhere(array("p_id"=>$property->id),"faq");
        
        $property->testimonials = $this->home_model->get_testimonials($property->id);
       
        $this->data['property'] = $property;
        $this->data['testimonials'] = json_decode(json_encode($property->testimonials),true);
        // print_r(json_decode(json_encode($this->data['testimonials']),true));die;
        $this->data['view_page'] = 'property';
        $this->load->view('property-design', $this->data);
    }
    
    public function builders(){
        
        $this->load->model('Builders_model', 'bld');
        $this->data['meta'] = 
            array(
            'title'         => 'Builders | Holding Bricks: Best Property Portal in India', 
            'description'   => 'Holding Bricks: Best Property Portal in India',
            'keywords'      => 'Holding Bricks: Best Property Portal in India'
        );
		
        $totalRecords = $this->bld->countAllBuilders(array('b.status' => 1));
        
        $offset         = !$this->input->get('offset') ? 0 : $this->input->get('offset');
        $VIEW_PER_PAGE  = 9;
        
        //pagination config
        $config['base_url']    = base_url('builders/');
        $config['uri_segment'] = 1;
        $config['total_rows']  = $totalRecords;
        $config['per_page']    = $VIEW_PER_PAGE;
        
        //styling
        $config['full_tag_open'] = '<div class="pagi">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<span class="page-link">';
        $config['num_tag_close'] = '</span class="page-link">';
        $config['cur_tag_open'] = '<span class="page-link active"><em>';
        $config['cur_tag_close'] = '</em></span>';
        $config['prev_tag_open'] = '<span class="page-link">';
        $config['prev_tag_close'] = '</span>';
        $config['next_tag_open'] = '<span class="page-link">';
        $config['next_tag_close'] = '</span>';
        $config['first_tag_open'] = '<span class="page-link">';
        $config['first_tag_close'] ='</span>';
        $config['last_tag_open'] = '<span class="page-link">';
        $config['last_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        
        $this->data['buildersData'] = $this->bld->getBuildersByLimit(array('b.status' => 1), $offset, $VIEW_PER_PAGE);
        $this->data['view_page']    = 'builders';
        $this->load->view('template', $this->data);
    }
  public function sendEmail( )
  {
    if ($this->input->post()) { 
           
            $this->config_email();

            $this->email->from($this->input->post('name'), $this->input->post('email'));
            $this->email->to('shivas8787@gmail.com');

            $this->email->subject($this->input->post('name') . ' has Requested callback ' );
            $c_code =$this->input->post('countrycode') ? $this->input->post('countrycode') :'+91';
            $data = array(
                'post' =>
                    array(
                        'Name' => $this->input->post('name'), 
                        'phone' => $c_code." - ".$this->input->post('phone'),
                        'email' => $this->input->post('email')
                    )
            );
            $this->email->message($this->load->view('mail_template.php', $data, true));
            if ($this->email->send()) {
                $this->data['mail_sent'] = true;
            }
            redirect(base_url('thankyou?type=instant'));
        }
  }
  public function sendEmailCity( )
  {
    if ($this->input->post()) { 
           
            $this->config_email();

            $this->email->from($this->input->post('name'), $this->input->post('email'));
            $this->email->to('shivas8787@gmail.com');

            $this->email->subject($this->input->post('name') . ' has Requested callback ' );
            $c_code =$this->input->post('countrycode') ? $this->input->post('countrycode') :'+91';
            $data = array(
                'post' =>
                    array(
                        'Name' => $this->input->post('name'), 
                        'phone' => $c_code." - ".$this->input->post('phone'),
                        'Email' => $this->input->post('email'),
                        'City' => $this->input->post('city_name1')
                    )
            );
            $this->email->message($this->load->view('mail_template.php', $data, true));
            //echo $this->load->view('mail_template.php', $data, true);die;
            if ($this->email->send()) {
                $this->data['mail_sent'] = true;
            }
            else
            {
                echo $this->email->print_debugger();die;
            }
            redirect(base_url('thankyou?type=instant'));
        }
  }
  public function achievements()
  {
    $this->data['meta'] = array(
        'title'         => 'Holding Bricks Achivements | Latest Property Updates and Trends', 
        'description'   => 'Get the latest real estate property updates, news, opinions and trends in India. Expert insights to the events in the Indian Real Estate Market. ',
        'keywords'      =>'Holdingbricks  achivements'
    );
      //  $content = $this->input->get('content');
        $this->data['achievements'] = $this->achievements_model->loadAchievements($perpage, $page, FALSE, $content);
   
        $this->data['view_page'] = 'achievements';
        $this->load->view('template', $this->data); 
  }

  public function nri()
  {
    $this->data['meta'] = array(
        'title'         => 'Holding Bricks NRI | Latest Property Updates and Trends', 
        'description'   => 'Get the latest real estate property updates, news, opinions and trends in India. Expert insights to the events in the Indian Real Estate Market. ',
        'keywords'      =>'Holdingbricks  NRI'
    );  
        $this->data['view_page'] = 'nri';
        $this->load->view('template', $this->data);
 
  } 

}
