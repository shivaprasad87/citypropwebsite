<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Builders_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadBuilders($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('builders');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('name', trim($content));
            $this->db->or_like('description', trim($content));
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
    
    public function getBuilderById($params, $clause) {
        echo $params;
        // $this->db->select($params);
        // $q = $this->db->get_where('builders', $clause);
        // return $q->row_array();
    }
    
    function getBuildersByLimit($clause, $start, $limit){ 
        $this->db->select('b.id, b.name, b.image, p.image propertyImage, p.slug, COUNT(p.id) totalProperty');
        if($limit)
            $this->db->limit($limit, $start);  
        $this->db->group_by('b.id');
        $this->db->from('builders b');
        $this->db->join('properties p', 'b.id = p.builder_id', join);
        $this->db->where($clause);
        $q=$this->db->get();
        return $q->result_array();
    }
    
    function countAllBuilders($clause){
        $this->db->select('b.id'); 
        $this->db->group_by('b.id');
        $this->db->from('builders b');
        $this->db->join('properties p', 'b.id = p.builder_id', join);
        $this->db->where($clause);
        $q=$this->db->get();
        return $q->num_rows();
    }
    function getLocationById($params, $clause) {
        $this->db->select($params);
        $q = $this->db->get_where('locations', $clause);
        return $q->row_array();
    }

}
