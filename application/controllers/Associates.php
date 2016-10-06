<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Associates extends CI_Controller {

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
		$this->load->model('associate_model');
		$this->basePath = base_url()."assets/associate-images/";
	} 
	
	public function index()
	{
		$data['associates'] = $this->associate_model->getAllAssociates();
		$this->template->load('associates/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input 			= $this->input->post();

			$input['image'] = '';

			if(isset($_FILES['associate_image'])) 
			{
				$fileName =  rand(111111,999999)."_associate_picture.jpg";
				$config = array( 
					'upload_path'   => 'assets/associate-images',
					'allowed_types' => 'gif|jpg|png',
					'file_name'     => $fileName
				);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('associate_image'))
                {
                	$picData = $this->upload->data();  
                	$input['image'] = $picData['file_name'];
                }
			}
			
			$insertData = array(
				'associate_title'	=> $input['associate_title'],
				'associate_image'	=> $this->basePath.DIRECTORY_SEPARATOR.$input['image']
			);

			$this->associate_model->create($insertData);
			redirect('associates/index',"refresh");
		}

		$this->template->load('associates/add');	
	}
}
