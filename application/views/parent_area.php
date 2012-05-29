parent area

	<h2>Al het werk van deze klas / uw kind</h2>
	
<?php 
	//als er notities zijn gevonden                  ////////////nog filteren op klas / leerling!!!!!!!!!!!!!1
	if(isset($records))
	{
		//voor iedere notitie
		 foreach($records as $row)
		 {
?>
			<div class="notitie">
				<h3><?php echo $row->titel; ?></h3> 
				<p><?php echo $row->beschrijving; ?></p>
			</div>
<?php
		 }
	}
	//als er geen notities zijn gevonden
	else
	{
		echo "Er is geen ingeleverd werk gevonden!";
	}
?>

	