<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadLocations($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('loc.*, cities.name as city')
                ->from('locations loc')
                ->join('cities', 'loc.city_id = cities.id', 'LEFT');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('loc.name', trim($content));
            $this->db->or_like('loc.description', trim($content));
            $this->db->or_like('cities.name', trim($content));
            $this->db->group_end();
        }
        $this->db->where('loc.status', 1);
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

    public function getLocation($id){
        return $this->db->select('loc.*, cities.name as city')
                        ->from('locations loc')
                        ->join('cities', 'loc.city_id = cities.id', 'LEFT')
                        ->where('loc.id', $id)
                        ->get()
                        ->row();
    }

}
