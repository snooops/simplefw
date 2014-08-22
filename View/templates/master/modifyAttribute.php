	<div id="pageTitle">
		<?php if (is_numeric($params['id'])): ?>
		<h2>Edit Attribute</h2>
		<? else: ?>
		<h2>Add Attribute</h2>
		<?php endif ?>
	</div>
	

<!-- Form to modify or add -->
		<form id="modifyAttribute">
			<fieldset>
				<legend>Basic Information</legend>
				<div class="label">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $params['name']?>">
				</div>			
			</fieldset>
			
			
		
			<input type="hidden" name="mod" value="modifyAttribute">
			<input type="hidden" name="id" id="id" value="<?php echo $params['id'] ?>">
			<input type="submit" name="save" value="save">
		</form>
		


	<script type="text/javascript">		
		$("#modifyAttribute").ajaxForm({
			url: 'ajax.php',
			type: 'post',
			success: showResponse
		});
	</script>