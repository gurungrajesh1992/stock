<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{

	public function __construct()
	{
		parent::__construct();

		$this->table = 'item_infos';
		$this->title = 'Item';
		$this->redirect = 'items';
		$this->load->model('Items_model');
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
			$this->form_validation->set_rules('category_id', 'Category Name', 'required|trim');
			$this->form_validation->set_rules('location_id', 'Location Name', 'required|trim');

			if ($this->form_validation->run()) {

				$data = array(
					'category_id' => $this->input->post('category_id'),
					'location_id' => $this->input->post('location_id'),
					'item_code' => $this->input->post('item_code'),
					'item_name' => $this->input->post('item_name'),
					'item_type' => $this->input->post('item_type'),
					'specification' => $this->input->post('specification'),
					'model_no' => $this->input->post('model_no'),
					'max_qty' => $this->input->post('max_qty'),
					'min_qty' => $this->input->post('min_qty'),
					'reorder_level' => $this->input->post('reorder_level'),
					'shelf_life_no' => $this->input->post('shelf_life_no'),
					'shelf_life_ym' => $this->input->post('shelf_life_ym'),
					'depreciation_rate' => $this->input->post('depreciation_rate'),
					'item_image' => $this->input->post('item_image'),

					'status' => $this->input->post('status'),
				);

				$data_depreciation_para = array(
					'item_code' => $this->input->post('item_code'),
					'depreciation_rate' => $this->input->post('depreciation_rate'),
					'status' => $this->input->post('status'),
				);

				// $country_code = substr($data['country_name'], 0, 4);
				// $data['country_code'] = $country_code;
				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_on'] = date('Y-m-d');
					$data['created_by'] = $this->current_user->id;
					$result = $this->crud_model->insert($this->table, $data);

					$data_depreciation_para['created_on'] = date('Y-m-d');
					$data_depreciation_para['created_by'] = $this->current_user->id;
					$result = $this->crud_model->insert('depreciation_para', $data_depreciation_para);

					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . '/admin/form');
					}
				} else {
					// print_r($data);
					// if ($id == $data['parent_id']) {
					// 	$data['parent_id'] = 0;
					// }
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->current_user->id;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . '/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . '/admin/form/' . $id);
					}
				}
			}
		}

		$data['categories'] = $this->Items_model->getAll_categories();
		$data['locations'] = $this->Items_model->getAll_location();
		$data['item_code'] = $this->Items_model->item_code();

		if (isset($data['detail']->category_id)) {
			$selected_parent = $data['detail']->category_id;
		} else {
			$selected_parent = '';
		}
		$data['html'] = $this->get_parents_html($selected_parent);

		$data['title'] = 'Add/Edit ' . $this->title;
		$data['page'] = 'form';
		$this->load->view('layouts/admin/index', $data);
	}

	public function get_parents_html($selected_parent = '')
	{
		$html = '<option>Select Category Name</option>';
		$parents = $this->db->get_where('categories', array('status' => '1', 'parent_id' => 0))->result();
		if ($parents) {
			foreach ($parents as $key => $value) {
				$html  .= '<option value="' . $value->id . '" ' . (((isset($value->id)) && $value->id == $selected_parent) ? "selected" : "") . '>' . $value->category_name . '</option>';
				$childs = $this->db->get_where('categories', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($childs)) {
					$space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					// var_dump($this->get_childs($html,$childs,$selected_parent,$space));exit;
					$html .= $this->get_childs($childs, $selected_parent, $space);
				}
			}
		}

		return $html;
	}

	public function get_childs($childs = array(), $selected_parent, $space)
	{
		// var_dump($html);exit;
		$html = '';
		if (!empty($childs)) {
			foreach ($childs as $key => $value) {
				// echo "here";exit;
				$html  .= '<option value="' . $value->id . '" ' . (((isset($value->id)) && $value->id == $selected_parent) ? "selected" : "") . '>' . $space . $value->category_name . '</option>';
				$new_childs = $this->db->get_where('categories', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($new_childs)) {
					$space = $space . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					$html .= $this->get_childs($new_childs, $selected_parent, $space);
				}
			}
		}
		return $html;
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
}
