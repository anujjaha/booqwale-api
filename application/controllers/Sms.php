<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

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
		$this->load->model('sms_transaction_model');
		$this->load->model('email_model');
	} 
	
	public function index()
	{
		$data['smss'] = $this->sms_transaction_model->getAllSms();
		$this->template->load('sms/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input     = $this->input->post();
			$content   = $input['sms_content'];
			$receivers = implode("," ,$input['contacts_id']);

			if(SEND_SMS == true && strlen($content) > 10)
			{
				$this->email_model->sendSms($receivers, $content);
			}

			redirect("sms/index", "refresh");
		}

		$this->load->model('contact_model');
		$this->load->model('category_model');

		$data['contacts'] = $this->contact_model->getAllEmailContacts();
		$data['categories'] = $this->category_model->getAllCategoryName();
		
		$this->template->load('sms/add', $data);	
	}


	public function sent_list()
	{
		$data['sent'] = $this->email_model->getAllSentItems();
		$this->template->load('email/sent',$data);	
	}
}

