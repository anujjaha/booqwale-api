<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

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
		$this->load->model('contact_model');
	} 
	
	public function index()
	{
		redirect('categories', 'refresh');
		$data['contacts'] = $this->contact_model->getAllContacts();
		$this->template->load('contacts/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input = $this->input->post();

			$data = array( 'name' 			  => $input['name'],
							'category_id' 	  => $input['category_id'],
						   	'company_name'    => $input['company_name'],
						   	'mobile' 		  => $input['mobile'],
						   	'contact_number'  => $input['contact_number'],
						   	'address_one' 	  => $input['address_one'],
						   	'address_two' 	  => $input['address_two'],
						   	'city' 			  => $input['city'],
						   	'state' 		  => $input['state'],
						   	'zip' 			  => $input['zip'],
							'email_id_one'    => $input['email_id_one'],
							'reference_name'  => $input['reference_name'],
							'notes' 		  => $input['notes'],
							'profile_picture' => 'default.png'
					);


			if($_FILES['profile_picture']) 
			{
				$config = array( 'upload_path'   => 'assets/profilepicuters',
								 'allowed_types' => 'gif|jpg|png',
								 'file_name'     => rand(111111,999999)."_user_profilepic.jpg"
							);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('profile_picture'))
                {
                	$picData = $this->upload->data();  
                	$data['profile_picture'] = $picData['file_name'];
                }
			}


			$this->contact_model->create($data);
			redirect('contacts/index',"refresh");

		}

		$this->template->load('contacts/add');	
	}

	public function edit($id=null)
	{
		if($id) {

			$contacts = $this->contact_model->getContactByParam('id',$id);

			if($this->input->post()) 
			{

				$input = $this->input->post();
				$id    = $input['id'];

				$data = array( 'name' 		  => $input['name'],
							'category_id' 	  => $input['category_id'],
						   	'company_name'    => $input['company_name'],
						   	'mobile' 		  => $input['mobile'],
						   	'contact_number'  => $input['contact_number'],
						   	'address_one' 	  => $input['address_one'],
						   	'address_two' 	  => $input['address_two'],
						   	'city' 			  => $input['city'],
						   	'state' 		  => $input['state'],
						   	'zip' 			  => $input['zip'],
							'email_id_one'    => $input['email_id_one'],
							'reference_name'  => $input['reference_name'],
							'notes' 		  => $input['notes'],
					);


				if($_FILES['profile_picture']) 
				{
					$config = array( 'upload_path'   => 'assets/profilepicuters',
								 'allowed_types' => 'gif|jpg|png',
								 'file_name'     => rand(111111,999999)."_user_profilepic.jpg"
							);
					
					$this->load->library('upload', $config);

	                if ( $this->upload->do_upload('profile_picture'))
	                {
	                	$picData = $this->upload->data();  
	                	$data['profile_picture'] = $picData['file_name'];
	                }
				}

				$this->contact_model->update($id,$data);
				redirect('contacts/index',"refresh");

			}

			$data['contact'] = $contacts[0];
			$this->template->load('contacts/edit',$data);	
		}
	}

	public function search()
	{
		$param           =  $this->input->get('q');

		$data['results'] = $this->contact_model->searchResult($param);

		$data['keyword'] = $param;

		$this->template->load('contacts/search',$data);
	}
}
