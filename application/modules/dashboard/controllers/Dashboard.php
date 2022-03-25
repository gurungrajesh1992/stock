<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');   
	}
	
	public function index()
	{ 
		$data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';
        $this->load->view('layouts/admin/index',$data);
	}
}

