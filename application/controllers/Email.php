<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
		$this->load->model('email_model');
	} 
	
	public function index()
	{
		$this->load->model('email_model');
		$data['emails'] = $this->email_model->getAllSendEmails();
		$this->template->load('email/index',$data);
	}

	public function uploadImage()
	{
		if($_FILES['image']) 
			{
				$config = array( 'upload_path'   => 'assets/emailpictures',
								 'allowed_types' => 'gif|jpg|png',
								 'file_name'     => rand(111111,999999)."_email_template.jpg"
							);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('image'))
                {
                	$picData = $this->upload->data();  
                
                	$imageUrl = site_url('assets/emailpictures/'.$picData['file_name']);


                	echo "<script>top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('".$imageUrl."').closest('.mce-window').find('.mce-primary').click();</script>".$imageUrl;
                }
                else 
                {
                	echo "<script>alert('Unable to Upload Image !');</script>";
                }
			}
			die;
	}

	public function create()
	{
		if($this->input->post())
		{
			$input = $this->input->post();

			$campaingData = array(  'subject'     => $input['subject'],
									'from_name'   => $input['from_name'],
									'from_email'  => $input['from_email'],
									'content'     => $input['html_content'],
									'receipt_ids' => implode("," ,$input['contacts_id']),
									'user_id'	  => $this->ion_auth->user()->row()->id
							);	

			$this->load->model('campaign_model');

			$campaignId = $this->campaign_model->create($campaingData);

			$userIds =  implode("," ,$input['contacts_id']);

			$receiver   = $this->email_model->create($campaignId, $input['html_content'], $userIds);

			
			if($receiver > 0)
			{
				$status = sendEmailByCampaignId($campaingData,$campaignId);
			}

			if(isset($input['sendSms']) && $input['sendSms'] == 1)
			{
				$receivers = implode("," ,$input['contacts_id']);
				$this->sendSms($receivers, $input['sms_content']);
			}

			redirect('campaign/index',"refresh");

		}

		$this->load->model('contact_model');
		
		$data['contacts'] = $this->contact_model->getAllEmailContacts();

		$this->load->model('category_model');

		$data['categories'] = $this->category_model->getAllCategoryName();
		
		$this->template->load('email/add',$data);	
	}

	public function sendSms($receivers, $content = null)
	{
		if(SEND_SMS == true && strlen($content) > 10)
		{
			$this->email_model->sendSms($receivers, $content);
		}
		
		return true;
	}
	public function edit($id=null)
	{
		if($id) {

			$categories = $this->category_model->getCategoriesByParam('id',$id);
			
			if($this->input->post()) 
			{

				$input = $this->input->post();
				$id    = $input['id'];

				$data = array( 'categories' => $input['name'] );

				$this->category_model->update($id,$data);
				redirect('category/index',"refresh");

			}

			$data['category'] = $categories[0];
			$this->template->load('category/edit',$data);	
		}
	}

	public function sent_list()
	{
		$data['sent'] = $this->email_model->getAllSentItems();
		$this->template->load('email/sent',$data);	
	}
}

