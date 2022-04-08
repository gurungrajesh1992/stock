<?php
class Item_accessories_model extends CI_Model
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

    public function item_accessories_auto_generate()
    {
        $last_row_no = $this->crud_model->get_where_single_order_by('item_accessories', array('status' => '1'), 'id', 'DESC');
        if (isset($last_row_no->accessories_code)) {
            $string = $last_row_no->accessories_code;
            $explode = explode("-", $string);
            $int_value = intval($explode[1]) + 1;
            // var_dump(sprintf("%04d", $int_value));
            $data['accessories_code'] = 'AC' . date('dmY') . '-' . sprintf("%04d", $int_value);
        } else {
            $data['accessories_code'] = 'AC' . date('dmY') . '-0001';
        }

        return $data['accessories_code'];
    }
}
