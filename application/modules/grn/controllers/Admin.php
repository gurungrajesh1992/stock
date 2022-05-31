<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('my_form_validation'));
		$this->form_validation->run($this);
		$this->table = 'grn_master';
		$this->title = 'Goods Receive';
		$this->redirect = 'grn';
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
		if ($type == 'INV') {
			$inv_detail = $this->crud_model->get_where_single('invoice_master', array('invoice_no' => $code));
			if (!$inv_detail) {
				$this->session->set_flashdata('error', 'Record Not Found!!!');
				redirect($this->redirect . '/admin/form');
			}

			if ($inv_detail->cancel_tag == '1') {
				$this->session->set_flashdata('error', 'Record Cancelled');
				redirect($this->redirect . '/admin/form');
			} else if ($inv_detail->approved_by == '') {
				$this->session->set_flashdata('error', 'Record is not Approved, Can not add');
				redirect($this->redirect . '/admin/form');
			} else {
			}
			$data['type_no'] = $inv_detail->invoice_no;
			$data['transaction_level'] = 'Invoice Number';
			$data['main_detail'] = $inv_detail;
		} else if ($type == "PO") {
			$purchase_order_detail = $this->crud_model->get_where_single('purchase_order', array('purchase_order_no' => $code));
			if (!$purchase_order_detail) {
				$this->session->set_flashdata('error', 'Record Not Found!!!');
				redirect($this->redirect . '/admin/form');
			}

			if ($purchase_order_detail->cancel_tag == '1') {
				$this->session->set_flashdata('error', 'Record Cancelled');
				redirect($this->redirect . '/admin/form');
			} else if ($purchase_order_detail->approved_by == '') {
				$this->session->set_flashdata('error', 'Record is not Approved, Can not add');
				redirect($this->redirect . '/admin/form');
			} else {
			}
			$data['type_no'] = $purchase_order_detail->purchase_order_no;
			$data['transaction_level'] = 'Purchase Order Number';
			$data['main_detail'] = $purchase_order_detail;
		} else {
			$purchase_request_detail = $this->crud_model->get_where_single('purchase_request', array('purchase_request_no' => $code));
			// echo "<pre>";
			// var_dump($requisition_detail);
			// exit;
			if (!$purchase_request_detail) {
				$this->session->set_flashdata('error', 'Record Not Found!!!');
				redirect($this->redirect . '/admin/form');
			}

			if ($purchase_request_detail->cancel_tag == '1') {
				$this->session->set_flashdata('error', 'Mrn Cancelled');
				redirect($this->redirect . '/admin/form');
			} else if ($purchase_request_detail->approved_by == '') {
				$this->session->set_flashdata('error', 'Mrn is not Approved, Can not add issue');
				redirect($this->redirect . '/admin/form');
			} else {
			}

			$data['type_no'] = $purchase_request_detail->purchase_request_no;
			$data['transaction_level'] = 'Purchase Request Number';
			$data['main_detail'] = $purchase_request_detail;
		}

		// echo "here";
		// exit;

		$last_row_no = $this->crud_model->get_where_single_order_by('grn_master', array('status' => '1'), 'id', 'DESC');
		if (isset($last_row_no->grn_no)) {
			$string = $last_row_no->grn_no;
			$explode = explode("-", $string);
			$int_value = intval($explode[1]) + 1;
			// var_dump(sprintf("%04d", $int_value));
			$data['grn_no'] = 'GRN' . date('dmY') . '-' . sprintf("%04d", $int_value);
		} else {
			$data['grn_no'] = 'GRN' . date('dmY') . '-0001';
		}

		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;	
			$this->form_validation->set_rules('grn_date', 'Grn Date', 'required|trim');
			$this->form_validation->set_rules('supplier_id', 'Supplier', 'required|trim');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required|trim');

			if ($this->form_validation->run()) {
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');
					redirect($this->redirect . '/admin/add');
				}

				$data = array(
					'grn_no' => $this->input->post('grn_no'),
					'type' => $this->input->post('type'),
					'grn_date' => $this->input->post('grn_date'),
					'supplier_id' => $this->input->post('supplier_id'),
					'type_no' => $this->input->post('type_no'),
					'payment_type' => $this->input->post('payment_type'),
					'bank_name' => $this->input->post('bank_name'),
					'advance_paid' => $this->input->post('advance_paid'),
					'discount_per' => $this->input->post('discount_per'),
					'vat_percent' => $this->input->post('vat_percent'),
					'created_on' => date('Y-m-d H:i:s'),
					'created_by' => $this->current_user->id,
					'cancel_tag' => '0',
				);

				$result = $this->crud_model->insert($this->table, $data);
				if ($result == true) {

					$item_code =  $this->input->post('item_code');
					$qty =  $this->input->post('qty');
					$unit_price =  $this->input->post('unit_price');
					$batch_no =  $this->input->post('batch_no');
					$location_id =  $this->input->post('location_id');

					if (count($item_code) > 0) {
						$total = 0;
						$batch_data = array();
						for ($i = 0; $i < count($item_code); $i++) {
							$insert_detail['grn_no'] = $data['grn_no'];
							$insert_detail['item_code'] = $item_code[$i];
							$insert_detail['qty'] = $qty[$i];
							$insert_detail['unit_price'] = $unit_price[$i];
							$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);

							$insert_detail['location_id'] = $location_id[$i];
							$insert_detail['batch_no'] = $batch_no[$i];

							$insert_detail['created_on'] = date('Y-m-d H:i:s');
							$insert_detail['created_by'] = $this->current_user->id;
							$insert_detail['status'] = '1';

							$total = $total + ($qty[$i] * $unit_price[$i]);
							$batch_data[] = $insert_detail;
						}

						// echo "<pre>";
						// var_dump($batch_data, $total);
						// exit;
						$discount_amount = ($total * $data['discount_per']) / 100;
						$sub_total = $total - $discount_amount;
						$vat_amount = ($sub_total * $data['vat_percent']) / 100;

						$update_after_insert['total'] = $total;
						$update_after_insert['discount_amt'] = $discount_amount;
						$update_after_insert['sub_total'] = $sub_total;
						$update_after_insert['vat_amount'] = $vat_amount;
						$update_after_insert['grand_total'] = $total - $discount_amount + $vat_amount;

						// Update main table
						$this->crud_model->update($this->table, $update_after_insert, array('grn_no' => $data['grn_no']));

						$this->db->insert_batch('grn_details', $batch_data);
					}

					//extra charges

					$charge_code = $this->input->post('charge_code');
					$charge_amount = $this->input->post('charge_amount');
					$charge_remarks = $this->input->post('charge_remarks');

					if (count($charge_code) > 0) {
						$total_charge = 0;
						$batch_data_grn_charges = array();
						for ($i = 0; $i < count($charge_code); $i++) {
							$insert_grn_charges['grn_no'] = $data['grn_no'];
							$insert_grn_charges['charge_code'] = $charge_code[$i];
							$insert_grn_charges['amount'] = $charge_amount[$i];
							$insert_grn_charges['remarks'] = $charge_remarks[$i];

							$total_charge = $total_charge + $charge_amount[$i];
							$batch_data_grn_charges[] = $insert_grn_charges;
						}

						$update_total_charges['total_charge'] = $total_charge;

						// Update main table
						$this->crud_model->update($this->table, $update_total_charges, array('grn_no' => $data['grn_no']));

						$this->db->insert_batch('grn_charges', $batch_data_grn_charges);
					}

					$this->session->set_flashdata('success', 'Successfully Inserted.');
					redirect($this->redirect . '/admin/all');
				} else {
					$this->session->set_flashdata('error', 'Unable To Insert.');
					redirect($this->redirect . '/admin/add');
				}
			}
		}

		// var_dump($type);
		// exit;
		$data['type'] = $type;
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
		$data['locations'] = $this->crud_model->get_where('location_para', array('status' => '1'));
		$data['charges'] = $this->crud_model->get_where('charge_parameter', array('status' => '1', 'display_in_list' => 'Yes'));
		$data['invs'] = $this->crud_model->get_where('invoice_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['pos'] = $this->crud_model->get_where('purchase_order', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['prqs'] = $this->crud_model->get_where('purchase_request', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));

		$data['title'] = 'Add ' . $this->title;
		$data['page'] = 'add';
		$data['code'] = $code;
		$this->load->view('layouts/admin/index', $data);
	}

	public function edit($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('grn_master', array('id' => $id));
		if (isset($master_detail->approved_by) && $master_detail->approved_by != '') {
			$this->session->set_flashdata('error', 'Can not edit, Already Approved');
			redirect($this->redirect . '/admin/all');
		}
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}

		$data['master_detail'] = $master_detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('grn_date', 'Grn Date', 'required|trim');
			$this->form_validation->set_rules('supplier_id', 'Supplier', 'required|trim');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required|trim');

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
					'grn_no' => $this->input->post('grn_no'),
					'type' => $this->input->post('type'),
					'grn_date' => $this->input->post('grn_date'),
					'supplier_id' => $this->input->post('supplier_id'),
					'type_no' => $this->input->post('type_no'),
					'payment_type' => $this->input->post('payment_type'),
					'bank_name' => $this->input->post('bank_name'),
					'advance_paid' => $this->input->post('advance_paid'),
					'discount_per' => $this->input->post('discount_per'),
					'vat_percent' => $this->input->post('vat_percent'),
				);

				if ($id == '') {
				} else {
					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;

					// $result = $this->crud_model->insert($this->table, $data);
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						$this->db->delete('grn_details', array('grn_no' => $data['grn_no']));

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$unit_price =  $this->input->post('unit_price');
						$batch_no =  $this->input->post('batch_no');
						$location_id =  $this->input->post('location_id');

						if (count($item_code) > 0) {
							$total = 0;
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['grn_no'] = $data['grn_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);

								$insert_detail['location_id'] = $location_id[$i];
								$insert_detail['batch_no'] = $batch_no[$i];

								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;

								$total = $total + ($qty[$i] * $unit_price[$i]);
								$batch_data[] = $insert_detail;
							}

							// echo "<pre>";
							// var_dump($batch_data, $total);
							// exit;
							$discount_amount = ($total * $data['discount_per']) / 100;
							$sub_total = $total - $discount_amount;
							$vat_amount = ($sub_total * $data['vat_percent']) / 100;

							$update_after_insert['total'] = $total;
							$update_after_insert['discount_amt'] = $discount_amount;
							$update_after_insert['sub_total'] = $sub_total;
							$update_after_insert['vat_amount'] = $vat_amount;
							$update_after_insert['grand_total'] = $total - $discount_amount + $vat_amount;

							// Update main table
							$this->crud_model->update($this->table, $update_after_insert, array('grn_no' => $data['grn_no']));

							$this->db->insert_batch('grn_details', $batch_data);
						}
						// delete grn_charges before update
						$this->db->delete('grn_charges', array('grn_no' => $data['grn_no']));

						$charge_code = $this->input->post('charge_code');
						$charge_amount = $this->input->post('charge_amount');
						$charge_remarks = $this->input->post('charge_remarks');

						if (count($charge_code) > 0) {
							$total_charge = 0;
							$batch_data_grn_charges = array();
							for ($i = 0; $i < count($charge_code); $i++) {
								$insert_grn_charges['grn_no'] = $data['grn_no'];
								$insert_grn_charges['charge_code'] = $charge_code[$i];
								$insert_grn_charges['amount'] = $charge_amount[$i];
								$insert_grn_charges['remarks'] = $charge_remarks[$i];

								$total_charge = $total_charge + $charge_amount[$i];
								$batch_data_grn_charges[] = $insert_grn_charges;
							}

							$update_total_charges['total_charge'] = $total_charge;

							// Update main table
							$this->crud_model->update($this->table, $update_total_charges, array('grn_no' => $data['grn_no']));

							$this->db->insert_batch('grn_charges', $batch_data_grn_charges);
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
		$type = isset($master_detail->type) ? $master_detail->type : '';
		$data['type'] = $type;

		if ($type == 'INV') {
			$data['transaction_level'] = 'Invoice Number';
		} else if ($type == "PO") {
			$data['transaction_level'] = 'Purchase Order Number';
		} else {
			$data['transaction_level'] = 'Purchase Request Number';
		}

		$data['type_no'] = isset($master_detail->type_no) ? $master_detail->type_no : '';
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
		$data['locations'] = $this->crud_model->get_where('location_para', array('status' => '1'));
		$data['charges'] = $this->crud_model->get_where('charge_parameter', array('status' => '1', 'display_in_list' => 'Yes'));

		$data['invs'] = $this->crud_model->get_where('invoice_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['pos'] = $this->crud_model->get_where('purchase_order', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['prqs'] = $this->crud_model->get_where('purchase_request', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['title'] = 'Edit ' . $this->title;
		$data['page'] = 'edit';
		$this->load->view('layouts/admin/index', $data);
	}

	public function view($id = '')
	{
		$master_detail = $this->crud_model->get_where_single('grn_master', array('id' => $id));
		if (!$master_detail) {
			$this->session->set_flashdata('error', 'Record Not Found!!!');
			redirect($this->redirect . '/admin/all');
		}
		// echo "<pre>";
		// var_dump($master_detail);
		// exit;
		$data['master_detail'] = $master_detail;
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}


	public function direct_add($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if (isset($detail->grn_no)) {
			$data['grn_no'] = $detail->grn_no;
		} else {
			$last_row_no = $this->crud_model->get_where_single_order_by('grn_master', array('status' => '1'), 'id', 'DESC');
			if (isset($last_row_no->grn_no)) {
				// $string = "IS07042022-0006";
				$string = $last_row_no->grn_no;
				$explode = explode("-", $string);
				$int_value = intval($explode[1]) + 1;
				// var_dump(sprintf("%04d", $int_value));
				$data['grn_no'] = 'GRN' . date('dmY') . '-' . sprintf("%04d", $int_value);
			} else {
				$data['grn_no'] = 'GRN' . date('dmY') . '-0001';
			}
		}

		$data['detail'] = $detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('grn_date', 'Grn Date', 'required|trim');
			$this->form_validation->set_rules('supplier_id', 'Supplier', 'required|trim');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required|trim');

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
					'grn_no' => $this->input->post('grn_no'),
					'type' => $this->input->post('type'),
					'grn_date' => $this->input->post('grn_date'),
					'supplier_id' => $this->input->post('supplier_id'),
					'type_no' => '',
					'payment_type' => $this->input->post('payment_type'),
					'bank_name' => $this->input->post('bank_name'),
					'advance_paid' => $this->input->post('advance_paid'),
					'discount_per' => $this->input->post('discount_per'),
					'vat_percent' => $this->input->post('vat_percent'),
				);


				if ($id == '') {
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					$data['cancel_tag'] = '0';

					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$unit_price =  $this->input->post('unit_price');
						$batch_no =  $this->input->post('batch_no');
						$location_id =  $this->input->post('location_id');

						if (count($item_code) > 0) {
							$total = 0;
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['grn_no'] = $data['grn_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);
								$insert_detail['location_id'] = $location_id[$i];
								$insert_detail['batch_no'] = $batch_no[$i];

								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;
								$insert_detail['status'] = '1';

								$total = $total + ($qty[$i] * $unit_price[$i]);
								$batch_data[] = $insert_detail;
							}

							// echo "<pre>";
							// var_dump($batch_data, $total);
							// exit;
							$discount_amount = ($total * $data['discount_per']) / 100;
							$sub_total = $total - $discount_amount;
							$vat_amount = ($sub_total * $data['vat_percent']) / 100;

							$update_after_insert['total'] = $total;
							$update_after_insert['discount_amt'] = $discount_amount;
							$update_after_insert['sub_total'] = $sub_total;
							$update_after_insert['vat_amount'] = $vat_amount;
							$update_after_insert['grand_total'] = $total - $discount_amount + $vat_amount;

							// Update main table
							$this->crud_model->update($this->table, $update_after_insert, array('grn_no' => $data['grn_no']));

							$this->db->insert_batch('grn_details', $batch_data);
						}

						$charge_code = $this->input->post('charge_code');
						$charge_amount = $this->input->post('charge_amount');
						$charge_remarks = $this->input->post('charge_remarks');

						if (count($charge_code) > 0) {
							$total_charge = 0;
							$batch_data_grn_charges = array();
							for ($i = 0; $i < count($charge_code); $i++) {
								$insert_grn_charges['grn_no'] = $data['grn_no'];
								$insert_grn_charges['charge_code'] = $charge_code[$i];
								$insert_grn_charges['amount'] = $charge_amount[$i];
								$insert_grn_charges['remarks'] = $charge_remarks[$i];

								$total_charge = $total_charge + $charge_amount[$i];
								$batch_data_grn_charges[] = $insert_grn_charges;
							}

							$update_total_charges['total_charge'] = $total_charge;

							// Update main table
							$this->crud_model->update($this->table, $update_total_charges, array('grn_no' => $data['grn_no']));

							$this->db->insert_batch('grn_charges', $batch_data_grn_charges);
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
						$this->db->delete('grn_details', array('grn_no' => $detail->grn_no));


						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$unit_price =  $this->input->post('unit_price');
						$batch_no =  $this->input->post('batch_no');
						$location_id =  $this->input->post('location_id');

						if (count($item_code) > 0) {
							$total = 0;
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['grn_no'] = $data['grn_no'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = ($qty[$i] * $unit_price[$i]);
								$insert_detail['location_id'] = $location_id[$i];
								$insert_detail['batch_no'] = $batch_no[$i];

								$insert_detail['created_on'] = date('Y-m-d H:i:s');
								$insert_detail['created_by'] = $this->current_user->id;
								$insert_detail['status'] = '1';

								$total = $total + ($qty[$i] * $unit_price[$i]);
								$batch_data[] = $insert_detail;
							}

							$discount_amount = ($total * $data['discount_per']) / 100;
							$sub_total = $total - $discount_amount;
							$vat_amount = ($sub_total * $data['vat_percent']) / 100;

							$update_after_update['total'] = $total;
							$update_after_update['discount_amt'] = $discount_amount;
							$update_after_update['sub_total'] = $sub_total;
							$update_after_update['vat_amount'] = $vat_amount;
							$update_after_update['grand_total'] = $total - $discount_amount + $vat_amount;

							// Update main table
							$this->crud_model->update($this->table, $update_after_update, array('grn_no' => $data['grn_no']));

							$this->db->insert_batch('grn_details', $batch_data);
						}

						//delete all child grn charges before update
						$this->db->delete('grn_charges', array('grn_no' => $detail->grn_no));

						$charge_code = $this->input->post('charge_code');
						$charge_amount = $this->input->post('charge_amount');
						$charge_remarks = $this->input->post('charge_remarks');

						if (count($charge_code) > 0) {
							$total_charge = 0;
							$batch_data_grn_charges = array();
							for ($i = 0; $i < count($charge_code); $i++) {
								$insert_grn_charges['grn_no'] = $data['grn_no'];
								$insert_grn_charges['charge_code'] = $charge_code[$i];
								$insert_grn_charges['amount'] = $charge_amount[$i];
								$insert_grn_charges['remarks'] = $charge_remarks[$i];

								$total_charge = $total_charge + $charge_amount[$i];
								$batch_data_grn_charges[] = $insert_grn_charges;
							}

							$update_total_charges['total_charge'] = $total_charge;

							// Update main table
							$this->crud_model->update(
								$this->table,
								$update_total_charges,
								array('grn_no' => $data['grn_no'])
							);

							$this->db->insert_batch(
								'grn_charges',
								$batch_data_grn_charges
							);
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
		$data['type'] = 'DR';
		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['charges'] = $this->crud_model->get_where('charge_parameter', array('status' => '1', 'display_in_list' => 'Yes'));
		$data['suppliers'] = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
		$data['locations'] = $this->crud_model->get_where('location_para', array('status' => '1'));
		$data['invs'] = $this->crud_model->get_where('invoice_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['pos'] = $this->crud_model->get_where('purchase_order', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['prqs'] = $this->crud_model->get_where('purchase_request', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['title'] = 'Add/Edit Direct ' . $this->title;
		$data['page'] = 'direct_add';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('grn_request_type', 'Grn Request Type', 'required|trim');
			if ($this->form_validation->run()) {
				$grn_request_type = $this->input->post('grn_request_type');

				if ($grn_request_type == "DR") {
					$this->session->set_flashdata('success', 'Create Purchase Dierectly');
					redirect($this->redirect . '/admin/direct_add/');
				} else {
					if ($grn_request_type == "INV") {
						// echo "here";
						// exit;
						$code = $this->input->post('invoice_no');
					} else if ($grn_request_type == "PO") {
						$code = $this->input->post('purchase_order_no');
					} else {
						// echo "down";
						// exit;
						$code = $this->input->post('purchase_request_no');
					}
					// var_dump($code);
					// exit;
					if (!isset($code) && $code == '') {
						$this->session->set_flashdata('error', 'Data Not Found!!!');
						redirect($this->redirect . '/admin/form');
					}
					$this->session->set_flashdata('success', 'Data Retrieved Successfully');
					redirect($this->redirect . '/admin/add/' . $code . '/' . $grn_request_type);
				}
			}
		}
		$data['invs'] = $this->crud_model->get_where('invoice_master', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['pos'] = $this->crud_model->get_where('purchase_order', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['prqs'] = $this->crud_model->get_where('purchase_request', array('status' => '1', 'approved_by !=' => '', 'cancel_tag' => '0'));
		$data['title'] = 'Select Type For Goods Receive';
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
				$next_key = $this->input->post('next_key');
				$requested_date = $this->input->post('requested_date');

				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));
					$html = '';

					if ($item_detail) {
						$locations = $this->crud_model->get_where_order_by('location_para', array('status' => '1'), 'id', 'DESC');

						$html .= '<div class="row" style="margin-bottom: 15px;">
									<div class="col-md-1">
									' . ($total + 1) . '.
									</div>
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
									</div>
									<div class="col-md-1">
										<input type="number" name="qty[]" min="1"  class="form-control qty_grn" id="qty_grn-' . ($next_key + 1) . '" placeholder="Quantity" value="1" required>
									</div> 
									<div class="col-md-1">
										<input type="number" name="unit_price[]" min="1" class="form-control unit_price_grn" id="unit_price_grn-' . ($next_key + 1) . '" placeholder="Unit Price" value="0" required>
									</div>
									<div class="col-md-2">
										<textarea name="batch_no[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Batch No"></textarea>
									</div>
									<div class="col-md-2">
										<select name="location_id[]" class="form-control" id="location_id" required>';
						foreach ($locations as $key => $value) {
							$html	.=	'<option value="' . $value->id . '">' . $value->store_name . '</option>';
						}
						$html	.= '</select>
									</div>
									<div class="col-md-2">
										<input type="number" name="total_price[]" min="1" class="form-control" id="each_total_grn-' . ($next_key + 1) . '" placeholder="Total Price" value="0" readonly>
									</div>
									<div class="col-md-1">
										<div class="rmv_grn_direct" id="rm-' . ($next_key + 1) . '">
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

	public function getForm_charges()
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
				$next_sn = $this->input->post('sn');

				if ($val) {
					// var_dump($val);
					// exit;
					$charge_detail = $this->crud_model->get_where_single('charge_parameter', array('charge_code' => $val));
					$html = '';

					if ($charge_detail) {
						$html .= '<div class="row">
                                        <div class="col-md-1">' . ($next_sn + 1) . '</div>
                                        <div class="col-md-4">
											<div class="form-group">
												' . $charge_detail->charge_name . '
												<input type="hidden" name="charge_code[]" class="form-control" placeholder="Charge Code" value="' . $val . '">
											</div>
										</div> 
										<div class="col-md-4">
											<div class="form-group">
												<textarea name="charge_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"></textarea>
											</div>
										</div>
                                        <div class=" col-md-2"> 
											<div class="form-group">
                                                <input type="number" name="charge_amount[]" class="form-control charge_amt" id="charge_amount" placeholder="Charge Amount" value="0"> 
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

	public function grn_post()
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
							$childs = $this->crud_model->get_where('grn_details', array('grn_no' => $detail->grn_no));
							// echo "<pre>";
							// var_dump($childs);
							// exit;
							if (isset($childs)) {
								foreach ($childs as $key => $value) {
									$total_extra_cost = $detail->vat_amount + $detail->total_charge;
									$in_actual_total_price = ($total_extra_cost / $detail->total) * ($value->qty * $value->unit_price);
									$in_actual_unit_price = $in_actual_total_price / $value->qty;
									$data = array(
										'item_code' =>  $value->item_code,
										'transaction_date' => $detail->grn_date,
										'transaction_type' => 'GRN',
										'in_qty' => $value->qty,
										// 'out_qty' => 0,
										'rem_qty' => $value->qty,
										'in_unit_price' => $value->unit_price,
										'in_total_price' => ($value->qty * $value->unit_price),
										'in_actual_unit_price' => ($value->unit_price + $in_actual_unit_price),
										'in_actual_total_price' => ($value->qty * $value->unit_price) + $in_actual_total_price,
										'out_unit_price' => 0,
										'out_total_price' => 0,
										'out_actual_unit_price' => 0,
										'out_actual_total_price' => 0,
										'location_id' => $value->location_id,
										'batch_no' => $value->batch_no,
										'vendor_id' => $detail->supplier_id,
										// 'client_id' => '???',
										'remarks' => 'posted from GRN',
										'transactioncode' => $detail->grn_no,
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

								$this->crud_model->update('grn_master', $update, array('id' => $detail->id));

								$response = array(
									'status' => 'success',
									'status_code' => 200,
									'status_message' => 'Successfully Posted !!!',
								);
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
