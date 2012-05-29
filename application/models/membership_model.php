<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('gebruiker');
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				$data = array(
					'idAccountType' => $row->idAccountType
				);
			}
		
			$this->session->set_userdata($data);
			
			return true;
		}
		
	}
	
	function create_member()
	{
		$new_member_insert_data = array(
			'voornaam' => $this->input->post('first_name'),
			'achternaam' => $this->input->post('last_name'),
			'email' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('gebruiker', $new_member_insert_data);
		return $insert;
	}
	
	function check_exist_username($username)
	{
		$query_str = 'SELECT username FROM gebruiker WHERE username = ?';
		$result = $this->db->query($query_str, $username);

		$this->db->where('username',$username);
		$result = $this->db->get('gebruiker');

		if ($result->num_rows() > 0)
		{
			//username exist
			return true;
		}
		else
		{
			//username doesn’t exist
			return false;
		}
	}
}