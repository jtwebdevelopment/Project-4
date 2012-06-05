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
	
	<div id="menu">
		<a id="maaknotitiebtn">Nieuwe notitie</a>
    </div> <!-- end menu -->
	
    <div id="createnotitie" class="invisible">
		
	<?php $name = array('name' => 'createnotitieform'); ?>	
	<?php echo form_open('site/create_note/' . $this->uri->segment(3), $name);?>

		
			<?php
				//als er een uri in de  db bestaat
				if(isset($assignmentName))
				{
					foreach($assignmentName as $assignment)
					{
						$idOpdracht = $assignment->idOpdracht;
					}
				}
				else
				{
					//zet de idopdracht op de het getal dat meegegeven is in de uri
					$idOpdracht = $this->uri->segment(3);
				}
			?>
		
		<!-- een hidden field met daarin het id van de opdracht waarin je de notitie aanmaakt (de opdracht die je bekijkt) -->
		<input type="hidden" value="<?php echo $idOpdracht; ?>" />           
		<label for="titel">Notitie titel:</label><br>
		<input type="text" name="titel" id="titel" /><br>
		<label for="beschrijving">Beschrijving:</label><br>
		<input type="text" name="beschrijving" id="beschrijving" /><br>
			
		<input type="submit" value="Maak notitie" />
		<a id="maaknotitiebtn" class="afsluitknop">Niet nu!</a>
	<?php echo form_close(); ?>

    </div>
		
<?php 	
		//om de titel en beschrijdving en deadline van de opdracht te kunnen laten zien			
		if(isset($assignmentName))
		{
			foreach($assignmentName as $name)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				

					<h1><?php echo $name->titel; ?></h1>

<?php
			}
		}
?>
		<div id="prikbordcontainer" class="split">
			<div id="prikbord">

<?php
	//voor het ophalen van elke notitie die bij deze opdracht hoort
	
		if(isset($associatedNotes))
		{
			foreach($associatedNotes as $associatedNote)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="notitie">
					<?php echo anchor("site/get_all_data_from_this_note/$associatedNote->idNotitie", $associatedNote->titel);?>
					<?php echo anchor("site/update_note/$associatedNote->idNotitie/update", 'aanpassen'); ?>
					<?php echo anchor("site/delete_note/$associatedNote->idNotitie", 'verwijderen'); ?>
				</div>

<?php
			}
			
		} 
		else
		{
?>
			<h3><?php echo "Er zijn geen notities gevonden!"; ?></h3>
<?php
		}		
?>
      </div>	<!-- end prikbord -->
    </div> <!-- end prikbord container -->
 </div>  <!-- end wrapper --> 
</body>
</html>
