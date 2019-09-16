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

     public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_selected_limit($table,$where,$limit,$orderby,$id)
    {
        $this->db->order_by($id, $orderby);
        return $this->db->get_where($table,$where,$limit);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function add_data1($table, $data)
    {
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }

    public function get_selected_join($table,$table1,$where,$on)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_selected_join_where($table,$table1,$where,$where1,$on){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->where($where);
        $this->db->where($where1);
        $query = $this->db->get();
        return $query;
    }

    public function get_3selected_join($table,$table1,$table2,$on,$on2,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_3join($table,$table1,$table2,$on, $on2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $query = $this->db->get();
        return $query;
    }

    public function get_4selected_join($table,$table1,$table2,$table3,$on,$on2,$on3,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_6join($table,$table1,$table2,$table3,$table4,$table5,$on,$on2,$on3,$on4,$on5)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $query = $this->db->get();
        return $query;
    }

    public function get_7join($table,$table1,$table2,$table3,$table4,$table5,$table6,$on,$on2,$on3,$on4,$on5,$on6)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $query = $this->db->get();
        return $query;
    }

    public function get_7selected_join($table,$table1,$table2,$table3,$table4,$table5,$table6,$on,$on2,$on3,$on4,$on5,$on6,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }


    public function get_where_7selected_join($table,$table1,$table2,$table3,$table4,$table5,$table6,$on,$on2,$on3,$on4,$on5,$on6,$where,$where1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $this->db->where($where);
        $this->db->where($where1);
        $query = $this->db->get();
        return $query;
    }

    public function get_where_8selected_join($table,$table1,$table2,$table3,$table4,$table5,$table6,$table7,$on,$on2,$on3,$on4,$on5,$on6,$on7,$where,$where1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $this->db->join($table7, $on7);
        $this->db->where($where);
        $this->db->where($where1);
        $query = $this->db->get();
        return $query;
    }

    public function get_8selected_join($table,$table1,$table2,$table3,$table4,$table5,$table6,$table7,$on,$on2,$on3,$on4,$on5,$on6,$on7,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $this->db->join($table7, $on7);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_6selected_join($table,$table1,$table2,$table3,$table4,$table5,$on,$on2,$on3,$on4,$on5,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    public function get_5join($table,$table1,$table2,$table3,$table4,$on,$on2,$on3,$on4,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_5selected_join($table,$table1,$table2,$table3,$table4,$on,$on2,$on3,$on4)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $query = $this->db->get();
        return $query;
    }

    public function get_4join($table,$table1,$table2,$table3,$on,$on2,$on3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $query = $this->db->get();
        return $query;
    }

}

/* End of file GeneralModel.php */
/* Location: ./application/models/GeneralModel.php */