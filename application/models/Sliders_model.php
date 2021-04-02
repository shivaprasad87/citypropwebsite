<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadSliders($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('sliders');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('title', trim($content));
            $this->db->or_like('heading', trim($content));
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

}
