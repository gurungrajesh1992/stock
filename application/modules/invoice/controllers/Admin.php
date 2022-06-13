<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'invoice_master';
		$this->title = 'Invoice';
		$this->redirect = 'invoice';
	}

	public function search($page = '')
	{

		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$invoice_no = $this->input->post('invoice_no');
		$type = $this->input->post('type');
		$supplier_id = $this->input->post('supplier_id');
		$approved = $this->input->post('approved');
		$cancelled = $this->input->post('cancelled');

		$data_filter = array(
			'created_on >=' => $date_from,
			'created_on <=' => $date_to,
			'invoice_no' => $invoice_no,
			'type' => $type,
			'supplier_id' => $supplier_id,
			'approved_by' => $approved,
			'cancel_tag' => $cancelled,
		);
		// echo "<pre>";
		// var_dump($data_filter);
		// exit;
		// $all_data = $this->crud_model->count_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled);
		$all_data = $this->crud_model->count_all_data('invoice_master', $data_filter);
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
		$items = $this->crud_model->get_all_data('invoice_master', $data_filter, $config['per_page'], $page);

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
		$items = $this->crud_model->get_where_pagination('invoice_master', array('status !=' => '2'), $config['per_page'], $page);

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

	public function add($purchase_order_no = '')
	{
		if (empty($purchase_order_no)) {
			$this->session->set_flashdata('error', 'Purchases Order Number Required.');
			redirect($this->redirect . '/admin/form');
		}
		$purchases_detail = $this->crud_model->get_where_single('purchase_order', array('purchase_order_no' => $purchase_order_no));
		// echo "<pre>";
		// var_dump($purchases_detail);
		// exit;
		if (!$purchases_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/form');
		}

		if ($purchases_detail->cancel_tag == '1') {
			$this->session->set_flashdata('error', 'Purchases Order  Cancelled');
			redirect($this->redirect . '/admin/form');
		} else if ($purchases_detail->approved_by == '') {
			$this->session->set_flashdata('error', 'Purchases Order  is not Approved, Can not add issue');
			redirect($this->redirect . '/admin/form');
		} else {
		}
		// echo "here";
		// exit;

		$last_row_no = $this->crud_model->get_where_single_order_by('invoice_master', array('status' => '1'), 'id', 'DESC');
		if (isset($last_row_no->invoice_no)) {
			$string = $last_row_no->invoice_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['invoice_no'] = 'IN' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['invoice_no'] = 'IN' . date('dmY') . '-0001';
		}
		$data['purchases_detail'] = $purchases_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('invoice_no', 'Invoice No', 'required|trim');


			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/add');
					} else {
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}

				$data = array(
					'invoice_no' => $this->input->post('invoice_no'),
					'supplier_id' => $this->input->post('supplier_id'),

				);


				if ($id == '') {

					$data['type'] = "RQ";
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					$data['cancel_tag'] = '0';

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$amount =  $this->input->post('amount');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['invoice_no'] = $data['invoice_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['amount'] = $amount[$i];

								$this->crud_model->insert('invoice_details', $insert_detail);
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
		}
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
		$data['title'] = 'Add Requested ' . $this->title;
		$data['page'] = 'add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function edit($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('invoice_master', array('id' => $id));
		// var_dump($master_detail);
		// exit;
		if (isset($master_detail->approved_by) && $master_detail->approved_by != '') {
			$this->session->set_flashdata('error', 'Can not edit, Already Approved');
			redirect($this->redirect . '/admin/edit/' . $id);
		}
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		if ($master_detail) {
			$invoice_detail = $this->crud_model->get_where_single('invoice_master', array('invoice_no' => $master_detail->invoice_no));
		}

		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if (!$invoice_detail) {
			$this->session->set_flashdata('error', 'Record Not haaha Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		$data['master_detail'] = $master_detail;
		$data['invoice_detail'] = $invoice_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('invoice_no', 'Invoice No', 'required|trim');
			// $this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			// $this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			// $this->form_validation->set_rules('issued_on', 'Issued Date', 'required|trim');
			// $this->form_validation->set_rules('issued_by', 'Issued By', 'required|trim');

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/add');
					} else {
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}

				$data = array(
					'invoice_no' => $this->input->post('invoice_no'),
					'supplier_id' => $this->input->post('supplier_id'),
				);


				if ($id == '') {
				} else {

					$this->db->delete('invoice_details', array('invoice_no' => $master_detail->invoice_no));

					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;

					// $result = $this->crud_model->insert($this->table, $data);
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$amount =  $this->input->post('amount');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['invoice_no'] = $data['invoice_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['amount'] = $amount[$i];

								$this->crud_model->insert('invoice_details', $insert_detail);
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
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));

		$data['title'] = 'Edit Requested ' . $this->title;
		$data['page'] = 'edit';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('invoice_master', array('id' => $id));
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		if ($master_detail) {
			$invoice_details = $this->crud_model->get_where_single('invoice_details', array('invoice_no' => $master_detail->invoice_no));
		}

		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if (!$invoice_details) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		$data['master_detail'] = $master_detail;
		$data['invoice_details'] = $invoice_details;
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}

	// public function direct_view($id = '')
	// {
	// 	$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
	// 	// echo "<pre>";
	// 	// var_dump($detail);
	// 	// exit;
	// 	if ($detail) {
	// 		$department_detqail = $this->crud_model->get_where_single('department_para', array('id' => $detail->department_id));
	// 		$staffs = $this->crud_model->joinDataMultiple('staff_desig_depart', 'staff_infos', array('staff_desig_depart.department_code' => $department_detqail->department_code), 'staff_id', 'id', 'full_name');
	// 		if ($staffs) {
	// 			$data['staffs'] = $staffs;
	// 		} else {
	// 			$data['staffs'] = array();
	// 		}
	// 	} else {
	// 		$data['staffs'] = array();
	// 	}
	// 	if (isset($detail->issue_slip_no)) {
	// 		$data['issue_slip_no'] = $detail->issue_slip_no;
	// 	} else {
	// 		$last_row_no = $this->crud_model->get_where_single_order_by('issue_slip_master', array('status' => '1'), 'id', 'DESC');
	// 		if (isset($last_row_no->issue_slip_no)) {
	// 			// $string = "IS07042022-0006";
	// 			$string = $last_row_no->issue_slip_no;
	// 			$explode = explode("-", $string);
	// 			$int_value = intval($explode[1]) + 1;
	// 			// var_dump(sprintf("%04d", $int_value));
	// 			$data['issue_slip_no'] = 'IS' . date('dmY') . '-' . sprintf("%04d", $int_value);
	// 		} else {
	// 			$data['issue_slip_no'] = 'IS' . date('dmY') . '-0001';
	// 		}
	// 	}
	// 	$data['detail'] = $detail;

	// 	$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
	// 	$data['departments'] = $this->crud_model->get_where('department_para', array('status' => '1'));
	// 	$data['title'] = 'View ' . $this->title;
	// 	$data['page'] = 'direct_view';
	// 	$this->load->view('layouts/admin/index', $data);
	// }


	public function direct_add($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if ($detail) {
			$supplier_detail = $this->crud_model->get_where_single('supplier_infos', array('id' => $detail->id));
		}
		if (isset($detail->invoice_no)) {
			$data['invoice_no'] = $detail->invoice_no;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('invoice_master', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->invoice_no)) {
				// $string = "IS07042022-0006";
				$string = $last_row_no->invoice_no;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['invoice_no'] = 'IN' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['invoice_no'] = 'IN' . date('dmY') . '-0001';
			}
		}
		$data['detail'] = $detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('invoice_no', 'Invoice No', 'required|trim');
			// $this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			// $this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			// $this->form_validation->set_rules('issued_on', 'Issued Date', 'required|trim');
			// $this->form_validation->set_rules('issued_by', 'Issued By', 'required|trim');

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/direct_add');
					} else {
						redirect($this->redirect . '/admin/direct_add/' . $id);
					}
				}
				$data = array(
					'invoice_no' => $this->input->post('invoice_no'),
					'supplier_id' => $this->input->post('supplier_id'),
					'type' => "DR",
				);

				if ($id == '') {

					// $data['type'] = "DR";
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$amount =  $this->input->post('amount');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['invoice_no'] = $data['invoice_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['amount'] = $amount[$i];

								$this->crud_model->insert('invoice_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/direct_add');
					}
				} else {
					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						//delete all child before update
						$this->db->delete('invoice_details', array('id' => $detail->id));


						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$amount =  $this->input->post('amount');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['invoice_no'] = $data['invoice_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['amount'] = $amount[$i];

								$this->crud_model->insert('invoice_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . '/admin/direct_add/' . $id);
					}
				}
			}
		}
		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
		$data['title'] = 'Add/Edit Direct ' . $this->title;
		$data['page'] = 'direct_add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('type', 'Invoice Type', 'required|trim');
			if ($this->form_validation->run()) {
				$type = $this->input->post('type');

				if ($type == "DR") {
					$this->session->set_flashdata('success', 'Create Invoice Dierectly');
					redirect($this->redirect . '/admin/direct_add/');
				} else {
					$purchase_order_no = $this->input->post('purchase_order_no');
					if (!isset($purchase_order_no) && $purchase_order_no == '') {
						$this->session->set_flashdata('error', 'Purchases Number Required');
						redirect($this->redirect . '/admin/form');
					}
					$this->session->set_flashdata('success', 'Purchases Order No Retrieved Successfully');
					redirect($this->redirect . '/admin/add/' . $purchase_order_no);
				}
			}
		}
		$data['purchase_order_no'] = $this->crud_model->get_where('purchase_order', array('status' => '1', 'approved_by !=' => ''));
		$data['title'] = 'Select Invoice Type for Invoice Slip';
		$data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
	}

	public function requisition_date_check($str)
	{
		if ($str != '') {
			$this->form_validation->set_message("requisition_date_check", "The 	field must be empty");
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function soft_delete($id)
	{
		if ($id == '' || $id == 0) {
			$this->session->set_flashdata('error', 'Select Atleast One');
			redirect($this->redirect . '/admin/all');
		}
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($detail) {
			if (isset($detail->approved_by) && $detail->approved_by != '') {
				$this->session->set_flashdata('error', 'Can not Delete, Already Approved');
				redirect($this->redirect . '/admin/all');
			}
		} else {
			$this->session->set_flashdata('error', 'No Record Found');
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
				$total = $this->input->post('total');
				$issued_date = $this->input->post('issued_date');

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));

					$html = '';

					if ($item_detail) {
						$where_stock = array(
							'item_code' => $val,
							// 'transaction_date <=' => $issued_date,
						);

						$total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

						$html .= '<div class="row" style="margin-bottom: 15px;">
									<div class="col-md-1">
									' . ($total + 1) . '.
									</div>
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
									</div>
									<div class="col-md-2">
										<input type="number" name="qty[]" id="qty_' . $val . '" class="form-control qty_iss" placeholder="Quantity" required>
									</div>
									<div class="col-md-2">
										<input type="number" name="amount[]" id="amount_' . $val . '" class="form-control stcks stock_' . $val . '" placeholder="Amount"  required>
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

	public function getAllStock()
	{
		try {

			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {

				$issue_slip_date = $this->input->post('issue_slip_date');

				if ($issue_slip_date) {
					$where = array(
						'transaction_date <=' => $issue_slip_date,
					);
					$all_stock = $this->crud_model->get_all_total_stock('stock_ledger', $where, 'item_code');
					// echo "<pre>";
					// var_dump($all_stock);
					// exit;
					if ($all_stock) {

						$response = array(
							'status' => 'success',
							'status_code' => 200,
							'status_message' => 'Successfully retrived',
							'data' => $all_stock,
						);
					} else {
						$response = array(
							'status' => 'error',
							'status_code' => 300,
							'status_message' => 'Unable To Get All Stock',
						);
					}
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'No Issue Slip Date Selected',
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

	public function getStaffOfDepartment()
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
				$total = $this->input->post('total');

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_order_by('item_infos', array('item_code' => $val));
					$html = '';

					if ($item_detail) {
						$html .= '';
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

	// cancell row
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

	//approve row
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
}
