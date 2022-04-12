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

    public function item_code()
    {
        $last_row_no = $this->crud_model->get_where_single_order_by('item_infos', array('status' => '1'), 'id', 'DESC');
        if (isset($last_row_no->item_code)) {
            $string = $last_row_no->item_code;
            $explode = explode("-", $string);
            $int_value = intval($explode[1]) + 1;
            // var_dump(sprintf("%04d", $int_value));
            $data['item_code'] = 'IC' . date('dmY') . '-' . sprintf("%04d", $int_value);
        } else {
            $data['item_code'] = 'IC' . date('dmY') . '-0001';
        }

        return $data['item_code'];
    }
}
