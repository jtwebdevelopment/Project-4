<?php

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}	
		
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			die();		
		}		
	}	

	function admin_area()
	{
		$data = array();
		
		//ophalen van alle gebruikersinfo
		if($usersQuery = $this->site_model->get_users())
		{
			$data['users'] = $usersQuery;
			$data['idAccountType'] = $this->session->userdata('idAccountType');
			
			//ophalen van alle notities info
			if($notesQuery = $this->site_model->get_notes())
			{
				$data['notes'] = $notesQuery;
			}
		}

		$this->load->view('admin_area', $data);
	}
	
	/*function student_area()
	{
		$this->load->view('student_area');
	}
	
	function teacher_area()
	{
		$this->load->view('teacher_area');
	}
	
	function parent_area()
	{
		$data = array();
		
		if($query = $this->site_model->get_notes())
		{
			$data['records'] = $query;
		}
	
		$this->load->view('parent_area', $data);
	}*/

//crud acties voor de usertabel//////////////////////////////////////////	
	function read_user()
	{
		$data = array();
		
		if($query = $this->site_model->get_user())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('admin_area', $data);
	}
	
	function create_user()
	{
		$data = array(
			'voornaam' => $this->input->post('firstname'),
			'achternaam' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'password' =>  md5($this->input->post('password')),
			'idAccountType' => $this->input->post('accountType')
		);
		
		$this->site_model->add_user($data);
		$this->read_user();
	}
	
	function update_user()
	{
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
				'voornaam' => $this->input->post('firstname'),
				'achternaam' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'password' =>  md5($this->input->post('password')),
				'idAccountType' => $this->input->post('accountType')
			);
		
			$this->site_model->update_user($data);
		}
		$this->read_user();
	}
	
	
	function delete_user()
	{
		$this->site_model->delete_user();
		$this->read_user();
	}

//crud acties voor de opdrachtentabel//////////////////////////////////////////
/*		
function read_assignment()
	{
		$data = array();
		
		if($query = $this->site_model->get_notes())
		{
			$data['notes'] = $query;
		}
		
		$this->load->view('admin_area', $data);
	}
	
	function create_assignment()
	{
		$data = array(
			'idOpdracht' => $this->input->post('idOpdracht'),
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
		);
		
		$this->site_model->add_assignment($data);
		$this->read_assignment();
	}
	
	function update_assignment()
	{
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
			'idOpdracht' => $this->input->post('idOpdracht'),
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
		);
			$this->site_model->update_assignment($data);
		}
		$this->read_assignment();
	}
	
	
	function delete_assignment()
	{
		$this->site_model->delete_assignment();
		$this->read_assignment();
	}*/
//crud acties voor de notitiestabel//////////////////////////////////////////

function read_note()
	{
		$data = array();
		
		if($query = $this->site_model->get_notes())
		{
			$data['notes'] = $query;
		}
		
		$this->load->view('admin_area', $data);
	}
	
	function create_note()
	{
		$data = array(
			'idOpdracht' => $this->input->post('idOpdracht'),
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
		);
		
		$this->site_model->add_note($data);
		$this->read_note();
	}
	
	function update_note()
	{
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
			'idOpdracht' => $this->input->post('idOpdracht'),
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
		);
			$this->site_model->update_note($data);
		}
		$this->read_note();
	}
	
	
	function delete_note()
	{
		$this->site_model->delete_note();
		$this->read_note();
	}	

}
