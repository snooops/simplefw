	
	
	<div id="pageTitle">
		<h2>List Attributes</h2>
	</div>

	<a href="#" onclick="call('modifyAttribute')">Add Attribute</a>	

	<div id="listDatatypes">
		
		<table cellpadding="1" cellspacing="1" border="0">
			<tr>
				<th>Name</th>
				<th></th>
				<th></th>
			</tr>
		
		<? foreach ($params as $key => $value): ?>
			<tr>
				<td><? echo $value['name'] ?></td>
				<td><a href="#" onclick="modify(<?php echo $value['id'] ?>)" >edit</a></td>
				<td><a href="#" onclick="del(<?php echo $value['id'] ?>)" >del</a></td>
			</tr>
		<? endforeach ?>
		</table>
	</div>
	
	
	<script type="text/javascript">
		function del(id){
				check = confirm("Pres OK if you really want to delete it");
					if (check) {
						 $.ajax({
					 
					  type: "POST",
					  url: "ajax.php",
					  data: { 
					  		mod: 'delAttribute',
					  		id: id
					  	}
					}).done(function( msg ) {
						$('#content').html(msg);
					});
				}
               
			}
		
		
			function modify(id){
				$.ajax({
				  type: "POST",
				  url: "ajax.php",
				  data: { 
				  		mod: 'modifyAttribute',
				  		id: id
				  	}
				}).done(function( msg ) {
					$('#content').html(msg);
				});
			}
	</script>
