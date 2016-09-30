<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailyDeals extends CI_Controller {

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
		$this->load->model('daily_deal_model');
		$this->basePath = base_url()."assets/daily-deals-images/";
	} 
	
	public function index()
	{
		$data['dailydeals'] = $this->daily_deal_model->getAllDailyDeals();
		$this->template->load('dailydeals/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input 			= $this->input->post();

			$input['image'] = '';

			if($_FILES['dailydeal_image']) 
			{
				$fileName =  rand(111111,999999)."_dailydeal_picture.jpg";
				$config = array( 
					'upload_path'   => 'assets/daily-deals-images',
					'allowed_types' => 'gif|jpg|png',
					'file_name'     => $fileName
				);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('dailydeal_image'))
                {
                	$picData = $this->upload->data();  
                	$input['image'] = $picData['file_name'];
                }
			}
			
			$insertData = array(
				'associate_id'		=> $input['associate_id'],
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
			$this->daily_deal_model->create($insertData);
			redirect('DailyDeals/index',"refresh");
		}

		$this->template->load('dailydeals/add');	
	}
}
