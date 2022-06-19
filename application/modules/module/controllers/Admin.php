<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		// $this->load->library('form_validation'); 
		$this->table = 'module';
		$this->title = 'Modules';
		$this->redirect = 'module';
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
		$data['detail'] = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('module_name', 'Module Name', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'status' => $this->input->post('status'),
				);
				$id = $this->input->post('id');
				if ($id == '') {
					$check = $this->crud_model->get_where_single('module', array('module_name' => $this->input->post('module_name')));
					if ($check) {
						$this->session->set_flashdata('error', 'Duplicate Entry');
						redirect($this->redirect . '/admin/form');
					}
					$data['module_name'] = $this->input->post('module_name');
					$data['display_name'] = $this->input->post('display_name');
					$result = $this->crud_model->insert($this->table, $data);
					$insert_id = $this->db->insert_id();
					if ($result == true) {

						$function_name = $this->input->post('function_name');
						$display_name_function = $this->input->post('display_name_function');

						if (count($function_name) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($function_name); $i++) {
								$insert_child['module_id'] = $insert_id;
								$insert_child['function_name'] = $function_name[$i];
								$insert_child['display_name'] = $display_name_function[$i];

								$batch_data[] = $insert_child;
							}
							$this->db->insert_batch('module_function', $batch_data);
						}

						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/form');
					}
				} else {

					$data['display_name'] = $this->input->post('display_name');
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {

						$this->db->delete('module_function', array('module_id' => $id));

						$function_name = $this->input->post('function_name');

						$display_name_function = $this->input->post('display_name_function');

						if (count($function_name) > 0) {
							$batch_data = array();
							for ($i = 0; $i < count($function_name); $i++) {
								$insert_child['module_id'] = $id;
								$insert_child['function_name'] = $function_name[$i];
								$insert_child['display_name'] = $display_name_function[$i];

								$batch_data[] = $insert_child;
							}

							$this->db->insert_batch('module_function', $batch_data);
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
		// $data['fiscals'] = $this->crud_model->get_where('fiscal_year_para',array('status'=>'1'));
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

	public function role_function($id = '')
	{
		// echo "<pre>";
		// var_dump($this->auth->current_user()->role_id);
		// exit;
		if ($this->auth->current_user()->role_id == 1) {
			$module = $this->crud_model->get_where('module', array('status' => '1'));
		} else {
			$module = $this->crud_model->get_where('module', array('status' => '1', 'id !=' => 33));
		}

		if ($this->auth->current_user()->role_id == 1) {
			$role = $this->crud_model->get_where_order_by('user_role', array('status' => '1'), 'id', 'ASC');
		} else {
			$role = $this->crud_model->get_where_order_by('user_role', array('status' => '1', 'id !=' => 1), 'id', 'ASC');
		}
		$data['role'] = $role;
		$data['module'] = $module;
		// echo "<pre>";
		// var_dump($role[0]->id);
		// exit;
		$module_function_role = $this->crud_model->get_where('module_function_role', array('role_id' => $role[0]->id));
		$data['module_function_role'] = $module_function_role;


		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());
			// exit;
			$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
			if ($this->form_validation->run()) {
				$role = $this->input->post('role_id');
				$module_function_id = $this->input->post('module_function_id');

				if (count($module_function_id) > 0) {
					$batch_data = array();
					for ($i = 0; $i < count($module_function_id); $i++) {
						$insert_child['role_id'] = $role;
						$insert_child['module_function_id'] = $module_function_id[$i];

						$batch_data[] = $insert_child;
					}


					if ($this->auth->current_user()->role_id == 1) {
						$this->db->delete('module_function_role', array('role_id' => $role));
					} else {
						$this->db->delete('module_function_role', array('role_id' => $role, 'module_function_id  !=' => 278));
					}
					$this->db->insert_batch('module_function_role', $batch_data);
				}

				$this->session->set_flashdata('success', 'Successfully Inserted.');
				redirect($this->redirect . '/admin/role_function');
			}
		}

		$data['title'] = 'Add/Edit ' . 'Function Role';
		$data['page'] = 'role_function';
		$this->load->view('layouts/admin/index', $data);
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
				$role_id = $this->input->post('role_id');

				if ($this->auth->current_user()->role_id == 1) {
					$module = $this->crud_model->get_where('module', array('status' => '1'));
				} else {
					$module = $this->crud_model->get_where('module', array('status' => '1', 'id !=' => 33));
				}

				$module_function_role = $this->crud_model->get_where('module_function_role', array('role_id' => $role_id));

				if ($role_id) {
					$html = '';
					foreach ($module as $key => $val) {
						$html   .= '<div class="row">';
						$html   .= '<div class="col-md-12">
										<label>' . $val->module_name . '</label>
									</div>';
						$module_function =  $this->crud_model->get_where('module_function', array('module_id' => $val->id));
						foreach ($module_function as $key_f => $val_f) {
							$html   .=  '<div class="col-md-3">
                                        <input type="checkbox" name="module_function_id[]" value="' . $val_f->id . '" style="margin-right: 10px;"';
							foreach ($module_function_role as $key_fr => $val_fr) {
								if ($val_fr->module_function_id == $val_f->id) {
									$html	.=						'checked';
								}
							}
							$html 	.=		'>' . $val_f->function_name . '
                                    </div>';
						}
						$html  .= '</div>';
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
						'status_message' => 'Please Select Role First',
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
