<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	
	public function login($username)
	{
		$this->db->from("users");
		$this->db->where("username",$username);
		return $this->db->get()->row();
	}
	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}
	public function searchKeyword($keyword)
	{
		$this->db->from('materials');
		$this->db->like('title',$keyword);
		$this->db->or_like('username',$keyword);
		$this->db->or_like('m_id',$keyword);
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->join('categories', 'categories.code = materials.category');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
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
	public function getTableSort($table,$col,$sort)
	{
		$this->db->from($table);
		$this->db->order_by($col,$sort);
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
	public function getUploads($username)
	{
		$this->db->from("materials");
		$this->db->where("username",$username);
		$this->db->where("status",'1');
		$this->db->join('file_types', 'file_types.type = materials.type');
		$this->db->order_by('up_date','DESC');
		$this->db->order_by('up_time','DESC');
		return $this->db->get()->result();
	}
}

?>