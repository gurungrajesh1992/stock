<?php
class Items_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll_location()
    {
        $locations =  $this->db->get_where('location_para', array('status' => '1'))->result_array();

        return $locations;
    }

    public function getAll_categories()
    {
        $locations =  $this->db->get_where('categories', array('status' => '1'))->result_array();

        return $locations;
    }

    // public function get_where($table, $where)
    // {
    //     $result = $this->db->order_by('id', 'DESC')->get_where($table, $where)->result();
    //     return $result;
    // }
}
