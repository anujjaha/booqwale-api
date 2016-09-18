<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
	} 
	public function index()
	{
		$data['name'] = $data['page_title'] = "ANUJ JHA";
		$data['users'] = $this->user_model->get_all_users();
		$this->template->load('user/index',$data);
	}
	
	public function create() { 
	    $this->data['title'] = $this->lang->line('create_user_heading');
		if($this->input->post()) {
		        $user_data = array( 'first_name'=>  $this->input->post('first_name'), 
                                            'last_name'=>  $this->input->post('last_name'), 
                                            'company'=>  $this->input->post('company'), 
                                            'phone'=>  $this->input->post('phone'), 
                                            'username'=>  $this->input->post('username'), 
                                            'password'=>  $this->input->post('password'), 
                                            'email'=>  $this->input->post('email'), 
                                            );
                        $role_id = $this->input->post('user_role');
                        $this->user_model->create_user($role_id,$user_data);
                    redirect('user/index',"refresh");    
		}
            $data = array();
            $this->template->load('user/add',$data);
	}

	public function settings()
	{
		if($this->input->post())
		{
			$data = array(
				'PAGE_DEFAULT_TITLE' => $this->input->post('PAGE_DEFAULT_TITLE'),
				'SITE_SHORT_TITlE' => $this->input->post('SITE_SHORT_TITlE'),
				'SITE_FULL_TITlE' => $this->input->post('SITE_FULL_TITlE'),
				'COMPNAY_TITLE' => $this->input->post('COMPNAY_TITLE'),
				'SITE_TITLE' => $this->input->post('SITE_TITLE'),
				'SITE_SIGNATURE' => $this->input->post('html_content'),
				);

			$this->user_model->updateUserSettings($data);
			redirect('user/settings', "refresh");
		}
		$data['settings'] = $this->user_model->getUserSettings();
		$this->template->load('user/settings',$data);
	}

}
