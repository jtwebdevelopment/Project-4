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
	function get_associated_notes()
	{
		//haal alle opdrachten op en sorteer ze op hun opdrachtid (laag naar hoog)
		//$query = $this->db->query('SELECT * FROM `notities` WHERE id= order by idOpdracht Asc');              //aanpassen nar ui
		$query = $this->db->get_where('notitie', array('idOpdracht' => $this->uri->segment(3)));
		return $query->result();
	}
	
	
	function get_assignments()
	{
		//haal alle opdrachten op en sorteer ze op hun opdrachtid (laag naar hoog)
		$query = $this->db->query('SELECT * FROM `opdracht` order by idOpdracht Asc');
		return $query->result();
	}
	
	function add_assignment($data) 
	{
		$this->db->insert('opdracht', $data);
		return;
	}
	
	function update_assignment($data) 
	{
		$this->db->where('idOpdracht', $this->uri->segment(3));
		$this->db->update('opdracht', $data);
	}
	
	function delete_assignment()    
	{
		$this->db->where('idOpdracht', $this->uri->segment(3));
		$this->db->delete('opdracht');
	}
		
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