<?php $this->load->view('includes/header'); ?>

<div id="login_form">

	<?php 
	echo form_open('login/validate_credentials');
	
	$attributes = array(
		'class' => 'labelUsername'
	);
	echo form_label('<img src="' . base_url("/img/username_label.jpg") . '" alt="img"></img> <p class="login_customFont">gebruikersnaam </p> <br>', 'username', $attributes);
	echo form_input('username', '') . '<br>';
	
	$attributes = array(
		'class' => 'labelPassword'
	);
	
	echo form_label('<img src="' . base_url("/img/password_label.jpg") . '" alt="img"></img> <p class="login_customFont">wachtwoord </p>', 'password', $attributes);
	echo form_password('password', '') . '<br>';
	
	echo form_submit('submit', 'Login');
	echo form_close();
	?>

</div><!-- end login_form-->
	
<?php $this->load->view('includes/footer'); ?>