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
					'date' => $this->input->post('date'),
					'from_loc' => $this->input->post('from_loc'),
					'to_loc' => $this->input->post('to_loc'),
					'transfered_on' => $this->input->post('transfered_on'),
					'remarks' => $this->input->post('remarks'),
					'status' => $this->input->post('status'),
				);
				// var_dump($data);
				// exit;

				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_on'] = date('Y-m-d');
					$data['created_by'] = $this->current_user->id;
					$data['transfered_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {

						$item_code =  $this->input->post('item_code');
						$unit_price = $this->input->post('unit_price');
						$qty =  $this->input->post('qty');
						$actual_unit_price =  $this->input->post('actual_unit_price');
						$total_price = $this->input->post('total_price');
						$actual_total_price = $this->input->post('actual_total_price');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['transfer_code'] = $data['transfer_code'];
								$insert_detail['item_code'] = $item_code[$i];
								$insert_detail['unit_price'] = $unit_price[$i];
								$insert_detail['qty'] = $qty[$i];
								$insert_detail['actual_unit_price'] = $actual_unit_price[$i];
								$insert_detail['total_price'] = $total_price[$i];
								$insert_detail['actual_total_price'] = $actual_total_price[$i];

								$insert_detail['created_on'] = date('Y-m-d');
								$insert_detail['created_by'] = $this->current_user->id;

								$batch_data[] = $insert_detail;
							}

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
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$this->db->delete('item_scrap_detail', array('transfer_code' => $detail->transfer_code));


						$item_code =  $this->input->post('item_code');
						$unit_price = $this->input->post('unit_price');
						$qty =  $this->input->post('qty');
						$item_remark =  $this->input->post('item_remark');
						$type = $this->input->post('type');

						if (count($item_code) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($item_code); $i++) {
								$insert_detail['transfer_code'] = $data['transfer_code'];
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
		$data['location_para_details'] = $this->db->order_by('id', 'ASC')->get_where('location_para', array('status' => '1'))->result();

		// echo "<pre>";
		// var_dump($data['location_para_details'][0]->id);
		// exit;

		$data['items'] = $this->crud_model->get_total_item_stock_group_by_item('stock_ledger', array('status' => '1', 'transaction_date <=' => date('Y-m-d'), 'location_id' => $data['location_para_details'][0]->id));
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

	public function getItems()
	{

		$location_id = $this->input->post('id');
		$items = $this->crud_model->getItems($location_id);
		// var_dump($items);
		// exit;
		// $data = array(
		// 	'location_id' => $items;
		// );
		$data['items'] = $this->crud_model->get_where_single('item_infos', array('status' => '1', 'item_code' => $items[0]->item_code));
		// var_dump($data['items']);
		if (count($items) > 0) {
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Select Items</option>';
			// foreach ($items as $item) {
			// var_dump($item); exit;
			$pro_select_box .= '<option value="' . $data['items']->item_code . '">' . $data['items']->item_name . '</option>';
			// }
			echo json_encode($pro_select_box);
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
								
									<div class="col-md-2">
										<input type="text" name="item_name[]" class="form-control" placeholder="Item Code" value="' . $item_detail->item_name . '" readonly>
										<input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="' . $item_code . '" readonly>
									</div>
							
									<div class="col-md-1">
										<input type="number" name="qty[]" min="1" class="form-control" placeholder="Quantity" value="' . $stock_detail->in_qty . '" readonly>
									</div>
									<div class="col-md-2">
									<input type="number" name="unit_price[]" min="1" class="form-control" placeholder="Quantity" value="' . $stock_detail->in_unit_price . '" readonly>
									</div>

									<div class="col-md-2">
									<input type="number" name="actual_unit_price[]" min="1" class="form-control" placeholder="Quantity" value="' . $stock_detail->in_actual_unit_price . '" readonly>
									</div>

									<div class="col-md-2">
									<input type="number" name="total_price[]" min="1" class="form-control" placeholder="Quantity" value="' . $stock_detail->in_total_price . '" readonly>
									</div>

									<div class="col-md-2">
									<input type="number" name="actual_total_price[]" min="1" class="form-control" placeholder="Quantity" value="' . $stock_detail->in_actual_total_price . '" readonly>
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
}
