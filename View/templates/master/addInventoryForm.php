	<div id="pageTitle">
		<?php if (is_numeric($params['id'])): ?>
		<h2>Edit Asset</h2>
		<? else: ?>
		<h2>Add Asset</h2>
		<?php endif ?>
	</div>
	
	
	
	<!-- Error Reporting -->
	<?php if (array_key_exists('errors', $params)): ?>
		<div id="infobox" class="error">
			
		<?php foreach ($params['errors'] as $key => $value): ?>
			<?php 
			
			switch ($key) {
				case 'ipaddress':
					echo '<p>You have to enter an IP Address if you set the online check.</p>';
				break;
				
				case 'invnumber':
					echo '<p>You have to enter an Inventory Number</p>';
				break;
			}
			
			?>
		<?php endforeach ?>
		
		</div>
	<?php endif ?>
		
		
	
	
		
	<div id="addInventoryForm">
		
		<!-- Form Switch -->
		<?php if (!is_numeric($params['id'])): ?>
		<form id="newAsset">
			Select kind of Asset to Add:
			<select name="data_switch_value" id="data_switch">
				<?php foreach ($params['data_switch'] as $entry): ?>
		
					<option value="<?php echo $entry['id'] ?>" <?php  echo (($params['data_switch_value'] == $entry['id'])?'selected':''  )  ?>> 
						<?php echo $entry['name'] ?> 
					</option>
		
				<?php endforeach ?>
			</select>
		</form>
		<? endif ?>





		<!-- Form to modify or add -->
		<form id="addInventoryFormForm">
			<fieldset>
				<legend>Basic Information</legend>
				<div class="label">
					<label>Inventory Number</label>
					<input type="text" name="invnumber" value="<?php echo $params['invnumber']?>">
				</div>
				
				<div class="label">
					<label>Online Checks? (if yes, you have to enter an IP Address)</label>
					<input type="checkbox" name="check_online" <?php echo (($params['check_online'] == 'on') ? 'checked="checked"' : '' )  ?>>
				</div>
				
				<div class="label">
					<label>IP Address</label>
					<input type="text" name="ipaddress" value="<?php echo $params['ipaddress']?>">
				</div>
				
				<div class="label">
					<label>Location</label>
					<input type="text" name="location" value="<?php echo $params['location']?>">
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Configuration</legend>
					
					<?php foreach ($params['attributes'] as $key => $value): ?>
						<div class="label">
							<label><?php echo $value['attr_name'] ?></label>
							<input type="text" name="<?php echo $key ?>" value="<?php echo $value['attr_value'] ?>">
						</div>
					<?php endforeach ?>
					
			</fieldset>
			
			<input type="hidden" name="data_id" value="<?php echo $params['data_id'] ?>">
			<input type="hidden" name="mod" value="modifyAsset">
			<input type="hidden" name="id" value="<?php echo $params['id'] ?>">
			<input type="submit" name="save" value="save">
		</form>

		<script type="text/javascript">
			$("#newAsset").change(function(){
				dataId = $("#data_switch option:selected").val();
				
				$.ajax({
				  type: "POST",
				  url: "ajax.php",
				  data: { 
				  		mod: 'modifyAsset',
				  		data_switch_value: dataId
				  	}
				}).done(function( msg ) {
					$('#content').html(msg);
				});
			});
			
		
		
			$("#addInventoryFormForm").ajaxForm({
				url: 'ajax.php',
				type: 'post',
				success: showResponse
			});
			
			function showResponse(responseText, statusText, xhr, $form)  { 
		    	$("#content").html(responseText);
			}
		</script>
	</div>