<?php
class Blog_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll($table, $where)
    {
        $blogs = $this->db->select('*')->from($table)->where($where)->get('')->result_array();
        return $blogs;
    }
}
