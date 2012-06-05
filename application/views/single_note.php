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
		<div class="noMenuPusherDiv">
		</div>
		<div id="prikbordcontainer" class="split">
			<div id="prikbord">
<?php
	//voor het ophalen van elke notitie die bij deze opdracht hoort
	
		if(isset($allData))
		{
			foreach($allData as $data)
			{

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


      </div>	<!-- end prikbord -->
    </div> <!-- end prikbord container -->
 </div>  <!-- end wrapper --> 
</body>
</html>
