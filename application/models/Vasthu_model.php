<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vasthu_model extends MY_Model
{

    function __construct()
    {
        parent::__construct('about_us', 'id');
    }

    /**
     * @param null $option
     * @return string
     */
    // public function getOption($option = null)
    // {
    //     return (!is_null($option) && ($row = $this->getOneWhere(array('name' => $option))) != null) ? $row->value : "";
    // }
    public function GetData($value='')
    {
     $this->db->select('*')
       ->from('vasthu');

        $data = $this->db->get();
        return $data->result();
    } 
 
 

}
