<?php
	//voor het ophalen van elke notitie die bij deze opdracht hoort
	
		if(isset($allData))
		{
			foreach($allData as $data)
			{
				//hier moet gekeken worden welk nummer van idOpdracht bij welke opdracht naam hoort////////////////////
?>				
				<div class="notitie">	
					<h3><?php echo $data->titel;?></h3>
					<p><?php echo $data->beschrijving;?></p>
				</div>

<?php
			}
			
		} 
		else
		{
			echo "Er is geen notitie gevonden!";
		}		
?>