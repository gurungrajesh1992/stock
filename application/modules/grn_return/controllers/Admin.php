<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'grn_return';
		$this->title = 'GRN Return';
		$this->redirect = 'grn_return';
	}

	public function search($page = '')
	{
		
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$grn_no = $this->input->post('grn_no');
		$grn_return_no = $this->input->post('grn_return_no');
		$payment_type= $this->input->post('payment_type');
		$type= $this->input->post('type');
		$supplier_id = $this->input->post('supplier_id');
		$approved = $this->input->post('approved');
		$cancelled = $this->input->post('cancelled');

		$data_filter = array(
			'created_on >=' => $date_from,
			'created_on <=' => $date_to,
			'grn_no' => $grn_no,
			'grn_return_no' => $grn_return_no,
			'supplier_id'=>$supplier_id,
			'payment_type' => $payment_type,
			'type' => $type,			
			'approved_by' => $approved,
			'cancel_tag' => $cancelled,
		);
		// echo "<pre>";
		// var_dump($data_filter);
		// exit;
		// $all_data = $this->crud_model->count_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled);
		$all_data = $this->crud_model->count_all_data('grn_return', $data_filter);
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
		$items = $this->crud_model->get_all_data('grn_return', $data_filter, $config['per_page'], $page);
		
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
		$items = $this->crud_model->get_where_pagination('grn_return', array('status !=' => '2'), $config['per_page'], $page);

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
		$this->load->view('layouts/admin/index', $data);
	}

	public function add($grn_no = '')
	{
		if (empty($grn_no)) {
			$this->session->set_flashdata('error', 'GRN Number Required.');
			redirect($this->redirect . '/admin/form');
		}
		$grn_master_details = $this->crud_model->get_where_single('grn_master', array('grn_no' => $grn_no));

		if (!$grn_master_details) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/form');
		}

		// if ($issue_slip_master_details->cancel_tag == '1') {
		// 	$this->session->set_flashdata('error', 'Issue Slip Cancelled');
		// 	redirect($this->redirect . '/admin/form');
		// } else if ($issue_slip_master_details->approved_by == '') {
		// 	$this->session->set_flashdata('error', 'Issue Slip is not Approved, Can not add issue');
		// 	redirect($this->redirect . '/admin/form');
		// } else {
		// }
		// echo "here";
		// exit;
		if ($grn_no) {
			$childs = $this->crud_model->get_where('grn_details', array('grn_no' => $grn_no));
			$data['items'] = $childs;
		}

		$last_row_no = $this->crud_model->get_where_single_order_by('grn_return', array(''), 'id', 'DESC');
		// var_dump($last_row_no);
		// exit;
		if (isset($last_row_no->grn_return_no)) {
			$string = $last_row_no->grn_return_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['grn_return_no'] = 'GRR' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['grn_return_no'] = 'GRR' . date('dmY') . '-0001';
		}
		$data['grn_master_details'] = $grn_master_details;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('return_date', 'Goods Return Date', 'required|trim');

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/add/' . $grn_no);
					} else {
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}

				$data = array(
					'grn_return_no' => $this->input->post('grn_return_no'),
					'grn_no' => $this->input->post('grn_no'),
					'return_date' => $this->input->post('return_date'),
					'supplier_id' => $this->input->post('supplier_id'),
					'remarks' => $this->input->post('remarks'),
				);


				if ($id == '') {
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$returned_qty =  $this->input->post('qty');
						$unit_price =  $this->input->post('unit_price');
						$remarks =  $this->input->post('detail_remarks');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['grn_return_no'] = $data['grn_return_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $returned_qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $unit_price[$i] * $returned_qty[$i];
								$insert_detail['remarks'] = $remarks[$i];
								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$this->crud_model->insert('grn_return_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/add/' . $grn_no);
					}
				}
			}
		}
		$data['title'] = 'Add ' . $this->title;
		$data['page'] = 'add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function edit($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('grn_return', array('id' => $id));
		// echo "<pre>";
		// var_dump($master_detail);
		// exit;
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		if (isset($master_detail->approved_by) && $master_detail->approved_by != '') {
			$this->session->set_flashdata('error', 'Can not edit, Already Approved');
			redirect($this->redirect . '/admin/all');
		}

		if ($master_detail) {
			$grn_return_details = $this->crud_model->get_where('grn_return_details', array('grn_return_no' => $master_detail->grn_return_no));
			// echo "<pre>";
			// var_dump($grn_return_details);
			// exit;
			if ($grn_return_details) {
				$data['grn_return_details'] = $grn_return_details;
			}
		}

		$data['master_detail'] = $master_detail;

		if ($master_detail->grn_no) {
			$childs = $this->crud_model->get_where('grn_details', array('grn_no' => $master_detail->grn_no));
			$data['items'] = $childs;
		}

		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;

			$this->form_validation->set_rules('return_date', 'Goods Return Date', 'required|trim');

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/add/' . $master_detail->grn_no);
					} else {
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}

				$data = array(
					'grn_return_no' => $this->input->post('grn_return_no'),
					'grn_no' => $this->input->post('grn_no'),
					'return_date' => $this->input->post('return_date'),
					'supplier_id' => $this->input->post('supplier_id'),
					'remarks' => $this->input->post('remarks'),
				);


				if ($id == '') {
				} else {

					$this->db->delete('grn_return_details', array('grn_return_no' => $master_detail->grn_return_no));

					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;

					// $result = $this->crud_model->insert($this->table, $data);
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$returned_qty =  $this->input->post('qty');
						$unit_price =  $this->input->post('unit_price');
						$remarks =  $this->input->post('detail_remarks');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['grn_return_no'] = $data['grn_return_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $returned_qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $unit_price[$i] * $returned_qty[$i];
								$insert_detail['remarks'] = $remarks[$i];
								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$this->crud_model->insert('grn_return_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}
			}
		}
		$data['title'] = 'Edit ' . $this->title;
		$data['page'] = 'edit';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('grn_return', array('id' => $id));
		// echo "<pre>";
		// var_dump($master_detail);
		// exit;
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		if ($master_detail) {
			$grn_return_details = $this->crud_model->get_where('grn_return_details', array('grn_return_no' => $master_detail->grn_return_no));
			// echo "<pre>";
			// var_dump($grn_return_details);
			// exit;
			if ($grn_return_details) {
				$data['grn_return_details'] = $grn_return_details;
			}
		}

		$data['master_detail'] = $master_detail;

		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('grn_no', 'GRN no', 'required|trim');
			if ($this->form_validation->run()) {
				$grn_no = $this->input->post('grn_no');
				if (!isset($grn_no) && $grn_no == '') {
					$this->session->set_flashdata('error', 'GRN no Number Required');
					redirect($this->redirect . '/admin/form');
				}
				$this->session->set_flashdata('success', 'GRN no Retrieved Successfully');
				redirect($this->redirect . '/admin/add/' . $grn_no);
			}
		}
		$data['grn_masters'] = $this->crud_model->get_where('grn_master', array('posted_tag' => '1', 'approved_by !=' => ''));
		$data['title'] = 'GRN Number';
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
				$val = $this->input->post('val');
				$grn_no = $this->input->post('grn_no');

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));
					$html = '';

					if ($item_detail) {

						$received_detail = $this->crud_model->get_where_single('grn_details', array('item_code' => $val, 'grn_no' => $grn_no));
						$received_qty = (isset($received_detail->qty) && $received_detail->qty != '') ? $received_detail->qty : 0;
						$unit_price = (isset($received_detail->unit_price) && $received_detail->unit_price != '') ? $received_detail->unit_price : 0;
						$html .= '<div class="row" style="margin-bottom: 15px;"> 
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
										<input type="hidden" name="unit_price[]" class="form-control" placeholder="Unit Price" value="' . $unit_price . '">
									</div>
									<div class="col-md-1">
										<input type="number" name="received_qty[]" class="form-control" placeholder="Received Quantity" value="' . $received_qty . '" readonly>
									</div>
									<div class="col-md-1">
										<input type="number" name="qty[]" max="' . $received_qty . '" min="1" class="form-control iss" placeholder="R-Q" value="1" required>
									</div>
									<div class="col-md-7">
										<textarea name="detail_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"></textarea>
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

	public function grn_return_post()
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
							$childs = $this->crud_model->get_where('grn_return_details', array('grn_return_no' => $detail->grn_return_no));
							// echo "<pre>";
							// var_dump($childs);
							// exit;
							if (!empty($childs)) {
								foreach ($childs as $key => $value) {
									$grn_tran_detail_frm_stock_ledger = $this->crud_model->get_where_single('stock_ledger', array('item_code' => $value->item_code, 'transactioncode' => $detail->grn_no));
									$data = array(
										'item_code' =>  $value->item_code,
										'transaction_date' => $detail->return_date,
										'transaction_type' => 'GRR',
										'in_qty' => 0,
										'out_qty' => $value->qty,
										'rem_qty' => 0,
										'in_unit_price' => 0,
										'in_total_price' => 0,
										'in_actual_unit_price' => 0,
										'in_actual_total_price' => 0,
										'out_unit_price' => $grn_tran_detail_frm_stock_ledger->in_unit_price,
										'out_total_price' => ($value->qty * $grn_tran_detail_frm_stock_ledger->in_unit_price),
										'out_actual_unit_price' => $grn_tran_detail_frm_stock_ledger->in_actual_unit_price,
										'out_actual_total_price' => ($value->qty * $grn_tran_detail_frm_stock_ledger->in_actual_unit_price),
										'location_id' => $grn_tran_detail_frm_stock_ledger->location_id,
										'batch_no' => $grn_tran_detail_frm_stock_ledger->batch_no,
										'vendor_id' => $detail->supplier_id,
										// 'client_id' => '???',
										'remarks' => 'posted from goods return',
										'transactioncode' => $detail->grn_return_no,
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
										$int_value = intval($explode[1]) + 1;
										// var_dump(sprintf("%04d", $int_value));
										// exit;
										$data['ledger_code'] = 'LEDG' . date('dmY') . '-' . sprintf("%04d", $int_value);
									} else {
										$data['ledger_code'] = 'LEDG' . date('dmY') . '-0001';
									}

									$this->crud_model->insert('stock_ledger', $data);
								}

								$update['posted_tag'] = '1';
								$update['posted_by'] = $this->current_user->id;
								$update['posted_on'] = date('Y-m-d');

								$this->crud_model->update('grn_return', $update, array('id' => $detail->id));

								$response = array(
									'status' => 'success',
									'status_code' => 200,
									'status_message' => 'Successfully Posted !!!',
								);
							} else {
								$response = array(
									'status' => 'error',
									'status_code' => 300,
									'status_message' => 'No Childs Available !!!',
								);
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
