<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'item_scrap'; //table name
		$this->title = 'Scrap'; // module title
		$this->redirect = 'scrap'; //module foldername
	}
	public function search($page = '')
	{
		
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$scrap_code = $this->input->post('scrap_code');
	
		$approved = $this->input->post('approved');
		$cancelled = $this->input->post('cancelled');

		$data_filter = array(
			'created_on >=' => $date_from,
			'created_on <=' => $date_to,
			'scrap_code' => $scrap_code,
		
			'approved_by' => $approved,
			'cancel_tag' => $cancelled,
		);
		// echo "<pre>";
		// var_dump($data_filter);
		// exit;
		// $all_data = $this->crud_model->count_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled);
		$all_data = $this->crud_model->count_all_data('item_scrap', $data_filter);
		// var_dump($all_data);
		// exit;
		$config['base_url'] = base_url($this->redirect . '/admin/search');
		$config['total_rows'] = $all_data->total;
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
		// $items = $this->crud_model->get_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled, $config['per_page'], $page);
		$items = $this->crud_model->get_all_data('item_scrap', $data_filter, $config['per_page'], $page);
		
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
		if (isset($detail->scrap_code)) {
			$data['scrap_code'] = $detail->scrap_code;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('item_scrap', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->scrap_code)) {
				// $string = "RQ07042022-0006";
				$string = $last_row_no->scrap_code;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['scrap_code'] = 'SCRAP' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['scrap_code'] = 'SCRAP' . date('dmY') . '-0001';
			}
		}

		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('scrap_code', 'Scrap Code', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'scrap_code' => $this->input->post('scrap_code'),
					'remarks' => $this->input->post('remarks'),
					'status' => $this->input->post('status'),
					'type' => $this->input->post('item_type'),
				);

				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_on'] = date('Y-m-d');
					$data['created_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$unit_price = $this->input->post('unit_price');
						$qty =  $this->input->post('qty');
						$item_remark =  $this->input->post('item_remark');
						$type = $this->input->post('type');

						if ($this->input->post('item_type') == 'Assets') {
							$depreciated_amt =  $this->input->post('depreciated_amt');
							$total_depreciated_amt =  $this->input->post('total_depreciated_amt');
							$book_value = $this->input->post('book_value');
						}


						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['scrap_code'] = $data['scrap_code'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['type'] = $type[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $qty[$i] * $unit_price[$i];
								$insert_detail['remarks'] = $item_remark[$i];
								$insert_detail['created_on'] = date('Y-m-d');
								$insert_detail['created_by'] = $this->current_user->id;

								if ($this->input->post('item_type') == 'Assets') {
									$insert_detail['depreciated_amt'] = $depreciated_amt[$i];
									$insert_detail['total_depreciated_amt'] = $total_depreciated_amt[$i];
									$insert_detail['book_value'] = $book_value[$i];
								}

								$batch_data[] = $insert_detail;
							}
							$this->db->insert_batch('item_scrap_detail', $batch_data);
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
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$this->db->delete('item_scrap_detail', array('scrap_code' => $detail->scrap_code));


						$item_code =  $this->input->post('item_code');
						$unit_price = $this->input->post('unit_price');
						$qty =  $this->input->post('qty');
						$item_remark =  $this->input->post('item_remark');
						$type = $this->input->post('type');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['scrap_code'] = $data['scrap_code'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['type'] = $type[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $qty[$i] * $unit_price[$i];
								$insert_detail['remarks'] = $item_remark[$i];
								$insert_detail['updated_on'] = date('Y-m-d');
								$insert_detail['updated_by'] = $this->current_user->id;

								$batch_data[] = $insert_detail;
							}
							$this->db->insert_batch('item_scrap_detail', $batch_data);
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
		if (isset($detail->type)) {
			// var_dump($detail->type);
			// exit;
			if ($detail->type == 'Inventory') {
				$type = 'I';
			} else {
				$type = 'A';
			}
			$data['items'] = $this->crud_model->get_total_item_stock_group_by_item_join_item('stock_ledger', array('stock_ledger.status' => '1', 'stock_ledger.transaction_date <=' => date('Y-m-d'), 'item_infos.item_type' => $type));
		} else {
			$data['items'] = $this->crud_model->get_total_item_stock_group_by_item_join_item('stock_ledger', array('stock_ledger.status' => '1', 'stock_ledger.transaction_date <=' => date('Y-m-d'), 'item_infos.item_type' => 'A'));
		}
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
				$unit_price = $this->input->post('unit_price');
				$total = $this->input->post('total');
				$item_type = $this->input->post('item_type');
				$ledger_code = $this->input->post('ledger_code');

				if ($item_code) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $item_code));
					$where_stock = array(
						'item_code' => $item_code,
						'transaction_date <=' => date('Y-m-d'),
					);
					$total_item_stock = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
					$html = '';

					if ($item_type == 'Assets') {
						if ($item_detail) {
							$fiscal_year_detail = $this->crud_model->get_where_single('fiscal_year_para', array('start_date <=' => date('Y-m-d'), 'end_date >=' => date('Y-m-d')));
							if ($fiscal_year_detail->fiscal_year) {
								$fiscal_year = $fiscal_year_detail->fiscal_year;
								$start_date = isset($fiscal_year_detail->start_date) ? $fiscal_year_detail->start_date : date('Y-m-d');
								$end_date = isset($fiscal_year_detail->end_date) ? $fiscal_year_detail->end_date : date('Y-m-d');

								$earlier = new DateTime($start_date);
								$later = new DateTime($end_date);
								$date = new DateTime(date('Y-m-d'));

								$total_days = ($earlier->diff($later)->format("%r%a")) + 1; //last days included  ie. +1

								$depreciated_days = ($earlier->diff($date)->format("%r%a")) + 1;

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
								$in_unit_price = $unit_price;
								$depreciation_rate = $item_detail->depreciation_rate;

								//check if record is new or old
								$get_older_end_record = $this->crud_model->get_where_single('year_end', array('fiscal_year' => $old_fiscal_year, 'item_code' => $item_code));
								if ($get_older_end_record) {

									$depreciated_amt = ($get_older_end_record->book_value * $depreciation_rate) / 100;

									$depreciated_amt = ($depreciated_amt / $total_days) * $depreciated_days;

									$total_depreciated_amt = $get_older_end_record->total_depreciated_amt + $depreciated_amt;

									$book_value = $get_older_end_record->book_value - $depreciated_amt;
								} else {
									$ledger_detail = $this->crud_model->get_where_single('stock_ledger', array('ledger_code' => $ledger_code));
									if ($ledger_detail->transaction_type == 'OPN') {
										$opening_detail = $this->crud_model->get_opening_detail($ledger_detail->transactioncode, $ledger_detail->item_code);
										if ($opening_detail->purchase_date) {
											$purchase_date = $opening_detail->purchase_date;
										} else {
											$purchase_date = (isset($ledger_detail->transaction_date) && $ledger_detail->transaction_date != '') ? $ledger_detail->transaction_date : date('Y-m-d');
										}

										$book_value = (int)((isset($opening_detail->book_value) && $opening_detail->book_value != '') ? $opening_detail->book_value : 0);

										$depreciated_amount_opening = (isset($opening_detail->depreciated_amt) && $opening_detail->depreciated_amt != '') ? $opening_detail->depreciated_amt : 0;
										$depreciated_amount = ((int)$book_value * $depreciation_rate) / 100;
										$depreciated_amt = ($depreciated_amount / $total_days) * $depreciated_days;


										$book_value = (int)$book_value - (int)$depreciated_amt;
										$total_depreciated_amt = $depreciated_amount_opening + $depreciated_amt;
									} else {
										$purchase_date = (isset($ledger_detail->transaction_date) && $ledger_detail->transaction_date != '') ? $ledger_detail->transaction_date : date('Y-m-d');

										$depreciated_amt = ($in_unit_price * $depreciation_rate) / 100;
										//for government rule get quarter and its rate
										// $depreciation_para = $this->crud_model->get_where_single('depreciation_para', array('from <=' => $purchase_date, 'to >=' => $purchase_date));
										// if ($depreciation_para->depreciation_rate) {
										// 	$depreciated_amount = $depreciated_amount * $depreciation_para->depreciation_rate;
										// } else {
										// 	$depreciated_amount = $depreciated_amount;
										// } 
										$depreciated_amt = ($depreciated_amt / $total_days) * $depreciated_days;
										$book_value = ($in_unit_price - $depreciated_amt);
										$total_depreciated_amt = $depreciated_amt;
									}
								}
							} else {
								$total_depreciated_amt = 0;
								$depreciated_amt = 0;
								$book_value = 0;
							}
							$html .= '<div class="row" style="margin-bottom: 15px;">
										<div class="col-md-1">
										' . ($total + 1) . '.
										</div>
										<div class="col-md-1">
											<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
											<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $item_code . '" readonly>
											<input type="hidden" name="unit_price[]" class="form-control" placeholder="Unit Price" value="' . $unit_price . '" readonly>
										</div>
										<div class="col-md-1">
											<select name="type[]" class="form-control" id="type" required>
												<option value="Scrap">Scrap</option>
												<option value="Damage">Damage</option>
												<option value="Lost">Lost</option>
											</select>
										</div>
										<div class="col-md-1">
											<input type="number" name="qty[]" min="1" max="' . $total_item_stock . '" class="form-control" placeholder="Scrap Quantity" value="1" required>
										</div>
										<div class="col-md-1">
											<input type="number" name="stock[]" class="form-control" placeholder="Stock" value="' . $total_item_stock . '" readonly>
										</div>
										<div class="col-md-2">
											<input type="number" name="depreciated_amt[]" class="form-control" placeholder="Depreciated Amount" value="' . $depreciated_amt . '" readonly>
										</div>
										<div class="col-md-1">
											<input type="number" name="total_depreciated_amt[]" class="form-control" placeholder="Total Depreciated Amount" value="' . $total_depreciated_amt . '" readonly>
										</div>
										<div class="col-md-1">
											<input type="number" name="book_value[]" class="form-control" placeholder="Book Value" value="' . $book_value . '" readonly>
										</div>
										<div class="col-md-2">
											<textarea name="item_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Item Remarks"></textarea>
										</div>
										<div class="col-md-1">
											<div class="rmv">
												<span class="rmv_itm">X</span>
											</div>
										</div>
									  </div>';
						}
					} else {
						if ($item_detail) {
							$html .= '<div class="row" style="margin-bottom: 15px;">
									<div class="col-md-1">
									' . ($total + 1) . '.
									</div>
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $item_code . '" readonly>
										<input type="hidden" name="unit_price[]" class="form-control" placeholder="Unit Price" value="' . $unit_price . '" readonly>
									</div>
									<div class="col-md-2">
										<select name="type[]" class="form-control" id="type" required>
											<option value="Scrap">Scrap</option>
											<option value="Damage">Damage</option>
											<option value="Lost">Lost</option>
										</select>
									</div>
									<div class="col-md-1">
										<input type="number" name="qty[]" min="1" max="' . $total_item_stock . '" class="form-control" placeholder="Scrap Quantity" value="1" required>
									</div>
									<div class="col-md-1">
											<input type="number" name="stock[]" class="form-control" placeholder="Stock" value="' . $total_item_stock . '" readonly>
										</div>
									<div class="col-md-4">
										<textarea name="item_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Item Remarks"></textarea>
									</div>
									<div class="col-md-1">
										<div class="rmv">
											<span class="rmv_itm">X</span>
										</div>
									</div>
									</div>';
						}
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

	public function getItemsAndHeadings()
	{
		try {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				//access ok
				// echo "here";exit;
				// $check = $this->load->view('listall/image_form');
				$val = $this->input->post('val');
				if ($val) {
					$html = '';
					$option = '';
					if ($val == 'Assets') {
						// $items = $this->crud_model->get_where('item_infos', array('status' => '1', 'item_type' => 'A'));
						$items = $this->crud_model->get_total_item_stock_group_by_item_join_item('stock_ledger', array('stock_ledger.status' => '1', 'stock_ledger.transaction_date <=' => date('Y-m-d'), 'item_infos.item_type' => 'A'));
						if ($items) {
							$option .= '<option value>Select item</option>';
							foreach ($items as $key => $value) {
								$option .= '<option value="' . $value->item_code . ',' . $value->unit_price . ',' . $value->ledger_code . '">' . $value->item_name . '</option>';
							}
						} else {
							$option = '<option value>Select item</option>';
						}
						$html = '<div class=" row">
									<div class="col-md-1">
										<label>
										#
										</label>
									</div>
									<div class="col-md-1">
										<label>Product</label>
									</div>
									<div class="col-md-1">
										<label>Type</label>
									</div>
									<div class="col-md-1">
										<label>Quantity</label>
									</div> 
									<div class="col-md-1">
										<label>Stock</label>
									</div> 
									<div class="col-md-2">
										<label>Depreciated</label>
									</div>
									<div class="col-md-1">
										<label>Total Depreciated</label>
									</div>
									<div class="col-md-1">
										<label>Book Value</label>
									</div>
									<div class="col-md-2">
										<label>Remarks</label>
									</div>
									<div class="col-md-1">

									</div>
								</div>';
					} else {
						// $items = $this->crud_model->get_where('item_infos', array('status' => '1', 'item_type' => 'I'));
						$items = $this->crud_model->get_total_item_stock_group_by_item_join_item('stock_ledger', array('stock_ledger.status' => '1', 'stock_ledger.transaction_date <=' => date('Y-m-d'), 'item_infos.item_type' => 'I'));
						if ($items) {
							$option .= '<option value>Select item</option>';
							foreach ($items as $key => $value) {
								$option .= '<option value="' . $value->item_code . ',' . $value->unit_price . ',' . $value->ledger_code . '">' . $value->item_name . '</option>';
							}
						} else {
							$option = '<option value>Select item</option>';
						}
						$html = '<div class=" row">
									<div class="col-md-1">
									<label>
										#
									</label>
									</div>
									<div class="col-md-2">
									<label>Product</label>
									</div>
									<div class="col-md-2">
									<label>Type</label>
									</div>
									<div class="col-md-1">
									<label>Quantity</label>
									</div>
									<div class="col-md-1">
									<label>Stock</label>
									</div>
									<div class="col-md-4">
									<label>Remarks</label>
									</div>
									<div class="col-md-1">

									</div>
								</div>';
					}
					$response = array(
						'status' => 'success',
						'status_code' => 200,
						'status_message' => 'Successfully retrived',
						'html' => $html,
						'option' => $option,
					);
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'Please Select Type First',
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

	public function scrap_post()
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
						if (isset($detail->posted_tag) && $detail->posted_tag == '1') {
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
								$scrap_details = $this->crud_model->get_where('item_scrap_detail', array('scrap_code' => $detail->scrap_code));

								if (isset($scrap_details)) {
									$batch_data = array();
									foreach ($scrap_details as $key => $value) {
										$data = array(
											'item_code' =>  $value->item_code,
											'transaction_date' => $detail->created_on,
											'transaction_type' => 'SCP',
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
											// 'location_id' => $value->location_id,
											// 'batch_no' => '',
											// 'vendor_id' => '???',
											// 'client_id' => '???',
											'remarks' => 'posted from scrap',
											'transactioncode' => $detail->scrap_code,
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
											$scrapped_qty = $v_batch['out_qty'];
											$transaction_date = ((isset($v_batch['transaction_date'])) && $v_batch['transaction_date'] != '') ? $v_batch['transaction_date'] : date('Y-m-d');
											// $where_stock1 = array(
											// 	'item_code' => $v_batch['item_code'],
											// 	'transaction_date <=' => $transaction_date,
											// );
											// $total_item_stock_before_issue_slip_date_1 = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock1);
											$offset = 0;
											$total_out_price = 0;
											$total_actual_out_price = 0;
											while ($scrapped_qty > 0) {
												$where_loop = array(
													'item_code' => $v_batch['item_code'],
													'transaction_date <=' => $transaction_date,
													'rem_qty >=' => 0
												);
												$first_inserted_product_qty = $this->crud_model->get_where_single_order_by_with_offset('stock_ledger', $where_loop, 'id', 'ASC', $offset);

												if (isset($first_inserted_product_qty->rem_qty)) {

													$remaining = (int)$first_inserted_product_qty->rem_qty - (int)$scrapped_qty;
													if ($remaining >= 0) {
														$update_old['rem_qty'] = $remaining;

														$total_out_price = $total_out_price + ((int)$scrapped_qty * $first_inserted_product_qty->in_unit_price);
														$total_actual_out_price = $total_actual_out_price + ((int)$scrapped_qty * $first_inserted_product_qty->in_actual_unit_price);

														$scrapped_qty = 0;
													} else {
														$update_old['rem_qty'] = 0;

														$total_out_price = $total_out_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_unit_price);
														$total_actual_out_price = $total_actual_out_price + ((int)$first_inserted_product_qty->rem_qty * $first_inserted_product_qty->in_actual_unit_price);

														$scrapped_qty = (int)$scrapped_qty - (int)$first_inserted_product_qty->rem_qty;
													}

													$this->crud_model->update('stock_ledger', $update_old, array('id' => $first_inserted_product_qty->id));
												} else {
													$scrapped_qty = 0;
												}

												$offset = $offset + 1;
											}

											$out_unit_price = $total_out_price / $v_batch['out_qty'];
											$out_actual_unit_price = $total_actual_out_price / $v_batch['out_qty'];

											$update_own['out_unit_price'] = $out_unit_price;
											$update_own['out_total_price'] = $out_unit_price * $v_batch['out_qty'];
											$update_own['out_actual_unit_price'] = $out_actual_unit_price;
											$update_own['out_actual_total_price'] = $out_actual_unit_price * $v_batch['out_qty'];
											$this->crud_model->update('stock_ledger', $update_own, array('transactioncode' => $v_batch['transactioncode'], 'item_code' => $v_batch['item_code']));
										}

										//update posted tag  on issue_slip_master
										$update['posted_tag'] = '1';
										$update['posted_by'] = $this->current_user->id;
										$update['posted_on'] = date('Y-m-d');

										$this->crud_model->update('item_scrap', $update, array('id' => $detail->id));



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
}
