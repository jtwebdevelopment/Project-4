<?php

class Site_model extends CI_Model {
	
	function get_records()
	{
		$query = $this->db->get('gebruiker');
		return $query->result();
	}
	
	function add_record($data) 
	{
		$this->db->insert('gebruiker', $data);
		return;
	}
	
	function update_record($data) 
	{
		$this->db->where('idGebruiker', $this->uri->segment(3));
		$this->db->update('gebruiker', $data);
	}
	
	function delete_row()
	{
		$this->db->where('idGebruiker', $this->uri->segment(3));
		$this->db->delete('gebruiker');
	}
	
}