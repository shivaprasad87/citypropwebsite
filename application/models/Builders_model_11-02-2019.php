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

}
