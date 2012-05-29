<?php

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function members_area()
	{
		$this->load->view('members_area');
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
		$this->load->view('parent_area');
	}
	
	function crud_read(){
		$data = array();
		
		if($query = $this->site_model->get_records())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('options_view', $data);
	}
	
	function crud_create_user()
	{
		$data = array(
			'voornaam' => $this->input->post('firstname'),
			'achternaam' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'password' =>  md5($this->input->post('password')),
			'idAccountType' => $this->input->post('accountType')
		);
		
		$this->site_model->add_record($data);
		$this->crud_read_user();
	}
	
	function crud_update_user()
	{
		if(!$this->uri->segment(4) == 'update'){
			$data = array(
				'voornaam' => $this->input->post('firstname'),
				'achternaam' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'password' =>  md5($this->input->post('password')),
				'idAccountType' => $this->input->post('accountType')
			);
		
			$this->site_model->update_record($data);
		}
		$this->crud_read_user();
	}
	
	
	function crud_delete_user()
	{
		$this->site_model->delete_row();
		$this->crud_read_user();
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