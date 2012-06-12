<!DOCTYPE html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="#" />  
	    <meta name="keywords" content="#" /> 
		<title>CBS de Sleutel's Prikbord</title>
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery-1.7.1.min.js"></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/itemEffect.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/Prikbord.css" />
      	<script type="text/javascript" src="<?php echo base_url(); ?>/javascript/Prikbord.js"></script>
		<script type="text/javascript" src='<?php echo base_url(); ?>/javascript/lightbox.js'></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery.lightbox-0.5.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/jquery.lightbox-0.5.css" media="screen" />
		<script src="<?php echo base_url(); ?>/javascript/jquery.contextMenu.js" type="text/javascript"></script>
		<link href="<?php echo base_url(); ?>/css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
		
		<?php echo $javascriptPhpCombo; ?>
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
			// echo "U Bent ingelogd met een " .$accountType ." account.";
		}
		//als je geen accountType hebt laat hij zien dat je nog niet bent ingelogd
		else
		{
			// echo "U bent nog niet ingelogd!";
		}
 	
	}

	 
?>
    
	<a href="<?php echo base_url(); ?>index.php/site/home"> <h1>Groep 2B</h1> </a>
    <div id="menu">
<?php	//als je bij de admins, leerlingen of docenten hoort krijg je de volgende links te zien
		if($idAccountType == 1 || $idAccountType == 3 || $idAccountType == 4)
		{
?>
			<a  href="#" id="draggable"  class="maakopdrachtbtn">Nieuwe opdracht</a>
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
    	<div class="prikbord" id="containment-wrapper">   

		   <?php
				//als er opdrachten zijn
				if(isset($assignments)) 
				{
					?>
					<ul id="sortable">
					
					<?php 
					
					foreach($assignments as $assignment)
					{
					
					?>
						<table>
						<?php
						
						?>
						
						<div class="notitie" id="notitie" name="<?php echo $assignment->idOpdracht; ?>">
						
								<li id="draggable" class="noteTitle">
									<h3><?php echo anchor("site/get_associated_notes/$assignment->idOpdracht", $assignment->titel);?></h3>
								</li>
									<?php
										//als je bij de admins of docenten hoort krijg je de volgende links te zien
										if($idAccountType == 1 || $idAccountType == 3)
										{
											?>
											<ul id="myMenu" class="contextMenu">
												<li class="edit">
											<?php
											//kan je updaten
											echo anchor("site/update_assignment/$assignment->idOpdracht/update", 'aanpassen' );
											?> </li>
											
											<li class="delete"> <?php
											//kan je verwijderen
											echo anchor("site/delete_assignment/$assignment->idOpdracht", 'verwijderen' );
											
											?> </li> </ul>
											
											
											<!-- <a href="<?php echo base_url(); ?>img/password_label.jpg">
												<img src="<?php echo base_url(); ?>img/password_label.jpg"  width="72" height="72" alt="" />
											</a> -->
											<?php
										}
									?>
								</div>
					<?php } ?>
        </div> </ul> <?php } ?>	</div>	<!-- end prikbord -->
    </div> <!-- end prikbord container -->
 </div>  <!-- end wrapper --> 
</body>
</html>
