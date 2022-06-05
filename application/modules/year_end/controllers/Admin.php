<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'year_end';
		$this->title = 'Year End';
		$this->redirect = 'year_end';
	}

	public function all($page = '')
	{
		// echo "<pre>";
		// var_dump($this->crud_model->get_opening_detail());
		// exit;
		$config['base_url'] = base_url($this->redirect . '/admin/all');
		$fiscal_year = $this->input->post('fiscal_year');
		if ($fiscal_year) {
			$fiscal_year = $fiscal_year;
		} else {
			$fiscal_year = (date('Y') - 1) . '/' . date('Y');
		}
		// var_dump((date('Y') - 1) . '/' . date('Y'));
		// exit;
		$config['total_rows'] = $this->crud_model->count_all($this->table, array('status !=' => '2', 'fiscal_year' => $fiscal_year), 'id');
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



		// $items = $this->crud_model->get_where_pagination('user_role', array('status !=' => '2'), $config["per_page"], $page);
		$items = $this->crud_model->get_where_pagination($this->table, array('status !=' => '2', 'fiscal_year' => $fiscal_year), $config['per_page'], $page);
		$fiscal_years = $this->crud_model->get_where_order_by('fiscal_year_para', array('status' => '1'), 'fiscal_year', 'DESC');
		// echo "<pre>";
		// var_dump($fiscal_years);
		// exit;
		$site_settings = $this->session->userdata('site_settings');
		$data = array(
			'title' => $this->title,
			'page' => 'list',
			'items' => $items,
			'fiscal_years' => $fiscal_years,
			'fiscal_year_selected' => $fiscal_year,
			'loader_icon' => $site_settings->default_img,
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
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('country_name', 'Country Name', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'country_name' => $this->input->post('country_name'),
					'nationality' => $this->input->post('nationality'),
					'status' => $this->input->post('status'),
				);

				$country_code = substr($data['country_name'], 0, 4);
				$data['country_code'] = $country_code;
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

	public function generate_year_end()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				$fiscal_year = (date('Y') - 1) . '/' . date('Y');

				$fiscal_year_detail = $this->crud_model->get_where_single('fiscal_year_para', array('fiscal_year' => $fiscal_year));
				$start_date = isset($fiscal_year_detail->start_date) ? $fiscal_year_detail->start_date : date('Y-m-d');
				$end_date = isset($fiscal_year_detail->end_date) ? $fiscal_year_detail->end_date : date('Y-m-d');
				$old_fiscal_year = (date('Y') - 1 - 1) . '/' . (date('Y') - 1);

				// old year end items
				$old_year_end_items = $this->crud_model->get_where('year_end', array('fiscal_year' => $old_fiscal_year));
				// var_dump($old_year_end_items);
				// exit;
				if (!empty($old_year_end_items)) {
					$batch_data_old = array();
					foreach ($old_year_end_items as $key_old => $value_old) {
						$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value_old->item_code));
						if ($item_detail->depreciation_rate) {
							$depreciated_amount = ($value_old->book_value * $item_detail->depreciation_rate) / 100;
						} else {
							$depreciated_amount = 0;
						}
						$data_old = array(
							'fiscal_year' => $fiscal_year,
							'item_code ' => $value_old->item_code,
							'purchase_date' => $value_old->purchase_date,
							'purchase_amt' => $value_old->purchase_amt,
							'depreciated_amt' => $depreciated_amount,
							'book_value' => $value_old->book_value - $depreciated_amount,
							'total_depreciated_amt' => ($value_old->total_depreciated_amt + $depreciated_amount),
							'remarks' => 'Year End Of ' . $fiscal_year . ' old items',
						);

						$batch_data_old[] = $data_old;
					}

					$result_old_items = $this->db->insert_batch('year_end', $old_year_end_items);
				}

				// new items in stock
				$items = $this->crud_model->get_new_items_for_year_end($start_date, $end_date);

				if (!empty($items)) {
					$batch_data = array();
					foreach ($items as $key => $value) {
						if ($value->transaction_type == 'OPN') {
							$opening_detail = $this->crud_model->get_opening_detail($value->transactioncode, $value->item_code);
							if ($opening_detail->purchase_date) {
								$purchase_date = $opening_detail->purchase_date;
							} else {
								$purchase_date = $value->transaction_date;
							}
							$depreciated_amount = $opening_detail->depreciated_amt;
							$book_value = $opening_detail->book_value;
						} else {
							$purchase_date = $value->transaction_date;

							$depreciated_amount = ($value->in_unit_price * $value->depreciation_rate) / 100;
							//for government rule get quarter and its rate
							$depreciation_para = $this->crud_model->get_where_single('depreciation_para', array('from <=' => $purchase_date, 'to >=' => $purchase_date));
							if ($depreciation_para->depreciation_rate) {
								$depreciated_amount = $depreciated_amount * $depreciation_para->depreciation_rate;
							} else {
								$depreciated_amount = $depreciation_para;
							}
							$book_value = ($value->in_unit_price - $depreciated_amount);
						}
						$data = array(
							'fiscal_year' => $fiscal_year,
							'item_code ' => $value->item_code,
							'purchase_date' => $purchase_date,
							'purchase_amt' => $value->in_unit_price,
							'depreciated_amt' => $depreciated_amount,
							'book_value' => $book_value,
							'total_depreciated_amt' => ($value->in_unit_price - $book_value),
							'remarks' => 'Year End Of ' . $fiscal_year . ' New Items',
						);
						$batch_data[] = $data;
					}

					$result = $this->db->insert_batch('year_end', $batch_data);
				}

				$response = array(
					'status' => 'success',
					'status_message' => 'Year End Successfully Generated',
					'status_code' => 200,
				);
			}
		} catch (Exception $e) {
			$response = array(
				'status' => 'error',
				'status_message' => $e->getMessage()
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
