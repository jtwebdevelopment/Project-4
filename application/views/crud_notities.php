<?php if($this->uri->segment(4) == 'update'): ?>
		 <h2>Update de notitie</h2>
		 <?php echo form_open('site/update_note/' . $this->uri->segment(3));?>
	<?php else: ?>
		<h2>Nieuwe notitie</h2>
		<?php echo form_open('site/create_note/' . $this->uri->segment(3));?>
	<?php endif; ?>
	
	<p>
		<label for="idOpdracht">Opdracht:</label><br />
		<select name='idOpdracht[]' id='idOpdracht'>
			<?php
				if(isset($assignments))
				{
					foreach($assignments as $assignment)
					{
						echo "<option value='" .  $assignment->idOpdracht . "'>" .  $assignment->titel . "</option>";
					}
				}
				else
				{
					echo "<option>Voeg eerst een opdracht toe!</option>";
				}
			?>
		</select>
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