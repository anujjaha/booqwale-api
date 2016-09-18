<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template 
{
	var $ci;
	 
	function __construct() 
	{
		$this->ci =& get_instance();
	}
	
	function load($tpl_view, $data = null) {	
		
	
        if ( file_exists( APPPATH.'views/'.$tpl_view ) ) 
        {
            $body_view_path = $tpl_view;
        }
        else if ( file_exists( APPPATH.'views/'.$tpl_view.'.php' ) ) 
        {
            $body_view_path = $tpl_view.'.php';
        }
        else
        {
            show_error('Unable to load the requested file: ' . $tpl_name.'/'.$view_name.'.php');
        }
         
        $body = $this->ci->load->view($body_view_path, $data, TRUE);
        
        
        if ( is_null($data) ) 
        {
            $data = array('body' => $body);
        }
        else if ( is_array($data) )
        {
            $data['body'] = $body;
        }
        else if ( is_object($data) )
        {
            $data->body = $body;
        }
        
    //$this->router->fetch_class();
	if($this->ci->router->fetch_method() == "login") {
		$this->ci->load->view('layouts/login', $data);
	} else {
		$this->ci->load->view('layouts/default', $data);	
	}
	
    
	}
}
