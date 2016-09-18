<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
*
* Version: 2.5.2
*
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*	  	   @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Last Change: 3.22.13
*
* Changelog:
* * 3-22-13 - Additional entropy added - 52aa456eef8b60ad6754b31fbdcc77bb
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class User_model extends CI_Model
{
	public $table          =  "users";
	public $table_role     =  "users_groups";
	public $table_settings = "site_settings";
	
	public function get_all_users() {
		$this->db->select('*')
				->from($this->table)
				->order_by('first_name');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function filter_users($like,$offset,$limit) {
		$this->db->select('*,groups.name as user_type, groups.description as user_role')
				->from($this->table);
				
		if(!empty($like)) {
			$this->db->or_like('first_name',$like);
			$this->db->or_like('last_name',$like);
			$this->db->or_like('username',$like);
			$this->db->or_like('phone',$like);
			$this->db->or_like('email',$like);
			$this->db->or_like('groups.description',$like);
		}
		
		$this->db->join("users_groups","users.id=users_groups.user_id",'left');
		$this->db->join("groups","groups.id=users_groups.group_id",'left');
		
		if(!empty($offset) && !empty($limit)) {
			$this->db->limit($limit, $offset); 
		}
				
		$query = $this->db->get();
		
		
		//echo $this->db->last_query();
		return $query->result_array();
	}
        
        public function create_user($role_id,$data=array()) {
            if(isset($data)) {
                $this->db->insert($this->table,$data);
                $user_id = $this->db->insert_id();
                $this->create_user_role($user_id,$role_id);
                return $user_id;
            }
        return false;
        }
        public function create_user_role($user_id,$role_id) {
            $data = array('user_id'=>$user_id,'group_id'=>$role_id);
            $this->db->insert($this->table_role,$data);
        return true;
        }
        

    public function getUserSettings()
    {
    	$this->db->select('*')
    			->from($this->table_settings);

    	$query = $this->db->get();

    	return $query->result_array();
    }

    public function updateUserSettings($data)
    {
    	foreach($data as $key => $value)
    	{
    		$this->db->where('site_key', $key);
    		$this->db->update($this->table_settings, array('site_value' => $value));
    	}
    	return true;
    }
}
