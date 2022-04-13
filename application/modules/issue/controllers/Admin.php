<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'issue_slip_master';
		$this->title = 'Issue Slip';
		$this->redirect = 'issue';
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
		$items = $this->crud_model->get_where_pagination('issue_slip_master', array('status !=' => '2'), $config['per_page'], $page);

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

	public function add($requisition_no = '')
	{
		if (empty($requisition_no)) {
			$this->session->set_flashdata('error', 'Requisition Number Required.');
			redirect($this->redirect . '/admin/form');
		}
		$requisition_detail = $this->crud_model->get_where_single('requisition_master', array('requisition_no' => $requisition_no));
		// echo "<pre>";
		// var_dump($detail);
		// exit;
		if (!$requisition_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/form');
		}

		$last_row_no = $this->crud_model->get_where_single_order_by('issue_slip_master', array('status' => '1'), 'id', 'DESC');
		if (isset($last_row_no->issue_slip_no)) {
			$string = $last_row_no->issue_slip_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['issue_slip_no'] = 'IS' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['issue_slip_no'] = 'IS' . date('dmY') . '-0001';
		}
		$data['requisition_detail'] = $requisition_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('requisition_date', 'Requisition Date', 'required|trim');
			$this->form_validation->set_rules('department_id', 'Department', 'required|trim');
			$this->form_validation->set_rules('requested_by', 'Requested By', 'required|trim');

			if ($this->form_validation->run()) {

				$data = array(
					'requisition_date' => $this->input->post('requisition_date'),
					'remarks' => $this->input->post('remarks'),
				);

				$id = $this->input->post('id');
				if ($id == '') {


					$data['requested_date'] = date('Y-m-d');
					$data['requested_by'] = $this->current_user->id;
					$data['cancel_tag'] = '0';

					$staff = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $this->current_user->staff_id), 'id', 'DESC');
					$depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('department_code' => $staff->department_code), 'id', 'DESC');
					if ($staff) {
						$data['department_id'] = $depart_detail->id;
					}
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$quantity_requested =  $this->input->post('quantity_requested');
						$remark =  $this->input->post('remark');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['issue_slip_no'] = $data['issue_slip_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['quantity_requested'] = $quantity_requested[$i];
								$insert_detail['remark'] = $remark[$i];

								$this->crud_model->insert('requisition_details', $insert_detail);
							}
						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/form');
					}
				}
			}
		}
		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['departments'] = $this->crud_model->get_where('department_para', array('status' => '1'));
		$data['title'] = 'Add ' . $this->title;
		$data['page'] = 'add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('requisition_no', 'Requisition No', 'required|trim');
			if ($this->form_validation->run()) {
				$requisition_no = $this->input->post('requisition_no');
				$this->session->set_flashdata('success', 'Requisition Retrieved Successfully');
				redirect($this->redirect . '/admin/add/' . $requisition_no);
			}
		}
		$data['requisitions'] = $this->crud_model->get_where('requisition_master', array('status' => '1', 'approved_by !=' => ''));
		$data['title'] = 'Select requisition for issue';
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

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));
					$html = '';

					if ($item_detail) {
						$html .= '<div class="row">
									<div class="col-md-1">
									' . ($total + 1) . '.
									</div>
									<div class="col-md-3">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
									</div>
									<div class="col-md-2">
										<input type="number" name="quantity_requested[]" class="form-control" placeholder="Requested Quantity">
									</div>
									<div class="col-md-6">
										<textarea name="remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"></textarea>
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
}
