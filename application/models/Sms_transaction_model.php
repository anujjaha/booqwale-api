<?php
class Sms_transaction_model extends CI_Model {

	public function __construct()
    {
		parent::__construct();
	}
	
    public $table = "sms_transaction";
    
	public function insert_sms($data) {
		$data['created'] = date('Y-m-d H:i:s');
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function getAllSms()
	{
		$this->db->select('*, sms_transaction.id as sms_id')
			->from($this->table)
			->join('contacts', 'contacts.id = sms_transaction.contact_id', 'left')
			->order_by('sms_transaction.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}
	
}
