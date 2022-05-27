<?php
class Crud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function count_all_data($staff_id,$department_id,$requisition_date_from,$requisition_date_to,$requisition_no,$approved,$cancelled){
        $this->db->select('*')->from('requisition_master');
		if($requisition_date_from && !$requisition_date_to){
            $this->db->where('created_on >=', $requisition_date_from);
		
		}
		if(!$requisition_date_from && $requisition_date_to){
          $this->db->where('created_on <=', $requisition_date_to);
			
		}
		if($requisition_date_from && $requisition_date_to){
			$this->db->where('created_on >=', $requisition_date_from);
			$this->db->where('created_on <=', $requisition_date_to);
			
		}
        if($requisition_no!=NULL){      
			$this->db->where('requisition_no', $requisition_no);
			
		}
        if($department_id!=NULL){
      		$this->db->where('department_id', $department_id);
			$this->db->order_by("id", "desc");
      
		}
         if($staff_id!=NULL){
      		$this->db->where('staff_id', $staff_id);
			 $this->db->order_by("id", "desc");
      
		}
         if($approved=="0"){
			$this->db->where('approved_on IS NOT NULL');
            $this->db->where('approved_by  IS NOT NULL');
			
      
		}
        if($approved =="1"){
			$this->db->where('approved_on IS NULL');
            $this->db->where('approved_by IS NULL');     
		}

        if($cancelled){
    		$this->db->where('cancel_tag',$cancelled);
		}
        $this->db->order_by("id", "desc");
    
        $query = $this->db->get();

		$q=$query->result();//echo $this->db->last_query();exit;
			return $q;
      
    }
    public function get_all_data($staff_id,$department_id,$requisition_date_from,$requisition_date_to,$requisition_no,$approved,$cancelled,$limit,$offset){
        $this->db->select('*')->from('requisition_master');
		if($requisition_date_from && !$requisition_date_to){
            $this->db->where('created_on >=', $requisition_date_from);
		}
		if(!$requisition_date_from && $requisition_date_to){
          $this->db->where('created_on <=', $requisition_date_to);
		}
		if($requisition_date_from && $requisition_date_to){
			$this->db->where('created_on >=', $requisition_date_from);
			$this->db->where('created_on <=', $requisition_date_to);
		}
        if($requisition_no!=NULL){      
			$this->db->where('requisition_no', $requisition_no);
		}
        if($department_id!=NULL){
      		$this->db->where('department_id', $department_id);
			 $this->db->order_by("id", "desc");
		}
         if($staff_id!=NULL){
      		$this->db->where('staff_id', $staff_id);
			 $this->db->order_by("id", "desc");
		}
         if($approved=="0"){
			$this->db->where('approved_on IS NOT NULL');
            $this->db->where('approved_by  IS NOT NULL');
		}
        if($approved =="1"){
			$this->db->where('approved_on IS NULL');
            $this->db->where('approved_by IS NULL');     
		}
        if($cancelled){
       		$this->db->where('cancel_tag',$cancelled);
		}
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

		$q=$query->result();//echo $this->db->last_query();exit;
			return $q;
      
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
        if ($result) {
            $stock = ($result->totalIn - $result->totalOut);
            return $stock;
        } else {
            return 0;
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
}
