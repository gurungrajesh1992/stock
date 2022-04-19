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

	public function index()
	{

		$data['site_settings'] = $this->db->get_where('site_settings', array('status' => '1'))->row();
		if ($this->input->post()) {
			$this->form_validation->set_rules('meta_key_words', 'Meta Keywords', 'required|trim');
			$this->form_validation->set_rules('meta_description', 'Meta Description', 'required|trim');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'required|trim');
			if ($this->form_validation->run()) {
				$data = array(
					'site_name' => $this->input->post('site_name'),
					'site_slogan' => $this->input->post('site_slogan'),
					'web_url' => $this->input->post('web_url'),
					'address' => $this->input->post('address'),
					'mobile' => $this->input->post('mobile'),
					'telephone' => $this->input->post('telephone'),
					'map_location' => $this->input->post('map_location'),
					'contact_detail' => $this->input->post('contact_detail'),
					'email' => $this->input->post('email'),
					'facebook' => $this->input->post('facebook'),
					'whatsapp' => $this->input->post('whatsapp'),
					'skype' => $this->input->post('skype'),
					'twitter' => $this->input->post('twitter'),
					'instagram' => $this->input->post('instagram'),
					'youtube' => $this->input->post('youtube'),
					'googleplus' => $this->input->post('googleplus'),
					'linked_in' => $this->input->post('linked_in'),
					'logo' => $this->input->post('logo'),
					'fav' => $this->input->post('fav'),
					'default_img' => $this->input->post('default_img'),
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'meta_key_words' => $this->input->post('meta_key_words'),
					'updated_on' => date('Y-m-d'),
					'updated_by' => $this->current_user->id,
				);

				$result = $this->db->update('site_settings', $data);
				if ($result) {
					$this->session->set_flashdata('success', 'Successfully Updated.');
					redirect('site_settings/admin');
				} else {
					$this->session->set_flashdata('error', 'Unable To Update.');
					redirect('site_settings/admin');
				}
			}
		}
		$data['title'] = 'Site Settings';
		$data['page'] = 'site_setting';
		$this->load->view('layouts/admin/index', $data);
	}
}
