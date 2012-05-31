
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
<?php
	////////////////////////////////////////////////alleen nodig als we alles op 1 pagina gaan doen //////////////////////////////////////////////////

	//als je admin bent
	/*if($idAccountType == 2)
	{*/
?>

	<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update</h2>
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
		
		///////////////////////////////////////////////alleen nodig als we alles in 1 pagina gaan doen////////////////////////////////			
		
	/*}
	else
	{
		echo "you are not an admin, so u cant view the actions available to admins";
	}*/
	
		
		/////////////////crud acties voor notities//////////////////////////////////////////////////////////////////////////////////////////
?>
			<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update</h2>
		 <?php echo form_open('site/update_note/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Nieuwe notitie</h2>
		<?php echo form_open('site/create_note');?>
	<?php endif; ?>
	
	<p>
		<label for="idOpdracht">Hoort bij opdracht:</label>
		<input type="text" name="idOpdracht" id="idOpdracht" />
	</p>
	
	<p>
		<label for="titel">Titel:</label>
		<input type="text" name="titel" id="titel" />
	</p>	
	
	<p>
		<label for="beschrijving">Beschrijving:</label>
		<input type="text" name="beschrijving" id="beschrijving" />
	</p>	

	<p>
		<input type="submit" value="Voeg de notitie toe!" />
	</p>
	<?php echo form_close(); ?>

	<hr />

	<h3>Alle bestaande notities</h3>
	
	<h4>Opdracht, Titel, Beschrijving</h4>
	<?php 		
	
		if(isset($notes))
		{
			foreach($notes as $note)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="note">
					<?php echo '<b>' .$note->idOpdracht.'</b>' ." " .$note->titel ." " .$note->beschrijving ." " ?>				
					<?php echo anchor("site/update_note/$note->idNotitie/update", 'aanpassen'); ?>
					<?php echo anchor("site/delete_note/$note->idNotitie", 'verwijderen'); ?>
				</div>
				<hr />

<?php
			}
			
		} 
		else
		{
			echo "Er zijn geen notities gevonden!";
		}
		
?>
	
	<div>
	
</body>
</html>	