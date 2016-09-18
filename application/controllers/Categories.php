<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
		$this->load->model('category_model');
		$this->basePath = base_url()."assets/category-images/";
	} 
	
	public function index()
	{
		$data['categories'] = $this->category_model->getAllParents();
		$this->template->load('categories/index',$data);
	}

	public function create()
	{
		if($this->input->post())
		{
			$input 			= $this->input->post();
			$input['image'] = '';

			if($_FILES['category_image']) 
			{
				$fileName =  rand(111111,999999)."_category_picture.jpg";
				$config = array( 
					'upload_path'   => 'assets/category-images',
					'allowed_types' => 'gif|jpg|png',
					'file_name'     => $fileName
				);
					
				$this->load->library('upload', $config);

                if ( $this->upload->do_upload('category_image'))
                {
                	$picData = $this->upload->data();  
                	$input['image'] = $picData['file_name'];
                }
			}
			
			$insertData = array(
				'title'				=> $input['name'],
				'parent_id'			=> $input['parent_id'],
				'image'				=> $input['image'],
				'category_link'		=> $input['category_link'],
				'basepath'			=> $this->basePath
			);

			$this->category_model->create($insertData);
			redirect('categories/index',"refresh");

		}

		$this->template->load('categories/add');	
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
