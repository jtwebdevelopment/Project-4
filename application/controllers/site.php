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

	function home()
	{
		//om alle opdrachten op te halen
		$data = array();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
		}
		
		$this->load->view('home', $data);
	}
	
	function crud_gebruikers()
	{
		$data = array();
		
		//ophalen van alle gebruikersinfo
		if($usersQuery = $this->site_model->get_users())
		{
			$data['users'] = $usersQuery;
			$data['idAccountType'] = $this->session->userdata('idAccountType');
		}

		$this->load->view('crud_gebruikers', $data);
	}
	
	function crud_opdrachten()
	{
		$data = array();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
		}
			
		$this->load->view('crud_opdrachten', $data);
	}
	
	function crud_notities()
	{
		$data = array();
		
		//ophalen van alle notities info
		if($notesQuery = $this->site_model->get_notes())
		{
			$data['notes'] = $notesQuery;
		}
		
		$this->load->view('crud_notities', $data);
	}

//crud acties voor de usertabel//////////////////////////////////////////	
	function read_user()
	{
		$data = array();
		
		if($query = $this->site_model->get_user())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('crud_gebruikers', $data);
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

function get_associated_notes()
	{
		$data = array();
		
		if($associatedNotesQuery = $this->site_model->get_associated_notes())
		{
			$data['associatedNotes'] = $associatedNotesQuery;
		}
		
		$this->load->view('single_assignment', $data);
	}	

	
function read_assignment()
	{
		$data = array();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
		}
		
		$this->load->view('crud_opdrachten', $data);
	}
	
	function create_assignment()
	{
		$data = array(
			
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
			'Deadline' => $this->input->post('deadline'),
		);
		
		$this->site_model->add_assignment($data);
		$this->read_assignment();
	}
	
	function update_assignment()
	{
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
			'Deadline' => $this->input->post('deadline'),
		);
			$this->site_model->update_assignment($data);
		}
		$this->read_assignment();
	}
	
	
	function delete_assignment()                      //deze werkt nog niet als er notities zijn die bij deze opdracht horen////////////////////////////
	{
		$this->site_model->delete_assignment();
		$this->read_assignment();
	}
	
//crud acties voor de notitiestabel//////////////////////////////////////////

	function read_note()
	{
		$data = array();
		
		if($query = $this->site_model->get_notes())
		{
			$data['notes'] = $query;
		}
		
		$this->load->view('crud_notities', $data);
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
