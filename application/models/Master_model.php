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

class Master_model extends CI_Model
{
	public $table =  "module_manager";
	
	public function get_all_modules($like=null,$offset=0,$limit=10) {
		$this->db->select('*')
				->from($this->table)
				->order_by('module_name');
                
                if(isset($like)) {
                    $this->db->or_like("module_name",$like);
                    $this->db->or_like("module_alias_name",$like);
                }
                
                $this->db->limit($limit,$offset);
                
		$query = $this->db->get();
		return $query->result_array();
	}
        
        public function count_all() {
            $this->db->select('count(id) as total_records')
                     ->from($this->table);
            $query = $this->db->get();
            return $query->row();
                      
        
        }
	
	public function save($data) {
            $data['created_on'] = date('Y-m-d H:i:s');
            $table_query = $data['schema'];
            $data['schema'] = json_encode($data['schema']);
            $data['fields'] = json_encode($data['fields']);
            $this->db->insert($this->table,$data);
            
            // Print Last Executed Query
            //echo $this->db->last_query();
            
            // Create New Table
            $this->db->query($table_query);
            return true;
        }
        
        public function get_module($id=null) {
            if($id) {
                $this->db->select('*')
                        ->from($this->table)
                        ->where('id',$id);
                $query = $this->db->get();
                return $query->row();
            }
        }
        public function delete($id=null) {
           if($id) {
               $module_info = $this->get_module($id);
               $this->db->where("id",$id);
               $this->db->delete($this->table);
               delete_module(strtolower( str_replace(" ","_",$module_info->module_name)));
               $sql = "DROP TABLE ".strtolower( str_replace(" ","_",$module_info->module_name));
               $this->db->query($sql);
               return true;
           }
           return false;
        }
        
}
