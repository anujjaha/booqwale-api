<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

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
	
	/**
	 * Category Image Base Path
	 *
	 */
	protected $basePath;

	public function __construct() {
		parent::__construct();
		$this->load->model('offer_model');
		$this->basePath = base_url()."assets/offer-images/";
	} 
	
	public function index()
	{
		$data['offers'] = $this->offer_model->getAllOffers();
		$this->template->load('offers/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input 			= $this->input->post();

			$input['image'] = '';

			if($_FILES['offer_image']) 
			{
				$fileName =  rand(111111,999999)."_offer_picture.jpg";
				$config = array( 
					'upload_path'   => 'assets/offer-images',
					'allowed_types' => 'gif|jpg|png',
					'file_name'     => $fileName
				);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('offer_image'))
                {
                	$picData = $this->upload->data();  
                	$input['image'] = $picData['file_name'];
                }
			}
			
			$insertData = array(
				'associate_id'		=> $input['associate_id'],
				'associate_title'	=> getAssociateTitle($input['associate_id']),
				'title'				=> $input['title'],
				'small_title'		=> $input['small_title'],
				'description'		=> $input['description'],
				'deal_code'			=> $input['deal_code'],
				'deal_end'			=> $input['deal_end'],
				'custom_link'		=> $input['custom_link'],
				'caption'			=> $input['caption'],
				'is_booqwale'		=> $input['is_booqwale'],
				'image'				=> $input['image'],
				'basepath'			=> $this->basePath
			);
			$this->offer_model->create($insertData);
			redirect('offers/index',"refresh");
		}

		$this->template->load('offers/add');	
	}

	public function edit($id = null)
	{
		if($id)
		{
			$data['dealInfo'] = $this->offer_model->getOffersById($id);

			if($this->input->post())
			{
				$input 			= $this->input->post();
				$dailyDealId 	= $input['id'];

				$updateData = array(
					'associate_id'		=> $input['associate_id'],
					'title'				=> $input['title'],
					'small_title'		=> $input['small_title'],
					'description'		=> $input['description'],
					'deal_code'			=> $input['deal_code'],
					'deal_end'			=> $input['deal_end'],
					'custom_link'		=> $input['custom_link'],
					'caption'			=> $input['caption'],
					'is_booqwale'		=> $input['is_booqwale'],
				);

				if(isset($_FILES['offer_image']))
				{
					$fileName =  rand(111111,999999)."_offer_picture.jpg";
					$config = array( 
						'upload_path'   => 'assets/offer-images',
						'allowed_types' => 'gif|jpg|png',
						'file_name'     => $fileName
					);
						
					$this->load->library('upload', $config);

	                if ( $this->upload->do_upload('offer_image'))
	                {
	                	$picData = $this->upload->data();  

	                	$updateData['image'] = $picData['file_name'];
	                }
				}

				$this->offer_model->update($dailyDealId, $updateData);
				
				redirect('offers/index',"refresh");
			}

		$this->template->load('offers/edit', $data);	
		}
	}
}
