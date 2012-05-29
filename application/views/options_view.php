<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>untitled</title>
	<style type="text/css" media="screen">
		label {display: block;}
	</style>
</head>
<body>
	<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update</h2>
		 <?php echo form_open('site/crud_update/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Create</h2>
		<?php echo form_open('site/crud_create');?>
	<?php endif; ?>
	
	<p>
		<label for="firstname">Voornaam:</label>
		<input type="text" name="firstname" id="firstname" />
	</p>
	
	<p>
		<label for="lastname">Achternaam:</label>
		<input type="text" name="lastname" id="lastname" />
	</p>	
	
	<p>
		<label for="accountType">AccountType:</label>
		<input type="text" name="accountType" id="accountType" />
	</p>	
	
	<p>
		<label for="username">Gebruikersnaam:</label>
		<input type="text" name="username" id="username" />
	</p>
	
	<p>
		<label for="password">Wachtwoord:</label>
		<input type="text" name="password" id="password" />
	</p>
	
	<p>
		<input type="submit" value="Submit" />
	</p>
	<?php echo form_close(); ?>

	<hr />
	
	<h2>Read</h2>
	<?php if(isset($records)) : foreach($records as $row) : ?>
	<div><?php echo $row->voornaam . ' ' . $row->achternaam; ?>
	<?php echo anchor("site/crud_delete/$row->idGebruiker", 'delete'); ?>
	<?php echo anchor("site/crud_update/$row->idGebruiker/update", 'update'); ?>
	
	<?php endforeach; ?>

	<?php else : ?>	
	<h2>No records were returned.</h2>
	<?php endif; ?>
	
</body>
</html>	