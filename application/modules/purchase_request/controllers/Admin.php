<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'purchase_request';
		$this->title = 'Purchase Request';
		$this->redirect = 'purchase_request';
	}

	public function search($page = '')
	{

		// print_r($this->input->post());

		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$purchase_request_no = $this->input->post('purchase_request_no');
		$requisition_no = $this->input->post('requisition_no');
		$approved = $this->input->post('approved');
		$cancelled = $this->input->post('cancelled');

		$data_filter = array(
			'created_on >=' => $date_from,
			'created_on <=' => $date_to,
			'purchase_request_no' => $purchase_request_no,
			'requisition_no' => $requisition_no,
			'approved_by' => $approved,
			'cancel_tag' => $cancelled,
		);
		// echo "<pre>";
		// var_dump($data_filter);
		// exit;
		// $all_data = $this->crud_model->count_all_data($staff_id, $department_id, $requisition_date_from, $requisition_date_to, $requisition_no, $approved, $cancelled);
		$all_data = $this->crud_model->count_all_data('purchase_request', $data_filter);
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
		$items = $this->crud_model->get_all_data('purchase_request', $data_filter, $config['per_page'], $page);

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

	public function add($code = '', $type = '')
	{
		if ($code == '' || $type == '') {
			$this->session->set_flashdata('error', 'Data Not Found.');
			redirect($this->redirect . '/admin/form');
		}
		if ($type == 'REQ') {
			$requisition_detail = $this->crud_model->get_where_single('requisition_master', array('requisition_no' => $code));
			// echo "<pre>";
			// var_dump($requisition_detail);
			// exit;
			if (!$requisition_detail) {
				$this->session->set_flashdata('error', 'Record Not Found!!!');
				redirect($this->redirect . '/admin/form');
			}

			if ($requisition_detail->cancel_tag == '1') {
				$this->session->set_flashdata('error', 'Requisition Cancelled');
				redirect($this->redirect . '/admin/form');
			} else if ($requisition_detail->approved_by == '') {
				$this->session->set_flashdata('error', 'Requisition is not Approved, Can not add Purchase Request');
				redirect($this->redirect . '/admin/form');
			} else {
			}

			$data['main_detail'] = $requisition_detail;
		} else {
			$mrn_detail = $this->crud_model->get_where_single('mrn_master', array('mrn_no' => $code));
			// echo "<pre>";
			// var_dump($requisition_detail);
			// exit;
			if (!$mrn_detail) {
				$this->session->set_flashdata('error', 'Record Not Found!!!');
				redirect($this->redirect . '/admin/form');
			}

			if ($mrn_detail->cancel_tag == '1') {
				$this->session->set_flashdata('error', 'Mrn Cancelled');
				redirect($this->redirect . '/admin/form');
			} else if ($mrn_detail->approved_by == '') {
				$this->session->set_flashdata('error', 'Mrn is not Approved, Can not add issue');
				redirect($this->redirect . '/admin/form');
			} else {
			}

			$data['main_detail'] = $mrn_detail;
		}

		// echo "here";
		// exit;

		$last_row_no = $this->crud_model->get_where_single_order_by('purchase_request', array('status' => '1'), 'id', 'DESC');
		if (isset($last_row_no->purchase_request_no)) {
			$string = $last_row_no->purchase_request_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['purchase_request_no'] = 'PR' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['purchase_request_no'] = 'PR' . date('dmY') . '-0001';
		}

		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;	
			$this->form_validation->set_rules('requested_on', 'Requested Date', 'required|trim');
			$this->form_validation->set_rules('requested_by', 'Requested By', 'required|trim');

			if ($this->form_validation->run()) {
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');
					redirect($this->redirect . '/admin/add');
				}

				$data = array(
					'purchase_request_no' => $this->input->post('purchase_request_no'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'requested_by' => $this->input->post('requested_by'),
					'requested_on' => $this->input->post('requested_on'),
					'remarks' => $this->input->post('remarks'),
				);

				if ($type == 'REQ') {
					$data['requisition_no'] = $this->input->post('requisition_no');
				} else if ($type == 'MRN') {
					$data['mrn_no'] = $this->input->post('mrn_no');
				} else {
				}

				$data['request_type'] = $type;
				$data['created_on'] = date('Y-m-d H:i:s');
				$data['created_by'] = $this->current_user->id;
				$data['cancel_tag'] = '0';

				$result = $this->crud_model->insert($this->table, $data);
				if ($result == true) {

					$item_code =  $this->input->post('item_code');
					$item_name =  $this->input->post('item_name');
					$requested_qty =  $this->input->post('requested_qty');
					$remark =  $this->input->post('pr_remark');

					if (count($item_code) > 0) {
						$batch_data = array();
						for ($i = 0; $i < count($item_code); $i++) {
							$insert_detail['purchase_request_no'] = $data['purchase_request_no'];
							$insert_detail['item_code'] = $item_code[$i];
							$insert_detail['item_name'] = $item_name[$i];
							$insert_detail['requested_qty'] = $requested_qty[$i];
							$insert_detail['received_qty'] = 0;
							$insert_detail['remarks'] = $remark[$i];
							$insert_detail['created_on'] = date('Y-m-d H:i:s');
							$insert_detail['created_by'] = $this->current_user->id;

							$batch_data[] = $insert_detail;

							// $this->crud_model->insert('purchase_request_details', $insert_detail);
						}

						$batch_result = $this->db->insert_batch('purchase_request_details', $batch_data);
					}
					$this->session->set_flashdata('success', 'Successfully Inserted.');
					redirect($this->redirect . '/admin/all');
				} else {
					$this->session->set_flashdata('error', 'Unable To Insert.');
					redirect($this->redirect . '/admin/add');
				}
			}
		}
		$data['type'] = $type;
		$data['title'] = 'Add ' . $this->title . ' From ' . $type;
		$data['page'] = 'add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function edit($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('purchase_request', array('id' => $id));
		if (isset($master_detail->approved_by) && $master_detail->approved_by != '') {
			$this->session->set_flashdata('error', 'Can not edit, Already Approved');
			redirect($this->redirect . '/admin/all');
		}
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		// if ($master_detail) {
		// 	$requisition_detail = $this->crud_model->get_where_single('requisition_master', array('requisition_no' => $master_detail->requisition_no));
		// }

		// echo "<pre>";
		// var_dump($detail);
		// exit;
		// if (!$requisition_detail) {
		// 	$this->session->set_flashdata('error', 'Record Not Found!!!');
		// 	redirect($this->redirect . '/admin/all');
		// }

		$data['master_detail'] = $master_detail;
		// $data['requisition_detail'] = $requisition_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('requested_on', 'Requested Date', 'required|trim');
			$this->form_validation->set_rules('requested_by', 'Requested By', 'required|trim');

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
					'purchase_request_no' => $this->input->post('purchase_request_no'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'requested_by' => $this->input->post('requested_by'),
					'requested_on' => $this->input->post('requested_on'),
					'remarks' => $this->input->post('remarks'),
				);

				if ($master_detail->request_type == 'REQ') {
					$data['requisition_no'] = $this->input->post('requisition_no');
				} else if ($master_detail->request_type == 'MRN') {
					$data['mrn_no'] = $this->input->post('mrn_no');
				} else {
				}

				$data['request_type'] = $master_detail->request_type;

				if ($id == '') {
				} else {
					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;

					// $result = $this->crud_model->insert($this->table, $data);
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						$this->db->delete('purchase_request_details', array('purchase_request_no' => $master_detail->purchase_request_no));
						$item_code =  $this->input->post('item_code');
						$item_name =  $this->input->post('item_name');
						$requested_qty =  $this->input->post('requested_qty');
						$remark =  $this->input->post('pr_remark');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['purchase_request_no'] = $data['purchase_request_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['item_name'] = $item_name[$i];
								$insert_detail['requested_qty'] = $requested_qty[$i];
								$insert_detail['received_qty'] = 0;
								$insert_detail['remarks'] = $remark[$i];
								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$batch_data[] = $insert_detail;

								// $this->crud_model->insert('purchase_request_details', $insert_detail);
							}

							$batch_result = $this->db->insert_batch('purchase_request_details', $batch_data);
						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/edit/' . $id);
					}
				}
			}
		}
		$data['title'] = 'Edit ' . $this->title . ' From ' . $master_detail->request_type;
		$data['page'] = 'edit';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('purchase_request', array('id' => $id));
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		$data['master_detail'] = $master_detail;
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
		if (isset($detail->purchase_request_no)) {
			$data['purchase_request_no'] = $detail->purchase_request_no;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('purchase_request', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->purchase_request_no)) {
				// $string = "IS07042022-0006";
				$string = $last_row_no->purchase_request_no;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['purchase_request_no'] = 'PR' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['purchase_request_no'] = 'PR' . date('dmY') . '-0001';
			}
		}
		$data['detail'] = $detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('requested_on', 'Requested Date', 'required|trim');
			$this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			$this->form_validation->set_rules('staff_id', 'Staff', 'required|trim');
			$this->form_validation->set_rules('requested_by', 'Requested By', 'required|trim');

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
					'purchase_request_no' => $this->input->post('purchase_request_no'),
					'department_id' => $this->input->post('department_id'),
					'staff_id' => $this->input->post('staff_id'),
					'requested_by' => $this->input->post('requested_by'),
					'requested_on' => $this->input->post('requested_on'),
					'remarks' => $this->input->post('remarks'),
				);


				if ($id == '') {

					$data['request_type'] = "DR";
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					$data['cancel_tag'] = '0';

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$item_name =  $this->input->post('item_name');
						$requested_qty =  $this->input->post('requested_qty');
						$remark =  $this->input->post('remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['purchase_request_no'] = $data['purchase_request_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['item_name'] = $item_name[$i];
								$insert_detail['requested_qty'] = $requested_qty[$i];
								$insert_detail['received_qty'] = 0;
								$insert_detail['remarks'] = $remark[$i];
								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$this->crud_model->insert('purchase_request_details', $insert_detail);
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
						$this->db->delete('purchase_request_details', array('purchase_request_no' => $detail->purchase_request_no));


						$item_code =  $this->input->post('item_code');
						$item_name =  $this->input->post('item_name');
						$requested_qty =  $this->input->post('requested_qty');
						$remark =  $this->input->post('remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['purchase_request_no'] = $detail->purchase_request_no;
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['item_name'] = $item_name[$i];
								$insert_detail['requested_qty'] = $requested_qty[$i];
								$insert_detail['received_qty'] = 0;
								$insert_detail['remarks'] = $remark[$i];
								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$this->crud_model->insert('purchase_request_details', $insert_detail);
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
			$this->form_validation->set_rules('p_request_type', 'Purchase Request Type', 'required|trim');
			if ($this->form_validation->run()) {
				$p_request_type = $this->input->post('p_request_type');

				if ($p_request_type == "DR") {
					$this->session->set_flashdata('success', 'Create Purchase Dierectly');
					redirect($this->redirect . '/admin/direct_add/');
				} else {
					if ($p_request_type == "REQ") {
						// echo "here";
						// exit;
						$code = $this->input->post('requisition_no');
					} else {
						// echo "down";
						// exit;
						$code = $this->input->post('mrn_no');
					}
					// var_dump($code);
					// exit;
					if (!isset($code) && $code == '') {
						$this->session->set_flashdata('error', 'Data Not Found!!!');
						redirect($this->redirect . '/admin/form');
					}
					$this->session->set_flashdata('success', 'Data Retrieved Successfully');
					redirect($this->redirect . '/admin/add/' . $code . '/' . $p_request_type);
				}
			}
		}
		$data['requisitions'] = $this->crud_model->get_where('requisition_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['mrns'] = $this->crud_model->get_where('mrn_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['title'] = 'Select Type For Purchase Request ';
		$data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
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
				$requested_date = $this->input->post('requested_date');

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));
					$html = '';

					if ($item_detail) {
						$where_stock = array(
							'item_code' => $val,
							'transaction_date <=' => $requested_date,
						);
						$total_item_stock_before_requested_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
						$html .= '<div class="row" style="margin-bottom: 15px;">
									<div class="col-md-1">
									' . ($total + 1) . '.
									</div>
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
									</div>
									<div class="col-md-2">
										<input type="number" name="requested_qty[]" min="1" id="pr_' . $val . '" class="form-control qty_pr" placeholder="Requested Quantity" required>
									</div>
									<div class="col-md-2">
										<input type="number" name="in_stock[]" id="stock_' . $val . '" class="form-control stcks stock_' . $val . '" placeholder="Stock" value="' . $total_item_stock_before_requested_date . '" readonly>
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

	// cancell purchase request
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

	//approve purchase request
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
