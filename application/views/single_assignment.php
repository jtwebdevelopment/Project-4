Dit zijn alle notities die bij deze opdracht horen:

<?php 	
		//om de titel en beschrijdving en deadline van de opdracht te kunnen laten zien			
		if(isset($assignmentName))
		{
			foreach($assignmentName as $name)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="notitie">
					<?php echo $name->titel; ?>				
				</div>

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
				<div class="notitie">
					<?php echo anchor("site/get_all_data_from_this_note/$associatedNote->idNotitie", $associatedNote->titel);?>
				</div>

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