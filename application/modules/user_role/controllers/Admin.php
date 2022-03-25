<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Auth_controller {

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');   
	}

	public function all($page='')
	{ 
		
		// $data['roles'] = $this->db->get_where('user_role',array('status !='=>'2'))->result(); 

		// var_dump($this->uri->segment(3));exit;

		$config['base_url'] = base_url('user_role/admin/all');
		$config['total_rows'] = $this->crud_model->count_all('user_role',array('status !='=>'2'),'id');
		$config['uri_segment'] = 4;
		$config['per_page'] = 1;
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
		$data['roles'] = $this->crud_model->get_where_pagination('user_role',array('status !='=>'2'),$config["per_page"], $page);
		$data['title'] = 'User Role';
        $data['page'] = 'list';
        $this->load->view('layouts/admin/index',$data);
	}
	
	public function form($id='')
	{ 
		
		$data['detail'] = $this->db->get_where('user_role',array('id'=>$id))->row();
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Title', 'required|trim'); 
			if($this->form_validation->run()){
				$data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status'), 
						); 		 
				$id = $this->input->post('id');		
				if($id == ''){ 
					$data['created_by'] = $this->current_user->id; 
					$data['created_date'] = date('Y-m-d');
					$result = $this->crud_model->insert('user_role', $data);
					if($result==true){
						$this->session->set_flashdata('success','Successfully Inserted.');
						redirect('user_role/admin/all');
					}else{
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect('user_role/admin/form');
					}
				}else{ 
					$data['updated_date'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id; 
					$result = $this->crud_model->update('user_role', $data,array('id'=>$id));
					if($result==true){
						$this->session->set_flashdata('success','Successfully Updated.');
						redirect('user_role/admin/all');
					}else{
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect('user_role/admin/form/'.$id);
					}
				}   
			}
		}
		$data['title'] = 'Add/Edit User Role';
        $data['page'] = 'form';
        $this->load->view('layouts/admin/index',$data);
	}

	public function soft_delete($id){
		$data = array(
			'status' => '2',
			'updated_by' => $this->current_user->id, 
			'updated_date' => date('Y-m-d'),
		);
		$result = $this->crud_model->update('user_role', $data,array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success','Successfully Deleted.');
			redirect('user_role/admin/all');
		}else{
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect('user_role/admin/all');
		}
	}
}
