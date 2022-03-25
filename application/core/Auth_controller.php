<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_controller extends MX_Controller
{
    protected $current_user = NULL;
	protected $per_page = NULL;
    
    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->library('auth'); 
        if (!$this->auth->is_logged())
        { 
            $this->session->set_flashdata('loginfirst','You Must Login First');
            redirect('login');
        } 

        //    to get controller (class) and function (method) name 

        // $controller = $this->router->fetch_class();
		// $method = $this->router->fetch_method();

        // var_dump($controller);exit;
		
		
        $this->current_user = $this->auth->current_user();
        $logs = array(
                    'module' => $this->uri->segment(1),
                    'function' => $this->uri->segment(3),
                    'user_id' => $this->current_user->id,
                );
        $insert_log = $this->db->insert('user_log',$logs);
        if(!$insert_log){
            $this->session->set_flashdata('error','Unable To Make Log.');
			redirect('dashboard');
        }
        // var_dump($this->uri->segment(1));exit;
		$this->session->set_userdata('current_user',$this->current_user);  
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
        $site_settings = $this->crud_model->get_where_single('site_settings',array('status'=>'1'));
        $this->session->set_userdata('site_settings',$site_settings); 
        
        
        // $this->data['current_user'] = $this->current_user; 
        // $this->data['flashdata'] = $this->session->flashdata('feedback_information');
    }

}