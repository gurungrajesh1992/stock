<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'opening_master';
		$this->title = 'Opening';
		$this->redirect = 'opening_master';
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

	public function view($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		$data['detail'] = $detail;

		$data['fiscals'] = $this->crud_model->get_where('fiscal_year_para', array('status' => '1'));
		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['locations'] = $this->crud_model->get_where('location_para', array('status' => '1'));
		$data['title'] = 'View ' . $this->title;
		$data['page'] = 'view';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form($id = '')
	{
		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		$data['detail'] = $detail;
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('fiscal_year', 'Fiscal Year', 'required|trim');
			$this->form_validation->set_rules('opening_date', 'Opening Date', 'required|trim');
			if ($this->form_validation->run()) {

				$id = $this->input->post('id');
				$selected_items = $this->input->post('item_code');
				if (!isset($selected_items)) {
					$this->session->set_flashdata('error', 'Select atleast one product to continue.');

					if ($id == '') {
						redirect($this->redirect . '/admin/form');
					} else {
						redirect($this->redirect . '/admin/form/' . $id);
					}
				}

				$data = array(
					'fiscal_year' => $this->input->post('fiscal_year'),
					'opening_date' => $this->input->post('opening_date'),
					'remarks' => $this->input->post('remark'),

				);

				if ($id == '') {
					$last_row_no = $this->crud_model->get_where_single_order_by('opening_master', array('status' => '1'), 'id', 'DESC');
					if (isset($last_row_no->opening_code)) {
						$string = $last_row_no->opening_code;
						$explode = explode("-", $string);
						$int_value = intval($explode[1]) + 1;
						// var_dump(sprintf("%04d", $int_value));
						$data['opening_code'] = 'OPE' . date('dmY') . '-' . sprintf("%04d", $int_value);
					} else {
						$data['opening_code'] = 'OPE' . date('dmY') . '-0001';
					}
					$data['created_on'] = date('Y-m-d H:i:s');
					$data['created_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);
					$insert_id = $this->db->insert_id();
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$remark =  $this->input->post('remarks');
						$unit_price = $this->input->post('unit_price');
						$location = $this->input->post('location_id');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['opening_master_id '] = $insert_id;
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $unit_price[$i] * $qty[$i];
								$insert_detail['location_id'] = $location[$i];
								$insert_detail['remarks'] = $remark[$i];

								$this->crud_model->insert('opening_detail', $insert_detail);
							}
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
					$data['updated_on'] = date('Y-m-d H:i:s');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$this->db->delete('opening_detail', array('opening_master_id' => $id));


						$item_code =  $this->input->post('item_code');
						$qty =  $this->input->post('qty');
						$remark =  $this->input->post('remarks');
						$unit_price = $this->input->post('unit_price');
						$location = $this->input->post('location_id');

						if (count($item_code) > 0) {
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['opening_master_id '] = $id;
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['total_price'] = $unit_price[$i] * $qty[$i];
								$insert_detail['location_id'] = $location[$i];
								$insert_detail['remarks'] = $remark[$i];

								$this->crud_model->insert('opening_detail', $insert_detail);
							}
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
		$data['fiscals'] = $this->crud_model->get_where('fiscal_year_para', array('status' => '1'));
		$data['items'] = $this->crud_model->get_where('item_infos', array('status' => '1'));
		$data['locations'] = $this->crud_model->get_where('location_para', array('status' => '1'));
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

		$detail = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($detail) {
			if (isset($detail->approved_by) && $detail->approved_by != '') {
				$this->session->set_flashdata('error', 'Can not Delete, Already Approved');
				redirect($this->redirect . '/admin/all');
			}
		} else {
			$this->session->set_flashdata('error', 'Record Not Found');
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
				// echo "here";exit;
				// $check = $this->load->view('listall/image_form');
				$val = $this->input->post('val');
				if ($val) {
					// var_dump($val);
					// exit;
					$item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $val));
					$locations = $this->crud_model->get_where_order_by('location_para', array('status' => '1'), 'id', 'DESC');
					$html = '';
					if ($item_detail) {
						$html .= '
						<div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-2">
								<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
								<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $val . '" readonly>
                            </div>
                            <div class="col-md-2">
                              <input type="number" name="qty[]" class="form-control" placeholder="Quantity" value="" required>
                            </div>
                            <div class="col-md-2">
                              <input type="number" name="unit_price[]" class="form-control" placeholder="Unit Price" value="" required>
                            </div>
                            <div class="col-md-3">
                            <select name="location_id[]" class="form-control" id="location_id" required>
								<option value>Select Location</option>';
						foreach ($locations as $key => $value) {
							$html	.=	'<option value="' . $value->id . '">' . $value->store_name . '</option>';
						}
						$html	.= '</select>
                            </div>
                            <div class="col-md-2">
                              <textarea name="remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"></textarea>
                            </div>
							<div class="col-md-1">
								<div class="rmv">
									<span class="rmv_itm">X</span>
								</div>
							</div>
                          </div> 
						  ';
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

	public function opening_post()
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
							$opening_details = $this->crud_model->get_where('opening_detail', array('opening_master_id' => $detail->id));
							// echo "<pre>";
							// var_dump($opening_details);
							// exit;
							if (isset($opening_details)) {
								foreach ($opening_details as $key => $value) {
									$data = array(
										'item_code' =>  $value->item_code,
										'transaction_date' => $detail->opening_date,
										'transaction_type' => 'OPN',
										'in_qty' => $value->qty,
										// 'out_qty' => 0,
										'rem_qty' => $value->qty,
										'in_unit_price' => $value->unit_price,
										'in_total_price' => ($value->qty * $value->unit_price),
										'in_actual_unit_price' => 0,
										'in_actual_total_price' => 0,
										'out_unit_price' => 0,
										'out_total_price' => 0,
										'out_actual_unit_price' => 0,
										'out_actual_total_price' => 0,
										'location_id' => $value->location_id,
										// 'batch_no' => '',
										// 'vendor_id' => '???',
										// 'client_id' => '???',
										'remarks' => 'posted from opening',
										'transactioncode' => $detail->opening_code,
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

								$this->crud_model->update('opening_master', $update, array('id' => $detail->id));

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
