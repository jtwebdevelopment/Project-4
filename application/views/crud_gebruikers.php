<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update gebruiker</h2>
		 <?php echo form_open('site/update_user/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Nieuwe gebruiker</h2>
		<?php echo form_open('site/create_user');?>
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
		<input type="submit" value="Maak de nieuwe gebruiker aan!" />
	</p>
	<?php echo form_close(); ?>

	<hr />

	<h3>Alle bestaande gebruikers</h3>
	<p>
		De gebruikers worden gesorteerd op accounttype. 
		De administrators staan bovenaan, gevolgd door de Ouders, Docenten en Leerlingen.
		Achter de gebruiker kun je op "Update" of op "Verwijder" klikken om de gebruiker aan te passen of te verwijderen!
	</p>
	
	<h4>Accounttype Username Voornaam Achternaam</h4>
	<?php 		
		if(isset($users))
		{
			foreach($users as $user)
			{

				if($user->idAccountType == 1)
				{
					$accountType = "Administrator";
				}
				else if($user->idAccountType == 2)
				{
					$accountType = "Ouder";
				}
				else if($user->idAccountType == 3)
				{
					$accountType = "Docent";
				}
				else if($user->idAccountType == 4)
				{
					$accountType = "Leerling";
				}
?>				
				<div class="userInfo">
					<?php echo '<b>' .$accountType.'</b>' ." " .$user->username ." " .$user->voornaam ." " .$user->achternaam; ?>				
					<?php echo anchor("site/update_user/$user->idGebruiker/update", 'aanpassen'); ?>
					<?php echo anchor("site/delete_user/$user->idGebruiker", 'verwijderen'); ?>
				</div>
				<hr />

<?php
			}
			
		} 
		else
		{
			echo "Er zijn geen gebruikers gevonden!";
		}
?>