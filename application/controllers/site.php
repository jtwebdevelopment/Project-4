<?php

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}	
		
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'U moet ingelogt zijn om deze pagina te zien, <a href="' . base_url() . 'index.php/site/home"> login </a>';	
			die();
		}	
	}	

	function home()
	{
		//om alle opdrachten op te halen
		$data = array();
				
		$associatedNotesQuery = $this->site_model->get_associated_notes();
		
		$usersQuery = $this->site_model->get_users();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
			$data['associatedNotes'] = $associatedNotesQuery;
			$data['is_logged_in'] = $this->session->userdata('is_logged_in');
			$data['javascriptPhpCombo'] = $this->load->view('includes/javascriptPhpCombo', '', TRUE);
			$data['idAccountType'] = $this->session->userdata('idAccountType');
		}
		
		$this->load->view('home', $data);
	}
	
	function crud_gebruikers()
	{
		$this->is_logged_in();
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
		$this->is_logged_in();
		$data = array();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
		}
			
		$this->load->view('crud_opdrachten', $data);
	}
	
	function crud_notities()
	{
		$this->is_logged_in();
		$data = array();
		
		//ophalen van alle notities info
		if($notesQuery = $this->site_model->get_notes())
		{
			//haalt alle opdrachten op
			$assignmentsQuery = $this->site_model->get_assignments();
			
			$data['notes'] = $notesQuery;
			$data['assignments'] = $assignmentsQuery;
			
		}
		
		$this->load->view('crud_notities', $data);
	}
	
	function get_all_data_from_this_note()
	{
		$this->is_logged_in();
		
		$data = array();
		
		$allDataQuery = $this->site_model->get_all_data_from_this_note();
		
		if($this->site_model->get_all_data_from_this_note())
		{
			$data['allData'] = $allDataQuery;
		}
	
		$data['accountType'] = $this->session->userdata('idAccountType');
		$this->load->view('single_note', $data);
	}

//crud acties voor de usertabel//////////////////////////////////////////	
	function read_user()
	{
		$this->is_logged_in();
		$data = array();
		
		if($query = $this->site_model->get_users())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('crud_gebruikers', $data);
	}
	
	function create_user()
	{
		$this->is_logged_in();
		$data = array(
			'voornaam' => $this->input->post('firstname'),
			'achternaam' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'password' =>  md5($this->input->post('password')),
			'idAccountType' => $this->input->post('accountType')
		);
		
		$this->site_model->add_user($data);
		$this->read_user();
		
		//redirect terug naar crud gebruikers
		redirect('site/crud_gebruikers');
	}
	
	function update_user()
	{
		$this->is_logged_in();
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
		$this->is_logged_in();
		
		$this->site_model->delete_user();
		$this->read_user();
		
		//redirect terug naar crud gebruikers
		redirect('site/home');
	}

//crud acties voor de opdrachtentabel//////////////////////////////////////////

function get_associated_notes()
	{
		$this->is_logged_in();
		
		$data = array();
		
		$associatedNotesQuery = $this->site_model->get_associated_notes();
		$assignmentNameQuery = $this->site_model->get_assignment();
		
		$usersQuery = $this->site_model->get_users();
		
		if($this->site_model->get_associated_notes())
		{
			$data['associatedNotes'] = $associatedNotesQuery;
			$data['assignmentName'] = $assignmentNameQuery;
			$data['idAccountType'] = $this->session->userdata('idAccountType');
		}
		$data['javascriptPhpCombo'] = $this->load->view('includes/javascriptPhpCombo', '', TRUE);
		$this->load->view('single_assignment', $data);
	}	

	
function read_assignment()
	{
		$this->is_logged_in();
		$data = array();
		
		if($assignmentsQuery = $this->site_model->get_assignments())
		{
			$data['assignments'] = $assignmentsQuery;
		}
		
		$data['accountType'] = $this->session->userdata('idAccountType');
		$this->load->view('crud_opdrachten', $data);
	}
	
	function create_assignment()
	{
		$this->is_logged_in();
		
		$data = array(
			
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
			'Deadline' => $this->input->post('deadline'),
		);
		
		$this->site_model->add_assignment($data);
		$this->read_assignment();
		
		//redirect terug naar home
		redirect('site/home');
	}
	
	function update_assignment()
	{
		$this->is_logged_in();
		
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
	
	
	function delete_assignment()                     
	{
		$this->is_logged_in();
		
		$this->site_model->delete_assignment();
		$this->read_assignment();
		
		//redirect terug naar home
		redirect('site/home');
	}
	
//crud acties voor de notitiestabel//////////////////////////////////////////

	function read_note()
	{
		$this->is_logged_in();
		
		$data = array();
		
		if($query = $this->site_model->get_notes())
		{
			$data['notes'] = $query;
		}
		
		$this->load->view('crud_notities', $data);
	}
	
	function create_note()
	{
		$this->is_logged_in();
		$idOpdracht = $this->input->post("idOpdracht");
		$data = array(
			'idOpdracht' => $this->uri->segment(3),
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving')
		);
		
		$this->site_model->add_note($data);
		
		redirect("site/get_associated_notes/" . $this->uri->segment(3));
		
	}
	
	function update_note()
	{
		$this->is_logged_in();
		
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
			'Titel' => $this->input->post('titel'),
			'Beschrijving' => $this->input->post('beschrijving'),
		);
			$this->site_model->update_note($data);
		}
		redirect("site/get_associated_notes/" . $this->uri->segment(3));
                                  
	}
	
	
	function delete_note()
	{
		$this->is_logged_in();
		
		$this->site_model->delete_note();
		
		redirect("site/get_associated_notes/"  . $this->uri->segment(3));
	}	

	function logout()
	{
		$this->session->sess_destroy();
		
		//redirect je terug naar de homepage
		redirect('site/home');
	}
	
}
