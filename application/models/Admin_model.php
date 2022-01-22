<?php
class Admin_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		//$this->db->db_debug = false;
	}
	
	public function get_eotlist(){
		// $table=TP."eotrequestform";
		$this->db->select('t2.name,t1.*');
		$this->db->from('eotrequestform t1');
		$this->db->join('customer t2','t1.cust_id=t2.id','left');
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result_array();

		}
		else
		{
			return false;
		}

	}

	public function sendQuotation($data){
		$result = $this->db->insert('sendquotation',$data);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function get_gantrylist(){
		$this->db->select('t2.name,t1.*');
		$this->db->from('gantrycrane t1');
		$this->db->join('customer t2','t1.cust_id=t2.id','left');
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result_array();

		}
		else  
		{
			return false;
		}
	}

	public function get_jiblist(){
		$this->db->select('t2.name,t1.*');
		$this->db->from('jibcrane t1');
		$this->db->join('customer t2','t1.cust_id=t2.id','left');
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result_array();
		}
		else  
		{
		   return false;
		}
	}

	public function get_monorail(){
		$this->db->select('t2.name,t1.*');
		$this->db->from('monorailcrane t1');
		$this->db->join('customer t2','t1.cust_id=t2.id','left');
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result_array();
		}
		else  
		{
		   return false;
		}
	}

	public function get_electricwire(){
		$this->db->select('t2.name,t1.*');
		$this->db->from('electricwire t1');
		$this->db->join('customer t2','t1.cust_id=t2.id','left');
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result_array();
		}
		else  
		{
		   return false;
		}
	}


}?>