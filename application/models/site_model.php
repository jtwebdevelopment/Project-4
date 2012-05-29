<?php

class Site_model extends CI_Model {
	
	function get_user()
	{
		//haal alle gebruikers op en sorteer ze op hun accountType (admin, ouder, docent of leerling)
		$query = $this->db->query('SELECT * FROM `gebruiker` order by idAccountType Asc');
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