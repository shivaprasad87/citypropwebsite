<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getProperties() {
        return $this->db->select('p.*, c.name as city_name, pt.name as prop_type, b.name as builder, l.name as location')
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->where('p.status', 1)
                ->where('p.highlight', 1)
                ->order_by("p.id", "DESC")
                ->limit(7)
                ->get()
                ->result();
    }
        public function getBestdealProperties($city_id = null, $property_id = null ,$limit = null) {
       if ($limit){
            $this->db->limit($limit);
        }
        if ($property_id){
            $this->db->where('p.id !=', $property_id);
        }
        if ($city_id){
        $this->db->where('p.city_id', $city_id);
        }
        return $this->db->select('p.*, c.name as city_name, pt.name as prop_type, b.name as builder, l.name as location')
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->where('p.status', 1)
                ->where('p.best_deal', 1)
                ->order_by("p.id", "DESC") 
                ->get()
                ->result();
    }

    public function getPriceRanges(){
        return $this->db->select('MAX(budget) as max, MIN(budget) as min')
                        ->from('properties')
                        ->get()
                        ->row();
    }

    public function loadProperties($perpage = 0, $page = 0, $count, $content = false) {
        $data = array();
        $this->db->select('p.*, c.name as city_name,ps.name as property_status, pt.name as prop_type, b.name as builder, l.name as location')
                ->distinct()
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
                ->join('property_amenities pa', 'pa.property_id = p.id', 'LEFT')
                ->join('property_flat_types pft', 'pft.property_id = p.id', 'LEFT');

        if ($content) {
            if ((isset($content['keyword']) && $content['keyword']) != NULL) {
                $this->db->group_start();
                $this->db->or_like('c.name', trim($content['keyword']));
                $this->db->or_like('pt.name', trim($content['keyword']));
                $this->db->or_like('b.name', trim($content['keyword']));
                $this->db->or_like('l.name', trim($content['keyword']));
                $this->db->or_like('p.title', trim($content['keyword']));
                $this->db->or_like('p.issue_date', trim($content['keyword']));
                $this->db->group_end();
            }
            if ((isset($content['location']) && $content['location']) != NULL) {
                $this->db->where('p.location_id', $content['location']);
            }
            if ((isset($content['city']) && $content['city']) != NULL) {
                $this->db->where('p.city_id', $content['city']);
            }
            if ((isset($content['property_type']) && $content['property_type']) != NULL) {
                $this->db->where('p.property_type_id', $content['property_type']);
            }
            if ((isset($content['amenities']) && $content['amenities']) != NULL) {
                foreach ($content['amenities'] as $amenity) {
                    $this->db->where('pa.amenity_id', $amenity);
                }
            }
            if (isset($content['bhk']) && $content['bhk']!=null) {
               $this->db->where('pft.flat_type_id =', $content['bhk']); 
            }
            if (isset($content['price_range']) && $content['price_range'] && $content['price_range'][1]!=null) {
               $this->db->where('pft.total >=', $content['price_range'][0]);
               $this->db->where('pft.total <=',  $content['price_range'][1]);
            }
            if (isset($content['baths']) && $content['baths']!=null) {
               $this->db->where('pft.size =', $content['baths']); 
            }
            if (isset($content['status']) && $content['status']) {
                $this->db->where('ps.id', $content['status']);
            }
            if (isset($content['bed']) && $content['bed']) {
                $this->db->where('p.bedrooms', $content['bed']);
            }
            if (isset($content['property_status_id']) && $content['property_status_id']) {
                $this->db->where('p.property_status_id', $content['property_status_id']);
            }
            if (isset($content['budget']) && $content['budget']) {
                $this->db->join('property_flat_types pft', 'pft.property_id = p.id', 'left');
                $range = explode('-', $content['budget']);
                if (count($range) === 1){
                    $operator = $content['budget'][0];
                    $this->db->where("pft.total $operator ",floatval(substr($content['budget'],1, strlen($content['budget']))));
                }else{
//                    $this->db->join('property_flat_types pft', 'pft.property_id = p.id and pft.total = (select min(total) from property_flat_types where property_id = p.id)', 'left', false);
                    $this->db->where("(pft.total >= ".floatval($range[0])." AND pft.total <= ".floatval($range[1]).")", null, false);
                }
            }

            // if ((isset($content['price']) && $content['price']) != NULL) {
            //     $range = explode(",", $content['price']);
            //     $this->db->where('p.budget >', $range[0]);
            //     $this->db->where('p.budget <=', $range[1]);
            // }
        }

        $this->db->where('p.status', 1);
        $this->db->order_by("p.id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function loadFavourites($perpage, $page, $count, $content = false){
        $data = array();
        $user = $this->session->userdata('logged_in');
        $this->db->select('p.*, c.name as city_name, pt.name as prop_type, b.name as builder, l.name as location')
                ->distinct()
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('favourites f', 'p.id = f.property_id', 'LEFT')
                ->join('property_amenities pa', 'pa.property_id = p.id', 'LEFT');

        $this->db->where('f.user_id', $user['id']);
        $this->db->where('p.status', 1);
        $this->db->order_by("p.id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    function getCreds($username = NULL) {
        $this->_db = 'users';
        if ($username) {
            $sql = "
                SELECT
                    id,
                    username,
                    password,
                    salt,
                    first_name,
                    last_name,
                    email,
                    language,
                    is_admin,
                    status,
                    created,
                    updated
                FROM {$this->_db}
                WHERE (username = " . $this->db->escape($username) . "
                        OR email = " . $this->db->escape($username) . ")
                    AND status = '1'
                    AND deleted = '0'
                LIMIT 1
            ";

            $query = $this->db->query($sql);

            if ($query->num_rows()) {
                $results = $query->row_array();
                return $results;
            }
        }

        return FALSE;
    }


    /**
     * @param null $slug
     * @return array
     */
    public function getProperty($slug = null) {
        return !is_null($slug) ?  $this->db->select(
            'p.*, 
            ps.name as property_status, 
            c.name as city_name, 
            pt.name as prop_type, 
            b.name as builder, 
            b.image as builder_image,
            b.description as builder_description,
            b.location as builder_location,
            b.experience as builder_experience,
            b.ongoing as builder_ongoing,
            b.upcoming as builder_upcoming,
            b.completed as builder_completed,
            b.alt_title as builder_alt_title,
            b.image_desc as builder_image_desc,
            l.name as location,
            ')
            ->from('properties p')
            ->join('cities c', 'p.city_id = c.id', 'LEFT')
            ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
            ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
            ->join('builders b', 'p.builder_id = b.id', 'LEFT')
            ->join('locations l', 'p.location_id = l.id', 'LEFT')
            ->where('p.status', 1)
            ->where('p.slug', trim($slug))
            ->order_by("p.id", "DESC")
            ->limit(7)
            ->get()
            ->row() : NULL;
    }


    public function getBuilderProjects($builder_id = null, $property_id = null ,$limit = null) {
        if ($limit){
            $this->db->limit($limit);
        }
        if ($property_id){
            $this->db->where('p.id !=', $property_id);
        }
        return $this->db->select(
            'p.*, 
            ps.name as property_status, 
            c.name as city_name, 
            pt.name as prop_type, 
            b.name as builder, 
            b.image as builder_image,
            b.description as builder_description,
            b.location as builder_location,
            b.experience as builder_experience,
            b.ongoing as builder_ongoing,
            b.upcoming as builder_upcoming,
            b.completed as builder_completed,
            l.name as location,
            ')
            ->from('properties p')
            ->join('cities c', 'p.city_id = c.id', 'LEFT')
            ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
            ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
            ->join('builders b', 'p.builder_id = b.id', 'LEFT')
            ->join('locations l', 'p.location_id = l.id', 'LEFT')
            ->where('p.status', 1)
            ->where('b.id', $builder_id )
            ->order_by("p.id", "DESC")
            ->get()
            ->result();
    }
    public function getsameLocationProjects($location_id = null, $property_id = null ,$limit = null) {
       if ($limit){
            $this->db->limit($limit);
        }
        if ($property_id){
            $this->db->where('p.id !=', $property_id);
        }
        return $this->db->select(
            'p.*, 
            ps.name as property_status, 
            c.name as city_name, 
            pt.name as prop_type, 
            b.name as builder, 
            b.image as builder_image,
            b.description as builder_description,
            b.location as builder_location,
            b.experience as builder_experience,
            b.ongoing as builder_ongoing,
            b.upcoming as builder_upcoming,
            b.completed as builder_completed,
            l.name as location,
            ')
            ->from('properties p')
            ->join('cities c', 'p.city_id = c.id', 'LEFT')
            ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
            ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
            ->join('builders b', 'b.id=p.builder_id', 'LEFT')
            ->join('locations l', 'p.location_id = l.id', 'LEFT')
            ->where('l.id',$location_id)
            ->where('p.status', 1) 
            ->order_by("p.id", "DESC")
            ->get()
            ->result();
    }
    
    function loadPropertiesUsingBuilder($perpage = 0, $page = 0, $count, $builder){
        
        $data = array();
        $this->db->select('p.*, c.name as city_name,ps.name as property_status, pt.name as prop_type, b.name as builder, l.name as location')
                ->distinct()
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
                ->join('property_amenities pa', 'pa.property_id = p.id', 'LEFT');

        $this->db->where(['p.status'=>1, 'b.name'=>$builder]);
        
        $this->db->order_by("p.id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }
        public function getflattypes($property_id) {
        
        $data =  $this->db->select('total')
            ->from('property_flat_types') 
            ->where('property_id',$property_id)
            ->get()
            ->result();
            return json_decode(json_encode($data),true);
    }
    public function get_testimonials($id=null)
    {
        if($id)
        {
       return $this->db->select('t.*,c.name as city, p.area as area, p.slug as slug,p.title as project')
                ->from('testimonials t')
                ->join('properties p','p.id = t.property_id','left')
                ->join('cities c','c.id = p.city_id','left')
                ->order_by("t.id", "DESC")
                ->where("t.status",1)
                ->where("t.property_id",$id)
                ->get()
                ->result();   
            }
            else
            {
                return $this->db->select('t.*,c.name as city, p.area as area, p.slug as slug,p.title as project')
                ->from('testimonials t')
                ->join('properties p','p.id = t.property_id','left')
                ->join('cities c','c.id = p.city_id','left')
                ->order_by("t.id", "DESC")
                ->where("t.status",1)
                ->get()
                ->result();   

            }

    }
        public function get_city_id($name = null)
    {
        $data = $this->db->select('id')
        ->from('cities')
        ->where('name',$name)
        ->get()
        ->result();
        return  json_decode(json_encode($data[0]->id),true);
    }
     public function properties_site_map()
    {
        $this->db->select('p.*, c.name as city_name,ps.name as property_status, pt.name as prop_type, b.name as builder, l.name as location')
                ->distinct()
                ->from('properties p')
                ->join('cities c', 'p.city_id = c.id', 'LEFT')
                ->join('builders b', 'p.builder_id = b.id', 'LEFT')
                ->join('locations l', 'p.location_id = l.id', 'LEFT')
                ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
                ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
                ->join('property_amenities pa', 'pa.property_id = p.id', 'LEFT')
                ->join('property_flat_types pft', 'pft.property_id = p.id', 'LEFT');
                $result = $this->db->get()->result();
         return $result;
    }
    public function locations_like($value='')
    {
        return $this->db->select('name')
                        ->from('locations')
                        ->like('name',$value)
                        ->get()
                        ->row();
    }

    

}
