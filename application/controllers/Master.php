<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
		$this->load->model('master_model');
		$this->load->helper(array('url','language'));
                $this->load->library(array('form_validation'));
	} 
	public function index()
	{
		$data['name'] = $data['page_title'] = "Module Manager";
		$data['modules'] = $this->master_model->get_all_modules();
                $this->template->load('master/index',$data);
	}
	
	public function create() { 
	    $this->data['title'] = $this->lang->line('create_user_heading');
		if($this->input->post()) {
                  
                    $table_name = strtolower(str_replace(" ","_", $this->input->post('module_name')));
                    $count = count($this->input->post('field'));
                    $table_body = "";
                    $fields = array();
                   /* for($i=0;$i<$count;$i++) {
                        
                        $fields[$i] = $this->input->post('field')[$i];
                        $table_body .= $this->input->post('field')[$i]." ".$this->input->post('field_type')[$i]."(".$this->input->post('field_length')[$i].")";
                        
                        if($i == $this->input->post('primary') ) {
                            $table_primary_key = $this->input->post('field')[$i];
                            $table_body .= " PRIMARY KEY AUTO_INCREMENT ";
                        }
                        
                        if($i <  ( $count - 1 )) {
                            $table_body .= " , ";
                        }
                        
                    } */
                    
                    $table_query = 'Create Table '.$table_name.' ( '.$table_body.' )';
                    
                    
                    
                    $controller_path = APPPATH."controllers/";
                    $model_path = APPPATH."models/";
                    $view_path = APPPATH."views/".$table_name;
                    
                    if(mkdir($view_path, 0777 , '-R')) {
                        create_files($table_primary_key,$fields , $table_name,$view_path);
                    } else {
                        die("Director seems not writable - Permission Denied");
                    }
                     
                    
                    
                    create_controller($table_primary_key,$fields,$controller_path,$table_name);
                    
                    create_model($table_primary_key,$fields,$model_path,$table_name);
                    
                    
                    // Print Table Query
                    //echo $table_query;
                    $module_name = $this->input->post('module_name');
                    $module_alias_name = $this->input->post('module_alias_name');
                    $master_data = array( 'module_name'=>$module_name,
                                          'module_alias_name'=>$module_alias_name,
                                          'fields'=>$fields,
                                          'schema'=>$table_query,
                                        );
                    $this->master_model->save($master_data);
                    
                    redirect('master/index',"refresh");    
		}
            $data = array();
            $this->template->load('master/add',$data);
	}
        
        public function delete($id=null) {
            if($id) {
                $status = $this->master_model->delete($id);
                if($status) {
                    redirect("master/index","refresh");
                } else {
                    die("Id ".$id);
                }
            }
            die("F");
        }
}
