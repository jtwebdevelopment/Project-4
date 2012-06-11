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
	<?php echo $javascriptPhpCombo; ?>

	<style type="text/css">
		/* jQuery lightBox plugin - Gallery style */
		#gallery {
			background-color: #444;
			padding: 10px;
			width: 520px;
		}
		#gallery ul { list-style: none; }
		#gallery ul li { display: inline; }
		#gallery ul img {
			border: 5px solid #3e3e3e;
			border-width: 5px 5px 20px;
		}
		#gallery ul a:hover img {
			border: 5px solid #fff;
			border-width: 5px 5px 20px;
			color: #fff;
		}
		#gallery ul a:hover { color: #fff; }
	</style>
		
</head>

<body>
	<div id="wrapper">
	<a href="<?php echo base_url(); ?>index.php/site/home"> <h1>Groep 2B</h1> </a>
	
	
	<div id="menu">
		<a  href="#" id="draggable"  class="maakopdrachtbtn">Nieuwe notitie</a>
    </div> <!-- end menu -->
	
     <div id="createopdracht" class="invisible">
		
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
		<a id="maakopdrachtbtn" class="afsluitknop">Niet nu!</a>
	<?php echo form_close(); ?>

    </div>
		
		<div id="prikbordcontainer" class="split">
			<div class="prikbord" id="containment-wrapper"> 

<?php
	//voor het ophalen van elke notitie die bij deze opdracht hoort
	
		if(isset($associatedNotes))
		{
			?><ul id="sortable"><?php
			foreach($associatedNotes as $associatedNote)
			{
				
?>
				<div class="notitie">
					<li id="draggable" class="noteTitle">
						<?php echo anchor("site/get_all_data_from_this_note/$associatedNote->idNotitie", $associatedNote->titel);?>
		

	<?php				//als je bij de admins of docenten hoort krijg je de volgende links te zien
						if($idAccountType == 1 || $idAccountType == 3)
						{
							//kan je updaten
							echo anchor("site/update_note/" . $this->uri->segment(3) . "/$associatedNote->idNotitie/update", 'aanpassen');
							
							echo '<br />';
							
							//kan je verwijderen
							echo anchor("site/delete_note/" . $this->uri->segment(3) . "/$associatedNote->idNotitie", 'verwijderen');
						}
?>				
					</li>
				</div>

<?php
			}
		?></ul><?php
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
