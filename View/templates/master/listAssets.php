
	<div id="pageTitle">
		<h2>List Inventory</h2>
	</div>
	
	<a href="#" onclick="call('modifyAsset')">Add Asset</a>
	
	<div id="listInventory">
		<table cellpadding="1" cellspacing="1" border="0">
			<tr>
				<th>Nummer</th>
				<th>Type</th>
				<th>Location</th>
				<th>IP-Address</th>
				<th>Online?</th>
				<th></th>
				<th></th>
			</tr>
		<?php if (is_array($params['list']) ) : ?>	
			<?php foreach ($params['list']	 as $entry): ?>
				<tr>
					<td><?php echo $entry['invnumber'] ?></td>
					<td><?php echo $entry['data_name'] ?></td>
					<td><?php echo $entry['location'] ?></td>
					<td><?php echo $entry['ipaddress'] ?></td>
					<td class="<?php echo (($entry['online'] == 1) ? 'online' : 'offline'); ?>"><?php echo (($entry['online'] == 1) ? 'online' : 'offline'); ?></td>
					<td><a href="#" onclick="modify(<?php echo $entry['id'] ?>)" >edit</a></td>
					<td><a href="#" onclick="del(<?php echo $entry['id'] ?>)" >del</a></td>
				</tr>
			<?php endforeach ?>
		<?php endif; ?>
		</table>
		
		<script type="text/javascript">
			$("#data_switch").change(function(){
				dataId = $("#data_switch option:selected").val();
				
				$.ajax({
				  type: "POST",
				  url: "ajax.php",
				  data: { 
				  		mod: 'getAssets',
				  		dataid: dataId
				  	}
				}).done(function( msg ) {
					$('#content').html(msg);
				});
			});
			
			
		
			function del(id){
				check = confirm("Pres OK if you really want to delete it");
					if (check) {
						 $.ajax({
					 
					  type: "POST",
					  url: "ajax.php",
					  data: { 
					  		mod: 'delAsset',
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
				  		mod: 'modifyAsset',
				  		id: id
				  	}
				}).done(function( msg ) {
					$('#content').html(msg);
				});
			}
			
			
			$("#newAsset").ajaxForm({
				url: 'ajax.php',
				type: 'post',
				success: showResponse
			});
			
			function showResponse(responseText, statusText, xhr, $form)  { 
		    	$("#content").html(responseText);
			}
		</script>
	</div>

