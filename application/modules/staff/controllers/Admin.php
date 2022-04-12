<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Auth_controller {

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');   
		$this->table = 'staff_infos';
		$this->redirect = 'staff/admin/';
		$this->title = 'Staff';
	}

	public function all($page='')
	{ 
		
		// $data['roles'] = $this->db->get_where('user_role',array('status !='=>'2'))->result(); 

		// var_dump($this->uri->segment(3));exit;

		$config['base_url'] = base_url($this->redirect.'all');
		$config['total_rows'] = $this->crud_model->count_all($this->table,array('status !='=>'2'),'id');
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
		$data['items'] = $this->crud_model->get_where_pagination($this->table,array('status !='=>'2'),$config["per_page"], $page);
		$data['title'] = $this->title;
        $data['page'] = 'list';
		$data['redirect'] = $this->redirect;
        $this->load->view('layouts/admin/index',$data);
	}
	
	public function form($id='')
	{ 
		
		$data['detail'] = $this->db->get_where($this->table,array('id'=>$id))->row();
		$data['dep_deg'] = $this->crud_model->get_where_single('staff_desig_depart',array('status'=>'1','staff_id'=>$id)); 
		// print_r($data['dep_deg'] );
		if($this->input->post()){
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');  
			
			if($this->form_validation->run()){
				$data = array(
							'full_name' => $this->input->post('full_name'), 
							'description' => $this->input->post('description'),
							'featured_image' => $this->input->post('featured_image'),  
							'designation_code' => $this->input->post('designation_code'),
							'temp_address' => $this->input->post('temp_address'),
							'permanent_address' => $this->input->post('permanent_address'),
							'contact' => $this->input->post('contact'), 
							'email' => $this->input->post('email'),
							'country_code' => $this->input->post('country_code'),
							'department_code' => $this->input->post('department_code'),
							'appointed_date' => $this->input->post('appointed_date'),
							'status' => $this->input->post('status'),  
						);   				
				$id = $this->input->post('id');	 	
				if($id == ''){ 
					$slug = $this->crud_model->createUrlSlug($this->input->post('title'));
					$check_slug = $this->crud_model->get_where_single($this->table,array('slug'=>$slug));
					if(empty($check_slug)){
						$data['slug'] = strtolower ($slug);
					}else{
						$data['slug'] = strtolower ($slug).time();
					}
					$data['created_by'] = $this->current_user->id; 
					$data['created_on'] = date('Y-m-d'); 
					$result = $this->crud_model->insert($this->table, $data);
					 

					if($result==true){
						$insert_id = $this->db->insert_id();
						$staff= array(
							'staff_id'=> $insert_id,
							'designation_code' => $this->input->post('designation_code'),
							'department_code' => $this->input->post('department_code'),
							'from' => $this->input->post('appointed_date'),
							'status' => $this->input->post('status'), 
							'created_by'=> $this->current_user->id,
							'created_on'=>date('Y-m-d'),
						); 
						$staff_result = $this->crud_model->insert('staff_desig_depart', $staff);

						if($staff_result){
							$this->session->set_flashdata('success','Successfully Inserted.');
							redirect($this->redirect.'all');
						}
						else{
							$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect.'form');
						}
					}else{
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect.'form');
					}
				}else{ 
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id; 
					$result = $this->crud_model->update($this->table, $data,array('id'=>$id));
					if($result==true){
						$this->session->set_flashdata('success','Successfully Updated.');
						redirect($this->redirect.'all');
					}else{
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect.'form/'.$id);
					}
				}   
			}
		}
		
		$data['countries'] = $this->crud_model->get_where('country_para',array('status'=>'1'));
		$data['designations'] = $this->crud_model->get_where('designation_para',array('status'=>'1'));
		$data['departments'] = $this->crud_model->get_where('department_para',array('status'=>'1'));
		$data['title'] = 'Add/Edit '.$this->title;
        $data['page'] = 'form';
        $this->load->view('layouts/admin/index',$data);
	}

	public function soft_delete($id){
		$data = array(
			'status' => '2',
			'updated_by' => $this->current_user->id, 
			'updated' => date('Y-m-d'),
		);
		$result = $this->crud_model->update($this->table, $data,array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success','Successfully Deleted.');
			redirect($this->redirect.'all');
		}else{
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect($this->redirect.'all');
		}
	}
}
