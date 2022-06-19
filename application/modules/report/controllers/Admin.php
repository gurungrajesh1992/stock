<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'stock_ledger'; //table name
		$this->title = 'Report'; // module title
		$this->redirect = 'report'; //module foldername
	}

	public function all($date, $page = '')
	{
		if ($this->input->post('date')) {
			$date = $this->input->post('date');
			redirect($this->redirect . '/admin/all/' . $date);
		} else {
			$date = $date;
		}
		// echo $date;
		// exit;
		$where = array('s.status' => '1', 's.transaction_date <=' => $date);
		$config['base_url'] = base_url($this->redirect . '/admin/all/' . $date);
		$config['total_rows'] = $this->crud_model->geStocktItems($where);
		$config['uri_segment'] = 5;
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';

		//go to first link customize
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		//for all list outside of the a tag that is <li></li>
		$config['num_tag_open'] = '<li class="page-item">';
		//to add class to attribute
		$config['attributes'] = array('class' => 'page-link');
		$config['num_tag_close'] = '</li>';

		//customize current page
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_close'] = '</ul>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

		// $data['pagination'] = $this->pagination->create_links();



		// $items = $this->crud_model->get_where_pagination('user_role', array('status !=' => '2'), $config["per_page"], $page);
		$items = $this->crud_model->geStocktItemsLimitOrder($where, $config["per_page"], $page);
		// echo "<pre>";
		// var_dump($items);
		// exit;
		// echo "<pre>";
		// var_dump($this->db->last_query());
		// exit;
		$data = array(
			'title' => 'Stock ' . $this->title,
			'page' => 'list',
			'items' => $items,
			'date' => $date,
			'redirect' => $this->redirect,
			'pagination' =>  $this->pagination->create_links()
		);
		// echo "<pre>";
		// var_dump($data);
		// exit;
		$this->load->view('layouts/admin/index', $data);
	}
}
