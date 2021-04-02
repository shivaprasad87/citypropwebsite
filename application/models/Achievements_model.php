<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Achievements_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadAchievements($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('achievements');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('comment', trim($content));
            $this->db->group_end();
        }
        $this->db->where('status', 1);
        $this->db->order_by("award_date", "desc");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }
    public function load_by_year($year='')
    {
       $this->db->select('*')
       ->from('achievements')
       ->where('year(award_date)',$year);

        $data = $this->db->get();

        return json_decode(json_encode($data->result()),true);
    }

}
