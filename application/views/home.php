
Welkom op de site van deze school :D
Hier onder kunt u de door ons gemaakte opdrachten bekijken
Enjoy! 

Opdrachtnaam, titel, beschrijving, deadline

<?php
		
	//check bij welke usergroup je hoort 
	$accountType = $this->session->userdata('idAccountType');
	
	//hier komen de links naar de verschillende crudacties///
	//hier word ook meteen gecheckt voor welke usergroups die zichtbaar moeten zijn//
	
	//alleen als je bij deze usergroups hoort krijg je deze link te zien
	//admin
	if($accountType == 1)
	{
		//link naar de crud acties voor gebruikers
		echo anchor("site/crud_gebruikers", 'Gebruikers beheren') .'<br />'; 
	}
	
	//alleen als je bij deze usergroups hoort krijg je deze link te zien
	//admin of docent
	if($accountType == 1 || $accountType == 3)
	{
		//link naar de crud acties voor opdrachten
		echo anchor("site/crud_opdrachten", 'Opdrachten beheren') .'<br />'; 
	}
	
	//alleen als je bij deze usergroups hoort krijg je deze link te zien
	//admin
	//docent
	//leerling
	if($accountType == 1 || $accountType == 3 || $accountType == 4)
	{
		//link naar de crud acties voor notities
		echo anchor("site/crud_notities", 'Notities beheren') .'<br />'; 
	}
		

	//je krijgt hoe dan ook de gemaakte opdrachten te zien		als je op een opdracht klikt krijg je de bijbehorende notities te zien
		if(isset($assignments))
		{
			foreach($assignments as $assignment)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort/////////////////////////////////
?>				
				<div class="assignment">
					<?php echo '<b>' .$assignment->idOpdracht.'</b>' ." " .$assignment->titel ." " .$assignment->beschrijving ." " .$assignment->deadline ." " ?>				<?php echo anchor("site/get_associated_notes/$assignment->idOpdracht", 'bekijk'); ?>
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
