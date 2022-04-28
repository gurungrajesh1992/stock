<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'issue_return_master';
		$this->title = 'Issue Return';
		$this->redirect = 'issue_return';
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
		$items = $this->crud_model->get_where_pagination('issue_return_master', array('status !=' => '2'), $config['per_page'], $page);

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

	public function add($issue_slip_no = '')
	{
		if (empty($issue_slip_no)) {
			$this->session->set_flashdata('error', 'Issue Slip Number Required.');
			redirect($this->redirect . '/admin/form');
		}
		$issue_slip_master_details = $this->crud_model->get_where_single('issue_slip_master', array('issue_slip_no' => $issue_slip_no));

		if (!$issue_slip_master_details) {
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

		$last_row_no = $this->crud_model->get_where_single_order_by('issue_slip_master', array('status' => '1'), 'id', 'DESC');
		if (isset($last_row_no->issue_return_no)) {
			$string = $last_row_no->issue_return_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['issue_return_no'] = 'IR' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['issue_return_no'] = 'IR' . date('dmY') . '-0001';
		}
		$data['issue_slip_master_details'] = $issue_slip_master_details;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('return_date', 'Issue Slip Date', 'required|trim');
			$this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			$this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			$this->form_validation->set_rules('prepared_date', 'Issued Date', 'required|trim');
			$this->form_validation->set_rules('prepared_by', 'Issued By', 'required|trim');

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
					'issue_return_no' => $this->input->post('issue_return_no'),
					'issue_no' => $this->input->post('issue_no'),
					'return_date' => $this->input->post('return_date'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'prepared_by' => $this->input->post('prepared_by'),
					'prepared_date' => $this->input->post('prepared_date'),
					'remarks' => $this->input->post('remarks'),
				);


				if ($id == '') {

					// $data['issue_type'] = "RQ";
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					// $data['cancel_tag'] = '0';

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$returned_qty =  $this->input->post('returned_qty');
						$issued_qty =  $this->input->post('issued_qty');
						$remarks =  $this->input->post('remarks');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['issue_return_no'] = $data['issue_return_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['returned_qty'] = $returned_qty[$i];
								$insert_detail['issued_qty'] = $issued_qty[$i];
								$insert_detail['remarks'] = $remarks[$i];

								$this->crud_model->insert('issue_return_details', $insert_detail);
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
		$data['title'] = 'Add Requested ' . $this->title;
		$data['page'] = 'add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function edit($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('issue_slip_master', array('id' => $id));
		if (isset($master_detail->approved_by) && $master_detail->approved_by != '') {
			$this->session->set_flashdata('error', 'Can not edit, Already Approved');
			redirect($this->redirect . '/admin/edit/' . $id);
		}
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		if ($master_detail) {
			$requisition_detail = $this->crud_model->get_where_single('requisition_master', array('requisition_no' => $master_detail->requisition_no));
		}

		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if (!$requisition_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		$data['master_detail'] = $master_detail;
		$data['requisition_detail'] = $requisition_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('issue_date', 'Issue Slip Date', 'required|trim');
			$this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			$this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			$this->form_validation->set_rules('issued_on', 'Issued Date', 'required|trim');
			$this->form_validation->set_rules('issued_by', 'Issued By', 'required|trim');

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
					'issue_slip_no' => $this->input->post('issue_slip_no'),
					'requisition_no' => $this->input->post('requisition_no'),
					'issue_date' => $this->input->post('issue_date'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'issued_by' => $this->input->post('issued_by'),
					'issued_on' => $this->input->post('issued_on'),
					'remarks' => $this->input->post('remarks'),
				);


				if ($id == '') {
				} else {

					$this->db->delete('issue_slip_details', array('issue_slip_no' => $master_detail->issue_slip_no));

					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;

					// $result = $this->crud_model->insert($this->table, $data);
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$issued_qnty =  $this->input->post('issued_quantity');
						$issued_remark =  $this->input->post('issued_remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['issue_slip_no'] = $data['issue_slip_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['issued_qnty'] = $issued_qnty[$i];
								$insert_detail['remarks'] = $issued_remark[$i];

								$this->crud_model->insert('issue_slip_details', $insert_detail);
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
		$data['title'] = 'Edit Requested ' . $this->title;
		$data['page'] = 'edit';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('issue_slip_master', array('id' => $id));
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		if ($master_detail) {
			$requisition_detail = $this->crud_model->get_where_single('requisition_master', array('requisition_no' => $master_detail->requisition_no));
		}

		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if (!$requisition_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		$data['master_detail'] = $master_detail;
		$data['requisition_detail'] = $requisition_detail;
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}

	public function direct_view($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if ($detail) {
			$department_detqail = $this->crud_model->get_where_single('department_para', array('id' => $detail->department_id));
			$staffs = $this->crud_model->joinDataMultiple('staff_desig_depart', 'staff_infos', array('staff_desig_depart.department_code' => $department_detqail->department_code), 'staff_id', 'id', 'full_name');
			if ($staffs) {
				$data['staffs'] = $staffs;
			} else {
				$data['staffs'] = array();
			}
		} else {
			$data['staffs'] = array();
		}
		if (isset($detail->issue_slip_no)) {
			$data['issue_slip_no'] = $detail->issue_slip_no;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('issue_slip_master', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->issue_slip_no)) {
				// $string = "IS07042022-0006";
				$string = $last_row_no->issue_slip_no;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['issue_slip_no'] = 'IS' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['issue_slip_no'] = 'IS' . date('dmY') . '-0001';
			}
		}
		$data['detail'] = $detail;

		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['departments'] = $this->crud_model->get_where('department_para', array('status' => '1'));
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'direct_view';
		$this->load->view('layouts/admin/index', $data);
	}


	public function direct_add($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if ($detail) {
			$department_detqail = $this->crud_model->get_where_single('department_para', array('id' => $detail->department_id));
			$staffs = $this->crud_model->joinDataMultiple('staff_desig_depart', 'staff_infos', array('staff_desig_depart.department_code' => $department_detqail->department_code), 'staff_id', 'id', 'full_name');
			if ($staffs) {
				$data['staffs'] = $staffs;
			} else {
				$data['staffs'] = array();
			}
		} else {
			$data['staffs'] = array();
		}
		if (isset($detail->issue_slip_no)) {
			$data['issue_slip_no'] = $detail->issue_slip_no;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('issue_slip_master', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->issue_slip_no)) {
				// $string = "IS07042022-0006";
				$string = $last_row_no->issue_slip_no;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['issue_slip_no'] = 'IS' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['issue_slip_no'] = 'IS' . date('dmY') . '-0001';
			}
		}
		$data['detail'] = $detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('issue_date', 'Issue Slip Date', 'required|trim');
			$this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			$this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			$this->form_validation->set_rules('issued_on', 'Issued Date', 'required|trim');
			$this->form_validation->set_rules('issued_by', 'Issued By', 'required|trim');

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
					'issue_slip_no' => $this->input->post('issue_slip_no'),
					'issue_date' => $this->input->post('issue_date'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'issued_by' => $this->input->post('issued_by'),
					'issued_on' => $this->input->post('issued_on'),
					'remarks' => $this->input->post('remarks'),
				);
				var_dump($data);
				exit;

				if ($id == '') {

					$data['issue_type'] = "DR";
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					$data['cancel_tag'] = '0';

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$issued_qnty =  $this->input->post('issued_qnty');
						$remark =  $this->input->post('remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['issue_slip_no'] = $data['issue_slip_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['issued_qnty'] = $issued_qnty[$i];
								$insert_detail['remarks'] = $remark[$i];

								$this->crud_model->insert('issue_slip_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/direct_add');
					}
				} else {

					if (isset($detail->approved_by) && $detail->approved_by != '') {
						$this->session->set_flashdata('error', 'Can not edit, Already Approved');
						redirect($this->redirect . '/admin/direct_add/' . $id);
					}

					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						//delete all child before update
						$this->db->delete('issue_slip_details', array('issue_slip_no' => $detail->issue_slip_no));


						$item_code =  $this->input->post('item_code');
						$issued_qnty =  $this->input->post('issued_qnty');
						$remark =  $this->input->post('remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['issue_slip_no'] = $detail->issue_slip_no;
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['issued_qnty'] = $issued_qnty[$i];
								$insert_detail['remarks'] = $remark[$i];

								$this->crud_model->insert('issue_slip_details', $insert_detail);
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
		$data['departments'] = $this->crud_model->get_where('department_para', array('status' => '1'));
		$data['title'] = 'Add/Edit Direct ' . $this->title;
		$data['page'] = 'direct_add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('issue_slip_no', 'Issue Type', 'required|trim');
			if ($this->form_validation->run()) {
				$issue_type = $this->input->post('issue_slip_no');

				if ($issue_type == "DR") {
					$this->session->set_flashdata('success', 'Create Issue Slip Dierectly');
					redirect($this->redirect . '/admin/direct_add/');
				} else {
					$issue_slip_no = $this->input->post('issue_slip_no');
					if (!isset($issue_slip_no) && $issue_slip_no == '') {
						$this->session->set_flashdata('error', 'Issue Slip Number Required');
						redirect($this->redirect . '/admin/form');
					}
					$this->session->set_flashdata('success', 'Issue Slip Retrieved Successfully');
					redirect($this->redirect . '/admin/add/' . $issue_slip_no);
				}
			}
		}
		$data['issue_slip_master'] = $this->crud_model->get_where('issue_slip_master', array('status' => '1'));
		$data['title'] = 'Select Issue Slip Number';
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
							'transaction_date <=' => $issued_date,
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
										<input type="number" name="issued_qnty[]" max="' . $total_item_stock_before_issue_slip_date . '" id="issue_' . $val . '" class="form-control qty_iss" placeholder="Issued Quantity" required>
									</div>
									<div class="col-md-2">
										<input type="number" name="in_stock[]" id="stock_' . $val . '" class="form-control stcks stock_' . $val . '" placeholder="Stock" value="' . $total_item_stock_before_issue_slip_date . '" readonly>
									</div>
									<div class="col-md-4">
										<textarea name="remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"></textarea>
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

	public function issue_post()
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
							$issue_details = $this->crud_model->get_where('issue_slip_details', array('issue_slip_no' => $detail->issue_slip_no));
							// echo "<pre>";
							// var_dump($opening_details);
							// exit;
							if (isset($issue_details)) {
								$batch_data = array();
								foreach ($issue_details as $key => $value) {
									$data = array(
										'item_code' =>  $value->item_code,
										'transaction_date' => $detail->issue_date,
										'transaction_type' => 'ISS',
										'in_qty' => 0,
										'out_qty' => $value->issued_qnty,
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
										'remarks' => 'posted from issue',
										'transactioncode' => $detail->issue_slip_no,
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

									$batch_data[] = $data;

									// $this->crud_model->insert('stock_ledger', $data);

									// if (isset($detail->requisition_no)) {
									// 	//by request 
									// 	$each_row_detail_child = $this->crud_model->get_where_single('requisition_details', array('requisition_no' => $detail->requisition_no, 'item_code' => $value->item_code));
									// 	$update_request_child['received_qnty'] = ((int)$each_row_detail_child->received_qnty + (int)$value->issued_qnty);
									// 	$update_request_child['remaining_qnty'] = ((int)$each_row_detail_child->remaining_qnty - (int)$value->issued_qnty);

									// 	$this->crud_model->update('requisition_details', $update_request_child, array('requisition_no' => $detail->requisition_no, 'item_code' => $value->item_code));
									// } else {
									// 	// direct
									// }
								}
								// echo "<pre>";
								// var_dump($batch_data);
								// exit;
								$batch_result = $this->db->insert_batch('stock_ledger', $batch_data);

								if ($batch_result) {
									//update remaining and received qty in requisition table
									foreach ($issue_details as $ku => $vu) {

										if (isset($detail->requisition_no)) {
											//by request 
											$each_row_detail_child = $this->crud_model->get_where_single('requisition_details', array('requisition_no' => $detail->requisition_no, 'item_code' => $vu->item_code));
											$update_request_child['received_qnty'] = ((int)$each_row_detail_child->received_qnty + (int)$vu->issued_qnty);
											$update_request_child['remaining_qnty'] = ((int)$each_row_detail_child->remaining_qnty - (int)$vu->issued_qnty);

											$this->crud_model->update('requisition_details', $update_request_child, array('requisition_no' => $detail->requisition_no, 'item_code' => $vu->item_code));
										} else {
											// direct
										}
									}

									//update stock_ledger remaining qty
									foreach ($batch_data as $k_batch => $v_batch) {
										$issued_qty = $v_batch->out_qty;
										$transaction_date = ((isset($v_batch->transaction_date)) && $v_batch->transaction_date != '') ? $v_batch->transaction_date : date('Y-m-d');
										// $where_stock1 = array(
										// 	'item_code' => $v_batch->item_code,
										// 	'transaction_date <=' => $transaction_date,
										// );
										// $total_item_stock_before_issue_slip_date_1 = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock1);
										$offset = 0;
										while ($issued_qty > 0) {
											$where_loop = array(
												'item_code' => $v_batch->item_code,
												'transaction_date <=' => $transaction_date,
												'rem_qty >=' => 0
											);
											$first_inserted_product_qty = $this->crud_model->get_where_single_order_by_with_offset($table, $where_loop, 'id', 'ASC', $offset);
											if (isset($first_inserted_product_qty->rem_qty)) {
												$remaining = (int)$first_inserted_product_qty->rem_qty - (int)$issued_qty;
												if ($remaining >= 0) {
													$update_old['rem_qty'] = $remaining;
													$issued_qty = 0;
												} else {
													$update_old['rem_qty'] = 0;
													$issued_qty = (int)$issued_qty - (int)$first_inserted_product_qty->rem_qty;
												}
											}

											$offset = $offset + 1;
										}
									}

									//update posted tag  on issue_slip_master
									$update['posted_tag'] = '1';
									$update['posted_by'] = $this->current_user->id;
									$update['posted_on'] = date('Y-m-d');

									$this->crud_model->update('issue_slip_master', $update, array('id' => $detail->id));



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
