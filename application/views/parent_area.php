parent area

	<h2>Alle Posts van deze klas / uw kind</h2>
	
<?php 
	//als er notities zijn gevonden                  ////////////nog filteren op klas / leerling!!!!!!!!!!!!!1
	if(isset($records))
	{
		//voor iedere notitie
		 foreach($records as $row)
		 {
			//echo de titel van de notitie
			 echo $row->titel;
			 //echo de beschrijving van de notitie
			 echo $row->beschrijving;
		 }
	}
	//als er geen notities zijn gevonden
	else
	{
		echo "Er zijn geen resultaten gevonden!";
	}
?>

	