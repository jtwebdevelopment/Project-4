<!DOCTYPE html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="#" />  
	    <meta name="keywords" content="#" /> 
		<title>CBS de Sleutel's Prikbord</title>
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery-1.7.1.min.js"></script>
		
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/Prikbord.css" />
      	<script type="text/javascript" src="<?php echo base_url(); ?>/javascript/Prikbord.js"></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>/javascript/lightbox.js'></script>
	
		
		
</head>

<body>
<div id="wrapper">
	
<?php
	//als er een accounttype is gevonden
	if(isset($idAccountType))
	{
		if($idAccountType == 1)
		{
		  $accountType = "administrator";
		}
		elseif($idAccountType == 2)
		{
			$accountType = "ouder";
		}	
		elseif($idAccountType == 3)
		{
			$accountType = "docenten";
		}
		elseif($idAccountType == 4)
		{
			$accountType = "leerling";
		}
		
		//kijkt wat voor accountType je hebt en laat zien met wat voor account je bent ingelogd
		if($idAccountType == 1 || $idAccountType == 2 || $idAccountType == 3 || $idAccountType == 4)
		{
			echo "U Bent ingelogd met een " .$accountType ." account.";
		}
		//als je geen accountType hebt laat hij zien dat je nog niet bent ingelogd
		else
		{
			echo "U bent nog niet ingelogd!";
		}
 	
	}

	 
?>
    
	<h1>Groep 2B</h1>
    <div id="menu">
<?php	//als je bij de admins, leerlingen of docenten hoort krijg je de volgende links te zien
		if($idAccountType == 1 || $idAccountType == 3 || $idAccountType == 4)
		{
?>
			<a id="maakopdrachtbtn">Nieuwe opdracht</a>
<?php
		}
?>

    </div> <!-- end menu -->
	
    <div id="createopdracht" class="invisible">
		
	<?php $name = array('name' => 'createopdrachtform'); ?>	
	<?php echo form_open('site/create_assignment/' . $this->uri->segment(3), $name);?>

		
		<label for="titel">Opdracht titel:</label><br>
		<input type="text" name="titel" id="titel" /><br>
		<label for="beschrijving">Beschrijving:</label><br>
		<input type="text" name="beschrijving" id="beschrijving" /><br>
			
		<input type="submit" value="Maak opdracht" />
		<a id="maakopdrachtbtn" class="afsluitknop">Niet nu!</a>
	<?php echo form_close(); ?>

    </div>
    
	<?php if($is_logged_in):?>
		<a id="logoutbtn" href=" <?php echo base_url(); ?>index.php/site/logout">	Logout </a>
	<?php else : ?>
    <a id="loginpopoutbtn">Login</a>
    <?php endif; ?>
	<div id="logincontainer" class="invisible"> 
    	
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
			echo "<a id='sluitLoginMenu' class='sluitLoginMenu'>Niet nu!</a>";
			
			echo form_close();
			?>
		</div><!-- end login_form-->
    </div> <!-- end logincontainer -->
    
    <div id="prikbordcontainer" class="split">
    	<div id="prikbord">
           <?php
		   //als er opdrachten zijn
				if(isset($assignments))
				{
					foreach($assignments as $assignment)
					{
?>
						<div class="notitie">
							<h3><?php echo anchor("site/get_associated_notes/$assignment->idOpdracht", $assignment->titel);?></h3>
							<?php
								//als je bij de admins of docenten hoort krijg je de volgende links te zien
								if($idAccountType == 1 || $idAccountType == 3)
								{
									//kan je updaten
									echo anchor("site/update_assignment/$assignment->idOpdracht/update", 'update');
									
									echo '<br />';
									
									//kan je verwijderen
									echo anchor("site/delete_assignment/$assignment->idOpdracht", 'delete');
								}
		
							?>
														
						</div>						
<?php
					}
				}
			?>
        </div>	<!-- end prikbord -->
    </div> <!-- end prikbord container -->
 </div>  <!-- end wrapper --> 
</body>
</html>
