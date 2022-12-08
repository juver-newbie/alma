<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IMDP_model extends CI_Model {

	
	public function getSuperAdmin($username)
	{
		$this->db->from("superadmin");
		$this->db->where("username",$username);
		return $this->db->get()->row();
	}
	public function checkUsername($username)
	{
		$this->db->from("admin");
		$this->db->where("username",$username);
		return $this->db->get()->num_rows();
	}
	public function checkExist($table,$col,$data)
	{
		$this->db->from($table);
		$this->db->where($col,$data);
		return $this->db->get()->num_rows();
	}
	public function searchKeyword($keyword)
	{
		$this->db->from('materials');
		$this->db->where("status","1");
		$this->db->like('title',$keyword);
		$this->db->or_like('description',$keyword);
		$this->db->or_like('username',$keyword);
		$this->db->or_like('m_id',$keyword);
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
	}
	public function getMaterials()
	{
		$this->db->select('*');
		$this->db->from('materials');
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
	}
	public function getConfirmedMaterials()
	{
		$this->db->select('*');
		$this->db->from('materials');
		$this->db->where("status","1");
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
	}
	public function getUnConfirmedMaterials()
	{
		$this->db->select('*');
		$this->db->from('materials');
		$this->db->where("status","0");
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
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
	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}
	public function update($table,$data,$col,$id)
	{
		$this->db->where($col,$id);
		$this->db->update($table,$data);
	}
	public function acceptMaterial($id,$data)
	{
		$this->db->where('m_id',$id);
		$this->db->update('materials',$data);
	}
	public function delete($table,$col,$id)
	{
		$this->db->where($col,$id);
		$this->db->delete($table);
	}
	public function getTable($table)
	{
		$this->db->from($table);
		return $this->db->get()->result();
	}
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
	public function getLogs($id)
	{
		$this->db->from('superadmin_logs');
		$this->db->where('s_id',$id);
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();
	}
	public function getTableSort($table,$col,$sort)
	{
		$this->db->from($table);
		$this->db->order_by($col,$sort);
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
          	$this->db->where('thread',$postData['thread']);
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
          $records = $this->db->get('messages');
          $response = $records->result_array();
     
        }
        return $response;
	}
}
?>