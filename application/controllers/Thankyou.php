<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends Public_Controller
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
        $this->load->model('Builders_model', 'bm');
        // $this->session->unset_userdata('city');
        $this->data['property_types'] = $this->home_model->getWhere(array('status' => 1), 'property_types');
        
    }

    function index(){
        
        $this->data['meta'] = 
            array(
            'title'         => 'Thank You | Prop Solutions: Best Property Portal in India', 
            'description'   => 'Prop Solutions: Best Property Portal in India',
            'keywords'      => 'Prop Solutions: Best Property Portal in India'
        );


        if($this->input->get('type') == 'home')
            $this->data['properties'] = $this->home_model->getProperties('properties', 7);
        
        if($this->input->get('builder') && $this->input->get('location') && $this->input->get('property')){  
        $city = $this->input->get('city');
            if($city=='Hyderabad')
                 $this->data['image']= "thankyou-images/3.jpg";
                 elseif ($city=='Bangalore') {
                              $this->data['image']= "thankyou-images/1.jpg";
                           }    
                            elseif ($city=='Pune') {
                              $this->data['image']= "thankyou-images/2.jpg";
                           }   
                            elseif ($city=='Noida') {
                              $this->data['image']= "thankyou-images/5.jpg";
                           }  
                           elseif ($city=='Mumbai') {
                              $this->data['image']= "thankyou-images/4.jpg";
                           } 
                           else
                           {
                            $this->data['image']= "thankyou-images/all.jpg";
                           }    
            $builderName = $this->security->xss_clean($this->input->get('builder'));
            $location    = $this->security->xss_clean($this->input->get('location'));
            $property    = $this->security->xss_clean($this->input->get('property'));
            
            $builder  = $this->bm->getBuilderById('id', ['name'=>$builderName]);
            $this->data['similar_builder_property'] = $this->properties_model->getPropertiesByLimit(array('p.builder_id' =>$builder['id'], 'p.slug !='=>$property), 0, 10);
            
            $propData = $this->properties_model->getPropertyBySlug($property);            
            $this->data['similar_location_property'] = $this->properties_model->getPropertiesByLimit(array('p.area' =>$propData['area'], 'p.slug !='=>$property), 0, 10);
        }
        if($this->input->get('type') == 'instant')
        {
            $this->data['msg'] = "Instant Callback";
            $this->data['image']= "thankyou-images/all.jpg";
        }
        $this->data['sliders'] = $this->home_model->order_by('id', 'desc')->getWhere(array('status' => 1, 'type'=>'T'), 'sliders');
        $this->data['view_page'] = 'thank-you';
        $this->load->view('template', $this->data);
    }
    

}
