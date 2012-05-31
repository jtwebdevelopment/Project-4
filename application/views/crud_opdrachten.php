<?php 
	//////////////////////////////////crud acties voor opdrachten ////////////////////////////////////////////////////////////////
	if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update de opdracht</h2>
		 <?php echo form_open('site/update_assignment/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Nieuwe opdracht</h2>
		<?php echo form_open('site/create_assignment');?>
	<?php endif; ?>
	
	<p>
		<label for="titel">Titel:</label>
		<input type="text" name="titel" id="titel" />
	</p>	
	
	<p>
		<label for="beschrijving">Beschrijving:</label>
		<input type="text" name="beschrijving" id="beschrijving" />
	</p>	
	
	
	<p>
		<label for="deadline">Deadline:</label>
		<input type="text" name="deadline" id="deadline" />
	</p>
	

	<p>
		<input type="submit" value="Voeg de opdracht toe!" />
	</p>
	<?php echo form_close(); ?>

	<hr />

	<h3>Alle bestaande opdrachten</h3>
	
	<h4>Opdracht, Titel, Beschrijving</h4>
	<?php 		
	
		if(isset($assignments))
		{
			foreach($assignments as $assignment)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="assignment">
					<?php echo '<b>' .$assignment->idOpdracht.'</b>' ." " .$assignment->titel ." " .$assignment->beschrijving ." " ?>				
					<?php echo anchor("site/update_assignment/$assignment->idOpdracht/update", 'aanpassen'); ?>
					<?php echo anchor("site/delete_assignment/$assignment->idOpdracht", 'verwijderen'); ?>
				</div>
				<hr />

<?php
			}
			
		} 
		else
		{
			echo "Er zijn geen opdrachten gevonden!";
		}
		
?>