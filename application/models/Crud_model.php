<?php
class Crud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

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

    public function get_all_total_stock($table, $where, $group_by)
    {
        $this->db->select('sum(in_qty) as totalIn, sum(out_qty) as totalOut, item_code', false);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group_by);
        $result = $this->db->get('')->result();

        return $result;
    }

    public function getItems($location_id)
    {
        $query = $this->db->get_where('stock_ledger', array('location_id' => $location_id));
        return $query->result();
    }
}
