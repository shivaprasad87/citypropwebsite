<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nri_model extends MY_Model
{

    function __construct()
    {
        parent::__construct('about_us', 'id');
    }

    /**
     * @param null $option
     * @return string
     */
    public function getOption($option = null)
    {
        return (!is_null($option) && ($row = $this->getOneWhere(array('name' => $option))) != null) ? $row->value : "";
    }
 

}
