<?php
class Item_insurance_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll_item_code()
    {
        $item_code =  $this->db->get_where('item_infos', array('status' => '1'))->result_array();

        return $item_code;
    }
}
