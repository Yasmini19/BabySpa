<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {

	function __construct(){
            parent::__construct();
            
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_selected($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    public function get_selected_2where($table,$where,$where1)
    {
        $this->db->where($where);
        $this->db->where($where1);
        return $this->db->get($table);
    }

}

/* End of file GeneralModel.php */
/* Location: ./application/models/GeneralModel.php */