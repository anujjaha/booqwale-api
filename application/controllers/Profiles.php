<?php
            defined("BASEPATH") OR exit("No direct script access allowed");
            class profiles extends CI_Controller {

                    public function __construct() {
                            parent::__construct();
                            $this->load->model("profiles_model");
                    }
                    
                    public function index() {
                        $data["data"] = $this->profiles_model->get_all();
                        $this->template->load("profiles/index",$data);
                    }   
                    public function add() {
                        
                        if($this->input->post()) {
                    
                        $save_data["id"] = $this->input->post("id");$save_data["name"] = $this->input->post("name");$save_data["age"] = $this->input->post("age");$save_data["mobile"] = $this->input->post("mobile");$save_data["contact_number"] = $this->input->post("contact_number");$save_data["email_id"] = $this->input->post("email_id");
                                $this->profiles_model->create($save_data);
                                redirect("profiles/index","refresh");
                                }
                                $this->template->load("profiles/add");
                    }

                    public function edit($id=null) {
                            $data = array();
                            
                            if($this->input->post()) {
                            $id = $this->input->post("id");
                            $save_data["name"] = $this->input->post("name");$save_data["age"] = $this->input->post("age");$save_data["mobile"] = $this->input->post("mobile");$save_data["contact_number"] = $this->input->post("contact_number");$save_data["email_id"] = $this->input->post("email_id");
                                $this->profiles_model->update($id,$save_data);
                                redirect("profiles/index","refresh");
                                }

                            $data["record"] = $this->profiles_model->get_single($id);
                            $this->template->load("profiles/edit",$data);
                    }

                    public function view($id) {
                            $data = array();
                            $this->template->load("profiles/view",$data);
                    }

                    public function delete($id) {
                        if($id) {
                            $this->profiles_model->delete($id);
                        }   
                        redirect("profiles/index","refresh");
                    }
                    
                    public function ajax_list() {
                        $offset = 0;
                        $limit = 10;
                        if ( isset( $_GET["start"] ) && $_GET["start"] != "-1"  ) {
                            $offset = $_GET["start"];
                            $limit = $_GET["length"];
                        }
                    
                        $like = "";
                        if (isset( $_GET["search"]["value"] ) &&   $_GET["search"]["value"] != "" ) {
                            $like =  $_GET["search"]["value"];
                        }
                    
                        $records = $this->profiles_model->get_all_list($like,$offset,$limit);
                        $total_modules = $this->profiles_model->count_all();
                        $iTotal = $total_modules->total_records;
                        $init_val = 1;
                        if(isset($_GET["draw"])) {
                                $init_val = $_GET["draw"];
                        }
                        $output = array(  "recordsTotal" => $iTotal,"recordsFiltered" => $iTotal, "data"=>array());	
                        $sr=0;
                    foreach($records as $record) {
                    
                        
                        $output["data"][$sr] = array($sr+1,$record["name"],$record["age"],$record["mobile"],$record["contact_number"],$record["email_id"],"<a href=".site_url()."profiles/edit/".$record["id"].">Edit</a>","<a href=".site_url()."profiles/delete/".$record["id"].">Delete</a>");
                        $sr++;
                    }
                    echo json_encode($output);
                    die;
                            
                    }
                    
            }