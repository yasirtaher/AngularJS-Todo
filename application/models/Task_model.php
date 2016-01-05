<?php

class Task_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get('user');
		return $query->result();
	}
	
	public function get_task($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('task');
		return $query->result();
	}
	
	public function delete_task($id)
	{
		$this->db->where('user_id',$id);
		$this->db->delete('user');
	}
	
	public function update_task($id, $data)
	{
		$this->db->where('user_id',$id);
		$this->db->update('user',$data);
	}
}