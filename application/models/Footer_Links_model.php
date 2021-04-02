<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Footer_Links_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadFooterLinks($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('pft.*')
                ->from('property_type pft');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('pft.name', trim($content));
            $this->db->or_like('pft.search_key', trim($content)); 
            $this->db->group_end();
        }
        $this->db->where('pft.status', 1);
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

    public function getFooterproperty($id){
        return $this->db->select('pft.*')
                        ->from('property_type pft')
                        ->where('pft.id', $id)
                        ->get()
                        ->row();
    }

}
