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

class Daily_deal_model extends CI_Model
{
	public $table 			=  "deals_of_day";
	public $tableAssociate 	=  "associates";

	public function getAllDailyDeals()
	{
		$this->db->select('*, deals_of_day.id as id')
				->from($this->table)
				->join($this->tableAssociate, 'associates.id = deals_of_day.associate_id', 'left')
				->order_by('deals_of_day.id', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function getAllDailyDealsByAssociateId($param, $value)
	{
		$this->db->select('*, deals_of_day.id as id')
				->from($this->table)
				->join($this->tableAssociate, 'associates.id = deals_of_day.associate_id', 'left')
				->where($this->table.$param, $value)
				->order_by('deals_of_day.id', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function getDailyDealsById($id = null)
	{
		if($id)
		{
			$this->db->select('*, deals_of_day.id as id')
					->from($this->table)
					->join($this->tableAssociate, 'associates.id = deals_of_day.associate_id', 'left')
					->where('deals_of_day.id', $id)
					->order_by('deals_of_day.id', 'DESC');
			$query = $this->db->get();

			return $query->row();	
		}
		
		return array();
	}
	

	public function create($data=array())
	{
		$data['created_at'] = date('Y-m-d H:i:s');

		if(!isset($data['image']) && empty($data['image']))
		{
			$data['image'] = "default.jpg";	
		}

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getBannersByParam($param=null, $value=null) {
		if($param && $value)
		{
			$this->db->select('*')
				->from($this->table)
				->where($this->table.".".$param,$value);
			$query = $this->db->get();

			if($query->result_array())
			{
				return $query->result_array();	
			}

		}
		return false;
	}

	public function update($id, $data=array())
	{
		$this->db->where('id',$id);
		$this->db->update($this->table, $data);
	}

	public function deleteDailyDealById($id=null) 
	{
		if($id)
		{
			$this->db->where('id', $id);
			$this->db->delete($this->table);
			return true;
		}
		return false;
	}
}


