<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();

		$this->table = 'item_amc';
		$this->title = 'Item AMC';
		$this->redirect = 'item_amc';
		$this->load->model('Item_amc_model');
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

		// $data['pagination'] = $this->pagination->create_links();

		$item_amc = $this->crud_model->get_where_pagination($this->table, array('status !=' => '2'), $config['per_page'], $page);

		$data = array(
			'title' => $this->title . ' List',
			'page' => 'list',
			'item_amc' => $item_amc,
			'redirect' => $this->redirect,
			'pagination' =>  $this->pagination->create_links()
		);
		// var_dump($data);
		// exit;
		$this->load->view('layouts/admin/index', $data);
	}

	public function form($id = '')
	{


		$data['detail'] = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($this->input->post()) {
			$this->form_validation->set_rules('item_code', 'Item Code', 'required|trim');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
			$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

			if ($this->form_validation->run()) {

				$data = array(
					'item_code' => $this->input->post('item_code'),
					'amc_code' => $this->input->post('amc_code'),
					'company_name' => $this->input->post('company_name'),
					'amount' => $this->input->post('amount'),
					'valid_from' => $this->input->post('valid_from'),
					'valid_to' => $this->input->post('valid_to'),

					'status' => $this->input->post('status'),
				);
				// var_dump($data);
				// exit;
				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_on'] = date('Y-m-d');
					$data['created_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/form');
					}
				} else {
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . '/admin/form/' . $id);
					}
				}
			}
		}

		$data['item_amc'] = $this->Item_amc_model->getAll_item_code();
		$data['amc_code'] = $this->Item_amc_model->item_amc_auto_generate();

		$data['title'] = 'Add/Edit ' . $this->title;
		$data['page'] = 'form';
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
