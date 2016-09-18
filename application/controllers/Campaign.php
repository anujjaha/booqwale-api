<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

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
		$this->load->model('campaign_model');
	} 
	
	public function index()
	{
		
		$data['campaigns'] = $this->campaign_model->getAllCampaigns();
		$this->template->load('campaign/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input = $this->input->post();

			$data = array( 'categories'=> $input['name'] );

			$this->category_model->create($data);
			redirect('category/index',"refresh");

		}

		$this->template->load('category/add');	
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
}
