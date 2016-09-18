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

class Email_model extends CI_Model
{
	public $table         =  "email_transaction";
	public $tableContacts =  "contacts";
	
	public function create($campaignId=null, $content, $contacts) {

		$contacts = explode(",", $contacts);

		$created  = date('Y-m-d H:i:s');

		$counter  = 0;
		foreach($contacts as $contactId)
		{
			if($contactId) 
			{
				$emailTransaction = array(
									"campaign_id" => $campaignId,
									"contact_id"  => $contactId,
									"content"	  => $content,
									"created_on"  => $created
								);	
				$this->db->insert($this->table, $emailTransaction);

				$counter++;
			}
			continue;
			
		}
		
		return $counter;
	}

	public function update($id,$data=array())
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}


	public function getAllSentItems()
	{
		$this->db->select('*, email_transaction.id as email_transaction_id, email_transaction.created_on as email_created_on, ')
				->from($this->table)
				->join('contacts','contacts.id = email_transaction.contact_id', 'left')
				->join('campaign','campaign.id = email_transaction.campaign_id', 'left')
				->order_by('email_transaction.id', 'desc');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function  sendSms($receiver, $content = null)
	{
		$this->db->select('*')
				->from($this->tableContacts )
				->where_in('id', explode(",", $receiver))
				->order_by('id');
		$query = $this->db->get();

		$result = $query->result_array();

		foreach($result as $data)
		{
			$smsContent = "Hello ". $data['name']. ", ". $content ." Thanks Krishna Multi Print";

			send_sms("", $data['id'], $data['mobile'], $smsContent);
		}
	}

}


