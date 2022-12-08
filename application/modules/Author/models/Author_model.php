<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_model extends CI_Model {


	public function getRow($table,$row,$data)
	{
		$this->db->from($table);
		$this->db->where($row,$data);
		return $this->db->get()->row();
	}
	public function getResult($table,$row,$data)
	{
		$this->db->from($table);
		$this->db->where($row,$data);
		return $this->db->get()->result();
	}
	public function getTable($table)
	{
		$this->db->from($table);
		return $this->db->get()->result();
	}
	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}
	public function update($table,$data,$col,$id)
	{
		$this->db->where($col,$id);
		$this->db->update($table,$data);
	}
	public function delete($table,$col,$id)
	{
		$this->db->where($col,$id);
		$this->db->delete($table);
	}
	public function getAuthorUploads($username)
	{
		$this->db->select('*');
		$this->db->from('materials');
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->join('categories', 'categories.code = materials.category');
		$this->db->where('username',$username);
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
	}
	public function getLogs($id)
	{
		$this->db->select('*');
		$this->db->from('admin_logs');
		$this->db->where('a_id',$id);
		$this->db->where('a_date',date('m-d-Y'));
		$this->db->order_by('a_time','DESC');
		return $this->db->get()->result();
	}
	public function getLastID($table)
	{
		$this->db->from($table);
		$this->db->select_max("id");
		return $this->db->get()->row();
	}
	public function getChats($postData=array())
	{
		$response = array();
		if(isset($postData['username']) ){
     
          // Select record
          $this->db->select('*');
          $this->db->where('author', $postData['username']);
          $records = $this->db->get('messages');
          $response = $records->result_array();
     
        }
        return $response;
	}
	public function setRead($postData=array())
	{
		$data = ['status'=>'0'];
		$response = array();
		if(isset($postData['id']) ){
          	$this->db->where('id',$postData['id']);
          	$this->db->where('thread','0');
			$this->db->update('messages',$data);
        }
        return true;
	}
	public function getUnread($postData=array())
	{
		$response = array();
		if(isset($postData['status']) ){
     
          // Select record
          $this->db->select('*');
          $this->db->where('status', $postData['status']);
          $this->db->where('thread', '0');
          $records = $this->db->get('messages');
          $response = $records->result_array();
     
        }
        return $response;
	}
	public function getUploads($username)
	{
		$this->db->from("materials");
		$this->db->where("username",$username);
		$this->db->where("status",'1');
		return $this->db->get()->result();
	}
	public function getRequests($username)
	{
		$this->db->from("materials");
		$this->db->where("username",$username);
		$this->db->where("status",'0');
		return $this->db->get()->result();
	}
}
?>