<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');
	}

	public function all($page = '')
	{

		// $data['roles'] = $this->db->get_where('user_role',array('status !='=>'2'))->result(); 

		// var_dump($this->uri->segment(3));exit;

		$config['base_url'] = base_url('user/admin/all');
		$config['total_rows'] = $this->crud_model->count_all('users', array('status !=' => '2'), 'id');
		$config['uri_segment'] = 4;
		$config['per_page'] = 10;
		//outside of flist that is <ul></ul>
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

		$data['pagination'] = $this->pagination->create_links();
		$data['items'] = $this->crud_model->get_where_pagination('users', array('status !=' => '2'), $config["per_page"], $page);
		$data['title'] = 'User';
		$data['page'] = 'list';
		$this->load->view('layouts/admin/index', $data);
	}

	public function form($id = '')
	{

		$data['detail'] = $this->db->get_where('users', array('id' => $id))->row();
		if ($this->input->post()) {
			$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
			if ($id == '') {
				$this->form_validation->set_rules('user_name', 'Username', 'required|trim');
				$this->form_validation->set_rules('password', 'Password', 'required|trim');
			}

			if ($this->form_validation->run()) {
				$data = array(
					'email' => $this->input->post('email'),
					'role_id' => $this->input->post('role_id'),
					'status' => $this->input->post('status'),
				);
				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_by'] = $this->current_user->id;
					$data['created'] = date('Y-m-d');

					//duplicate user check 
					$is_already = $this->crud_model->get_where_single('users', array('user_name' => $this->input->post('user_name')));
					if (empty($is_already)) {
						$data['user_name'] = $this->input->post('user_name');
					} else {
						$this->session->set_flashdata('error', 'User Name Already Exists!!! Try Another One');
						redirect('staff/admin/form/');
					}

					$data['password'] = md5($this->input->post('password'));
					$result = $this->crud_model->insert('users', $data);
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect('staff/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect('staff/admin/form');
					}
				} else {
					$data['updated'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update('users', $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect('staff/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect('staff/admin/form/' . $id);
					}
				}
			}
		}
		$data['roles'] = $this->crud_model->get_where('user_role', array('status' => '1'));
		$data['staffs'] = $this->crud_model->get_where('staff_infos', array('status' => '1'));
		$data['title'] = 'Add/Edit User';
		$data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
	}

	public function soft_delete($id)
	{
		$data = array(
			'status' => '2',
			'updated_by' => $this->current_user->id,
			'updated' => date('Y-m-d'),
		);
		$result = $this->crud_model->update('users', $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect('user/admin/all');
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect('user/admin/all');
		}
	}
}
