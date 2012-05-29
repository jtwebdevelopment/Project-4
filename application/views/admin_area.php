admin area
<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Admin area</title>
	<style type="text/css" media="screen">
		label {display: block;}
	</style>
</head>
<body>
	<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update</h2>
		 <?php echo form_open('site/crud_update/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Nieuwe gebruiker</h2>
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
		<label for="accountType">Account type:</label>
		<input type="text" name="accountType" id="accountType" />
	</p>	
	
	<p>
		<label for="username">Gebruikersnaam:</label>
		<input type="text" name="username" id="username" />
	</p>
	
	<p>
		<label for="password">Wachtwoord:</label>
		<input type="password" name="password" id="password" />
	</p>
	
	<p>
		<input type="submit" value="Submit" />
	</p>
	<?php echo form_close(); ?>

	<hr />
	
	<h3>Alle bestaande gebruikers</h3>
	<p>
		De gebruikers worden gesorteerd op accounttype. 
		De adminisrators staan bovenaan, gevolgd door de Ouders, Docenten en Leerlingen.
	</p>
	
	<h4>Accounttype Username Voornaam Achternaam</h4>
	<?php 		
	
		if(isset($records))
		{
			foreach($records as $row)
			{

				if($row->idAccountType == 1)
				{
					$accountType = "Administrator";
				}
				else if($row->idAccountType == 2)
				{
					$accountType = "Ouder";
				}
				else if($row->idAccountType == 3)
				{
					$accountType = "Docent";
				}
				else if($row->idAccountType == 4)
				{
					$accountType = "Leerling";
				}
?>				
				<div class="userInfo">
					<?php echo '<b>' .$accountType.'</b>' ." " .$row->username ." " .$row->voornaam ." " .$row->achternaam; ?>				
					<?php echo anchor("site/crud_update/$row->idGebruiker/update", 'update'); ?>
					<?php echo anchor("site/crud_delete/$row->idGebruiker", 'delete'); ?>
				</div>
				<hr />

		<?php
			}
		} 
		else
		{
			echo "No users were found!";
		}
	?>
	
	<div>
	
</body>
</html>	