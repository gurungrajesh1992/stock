<?php
class Crud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_module_function($module_name, $function_name)
    {
        $where = array(
            'a.module_name' => $module_name,
            'a.status' => '1',
            'b.function_name' => $function_name,
        );
        $this->db->select("a.module_name, b.function_name, b.id as module_function_id", False);
        $this->db->from('module a');
        $this->db->join('module_function b', "b.module_id = a.id");
        $this->db->where($where);
        return $this->db->get('')->row();
    }

    public function get_module_function_for_role($module_name, $function_name)
    {
        $check_module_dissable = $this->db->get_where('module', array('module_name' => $module_name))->row();
        if ($check_module_dissable->status == '1') {
            $current_user = $this->auth->current_user();
            // var_dump($current_user->role_id);
            // exit;
            $sql = "SELECT a.* FROM module_function_role a LEFT JOIN module_function b ON a.module_function_id = b.id LEFT JOIN module c on c.id=b.module_id WHERE c.module_name = '$module_name' AND b.function_name = '$function_name' AND role_id = $current_user->role_id ";
            $query = $this->db->query($sql);
            $data = $query->row();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function get_module_for_role($module_name)
    {
        $check_module_dissable = $this->db->get_where('module', array('module_name' => $module_name))->row();
        if ($check_module_dissable->status == '1') {
            $current_user = $this->auth->current_user();
            // var_dump($current_user->role_id);
            // exit;
            $sql = "SELECT a.* FROM module_function_role a LEFT JOIN module_function b ON a.module_function_id = b.id LEFT JOIN module c on c.id=b.module_id WHERE c.module_name = '$module_name' AND role_id = $current_user->role_id ";
            $query = $this->db->query($sql);
            $data = $query->row();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function count_all_data($table, $data)
    {
        $this->db->select('count(id) as total')->from($table);
        foreach ($data as $key => $val) {
            if ($key == 'approved_by') {
                if ($val == "1") {
                    $this->db->where('approved_by !=', '');
                } else if ($val == "0") {
                    $this->db->where('approved_by', '');
                } else {
                }
            } else {
                if ($val != '') {
                    $this->db->where($key, $val);
                }
            }
        }
        $this->db->order_by("id", "desc");

        $query = $this->db->get();

        $q = $query->row();
        // echo $this->db->last_query();
        // exit;
        return $q;
    }

    public function get_all_data($table, $data, $limit, $offset)
    {
        $this->db->select('*')->from($table);
        foreach ($data as $key => $val) {
            if ($key == 'approved_by') {
                if ($val == "1") {
                    $this->db->where('approved_by !=', '');
                } else if ($val == "0") {
                    $this->db->where('approved_by', '');
                } else {
                }
            } else {
                if ($val != '') {
                    $this->db->where($key, $val);
                }
            }
        }
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        $q = $query->result(); //echo $this->db->last_query();exit;
        return $q;
    }

    // public function count_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled)
    // {
    //     $this->db->select('count(id) as total')->from('requisition_master');
    //     if ($requisition_date_from && !$requisition_date_to) {
    //         $this->db->where('created_on >=', $requisition_date_from);
    //     }
    //     if (!$requisition_date_from && $requisition_date_to) {
    //         $this->db->where('created_on <=', $requisition_date_to);
    //     }
    //     if ($requisition_date_from && $requisition_date_to) {
    //         $this->db->where('created_on >=', $requisition_date_from);
    //         $this->db->where('created_on <=', $requisition_date_to);
    //     }
    //     if ($requisition_no != NULL) {
    //         $this->db->where('requisition_no', $requisition_no);
    //     }
    //     if ($department_id != NULL) {
    //         $this->db->where('department_id', $department_id);
    //         $this->db->order_by("id", "desc");
    //     }
    //     if ($staff_id != NULL) {
    //         $this->db->where('staff_id', $staff_id);
    //         $this->db->order_by("id", "desc");
    //     }
    //     if ($approved == "0") {
    //         $this->db->where('approved_on IS NULL');
    //         $this->db->where('approved_by IS NULL');
    //     }
    //     if ($approved == "1") {
    //         $this->db->where('approved_on IS NOT NULL');
    //         $this->db->where('approved_by  IS NOT NULL');
    //     }

    //     if ($cancelled) {
    //         $this->db->where('cancel_tag', $cancelled);
    //     }
    //     $this->db->order_by("id", "desc");

    //     $query = $this->db->get();

    //     $q = $query->row(); //echo $this->db->last_query();exit;
    //     return $q;
    // }
    // public function get_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled, $limit, $offset)
    // {
    //     $this->db->select('*')->from('requisition_master');
    //     if ($requisition_date_from && !$requisition_date_to) {
    //         $this->db->where('created_on >=', $requisition_date_from);
    //     }
    //     if (!$requisition_date_from && $requisition_date_to) {
    //         $this->db->where('created_on <=', $requisition_date_to);
    //     }
    //     if ($requisition_date_from && $requisition_date_to) {
    //         $this->db->where('created_on >=', $requisition_date_from);
    //         $this->db->where('created_on <=', $requisition_date_to);
    //     }
    //     if ($requisition_no != NULL) {
    //         $this->db->where('requisition_no', $requisition_no);
    //     }
    //     if ($department_id != NULL) {
    //         $this->db->where('department_id', $department_id);
    //         $this->db->order_by("id", "desc");
    //     }
    //     if ($staff_id != NULL) {
    //         $this->db->where('staff_id', $staff_id);
    //         $this->db->order_by("id", "desc");
    //     }
    //     if ($approved == "0") {
    //         $this->db->where('approved_on IS NULL');
    //         $this->db->where('approved_by IS NULL');
    //     }
    //     if ($approved == "1") {
    //         $this->db->where('approved_on IS NOT NULL');
    //         $this->db->where('approved_by  IS NOT NULL');
    //     }
    //     if ($cancelled) {
    //         $this->db->where('cancel_tag', $cancelled);
    //     }
    //     $this->db->order_by("id", "desc");
    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();

    //     $q = $query->result(); //echo $this->db->last_query();exit;
    //     return $q;
    // }
    public function getAll($table, $where, $limit, $offset)
    {
        $blogs = $this->db->select('*')->from($table)->where($where)->limit($limit, $offset)->get('')->result_array();
        return $blogs;
    }
    public function get_single($table, $where)
    {
        $blog = $this->db->select('*')->from($table)->where($where)->get('')->row();
        return $blog;
    }

    public function insert($table, $data)
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table, $data, $array)
    {
        $result = $this->db->update($table, $data, $array);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_where($table, $where)
    {
        $result = $this->db->order_by('id', 'DESC')->get_where($table, $where)->result();
        return $result;
    }

    public function get_where_order_by($table, $where, $order_by, $order_value)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where)->result();
        return $result;
    }

    public function get_where_single($table, $where)
    {
        $result = $this->db->get_where($table, $where)->row();
        return $result;
    }

    public function get_where_single_order_by($table, $where, $order_by, $order_value)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where)->row();
        return $result;
    }

    public function get_where_single_order_by_with_offset($table, $where, $order_by, $order_value, $offset)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where, 1, $offset)->row();
        return $result;
    }

    public function count_all($table, $where, $field)
    {
        $total = $this->db->select('count(' . $field . ') as total')->from($table)->where($where)->get()->row();
        return $total->total;
    }

    public function get_where_pagination($table, $where, $limit, $offset)
    {
        $result = $this->db->order_by('id', 'DESC')->get_where($table, $where, $limit, $offset)->result();
        return $result;
    }

    function createUrlSlug($urlString)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    public function menuTree($parent_id = 0, $html = '')
    {
        $menus = $this->crud_model->get_where_order_by('contents', array('status' => '1', 'show_on_menu' => 'Yes', 'parent_id' => $parent_id), 'order_no', 'ASC');
        if (count($menus) > 0) {
            $html = '';
            foreach ($menus as $row) {
                $subMenus = $this->crud_model->get_where_order_by('contents', array('status' => '1', 'show_on_menu' => 'Yes', 'parent_id' => $row->id), 'order_no', 'ASC');
                if (count($subMenus) > 0) {
                    $html  .= '<li class="dropdown"><a href="#"><span>' . $row->title . '</span> <i class="bi bi-chevron-right"></i></a>
            
                                    <ul>  
                                    ';
                    $html .= $this->menuTree($row->id);
                    $html .=   '    </ul>
                              </li>';
                } else {
                    $html .= '<li><a href="#">' . $row->title . '</a></li>';
                }
            }
        }
        return  $html;
    }

    public function joinDataSingle($table, $join_table, $where, $key_table, $referencekey, $joinField)
    {
        $this->db->select("$table.*,$join_table.$joinField", False);
        $this->db->from($table);
        $this->db->join($join_table, "$join_table.$referencekey=$table.$key_table");
        $this->db->where($where);
        return $this->db->get('')->row();
    }

    public function joinDataMultiple($table, $join_table, $where, $key_table, $referencekey, $joinField)
    {
        $this->db->select("$table.*,$join_table.$joinField", False);
        $this->db->from($table);
        $this->db->join($join_table, "$join_table.$referencekey=$table.$key_table");
        $this->db->where($where);
        return $this->db->get('')->result();
    }

    public function get_total_item_stock($table, $where)
    {
        $this->db->select('sum(in_qty) as totalIn, sum(out_qty) as totalOut', false);
        $this->db->from($table);
        $this->db->where($where);
        $result = $this->db->get('')->row();
        // var_dump($this->db->last_query());
        // exit;
        if ($result) {
            $stock = ($result->totalIn - $result->totalOut);
            return $stock;
        } else {
            return 0;
        }
    }

    public function get_total_item_stock_group_by_item($table, $where)
    {
        $this->db->select('sum(in_qty) as totalIn, sum(out_qty) as totalOut, item_code, in_unit_price as unit_price, location_id', false);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by('item_code');
        $this->db->order_by('id', 'asc');
        $result = $this->db->get('')->result();
        // echo "<pre>";
        // var_dump($result);
        // exit;
        if ($result) {
            $items = array();
            foreach ($result as $key => $value) {
                $stock = ($value->totalIn - $value->totalOut);
                if ($stock > 0) {
                    $items[] = $value;
                }
            }
            return $items;
        } else {
            return array();
        }
    }

    public function get_total_item_stock_group_by_item_join_item($table, $where)
    {
        $this->db->select('sum(stock_ledger.in_qty) as totalIn, sum(stock_ledger.out_qty) as totalOut, stock_ledger.item_code, stock_ledger.in_unit_price as unit_price, stock_ledger.location_id, item_infos.item_name, stock_ledger.transaction_type, stock_ledger.ledger_code', false);
        $this->db->from($table);
        $this->db->join('item_infos', 'stock_ledger.item_code = item_infos.item_code');
        $this->db->where($where);
        $this->db->group_by('stock_ledger.item_code');
        $this->db->order_by('stock_ledger.id', 'asc');
        $result = $this->db->get('')->result();
        // echo "<pre>";
        // var_dump($result);
        // exit;
        if ($result) {
            $items = array();
            foreach ($result as $key => $value) {
                $stock = ($value->totalIn - $value->totalOut);
                if ($stock > 0) {
                    $items[] = $value;
                }
            }
            // var_dump($items);
            // exit;
            return $items;
        } else {
            // echo "down";
            // exit;
            return array();
        }
    }

    public function get_all_total_stock($table, $where, $group_by)
    {
        $this->db->select('sum(in_qty) as totalIn, sum(out_qty) as totalOut, item_code', false);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group_by);
        $result = $this->db->get('')->result();

        return $result;
    }

    // public function getItems($location_id)
    // {
    //     $query = $this->db->get_where('stock_ledger', array('location_id' => $location_id));
    //     return $query->result();
    // }

    public function getItems($table, $where, $group_by)
    {
        $this->db->select('sum(rem_qty) total_stock, item_code, location_id', false);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group_by);
        $result = $this->db->get('')->result();

        return $result;
    }

    public function get_single_item_stock($table, $where, $group_by)
    {
        $this->db->select('sum(rem_qty) total_stock, item_code, location_id', false);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group_by);
        $result = $this->db->get('')->row();

        return $result;
    }

    // public function get_new_items_for_year_end($start_date, $end_date)
    // {
    //     $sql = "SELECT DISTINCT a.item_code, a.depreciation_rate, a.item_type, b.in_qty, b.out_qty, b.rem_qty, b.in_unit_price, b.transactioncode, b.transaction_date, b.transaction_type 
    //             FROM item_infos a 
    //             LEFT JOIN stock_ledger b on a.item_code = b.item_code 
    //             LEFT JOIN year_end c on a.item_code = c.item_code 
    //             WHERE b.in_qty > 0 AND b.transaction_date = ( SELECT MAX(transaction_date) FROM stock_ledger WHERE item_code = a.item_code) AND b.transaction_date >= '$start_date' AND b.transaction_date <= '$end_date' AND a.item_type = 'A' AND c.id is null;";
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    public function get_new_items_for_year_end($start_date, $end_date)
    {
        $sql = "SELECT DISTINCT a.item_code, a.depreciation_rate, a.item_type, b.in_qty, b.out_qty, b.rem_qty, b.in_unit_price, b.transactioncode, b.transaction_date, b.transaction_type FROM item_infos a LEFT JOIN stock_ledger b on a.item_code = b.item_code WHERE b.transaction_date <= '$end_date' AND b.transaction_type IN ('OPN','GRN','ISR','LCI','LCO','SAR') AND b.id = ( SELECT MAX(b.id) FROM stock_ledger b WHERE b.item_code = a.item_code  AND b.transaction_date <= '$end_date') AND a.item_type = 'A';";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_opening_detail($opening_code, $item_code)
    {
        $this->db->select('b.item_code, b.unit_price, b.depreciated_amt, b.purchase_date, b.book_value', 'true');
        $this->db->from('opening_master a');
        $this->db->join('opening_detail b', 'a.id = b.opening_master_id');
        $this->db->where('a.opening_code', $opening_code);
        $this->db->where('b.item_code', $item_code);
        return $this->db->get('')->row();
    }

    // public function get_opening_detail()
    // {
    //     $sql = "SELECT b.item_code, b.depreciated_amt, b.purchase_date, b.book_value FROM `opening_master` a LEFT JOIN opening_detail b ON a.id = b.opening_master_id WHERE a.opening_code = 'OPE03062022-0001' AND b.item_code = 'IC19042022-0002';";
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // } 
}
