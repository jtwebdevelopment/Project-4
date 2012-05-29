<?php

class Site_model extends CI_Model {
	
	function get_user()
	{
		$query = $this->db->get('gebruiker');
		return $query->result();
	}
	
	function add_user($data) 
	{
		$this->db->insert('gebruiker', $data);
		return;
	}
	
	function update_user($data) 
	{
		$this->db->where('idGebruiker', $this->uri->segment(3));
		$this->db->update('gebruiker', $data);
	}
	
	function delete_user()
	{
		$this->db->where('idGebruiker', $this->uri->segment(3));
		$this->db->delete('gebruiker');
	}
	
	function get_records()
	{
		$query = $this->db->get('notitie');
		return $query->result();
	}
	
}