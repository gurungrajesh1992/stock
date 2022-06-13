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
        if (!$this->auth->is_logged()) {
            $this->session->set_flashdata('loginfirst', 'You Must Login First');
            redirect('login');
        }
        $this->current_user = $this->auth->current_user();
        //    to get controller (class) and function (method) name 

        $controller = $this->router->fetch_class();
        $module = $this->uri->segment(1);
        $function = $this->router->fetch_method();

        $module_function = $this->crud_model->get_module_function($module, $function);
        // echo "<pre>";
        // var_dump($this->current_user->role_id);
        // exit;
        if ($module_function) {
            $check = $this->crud_model->get_single('module_function_role', array('module_function_id' => $module_function->module_function_id, 'role_id' => $this->current_user->role_id));
            if (empty($check)) {
                $this->session->set_flashdata('error', 'You Are Not Allowed Here!! Sorry...');
                redirect('dashboard');
            }
        }
        // exit;
        $logs = array(
            'module' => $this->uri->segment(1),
            'function' => $this->uri->segment(3),
            'user_id' => $this->current_user->id,
        );
        $insert_log = $this->db->insert('user_log', $logs);
        if (!$insert_log) {
            $this->session->set_flashdata('error', 'Unable To Make Log.');
            redirect('dashboard');
        }
        // var_dump($this->uri->segment(1));exit;
        $this->session->set_userdata('current_user', $this->current_user);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $site_settings = $this->crud_model->get_where_single('site_settings', array('status' => '1'));
        $this->session->set_userdata('site_settings', $site_settings);


        // $this->data['current_user'] = $this->current_user; 
        // $this->data['flashdata'] = $this->session->flashdata('feedback_information');
    }
}
