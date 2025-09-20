<?php defined('BASEPATH') or exit('No direct script access allowed');

class Questionip_model extends CI_Model
{

	private $table = "setup";

	public function create($data = [])
	{
		// print_r($data);
		$data['guid'] = time();
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{

		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id', $id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('id', $data['id'])
			->update($this->table, $data);
	}

	public function patient_discharge($data = [])
	{
		return $this->db->where('id', $data['id'])
			->update($this->table, $data);
	}
}
