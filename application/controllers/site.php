<?php

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function admin_area()
	{
		$this->load->view('admin_area');
	}
	
	function student_area()
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
		
		if($query = $this->site_model->get_records())
		{
			$data['records'] = $query;
		}
	
		$this->load->view('parent_area', $data);
	}
	
	function crud_read(){
		$data = array();
		
		if($query = $this->site_model->get_user())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('options_view', $data);
	}
	
	function crud_create()
	{
		$data = array(
			'voornaam' => $this->input->post('firstname'),
			'achternaam' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'password' =>  md5($this->input->post('password')),
			'idAccountType' => $this->input->post('accountType')
		);
		
		$this->site_model->add_user($data);
		$this->crud_read();
	}
	
	function crud_update()
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
		$this->crud_read();
	}
	
	
	function crud_delete()
	{
		$this->site_model->delete_user();
		$this->crud_read();
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			die();		
			//$this->load->view('login_form');
		}		
	}	

}
