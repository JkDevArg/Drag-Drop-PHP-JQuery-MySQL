<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drag & Drop Productos en jQuery, PHP & MySQL</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <style>
  #clasif { list-style-type: none; margin: 0 auto; padding: 0; width: 60%; }
  #clasif li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #clasif li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
	$(function() {
		$("#clasif").sortable({		
			update: function( event, ui ) {
				actProd();
			}
		});  
	});
  
	function actProd() {	
		var pro_orden = new Array();
		$('#clasif li').each(function() {
			pro_orden.push($(this).attr("id"));
		});
		var prod_string = 'orden='+pro_orden;
		$.ajax({
			type: "POST",
			url: "act_prod.php",
			data: prod_string,
			cache: false,
			success: function(data){			
			}
		});
	}
  </script>
</head>
<body>
	
<ul id="clasif">
	<?php
	include("conexion.php");
	$sql_query = "SELECT id, nombre FROM productos ORDER BY prioridad";
	$result = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	while( $row = mysqli_fetch_assoc($result)) 
	{	?>
		<li class="ui-state-default" id="<?php echo $row["id"]; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row["nombre"]; ?></li>
	  <?php 
	} ?>
</ul>
</body>
</html>