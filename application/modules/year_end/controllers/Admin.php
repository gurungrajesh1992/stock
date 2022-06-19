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
			// $fiscal_year = (date('Y') - 1) . '/' . date('Y');
			$current_fiscal_year = $this->crud_model->get_where_single('fiscal_year_para', array('start_date <=' => date('Y-m-d'), 'end_date >=' => date('Y-m-d')));
			if ($current_fiscal_year->fiscal_year) {
				$explode = explode("/", $current_fiscal_year->fiscal_year);
				$fiscal_year = ((int)$explode[0] - 1) . '/' . ((int)$explode[1] - 1);
			} else {
				// $fiscal_year = (date('Y') - 1) . '/' . date('Y');
				$fiscal_year = '';
			}
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

	// public function generate_year_end()
	// {
	// 	try {
	// 		if (!$this->input->is_ajax_request()) {
	// 			exit('No direct script access allowed');
	// 		} else {
	// 			$current_fiscal_year = $this->crud_model->get_where_single('fiscal_year_para', array('start_date <=' => date('Y-m-d'), 'end_date >=' => date('Y-m-d')));
	// 			if ($current_fiscal_year->fiscal_year) {
	// 				$explode = explode("/", $current_fiscal_year->fiscal_year);
	// 				$fiscal_year = ((int)$explode[0] - 1) . '/' . ((int)$explode[1] - 1);
	// 			} else {
	// 				// $fiscal_year = (date('Y') - 1) . '/' . date('Y');
	// 				$fiscal_year = '';
	// 			}

	// 			$fiscal_year_detail = $this->crud_model->get_where_single('fiscal_year_para', array('fiscal_year' => $fiscal_year));
	// 			$start_date = isset($fiscal_year_detail->start_date) ? $fiscal_year_detail->start_date : date('Y-m-d');
	// 			$end_date = isset($fiscal_year_detail->end_date) ? $fiscal_year_detail->end_date : date('Y-m-d');

	// 			$explode_fiscal_year = explode('/', $fiscal_year);
	// 			$old_fiscal_year = ((int)$explode_fiscal_year[0] - 1) . '/' . ((int)$explode_fiscal_year[1] - 1);
	// 			// $old_fiscal_year = (date('Y') - 1 - 1) . '/' . (date('Y') - 1);
	// 			// var_dump($fiscal_year, $old_fiscal_year);
	// 			// exit;
	// 			// old year end items
	// 			$old_year_end_items = $this->crud_model->get_where('year_end', array('fiscal_year' => $old_fiscal_year));
	// 			// var_dump($old_year_end_items);
	// 			// exit;
	// 			if (!empty($old_year_end_items)) {
	// 				$batch_data_old = array();
	// 				foreach ($old_year_end_items as $key_old => $value_old) {
	// 					$check_already = $this->crud_model->get_where_single('year_end', array('item_code' => $value_old->item_code, 'fiscal_year' => $fiscal_year));
	// 					if (empty($check_already)) {
	// 						$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value_old->item_code));
	// 						if ($item_detail->depreciation_rate) {
	// 							$depreciated_amount = ($value_old->book_value * $item_detail->depreciation_rate) / 100;
	// 						} else {
	// 							$depreciated_amount = 0;
	// 						}
	// 						$data_old = array(
	// 							'fiscal_year' => $fiscal_year,
	// 							'item_code ' => $value_old->item_code,
	// 							'purchase_date' => $value_old->purchase_date,
	// 							'purchase_amt' => $value_old->purchase_amt,
	// 							'depreciated_amt' => $depreciated_amount,
	// 							'book_value' => $value_old->book_value - $depreciated_amount,
	// 							'total_depreciated_amt' => ($value_old->total_depreciated_amt + $depreciated_amount),
	// 							'remarks' => 'Year End Of ' . $fiscal_year . ' old items',
	// 							'created_on' => date('Y-m-d H:i:s'),
	// 						);

	// 						$batch_data_old[] = $data_old;
	// 					}
	// 				}

	// 				$result_old_items = $this->db->insert_batch('year_end', $batch_data_old);
	// 			}

	// 			// new items in stock
	// 			$items = $this->crud_model->get_new_items_for_year_end($start_date, $end_date);
	// 			// echo "<pre>";
	// 			// var_dump($items);
	// 			// exit;
	// 			if (!empty($items)) {
	// 				$batch_data = array();
	// 				foreach ($items as $key => $value) {
	// 					$in_unit_price = (isset($value->in_unit_price) && $value->in_unit_price != '') ? $value->in_unit_price : 0;
	// 					$depreciation_rate = (isset($value->depreciation_rate) && $value->depreciation_rate != '') ? $value->depreciation_rate : 0;
	// 					if ($value->transaction_type == 'OPN') {
	// 						$opening_detail = $this->crud_model->get_opening_detail($value->transactioncode, $value->item_code);
	// 						if ($opening_detail->purchase_date) {
	// 							$purchase_date = $opening_detail->purchase_date;
	// 						} else {
	// 							$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');
	// 						}
	// 						$depreciated_amount = (isset($opening_detail->depreciated_amt) && $opening_detail->depreciated_amt != '') ? $opening_detail->depreciated_amt : 0;
	// 						$book_value = (isset($opening_detail->book_value) && $opening_detail->book_value != '') ? $opening_detail->book_value : 0;
	// 					} else {
	// 						$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');

	// 						$depreciated_amount = ($in_unit_price * $depreciation_rate) / 100;
	// 						//for government rule get quarter and its rate
	// 						$depreciation_para = $this->crud_model->get_where_single('depreciation_para', array('from <=' => $purchase_date, 'to >=' => $purchase_date));
	// 						if ($depreciation_para->depreciation_rate) {
	// 							$depreciated_amount = $depreciated_amount * $depreciation_para->depreciation_rate;
	// 						} else {
	// 							$depreciated_amount = $depreciation_para;
	// 						}
	// 						$book_value = ($in_unit_price - $depreciated_amount);
	// 					}
	// 					$data = array(
	// 						'fiscal_year' => $fiscal_year,
	// 						'item_code ' => $value->item_code,
	// 						'purchase_date' => $purchase_date,
	// 						'purchase_amt' => $in_unit_price,
	// 						'depreciated_amt' => $depreciated_amount,
	// 						'book_value' => $book_value,
	// 						'total_depreciated_amt' => $depreciated_amount,
	// 						'remarks' => 'Year End Of ' . $fiscal_year . ' New Items',
	// 						'created_on' => date('Y-m-d H:i:s'),
	// 					);
	// 					$batch_data[] = $data;
	// 				}

	// 				$result = $this->db->insert_batch('year_end', $batch_data);
	// 			}

	// 			$response = array(
	// 				'status' => 'success',
	// 				'status_message' => 'Year End Successfully Generated',
	// 				'status_code' => 200,
	// 			);
	// 		}
	// 	} catch (Exception $e) {
	// 		$response = array(
	// 			'status' => 'error',
	// 			'status_message' => $e->getMessage()
	// 		);
	// 	}
	// 	header('Content-Type: application/json');
	// 	echo json_encode($response);
	// }

	public function generate_year_end()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				$current_fiscal_year = $this->crud_model->get_where_single('fiscal_year_para', array('start_date <=' => date('Y-m-d'), 'end_date >=' => date('Y-m-d')));
				if ($current_fiscal_year->fiscal_year) {
					$explode = explode(
						"/",
						$current_fiscal_year->fiscal_year
					);
					$fiscal_year = ((int)$explode[0] - 1) . '/' . ((int)$explode[1] - 1);
				} else {
					// $fiscal_year = (date('Y') - 1) . '/' . date('Y');
					$fiscal_year = '';
				}

				$fiscal_year_detail = $this->crud_model->get_where_single('fiscal_year_para', array('fiscal_year' => $fiscal_year));
				$start_date = isset($fiscal_year_detail->start_date) ? $fiscal_year_detail->start_date : date('Y-m-d');
				$end_date = isset($fiscal_year_detail->end_date) ? $fiscal_year_detail->end_date : date('Y-m-d');

				$explode_fiscal_year = explode('/', $fiscal_year);
				$old_fiscal_year = ((int)$explode_fiscal_year[0] - 1) . '/' . ((int)$explode_fiscal_year[1] - 1);

				//check if previous data required or not
				$check_first_year_end = $this->crud_model->get_where_single('year_end', array('status' => '1'));

				if ($check_first_year_end) {
					$old_year_end_items = $this->crud_model->get_where('year_end', array('fiscal_year' => $old_fiscal_year));
					if (empty($old_year_end_items)) {
						$response = array(
							'status' => 'error',
							'status_message' => 'Previous Year End Required',
							'status_code' => 300,
						);
						header('Content-Type: application/json');
						echo json_encode($response);
						exit;
					}
				}

				// new items in stock
				$items = $this->crud_model->get_new_items_for_year_end($start_date, $end_date);
				// echo "<pre>";
				// var_dump($items);
				// exit;
				if (!empty($items)) {
					$batch_data = array();
					foreach ($items as $key => $value) {
						$in_unit_price = (isset($value->in_unit_price) && $value->in_unit_price != '') ? $value->in_unit_price : 0;
						$depreciation_rate = (isset($value->depreciation_rate) && $value->depreciation_rate != '') ? $value->depreciation_rate : 0;

						//check if record is new or old
						$get_older_end_record = $this->crud_model->get_where_single('year_end', array('fiscal_year' => $old_fiscal_year, 'item_code' => $value->item_code));
						if ($get_older_end_record) {
							$depreciated_amount = ($get_older_end_record->book_value * $depreciation_rate) / 100;

							$data = array(
								'fiscal_year' => $fiscal_year,
								'item_code ' => $value->item_code,
								'purchase_date' => $get_older_end_record->purchase_date,
								'purchase_amt' => $get_older_end_record->purchase_amt,
								'depreciated_amt' => $depreciated_amount,
								'book_value' => $get_older_end_record->book_value - $depreciated_amount,
								'total_depreciated_amt' => ($get_older_end_record->total_depreciated_amt + $depreciated_amount),
								'remarks' => 'Year End Of ' . $fiscal_year . ' old items',
								'created_on' => date('Y-m-d H:i:s'),
							);
							$check_current_duplicate_entry = $this->crud_model->get_where_single('year_end', array('fiscal_year' => $fiscal_year, 'item_code' => $value->item_code));
							if (empty($check_current_duplicate_entry)) {
								$batch_data[] = $data;
							}
						} else {
							if ($value->transaction_type == 'OPN') {
								$opening_detail = $this->crud_model->get_opening_detail($value->transactioncode, $value->item_code);
								if ($opening_detail->purchase_date) {
									$purchase_date = $opening_detail->purchase_date;
								} else {
									$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');
								}

								$book_value = (int)((isset($opening_detail->book_value) && $opening_detail->book_value != '') ? $opening_detail->book_value : 0);

								$depreciated_amount_opening = (isset($opening_detail->depreciated_amt) && $opening_detail->depreciated_amt != '') ? $opening_detail->depreciated_amt : 0;
								$depreciated_amount = ((int)$book_value * $depreciation_rate) / 100;


								$book_value = (int)$book_value - (int)$depreciated_amount;
								$total_depreciated_amt = $depreciated_amount_opening + $depreciated_amount;
							} else {
								$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');

								$depreciated_amount = ($in_unit_price * $depreciation_rate) / 100;
								//for government rule get quarter and its rate
								$depreciation_para = $this->crud_model->get_where_single('depreciation_para', array('from <=' => $purchase_date, 'to >=' => $purchase_date));
								if ($depreciation_para->depreciation_rate) {
									$depreciated_amount = $depreciated_amount * $depreciation_para->depreciation_rate;
								} else {
									$depreciated_amount = $depreciated_amount;
								}
								$book_value = ($in_unit_price - $depreciated_amount);
								$total_depreciated_amt = $depreciated_amount;
							}

							$data = array(
								'fiscal_year' => $fiscal_year,
								'item_code ' => $value->item_code,
								'purchase_date' => $purchase_date,
								'purchase_amt' => $in_unit_price,
								'depreciated_amt' => $depreciated_amount,
								'book_value' => $book_value,
								'total_depreciated_amt' => $total_depreciated_amt,
								'remarks' => 'Year End Of ' . $fiscal_year . ' New Items',
								'created_on' => date('Y-m-d H:i:s'),
							);

							$check_current_duplicate_entry = $this->crud_model->get_where_single('year_end', array('fiscal_year' => $fiscal_year, 'item_code' => $value->item_code));
							if (empty($check_current_duplicate_entry)) {
								$batch_data[] = $data;
							}
						}
					}
					if (!empty($batch_data)) {
						$result = $this->db->insert_batch('year_end', $batch_data);
					}
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

	public function view()
	{

		$selected_date = $this->input->post('date') ? $this->input->post('date') : date('Y-m-d');
		$fiscal_year_detail = $this->crud_model->get_where_single('fiscal_year_para', array('start_date <=' => $selected_date, 'end_date >=' => $selected_date));
		if ($fiscal_year_detail->fiscal_year) {
			$fiscal_year = $fiscal_year_detail->fiscal_year;
			$start_date = isset($fiscal_year_detail->start_date) ? $fiscal_year_detail->start_date : date('Y-m-d');
			$end_date = isset($fiscal_year_detail->end_date) ? $fiscal_year_detail->end_date : date('Y-m-d');

			$earlier = new DateTime($start_date);
			$later = new DateTime($end_date);
			$date = new DateTime($selected_date);

			$total_days = ($earlier->diff($later)->format("%r%a")) + 1; //last days included  ie. +1

			$depreciated_days = ($earlier->diff($date)->format("%r%a")) + 1;

			// var_dump($start_date, $end_date, $total_days, $depreciated_days);
			// exit;

			$explode_fiscal_year = explode('/', $fiscal_year);
			$old_fiscal_year = ((int)$explode_fiscal_year[0] - 1) . '/' . ((int)$explode_fiscal_year[1] - 1);

			//check if previous data required or not
			$check_first_year_end = $this->crud_model->get_where_single('year_end', array('status' => '1'));

			if ($check_first_year_end) {
				$old_year_end_items = $this->crud_model->get_where('year_end', array('fiscal_year' => $old_fiscal_year));
				if (empty($old_year_end_items)) {
					$this->session->set_flashdata('error', 'Previous Year End Required');
					redirect('dashboard');
				}
			}
			$items = array();

			$new_stock_items = $this->crud_model->get_new_items_for_year_end($start_date, $selected_date);
			// var_dump($this->db->last_query());
			// exit;
			if (!empty($new_stock_items)) {
				foreach ($new_stock_items as $key => $value) {
					$in_unit_price = (isset($value->in_unit_price) && $value->in_unit_price != '') ? $value->in_unit_price : 0;
					$depreciation_rate = (isset($value->depreciation_rate) && $value->depreciation_rate != '') ? $value->depreciation_rate : 0;

					//check if record is new or old
					$get_older_end_record = $this->crud_model->get_where_single('year_end', array('fiscal_year' => $old_fiscal_year, 'item_code' => $value->item_code));
					if ($get_older_end_record) {
						$depreciated_amount = ($get_older_end_record->book_value * $depreciation_rate) / 100;

						$depreciated_amount = ($depreciated_amount / $total_days) * $depreciated_days;

						$data = array(
							'fiscal_year' => $fiscal_year,
							'item_code' => $value->item_code,
							'purchase_date' => $get_older_end_record->purchase_date,
							'purchase_amt' => $get_older_end_record->purchase_amt,
							'depreciated_amt' => $depreciated_amount,
							'book_value' => $get_older_end_record->book_value - $depreciated_amount,
							'total_depreciated_amt' => ($get_older_end_record->total_depreciated_amt + $depreciated_amount),
							'remarks' => 'Year End Of ' . $fiscal_year . ' old items',
							'created_on' => date('Y-m-d H:i:s'),
						);
						$items[] = $data;
					} else {
						if ($value->transaction_type == 'OPN') {
							$opening_detail = $this->crud_model->get_opening_detail($value->transactioncode, $value->item_code);
							if ($opening_detail->purchase_date) {
								$purchase_date = $opening_detail->purchase_date;
							} else {
								$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');
							}

							$book_value = (int)((isset($opening_detail->book_value) && $opening_detail->book_value != '') ? $opening_detail->book_value : 0);

							$depreciated_amount_opening = (isset($opening_detail->depreciated_amt) && $opening_detail->depreciated_amt != '') ? $opening_detail->depreciated_amt : 0;
							$depreciated_amount = ((int)$book_value * $depreciation_rate) / 100;
							$depreciated_amount = ($depreciated_amount / $total_days) * $depreciated_days;


							$book_value = (int)$book_value - (int)$depreciated_amount;
							$total_depreciated_amt = $depreciated_amount_opening + $depreciated_amount;
						} else {
							$purchase_date = (isset($value->transaction_date) && $value->transaction_date != '') ? $value->transaction_date : date('Y-m-d');

							$depreciated_amount = ($in_unit_price * $depreciation_rate) / 100;
							//for government rule get quarter and its rate
							// $depreciation_para = $this->crud_model->get_where_single('depreciation_para', array('from <=' => $purchase_date, 'to >=' => $purchase_date));
							// if ($depreciation_para->depreciation_rate) {
							// 	$depreciated_amount = $depreciated_amount * $depreciation_para->depreciation_rate;
							// } else {
							// 	$depreciated_amount = $depreciated_amount;
							// } 
							$depreciated_amount = ($depreciated_amount / $total_days) * $depreciated_days;
							$book_value = ($in_unit_price - $depreciated_amount);
							$total_depreciated_amt = $depreciated_amount;
						}
						$data = array(
							'fiscal_year' => $fiscal_year,
							'item_code' => $value->item_code,
							'purchase_date' => $purchase_date,
							'purchase_amt' => $in_unit_price,
							'depreciated_amt' => $depreciated_amount,
							'book_value' => $book_value,
							'total_depreciated_amt' => $total_depreciated_amt,
							'remarks' => 'Year End Of ' . $fiscal_year . ' New Items',
							'created_on' => date('Y-m-d H:i:s'),
						);
						$items[] = $data;
					}
				}
			}

			// echo "<pre>";
			// var_dump($items);
			// exit;

			$site_settings = $this->session->userdata('site_settings');
			$data = array(
				'title' => 'Year End Value Till ' . $selected_date,
				'page' => 'view',
				'items' => $items,
				'start_date' => $start_date,
				'end_date' => $end_date,
				'selected_date' => $selected_date,
				'fiscal_year_selected' => $fiscal_year,
				'loader_icon' => $site_settings->default_img,
				'redirect' => $this->redirect,
				'pagination' =>  $this->pagination->create_links()
			);
			// var_dump($data);
			// exit;
			$this->load->view('layouts/admin/index', $data);
		} else {
			//no fiscal year detail found
			echo "no fiscal year found !!!";
		}
	}
}
