<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'gate_pass';
		$this->title = 'Gate Pass';
		$this->redirect = 'gate_pass';
	}

	public function all($page = '')
	{
		$config['base_url'] = base_url($this->redirect . '/admin/all');
		$config['total_rows'] = $this->crud_model->count_all($this->table, array('status !=' => '2'), 'id');
		$config['uri_segment'] = 4;
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

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$items = $this->crud_model->get_where_pagination('gate_pass', array('status !=' => '2'), $config['per_page'], $page);
		// echo "<pre>";
		// var_dump($items);
		// exit;
		$data = array(
			'title' => $this->title . ' List',
			'page' => 'list',
			'items' => $items,
			'redirect' => $this->redirect,
			'pagination' =>  $this->pagination->create_links()
		);
		// var_dump($data);
		// exit;
		$data['sales_master_details'] = $this->crud_model->get_where('sales_master', array('status' => '1', 'posted_tag' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));

		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{

		$last_row_no = $this->crud_model->get_where_single_order_by('gate_pass', array(''), 'id', 'DESC');

		if (isset($last_row_no->gate_pass_no)) {
			$string = $last_row_no->gate_pass_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			$data['gate_pass_no'] = 'GP' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['gate_pass_no'] = 'GP' . date('dmY') . '-0001';
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('sale_no', 'Sale Number', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'sales_no' => $this->input->post('sale_no'),
					'gate_pass_no' => $data['gate_pass_no']
				);

				$data['created_on'] = date('Y-m-d H:i:s');
				$data['created_by'] = $this->current_user->id;
				$data['cancel_tag'] = '0';


				$result = $this->crud_model->insert($this->table, $data);
				if ($result == true) {
					$sales_no =  $data['sales_no'];

					$sales_details = $this->crud_model->get_where('sales_details', array('sale_no' => $sales_no));

					$results = [];
					foreach ($sales_details as $key => $value) {
						$results[] = $value->item_code;
					}

					// echo "<pre>";
					// var_dump($results);
					// exit;

					if (count($results) > 0) {
						for ($i = 0; $i < count($results); $i++) {
							$insert_detail['gate_pass_no'] = $data['gate_pass_no'];
							$insert_detail['item_code'] = $results[$i];
							$insert_detail['created_on'] = date('Y-m-d H:i:s');
							$insert_detail['created_by'] = $this->current_user->id;
							$insert_detail['status'] = '1';

							$this->crud_model->insert('gate_pass_details', $insert_detail);
						}
					}
					$this->session->set_flashdata('success', 'Successfully Inserted.');
					redirect($this->redirect . '/admin/all');
				} else {
					$this->session->set_flashdata('error', 'Unable To Insert.');
					redirect($this->redirect . '/admin/add');
				}
			}
		}
		// $data['title'] = 'Select Issue Slip Number';
		// $data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
	}


	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('gate_pass', array('id' => $id));

		if ($master_detail) {
			$gate_pass_details = $this->crud_model->get_where_single('gate_pass_details', array('gate_pass_no' => $master_detail->gate_pass_no));
		}

		$data['master_detail'] = $master_detail;
		$data['gate_pass_details'] = $gate_pass_details;
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}


	public function soft_delete($id)
	{
		if ($id == '' || $id == 0) {
			$this->session->set_flashdata('error', 'Select Atleast One');
			redirect($this->redirect . '/admin/all');
		}
		$data = array(
			'status' => '2',
		);
		$data['updated_on'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->current_user->id;
		$result = $this->crud_model->update($this->table, $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect($this->redirect . '/admin/all');
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect($this->redirect . '/admin/all');
		}
	}
}
