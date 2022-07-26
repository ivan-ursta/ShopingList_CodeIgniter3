<?php

class Home_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function getRecords(){
		$res = $this->db->get('records');
		return $res->result_array();
	}
	public function getCategory(){
		$res = $this->db->get('category');
		return $res->result_array();
	}
	public function addNewCategory($data){
		$insert = $this->db->insert('category',$data);
		if($insert){
			return $this->db->insert_id();
		}
		else{
			return false;
		}
	}
	public function addNewRecord($data){
		$insert = $this->db->insert('records',$data);
		if($insert){
			return $this->db->insert_id();
		}
		else{
			return false;
		}
	}
	public function purchased($data,$id){
		$this->db->where('id', $id);
		$this->db->update('records',$data);
		return true;
	}
	public function deleteRow($data){
		$this->db->where('id', $data['id']);
		$this->db->delete('records');
		return true;
	}
	public function filterByStatus($status){
		$this->db->where('recStatus', $status);
		$res = $this->db->get('records');
		return $res->result_array();
	}
	public function filterByCategory($categoryId){
		$this->db->where('categoryId', $categoryId);
		$res = $this->db->get('records');
		return $res->result_array();
	}
}

