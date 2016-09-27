<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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

	public function ajax_get_contact($id=null) {
		if( $id ) {
			
			// Load Contact Model to get Single Contact
			$this->load->model('contact_model');
			
			$contacts        = $this->contact_model->getContactByParam('id',$id);
			$data['contact'] = $contacts[0];

			$this->load->view('ajax/view_contact',$data);
		}
		return false;
	}

	public function ajax_delete_contact($id=null) {
		if( $id ) {
			
			// Load Contact Model to get Single Contact
			$this->load->model('contact_model');
			
			$status = $this->contact_model->deleteContactById($id);
			if($status) {
				return true;
			}
		}
		return false;
	}

	public function ajax_delete_category($id = null) {
		if( $id ) 
		{
			// Load Contact Model to get Single Contact
			$this->load->model('category_model');
			
			$status = $this->category_model->deleteCategoryById($id);
			if($status) {
				echo true;
				die;
			}
		}
		echo false;
		die;
	}

	public function ajaxGetReceipt($id)
	{
		if($id)
		{
			$this->load->model('campaign_model');
			
			$data['receipts'] = $this->campaign_model->getReceipt($id);

			$data['campaign'] = $this->campaign_model->getCampaignByParam('id', $id);

			$this->load->view('ajax/view_receipt', $data);
		}
	}

	public function ajaxHmtlContent($id)
	{
		if($id)
		{
			$this->load->model('campaign_model');
			
			$content = $this->campaign_model->getContentById($id);
			if($content)
			{
				echo $content;
				die;
			}
		}	
	}

	public function ajax_delete_banner($id = null)
	{
		if( $id ) 
		{
			// Load Contact Model to get Single Contact
			$this->load->model('banner_model');
			$status = $this->banner_model->deleteBannerById($id);

			if($status) {
				echo true;
				die;
			}
		}
		echo false;
		die;
	}
}
