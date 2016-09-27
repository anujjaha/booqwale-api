<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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

	protected $apiSuccessMessage = "API Works Fine";

	public function getAllParentCategories()
	{
		$this->load->model('category_model');
		$categories = $this->category_model->getAllParents();
		
		if($categories)
		{
			$this->setResponse(true, $this->apiSuccessMessage,$categories);
		}

		$this->setResponse(false);
	}

	public function getCategoriesByParentId($id = null)
	{
		if(is_numeric($id) && isset($id) && $id > 0 )
		{
			$this->load->model('category_model');
			$categories = $this->category_model->getCategoriesByParam('parent_id', $id);

			if($categories)
			{
				$this->setResponse(true, $this->apiSuccessMessage,$categories);
			}
		}

		$this->setResponse(false);		
	}

	public function getAllBanners()
	{
		$this->load->model('banner_model');
		$banners = $this->banner_model->getAllBanners();	
		if($banners)
		{
			$this->setResponse(true, $this->apiSuccessMessage, $banners);
		}

		$this->setResponse(false);
	}
	public function setResponse($status = false, $message = "No data Found", $data = array())
	{
		$response = array(
			'status'	=> $status,
			'message'	=> $message,
			'items'		=> $data
		);

		echo json_encode($response);
		die;
	}
}
