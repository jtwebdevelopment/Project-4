<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <h1>Groep 2B</h1>
    
    <div id="menu">
        <ul>
            <li><a id="maaknotitiebtn">Nieuwe notitie</a></li>
        </ul>
    </div> <!-- end menu -->
    <div id="createnotitie" class="invisible">
		
	<?php $name = array('name' => 'createnotitieform'); ?>	
	<?php echo form_open('site/create_note/' . $this->uri->segment(3), $name);?>

		<label for="idOpdracht">Opdracht:</label><br><br>
		<select name='idOpdracht[]' id='idOpdracht'>
			<?php
				if(isset($assignments))
				{
					foreach($assignments as $assignment)
					{
						echo "<option value='" .  $assignment->idOpdracht . "'>" .  $assignment->titel . "</option>";
					}
				}
			?>
		</select><br>
		
		<label for="titel">Notitie titel:</label><br>
		<input type="text" name="titel" id="titel" /><br>
		<label for="beschrijving">Beschrijving:</label><br>
		<input type="text" name="beschrijving" id="beschrijving" /><br>
			
		<input type="submit" value="Maak notitie" />
		<a id="maaknotitiebtn" class="afsluitknop">Niet nu!</a>
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
			<h2>Dit zijn alle opdrachten! Klik op een opdracht om het bijbehorende werk te kunnen zien!</h2>
           <?php
				//voor het ophalen van elke notitie die bij deze opdracht hoort
				/*if(isset($associatedNotes) && $is_logged_in)
				{
					foreach($associatedNotes as $associatedNote)
					{
?>						
						<div class="notitie">
						
							<h3><?php echo $associatedNote->titel?>	</h3>
							
							<p class="links">
								<?php echo anchor("site/update_note/$associatedNote->idNotitie/update", 'aanpassen'); ?>
								<?php echo anchor("site/delete_note/$associatedNote->idNotitie", 'verwijderen'); ?>
							</p>
						</div>
<?php
					}
				} 
				else
				{
					if($is_logged_in){
						echo "Er zijn geen notities gevonden!";
					}
				}*/
				
					if(isset($assignments))
				{
					foreach($assignments as $assignment)
					{
?>
						<div class="notitie">
							<h3><?php echo anchor("site/get_associated_notes/$assignment->idOpdracht", $assignment->titel);?></h3>					
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
