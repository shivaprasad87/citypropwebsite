<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadTestimonials($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('testimonials');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('job_desc', trim($content));
            $this->db->or_like('name', trim($content));
            $this->db->or_like('comment', trim($content));
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
