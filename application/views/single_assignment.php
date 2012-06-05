Dit zijn alle notities die bij deze opdracht horen:

<?php 	
		//om de titel en beschrijdving en deadline van de opdracht te kunnen laten zien			
		if(isset($assignments))
		{
			foreach($assignments as $assignment)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="assignment">
					<?php echo $assignment->titel ." " .$assignment->beschrijving ." " ?>				
				</div>
				<hr />

<?php
			}
		}
	//voor het ophalen van elke notitie die bij deze opdracht hoort
	
		if(isset($associatedNotes))
		{
			foreach($associatedNotes as $associatedNote)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="note">
					<?php echo $associatedNote->titel ." " .$associatedNote->beschrijving ." " ?>				
				</div>
				<hr />

<?php
			}
			
		} 
		else
		{
			echo "Er zijn geen notities gevonden!";
		}
		
	//alleen als je bij deze usergroups hoort krijg je deze link te zien
	//admin
	//docent
	//leerling
	if($accountType == 1 || $accountType == 3 || $accountType == 4)
	{
		//link naar de crud acties voor notities
		echo anchor("site/crud_notities/" . $this->uri->segment(3) , 'Notities beheren') .'<br />'; 
	}
		
		
?>