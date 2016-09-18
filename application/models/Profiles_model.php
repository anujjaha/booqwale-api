<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
                class Profiles_model extends CI_Model
                {
                    public $table =  "profiles";
                    public $primary_key =  "id";
                    
                    public function create($data=array()) {
                            if($data) {
                                    $this->db->insert($this->table,$data);
                                    return $this->db->insert_id();
                            }
                            return false;
                    }	
                    
                    public function get_all_list($like=null,$offset=0,$limit=10) {
                            $this->db->select("*")
				->from($this->table)
				->order_by($this->primary_key);if(isset($like)) { $this->db->or_like("id",$like);$this->db->or_like("name",$like);$this->db->or_like("age",$like);$this->db->or_like("mobile",$like);$this->db->or_like("contact_number",$like);$this->db->or_like("email_id",$like);
                                
                            }

                            $this->db->limit($limit,$offset);

                            $query = $this->db->get();
                            return $query->result_array();
                    }
                    
                    public function count_all() {
                        $this->db->select("count(".$this->primary_key.") as total_records")
                                ->from($this->table);
                        $query = $this->db->get();
                        return $query->row();
                    }

                    public function update($id =null, $data=array()) {
                            if($id) {
                                    $this->db->where($this->primary_key,$id);
                                    $this->db->update($this->table,$data);
                                    return true;
                            }
                            return false;
                    }	

                    public function view($id=null) {
                            if($id) {
                                    $this->db->select("*")
                                                    ->from($this->table)
                                                    ->where($this->primary_key,$id);
                                    $query = $this->db->get();
                                    return $query->row();
                            }
                            return false;
                    }
                    
                    public function get_all() {
                            $this->db->select("*")
                            ->from($this->table)
                            ->order_by($this->primary_key);
                            $query = $this->db->get();
                            return $query->result_array();
                    }
                    
                    public function get_single($id=null) {
                        if($id) {
                            $this->db->select("*")
                            ->from($this->table)
                            ->where($this->primary_key,$id)
                            ->order_by($this->primary_key);
                            $query = $this->db->get();
                            return $query->row();
                        }
                        return false;
                    }

                    public function delete($id=null) {
                        if($id) {
                            $this->db->where($this->primary_key,$id);
                            $this->db->delete($this->table);
                            return true;
                        }
                        return false;
                    }        
                }