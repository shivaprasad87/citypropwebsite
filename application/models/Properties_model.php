<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function loadPropertyTypes($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('property_types');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->group_end();
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function loadCities($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('cities');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->or_like('email', trim($content));
            $this->db->or_like('address', trim($content));
            $this->db->or_like('phone', trim($content));
            $this->db->group_end();
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function loadAmenities($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('amenities');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->group_end();
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function loadProperties($perpage, $page, $count, $content = "", $rera_filter = false)
    {
        $data = array();
        $this->db->select('p.*, c.name as city_name, pt.name as prop_type, b.name as builder, l.name as location')
            ->from('properties p')
            ->join('cities c', 'p.city_id = c.id', 'LEFT')
            ->join('builders b', 'p.builder_id = b.id', 'LEFT')
            ->join('locations l', 'p.location_id = l.id', 'LEFT')
            ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT');

        if ($rera_filter){
            if ($content != null) {
                $this->db->group_start();
                $this->db->or_like('p.title', trim($content));
                $this->db->group_end();
            }
            $this->db->order_by("p.rera_status", "DESC");
        }else{
            if ($content != null) {
                $this->db->group_start();
                $this->db->or_like('b.name', trim($content));
                $this->db->or_like('l.name', trim($content));
                $this->db->or_like('p.title', trim($content));
                $this->db->or_like('p.area', trim($content));
                $this->db->or_like('p.budget', trim($content));
                $this->db->or_like('c.name', trim($content));
                $this->db->or_like('pt.name', trim($content));
                $this->db->group_end();
            }
            $this->db->order_by("p.id", "DESC");
        }
        $this->db->where('p.status', 1);
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        
        return $data->result();
    }

    public function getProperty($id)
    {
        return $this->db->select('p.*, ps.name as property_status, c.name as city_name, pt.name as prop_type, b.name as builder, l.name as location')
            ->from('properties p')
            ->join('cities c', 'p.city_id = c.id', 'LEFT')
            ->join('property_types pt', 'p.property_type_id = pt.id', 'LEFT')
            ->join('property_status ps', 'p.property_status_id = ps.id', 'LEFT')
            ->join('builders b', 'p.builder_id = b.id', 'LEFT')
            ->join('locations l', 'p.location_id = l.id', 'LEFT')
            ->where('p.status', 1)
            ->where('p.id', $id)
            ->get()
            ->row();
    }

    public function checkIfSlugExists($str, $id)
    {
        return $this->db->select('*')
            ->from('properties')
            ->where('slug', $str)
            ->where('id !=', $id)
            ->get()
            ->row();
    }

    public function user_favourites($perpage, $page, $count, $content = "", $property_id)
    {
        $data = array();
        $this->db->select('u.*')
            ->from('users u')
            ->join('favourites f', 'u.id = f.user_id', 'LEFT');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('first_name', trim($content));
            $this->db->or_like('last_name', trim($content));
            $this->db->or_like('email', trim($content));
            $this->db->group_end();
        }
        $this->db->where('f.property_id', $property_id);
        $this->db->order_by("f.id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    /**
     * Get all amenities related to the property
     *
     * @param null $property_id
     * @return mixed
     */
    public function getAmenities($property_id = null)
    {
        return $this->db->select('a.*')
            ->from('amenities a')
            ->join('property_amenities pa', 'pa.amenity_id = a.id')
            ->where('pa.property_id', $property_id)
            ->get()
            ->result();
    }

    /**
     * @param null $property_id
     * @return mixed
     */
    public function getGallery($property_id = null)
    {
        return $this->getWhere(compact('property_id'), 'property_images');
    }
    /** PROPERTY STATUS */
    /**
     * @param $perpage
     * @param $page
     * @param $count
     * @param string $content
     * @return mixed
     */
    public function loadPropertyStatus($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('property_status');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->group_end();
        }
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    /**
     * Get alphabetically ordered property status
     * @return mixed
     */
    public function getPropertyStatus()
    {
        return $this->db->order_by('name')->get('property_status')->result();
    }


    /** PROPERTY SPECIFICATIONS */

    /**
     * @param $perpage
     * @param $page
     * @param $count
     * @param string $content
     * @return mixed
     */
    public function loadPropertySpecification($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('property_specification');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->group_end();
        }
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    /**
     * Get alphabetically ordered property status
     *
     * @param null $property_id
     * @param null $specification_id
     * @return mixed
     */
    public function getPropertySpecification($property_id = null, $specification_id = null)
    {
        if ($property_id && $specification_id) {
            $filter = array();
            if ($property_id) {
                $filter['property_id'] = $property_id;
            }
            if ($specification_id) {
                $filter['specification_id'] = $specification_id;
            }

            return ($row = $this->getOneWhere($filter, 'property_specification_relation')) != null ? $row->content : "";
        }
        if ($property_id ) {
            return $this->db->select('ps.*')
                ->from('property_specification ps')
                ->join('property_specification_relation psr', 'psr.specification_id = ps.id')
                ->where('psr.property_id', $property_id)
                ->get()
                ->result();
        }
        return $this->db->order_by('name')->get('property_specification')->result();
    }

    /** FLAT TYPE MANAGEMENT */

    /**
     * @param $perpage
     * @param $page
     * @param $count
     * @param string $content
     * @return mixed
     */
    public function loadPropertyFlatTypes($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('flat_types');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->group_end();
        }
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    /**
     * Get alphabetically ordered property status
     * @return mixed
     */
    public function getPropertyFlatType($id = null, $property_id = null, $offset = 0, $param = null)
    {
        if ($id && $property_id) {
            $row = $this->db->where('property_id', $property_id)
                ->where('flat_type_id', $id)
                ->order_by('flat_type_id')
                ->limit(1, $offset)
                ->get('property_flat_types')
                ->row();
            return $row ? ($param ? $row->{$param} : $row) : null;
        }
        if ($id) {
            return $this->getOneWhere(array('id' => $id), 'property_flat_types');
        }
        if ($property_id) {
            return $this->db->select('ft.name as flat_type, pft.*')
                ->from('property_flat_types pft')
                ->join('flat_types ft', 'ft.id = pft.flat_type_id')
                ->where('pft.property_id', $property_id)
                ->group_by('pft.flat_type_id')
                ->get()
                ->result();
        }
        return $this->db->order_by('name')->get('flat_types')->result();
    }


    /**
     * Get Property Images
     *
     * @param null $id
     * @return array
     */
    public function getPropertyImages($id = null)
    {
        return is_null($id) ? array() : $this->getWhere(array('property_id' => $id), 'property_images');
    }

    /**
     * Get a specific property param
     *
     * @param array $where
     * @param string $table
     * @param string $param
     * @return string
     */
    public function getPropertyParam($where = array(), $table = '', $param = '', $select = array())
    {
        if ($select){
            $this->select($select);
        }
        $row = $this->getOneWhere($where, $table);
        return $row ? ($param ? $row->{$param} : $row) : "";
    }

    public function getPropertyRange($where = array(), $table = '', $field = '')
    {
        $min_row = $this->db->select("MIN($field) as data")
            ->get_where($table, $where)
            ->row();
        $min = $min_row ? $min_row->data : '-';

        $max_row = $this->db->select("MAX($field) as data")
            ->get_where($table, $where)
            ->row();

        $max = $max_row ? $max_row->data : '-';

        return ($min ? $min : '-')." - ".($max ? $max : '-');
    }


    /**
     * Get Property Floor Plans
     *
     * @param null $id
     * @return array
     */
    public function getPropertyFloorPlans($id = null)
    {
        return is_null($id) ? array() : $this->getWhere(array('property_id' => $id), 'property_floor_plans');
    }
    /**
     * Get Property Master Plans
     *
     * @param null $id
     * @return array
     */
    public function getPropertyMasterPlans($id = null)
    {
        return is_null($id) ? array() : $this->getWhere(array('property_id' => $id), 'property_master_plans');
    }

    /** CAREER */

    /**
     * @param $perpage
     * @param $page
     * @param $count
     * @param string $content
     * @return mixed
     */
    public function loadPropertyCareer($perpage, $page, $count, $content = "")
    {
        $data = array();
        $this->db->select('*')
            ->from('careers');

        if ($content != null) {
            $this->db->group_start();
            $this->db->or_like('title', trim($content));
            $this->db->group_end();
        }
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    /**
     * @param null $property_id
     * @return bool
     */
    public function hasPriceRequest($property_id = null)
    {
        if (is_null($property_id)){
            return false;
        }

        return $this->db->select('*')
            ->from('property_flat_types')
            ->where('property_id', $property_id)
            ->where('price_on_request',1)
            ->get()
            ->num_rows();
    }
    
    function getPropertiesByLimit($clause, $start, $limit){
        $this->db->select('p.*, c.name cityName');
        if($limit!='' && $start!=''){
           $this->db->limit($limit, $start);
        }
        $this->db->where($clause);
        $this->db->from('properties p');
        $this->db->join('cities c', 'c.id = p.city_id', 'join');
        $q=$this->db->get();
        return $q->result_array();
    }
    
    function getPriceFromProperity($clause){
        $this->db->select('MIN(total) amount, price_on_request');
        $q=$this->db->get_where('property_flat_types', $clause);
        return $q->row_array();
    }
     
    function getPropertyType($clause){
        $q=$this->db->get_where('property_types', $clause);
        return $q->row_array();
    }
    
    function getPropertyBySlug($slug){
        $this->db->select('area');
        $q=$this->db->get_where('properties', ['slug'=>$slug]);
        return $q->row_array();
    }
    
    function getPropertiesFav($propertyId, $userId){
        $q=$this->db->get_where('favourites', ['user_id'=>$userId, 'property_id'=>$propertyId]);
        return $q->num_rows();
    }
    
    function update_map($property_id = null,$data)
    {
        $data=array('map'=>$data);
        $this->db->where('id',$property_id);
        $this->db->update('properties',$data);
    }

    public function testmonial_properties()
    {
       $this->db->select('id, title');
       $this->db->from('properties');
       $result = $this->db->get();
       return $result->result();
    }

    public function map_delete($id='',$data='')
    { 
       // print_r($data);die;
        $this->db->where('id',$id);
        $this->db->update('properties',$data);
    }
        public function get_area($city_id='')
    {
        $this->db->select('*');
        $this->db->from('locations');
        $this->db->where('city_id',$city_id);
        $result = $this->db->get();
        $result = $result->result();
        if(count($result) > 0){
        return $result?$result:'';
        }
        else
            return false;

    }
    
}
