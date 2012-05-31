<?php

class Site_model extends CI_Model {
	

//crud acties voor de usertabel//////////////////////////////////////////	
	function get_users()
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
			
//crud acties voor de opdrachtentabel//////////////////////////////////////////
	
	/*function get_notes()
	{
		//haal alle notities op en sorteer ze op hun opdrachtid (laag naar hoog)
		$query = $this->db->query('SELECT * FROM `notitie` order by idOpdracht Asc');
		return $query->result();
	}
	
	function add_note($data) 
	{
		$this->db->insert('notitie', $data);
		return;
	}
	
	function update_note($data) 
	{
		$this->db->where('idNotitie', $this->uri->segment(3));
		$this->db->update('notitie', $data);
	}
	
	function delete_note()
	{
		$this->db->where('idNotitie', $this->uri->segment(3));
		$this->db->delete('notitie');
	}*/
		
//crud acties voor de notitietabel//////////////////////////////////////////
	
	function get_notes()
	{
		//haal alle notities op en sorteer ze op hun opdrachtid (laag naar hoog)
		$query = $this->db->query('SELECT * FROM `notitie` order by idOpdracht Asc');
		return $query->result();
	}
	
	function add_note($data) 
	{
		$this->db->insert('notitie', $data);
		return;
	}
	
	function update_note($data) 
	{
		$this->db->where('idNotitie', $this->uri->segment(3));
		$this->db->update('notitie', $data);
	}
	
	function delete_note()
	{
		$this->db->where('idNotitie', $this->uri->segment(3));
		$this->db->delete('notitie');
	}
	
}