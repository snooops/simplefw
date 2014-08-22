<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<meta charset="UTF-8">
<title>Open Inventory</title>
</head>
<body>
	
<script type="text/javascript">
	
	function call(mod) {
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: { 
		  		mod: mod 
		  	}
		}).done(function( msg ) {
			$('#content').html(msg);
		});
	}
</script>
