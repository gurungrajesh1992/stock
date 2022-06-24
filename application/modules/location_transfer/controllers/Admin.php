<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'location_transfer'; //table name
		$this->title = 'Location Transfer'; // module title
		$this->redirect = 'location_transfer'; //module foldername
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



		// $items = $this->crud_model->get_where_pagination('user_role', array('status !=' => '2'), $config["per_page"], $page);
		$items = $this->crud_model->get_where_pagination($this->table, array('status !=' => '2'), $config['per_page'], $page);

		// echo "<pre>";
		// var_dump($this->db->last_query());
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
		$this->load->view('layouts/admin/index', $data);
	}

	public function form($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));

		$data['detail'] = $detail;
		if (isset($detail->transfer_code)) {
			$data['transfer_code'] = $detail->transfer_code;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('location_transfer', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->transfer_code)) {
				// $string = "RQ07042022-0006";
				$string = $last_row_no->transfer_code;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['transfer_code'] = 'TRAN' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['transfer_code'] = 'TRAN' . date('dmY') . '-0001';
			}
		}

		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('transfer_code', 'Transfer Code', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'transfer_code' => $this->input->post('transfer_code'),
					'from_loc' => $this->input->post('from_loc'),
					'to_loc' => $this->input->post('to_loc'),
					'transfered_on' => $this->input->post('transfered_on'),
					'remarks' => $this->input->post('remarks'),
					'status' => $this->input->post('status'),
				);
				// var_dump($data);
				// exit;

				$id = $this->input->post('id');
				if ($this->input->post('from_loc') == $this->input->post('to_loc')) {
					$this->session->set_flashdata('error', 'Two Location Can Not Be Same');
					if ($id == '') {
						redirect($this->redirect . '/admin/form/');
					} else {
						redirect($this->redirect . '/admin/form/' . $id);
					}
				}
				if ($id == '') {
					$data['created_on'] = date('Y-m-d');
					$data['created_by'] = $this->current_user->id;
					$data['transfered_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$unit_price = $this->input->post('unit_price');
						$actual_unit_price =  $this->input->post('actual_unit_price');
						// $total_price = $this->input->post('total_price');
						// $actual_total_price = $this->input->post('actual_total_price');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['transfer_code'] = $data['transfer_code'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['unit_price']  = $unit_price[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['actual_unit_price'] = $actual_unit_price[$i];
								$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);

								$insert_detail['actual_total_price'] = $actual_unit_price[$i] * $qty[$i];

								$insert_detail['created_on'] = date('Y-m-d');
								$insert_detail['created_by'] = $this->current_user->id;



								$batch_data[] = $insert_detail;
							}
							// var_dump($batch_data);
							// exit;

							$this->db->insert_batch('location_transfer_detail', $batch_data);
						}

						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/form');
					}
				} else {
					if (isset($detail->approved_by) && $detail->approved_by != '') {
						$this->session->set_flashdata('error', 'Can not edit, Already Approved');
						redirect($this->redirect . '/admin/form/' . $id);
					}
					$data = array(
						'transfer_code' => $this->input->post('transfer_code'),
						'from_loc' => $this->input->post('from_loc'),
						'to_loc' => $this->input->post('to_loc'),
						'transfered_on' => $this->input->post('transfered_on'),
						'remarks' => $this->input->post('remarks'),
						'status' => $this->input->post('status'),
					);
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$this->db->delete('location_transfer_detail', array('transfer_code' => $detail->transfer_code));


						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$unit_price = $this->input->post('unit_price');
						$actual_unit_price =  $this->input->post('actual_unit_price');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['transfer_code'] = $data['transfer_code'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['unit_price']  = $unit_price[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['actual_unit_price'] = $actual_unit_price[$i];
								$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);

								$insert_detail['actual_total_price'] = $actual_unit_price[$i] * $qty[$i];

								$insert_detail['created_on'] = date('Y-m-d');
								$insert_detail['created_by'] = $this->current_user->id;



								$batch_data[] = $insert_detail;
							}
							$this->db->insert_batch('location_transfer_detail', $batch_data);
						}

						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . '/admin/form/' . $id);
					}
				}
			}
		}
		$data['location_para_details'] = $this->db->order_by('id', 'ASC')->get_where('location_para', array('status' => '1'))->result();

		// echo "<pre>";
		// var_dump($data['location_para_details'][0]->id);
		// exit;

		// $data['items'] = $this->crud_model->get_total_item_stock_group_by_item('stock_ledger', array('status' => '1', 'transaction_date <=' => date('Y-m-d'), 'location_id' => $data['location_para_details'][0]->id));

		$data['items'] = $this->crud_model->getItems('stock_ledger', array('status' => '1', 'location_id' => $data['location_para_details'][0]->id, 'transaction_date <=' => date('Y-m-d')), 'item_code');
		// echo "<pre>";
		// var_dump($data['items']);
		// exit;
		$data['title'] = 'Add/Edit ' . $this->title;
		$data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id)
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if (empty($detail)) {
			$this->session->set_flashdata('error', 'No Data Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		$data['setting_details'] = $this->crud_model->get_where_single('site_settings', array('status', '1'));

		$data['detail'] = $detail;
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
		$result = $this->crud_model->update($this->table, $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect($this->redirect . '/admin/all');
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect($this->redirect . '/admin/all');
		}
	}

	public function getItems()
	{
		$location_id = $this->input->post('id');
		$transaction_date = $this->input->post('transaction_date');
		$items = $this->crud_model->getItems('stock_ledger', array('location_id' => $location_id, 'transaction_date <=' => $transaction_date), 'item_code');
		if ($location_id) {
			if (count($items) > 0) {
				$pro_select_box = '';
				$pro_select_box .= '<option value="">Select Items</option>';
				foreach ($items as $key => $val) {
					$total_stock = isset($val->total_stock) ? $val->total_stock : 0;
					$data['items'] = $this->crud_model->get_where_single('item_infos', array('status' => '1', 'item_code' => $val->item_code));
					$pro_select_box .= '<option value="' . $data['items']->item_code . '_' . $total_stock . '">' . $data['items']->item_name . '</option>';
				}
				// echo json_encode($pro_select_box);
				$response = array(
					'status' => 'success',
					'message' => 'No Items Found',
					'code' => 305,
					'option' => $pro_select_box,
				);
			} else {
				$response = array(
					'status' => 'error',
					'message' => 'No Items Found',
					'code' => 305,
				);
			}
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Please Select Location First',
				'code' => 304,
			);
		}

		$decoded_response = json_encode($response);
		echo $decoded_response;
	}


	public function getForm()
	{
		try {

			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				//access ok 
				// echo "here";
				// exit;
				// $check = $this->load->view('listall/image_form');  
				$item_code = $this->input->post('val');
				$total_stock = $this->input->post('total_stock');
				$in_unit_price = $this->input->post('in_unit_price');

				// $unit_price = $this->input->post('unit_price');
				// $total = $this->input->post('total');

				if ($item_code) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $item_code));
					$stock_detail = $this->crud_model->get_where_single('stock_ledger', array('item_code' => $item_code));
					// var_dump($stock_detail);
					// exit;
					$html = '';

					if ($item_detail) {
						$html .= '<div class="row" style="margin-bottom: 15px;">
								
									<div class="col-md-4">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $item_code . '" readonly>
									</div>
							
									<div class="col-md-1">
										<input type="number" name="qty[]" min="1" max="' . $total_stock . '" class="form-control" placeholder="Quantity" value="">
									</div>

									<div class="col-md-2">
									<input type="number" name="stock[]" min="1" class="form-control" placeholder="Stock" value="' . $total_stock . '" readonly>
									</div> 

									<div class="col-md-2">
									<input type="number" name="unit_price[]" min="1" class="form-control" placeholder="Unit Price" value="' . $stock_detail->in_unit_price . '" readonly>
									</div> 

									<div class="col-md-2">
									<input type="number" name="actual_unit_price[]" min="1" class="form-control" placeholder="Unit Price" value="' . $stock_detail->in_actual_unit_price . '" readonly hidden>
									</div> 

									<div class="col-md-1">
										<div class="rmv">
											<span class="rmv_itm">X</span>
										</div>
									</div>
									</div>';
					}


					if ($html) {

						$response = array(
							'status' => 'success',
							'status_code' => 200,
							'status_message' => 'Successfully retrived',
							'data' => $html,
						);
					} else {
						$response = array(
							'status' => 'error',
							'status_code' => 300,
							'status_message' => 'Unable To Get Form',
						);
					}
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'Please Select Item First',
					);
				}
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

	public function location_transfer_post()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				$table = $this->input->post('table');
				$row_id = $this->input->post('row_id');
				// var_dump($table, $row_id);
				// exit;

				if ($table || $row_id) {
					$detail = $this->crud_model->get_where_single($table, array('id' => $row_id));
					if (isset($detail->approved_by) && $detail->approved_by != '') {
						if (isset($detail->posted_by) && $detail->posted_by != '') {
							$response = array(
								'status' => 'error',
								'status_code' => 300,
								'status_message' => 'Already Posted !!',
							);
						} else {
							if (isset($detail->cancel_tag) && $detail->cancel_tag == '1') {
								$response = array(
									'status' => 'error',
									'status_code' => 300,
									'status_message' => 'Can not be posted, Already Cancelled !!',
								);
							} else {
								$childs = $this->crud_model->get_where('location_transfer_detail', array('transfer_code' => $detail->transfer_code));

								if (isset($childs)) {
									//Location Transfer Out
									$batch_data = array();
									foreach ($childs as $key => $value) {
										$data = array(
											'item_code' =>  $value->item_code,
											'transaction_date' => $detail->transfered_on,
											'transaction_type' => 'LCO',
											'in_qty' => 0,
											'out_qty' => $value->qty,
											'rem_qty' => 0,
											'in_unit_price' => 0,
											'in_total_price' => 0,
											'in_actual_unit_price' => 0,
											'in_actual_total_price' => 0,
											'out_unit_price' => 0,
											'out_total_price' => 0,
											'out_actual_unit_price' => 0,
											'out_actual_total_price' => 0,
											// 'location_id' => $value->to_loc,
											// 'batch_no' => '',
											// 'vendor_id' => '???',
											// 'client_id' => $detail->client_id,
											'remarks' => 'posted from location transfer out',
											'transactioncode' => $detail->transfer_code,
											'created_on' => date('Y-m-d'),
											'created_by' => $this->current_user->id,
											// 'updated_on' => '???',
											// 'updated_by' => '???',
											// 'staff_id' => '???',
											// 'status' => '1',
										);
										$last_row_no = $this->crud_model->get_where_single_order_by('stock_ledger', array('status' => '1'), 'id', 'DESC');
										if (isset($last_row_no->ledger_code)) {
											$string = $last_row_no->ledger_code;
											$explode = explode("-", $string);
											$int_value = intval($explode[1]) + intval($key) + 1;
											// var_dump(sprintf("%04d", $int_value));
											// exit;
											$data['ledger_code'] = 'LEDG' . date('dmY') . '-' . sprintf("%04d", $int_value);
										} else {
											$data['ledger_code'] = 'LEDG' . date('dmY') . '-0001';
										}

										$batch_data[] = $data;
									}

									$batch_result = $this->db->insert_batch('stock_ledger', $batch_data);

									if ($batch_result) {

										//update stock_ledger remaining qty
										foreach ($batch_data as $k_batch => $v_batch) {
											$out_qty = $v_batch['out_qty'];
											$transaction_date = ((isset($v_batch['transaction_date'])) && $v_batch['transaction_date'] != '') ? $v_batch['transaction_date'] : date('Y-m-d');

											$offset = 0;
											$total_out_price = 0;
											$total_actual_out_price = 0;
											while ($out_qty > 0) {
												$where_loop = array(
													'item_code' => $v_batch['item_code'],
													'transaction_date <=' => $transaction_date,
													'location_id' => $detail->from_loc,
													'rem_qty >=' => 0
												);
												$first_inserted_product_qty = $this->crud_model->get_where_single_order_by_with_offset('stock_ledger', $where_loop, 'id', 'ASC', $offset);

												if (isset($first_inserted_product_qty->rem_qty)) {

													$remaining = (int)$first_inserted_product_qty->rem_qty - (int)$out_qty;
													if ($remaining >= 0) {
														$update_old['rem_qty'] = $remaining;

														$total_out_price = $total_out_price + ((int)$out_qty * $first_inserted_product_qty->in_unit_price);
														$total_actual_out_price = $total_actual_out_price + ((int)$out_qty * $first_inserted_product_qty->in_actual_unit_price);

														$out_qty = 0;
													} else {
														$update_old['rem_qty'] = 0;

														$total_out_price = $total_out_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_unit_price);
														$total_actual_out_price = $total_actual_out_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_actual_unit_price);

														$out_qty = (int)$out_qty - (int)$first_inserted_product_qty->rem_qty;
													}

													$this->crud_model->update('stock_ledger', $update_old, array('id' => $first_inserted_product_qty->id));
												} else {
													$out_qty = 0;
												}

												$offset = $offset + 1;
											}

											$out_unit_price = $total_out_price / $v_batch['out_qty'];
											$out_actual_unit_price = $total_actual_out_price / $v_batch['out_qty'];

											$update_own['out_unit_price'] = $out_unit_price;
											$update_own['out_total_price'] = $out_unit_price * $v_batch['out_qty'];
											$update_own['out_actual_unit_price'] = $out_actual_unit_price;
											$update_own['out_actual_total_price'] = $out_actual_unit_price * $v_batch['out_qty'];
											$this->crud_model->update('stock_ledger', $update_own, array('transactioncode' => $v_batch['transactioncode'], 'item_code' => $v_batch['item_code'], 'transaction_type' => 'LCO'));
										}

										//insert location transfer in
										$batch_data_in = array();
										foreach ($childs as $key_in => $value_in) {
											$data_in = array(
												'item_code' =>  $value_in->item_code,
												'transaction_date' => $detail->transfered_on,
												'transaction_type' => 'LCI',
												'in_qty' => $value_in->qty,
												'out_qty' => 0,
												'rem_qty' => $value_in->qty,
												'in_unit_price' => 0,
												'in_total_price' => 0,
												'in_actual_unit_price' => 0,
												'in_actual_total_price' => 0,
												'out_unit_price' => 0,
												'out_total_price' => 0,
												'out_actual_unit_price' => 0,
												'out_actual_total_price' => 0,
												'location_id' => $detail->to_loc,
												// 'batch_no' => '',
												// 'vendor_id' => '???',
												// 'client_id' => $detail->client_id,
												'remarks' => 'posted from location transfer in',
												'transactioncode' => $detail->transfer_code,
												'created_on' => date('Y-m-d'),
												'created_by' => $this->current_user->id,
												// 'updated_on' => '???',
												// 'updated_by' => '???',
												// 'staff_id' => '???',
												// 'status' => '1',
											);
											$last_row_no = $this->crud_model->get_where_single_order_by('stock_ledger', array('status' => '1'), 'id', 'DESC');
											if (isset($last_row_no->ledger_code)) {
												$string = $last_row_no->ledger_code;
												$explode = explode("-", $string);
												$int_value = intval($explode[1]) + intval($key_in) + 1;
												// var_dump(sprintf("%04d", $int_value));
												// exit;
												$data_in['ledger_code'] = 'LEDG' . date('dmY') . '-' . sprintf("%04d", $int_value);
											} else {
												$data_in['ledger_code'] = 'LEDG' . date('dmY') . '-0001';
											}

											$batch_data_in[] = $data_in;
										}

										$batch_in_result = $this->db->insert_batch('stock_ledger', $batch_data_in);

										if ($batch_in_result) {
											//update stock_ledger in prices
											foreach ($batch_data_in as $k_batch => $v_batch_in) {
												$in_qty = $v_batch_in['in_qty'];
												$transaction_date = ((isset($v_batch_in['transaction_date'])) && $v_batch_in['transaction_date'] != '') ? $v_batch_in['transaction_date'] : date('Y-m-d');

												$offset = 0;
												$total_in_price = 0;
												$total_actual_in_price = 0;
												while ($in_qty > 0) {
													$where_loop = array(
														'item_code' => $v_batch_in['item_code'],
														'transaction_date <=' => $transaction_date,
														'location_id' => $detail->from_loc,
														'rem_qty >=' => 0
													);
													$first_inserted_product_qty = $this->crud_model->get_where_single_order_by_with_offset('stock_ledger', $where_loop, 'id', 'ASC', $offset);

													if (isset($first_inserted_product_qty->rem_qty)) {

														$remaining = (int)$first_inserted_product_qty->rem_qty - (int)$in_qty;
														if ($remaining >= 0) {
															$total_in_price = $total_in_price + ((int)$in_qty * $first_inserted_product_qty->in_unit_price);
															$total_actual_in_price = $total_actual_in_price + ((int)$in_qty * $first_inserted_product_qty->in_actual_unit_price);

															$in_qty = 0;
														} else {
															$total_in_price = $total_in_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_unit_price);
															$total_actual_in_price = $total_actual_in_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_actual_unit_price);

															$in_qty = (int)$in_qty - (int)$first_inserted_product_qty->rem_qty;
														}
													} else {
														$in_qty = 0;
													}

													$offset = $offset + 1;
												}

												$in_unit_price = $total_in_price / $v_batch_in['in_qty'];
												$in_actual_unit_price = $total_actual_in_price / $v_batch_in['in_qty'];

												$update_own_in['in_unit_price'] = $in_unit_price;
												$update_own_in['in_total_price'] = $in_unit_price * $v_batch_in['in_qty'];
												$update_own_in['in_actual_unit_price'] = $in_actual_unit_price;
												$update_own_in['in_actual_total_price'] = $in_actual_unit_price * $v_batch_in['in_qty'];
												$this->crud_model->update('stock_ledger', $update_own_in, array('transactioncode' => $v_batch_in['transactioncode'], 'item_code' => $v_batch_in['item_code'], 'transaction_type' => 'LCI'));
											}
										}

										//update posted tag  on location_transfer
										$update['posted_tag'] = '1';
										$update['posted_by'] = $this->current_user->id;
										$update['posted_on'] = date('Y-m-d');

										$this->crud_model->update('location_transfer', $update, array('id' => $detail->id));



										$response = array(
											'status' => 'success',
											'status_code' => 200,
											'status_message' => 'Successfully Posted !!!',
										);
									} else {

										$response = array(
											'status' => 'error',
											'status_code' => 200,
											'status_message' => 'Unable To Post !!!',
										);
									}
								} else {
									$response = array(
										'status' => 'error',
										'status_code' => 300,
										'status_message' => 'No Details Available !!!',
									);
								}
							}
						}
					} else {
						$response = array(
							'status' => 'error',
							'status_code' => 300,
							'status_message' => 'Record is not approved yet !!!',
						);
					}
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'table and row invalid !!!',
					);
				}
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

	//approve location transfer
	public function change_status()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				$table = $this->input->post('table');
				$row_id = $this->input->post('row_id');
				// var_dump($table, $row_id);
				// exit;
				if ($table || $row_id) {

					$detail = $this->crud_model->get_where_single($table, array('id' => $row_id));

					if (isset($detail->cancel_tag) && $detail->cancel_tag == '1') {
						$response = array(
							'status' => 'error',
							'status_code' => 300,
							'status_message' => 'Can not be approved, already cancelled !!!',
						);
					} else {
						$data['approved_by'] = $this->current_user->id;
						$data['approved_on'] = date('Y-m-d');
						$update = $this->crud_model->update($table, $data, array('id' => $row_id));
						if ($update) {
							$response = array(
								'status' => 'success',
								'status_code' => 300,
								'status_message' => 'Successfully Approved !!!',
							);
						} else {
							$response = array(
								'status' => 'error',
								'status_code' => 300,
								'status_message' => 'Unable to approve',
							);
						}
					}
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'table and row invalid',
					);
				}
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

	//cancell location transfer
	public function cancel_row()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				$table = $this->input->post('table');
				$row_id = $this->input->post('row_id');
				// var_dump($table, $row_id);
				// exit;
				if ($table || $row_id) {

					$detail = $this->crud_model->get_where_single($table, array('id' => $row_id));

					if (isset($detail->approved_by) && $detail->approved_by != '') {
						$response = array(
							'status' => 'error',
							'status_code' => 300,
							'status_message' => 'Can not be cancelled, already approved !!!',
						);
					} else {
						$data['cancel_tag'] = '1';
						$update = $this->crud_model->update($table, $data, array('id' => $row_id));
						if ($update) {
							$response = array(
								'status' => 'success',
								'status_code' => 300,
								'status_message' => 'Successfully Cancelled !!!',
							);
						} else {
							$response = array(
								'status' => 'error',
								'status_code' => 300,
								'status_message' => 'Unable to cancel',
							);
						}
					}
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'table and row invalid',
					);
				}
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
