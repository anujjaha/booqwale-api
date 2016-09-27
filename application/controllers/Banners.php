<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {

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
		$this->load->model('banner_model');
		$this->basePath = base_url()."assets/banner-images/";
	} 
	
	public function index()
	{
		$data['banners'] = $this->banner_model->getAllBanners();
		$this->template->load('banners/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input 			= $this->input->post();

			$input['image'] = '';

			if($_FILES['banner_image']) 
			{
				$fileName =  rand(111111,999999)."_banner_picture.jpg";
				$config = array( 
					'upload_path'   => 'assets/banner-images',
					'allowed_types' => 'gif|jpg|png',
					'file_name'     => $fileName
				);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('banner_image'))
                {
                	$picData = $this->upload->data();  
                	$input['image'] = $picData['file_name'];
                }
			}
			
			$insertData = array(
				'title'				=> $input['title'],
				'description'		=> $input['description'],
				'custom_link'		=> $input['customlink'],
				'caption'			=> $input['caption'],
				'is_homepage'		=> $input['is_homepage'],
				'is_booqwale'		=> $input['is_booqwale'],
				'image'				=> $input['image'],
				'basepath'			=> $this->basePath
			);

			$this->banner_model->create($insertData);
			redirect('banners/index',"refresh");

		}

		$this->template->load('banners/add');	
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
