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

class Contact_model extends CI_Model
{
	public $table =  "contacts";
	
	/** Return All Contacts
	
	*/
	public function getAllContacts() {
		$this->db->select('*, contacts.id as contact_id')
				->from($this->table)
				->join('categories','categories.id = contacts.category_id','left')
				->order_by('name');
		$query = $this->db->get();
		return $query->result_array();
	}


	/** Return All Email Contacts
	
	*/
	public function getAllEmailContacts() {
		$this->db->select('*, contacts.id as contact_id')
				->from($this->table)
				->join('categories','categories.id = contacts.category_id','left')
				->order_by('category_id');
		$query = $this->db->get();
		return $query->result_array();
	}



	public function create($data=array()) {
		
		$data['created_on'] = date('Y-m-d H:i:s');

		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function getContactByParam($param=null,$value=null) {
		if($param && $value)
		{
			$this->db->select('*,contacts.id as contact_id')
				->from($this->table)
				->join('categories','categories.id = contacts.category_id','left')
				->where($this->table.".".$param,$value);
			$query = $this->db->get();

			if($query->result_array())
			{
				return $query->result_array();	
			}

		}
		return false;
	}

	public function update($id,$data=array())
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}

	public function deleteContactById($id=null) 
	{
		if($id)
		{
			$backupSql = "Insert into delete_contacts select * from contacts WHERE id=$id";

			$query = $this->db->query($backupSql);

			$this->db->where('id',$id);
			$this->db->delete($this->table);
			return true;
		}
	}

	public function searchResult($param=null)
	{
		if($param)
		{
			$this->db->select('*, contacts.id as contact_id')
					->from($this->table)
					->like('name', $param)
					->or_like('company_name', $param)
					->or_like('mobile', $param)
					->or_like('contact_number', $param)
					->or_like('address_one', $param)
					->or_like('address_two', $param)
					->or_like('city', $param)
					->or_like('state', $param)
					->or_like('zip', $param)
					->or_like('email_id_one', $param)
					->or_like('reference_name', $param)
					->or_like('notes', $param)
					->join('categories', 'categories.id = contacts.category_id', 'left')
					->order_by('contacts.name');

			$query = $this->db->get();

			return $query->result_array();
		}

		return false;
	}
}


