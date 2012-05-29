<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);		
	}
	
	function validate_credentials()
	{		
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			
			//check bij welke usergroup je hoort en verwijst je op basis daar van door naar je eigen startpage
			$accountType = $this->session->userdata('idAccountType');
			
			//als je een admin bent
			if($accountType == 1)
			{
				redirect('site/admin_area');
			}
			//als je een ouder bent
			else if($accountType == 2)
			{
				redirect('site/parent_area');
			}
			//als je een leraar bent
			else if($accountType == 3)
			{
				redirect('site/teacher_area');
			}
			//als je een leerling bent
			else if($accountType == 4)
			{
				redirect('site/student_area');
			}
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|callback_username_chk');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
	


	function username_chk($username)
	{
		$this->form_validation->set_message('username_chk','Gebruikersnaam bestaat al. Probeer een andere.');

		$this->load->model('membership_model');
		
		if($this->membership_model->check_exist_username($username))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}