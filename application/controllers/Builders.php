<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Builders extends Public_Controller
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
         $this->data['property_type'] = $this->home_model->getWhere(array('status' => 1), 'property_type');
        
    }

    function index(){
        
        $this->data['meta'] = 
            array(
            'title'         => 'Builders | Prop Solutions: Best Property Portal in India', 
            'description'   => 'Prop Solutions: Best Property Portal in India',
            'keywords'      => 'Prop Solutions: Best Property Portal in India'
        ); 
        if($this->input->get('builder')){            
            $builderName =  $this->security->xss_clean($this->input->get('builder'));  
           
            $this->data['builders'] = $this->home_model->getWhere(array('name' => $builderName), 'builders');


            $builder  = $this->bm->getBuilderById('id', ['name'=>$builderName]);
            $this->data['similar_builder_property'] = $this->properties_model->getPropertiesByLimit(array('p.builder_id' =>$builder['id'], 'p.slug !='=>$property), 0, 10);
        }
        if($this->input->get('location')){   
            $location =  $this->security->xss_clean($this->input->get('location'));
            $l   = $this->bm->getLocationById('id', ['name'=>$location]);
            $this->data['similar_location_property'] = $this->properties_model->getPropertiesByLimit(array('p.location_id' =>$l['id']), 0, 10);
            
             
        } 

        $this->data['sliders'] = $this->home_model->order_by('id', 'desc')->getWhere(array('builder_id'=> $this->data['builders'][0]->id), 'properties');
        $this->data['view_page'] = 'builder_properties';
        $this->load->view('template', $this->data);
    }
    

}
