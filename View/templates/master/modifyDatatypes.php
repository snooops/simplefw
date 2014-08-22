	<div id="pageTitle">
		<?php if (is_numeric($params['id'])): ?>
		<h2>Edit Datatype</h2>
		<? else: ?>
		<h2>Add Datatype</h2>
		<?php endif ?>
	</div>
	

<!-- Form to modify or add -->
		<form id="modifyDatatype">
			<fieldset>
				<legend>Basic Information</legend>
				<div class="label">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $params['name']?>">
				</div>			
			</fieldset>
			
			
			<div class="left">
			
				<fieldset>
					<legend>Attributes</legend>
						
					
						<div id="newAttributes">
							
							
						</div>

						<?php if (is_array($params['attributes']) > 0):?> 
							
							<?php foreach ($params['attributes'] as $key => $value): ?>
							<div class="label">
								<label>Name</label>
								<input type="text" name="<?php echo $key ?>" value="<?php echo $value['name'] ?>">
								<a href='#' class="delAttrFromDatatype" id="<? echo $value['id'] ?>">x</a>
							</div>
							<?php endforeach ?>
							
						<? else: ?>
						
							none configured yet
						
						<? endif ?>
						
						<? if (is_array($params['otherattributes'])): ?>
						<div id="showAttributes">
							<select id="otherattributes" name="otherattributes">
							<? foreach ($params['otherattributes'] as $key => $value):	?>
								<option value="<? echo $value['id'] ?>"><? echo $value['name'] ?></option> 
							<? endforeach ?>
							</select>
							<a href="#" id="blabla">Add</a>
						</div>
						<? endif ?>
				</fieldset>
			</div>
			
			<div class="right">
				
			</div>
			
			<div class="clear">
				
			</div>
			<input type="hidden" name="mod" value="modifyDatatype">
			<input type="hidden" name="id" id="id" value="<?php echo $params['id'] ?>">
			<input type="submit" name="save" value="save">
		</form>
		


	<script type="text/javascript">
		
		$(".delAttrFromDatatype").click(function(){
			//alert($(this).attr('id'));
			
			$.ajax({
			type: "POST",
			url: "ajax.php",
			data: { 
			  	mod: 'delAttrFromDatatype',
				id: $(this).attr('id'),
				data_id: $("#id").val(),
			}
			}).done(function( msg ) {
				$("#content").html(msg);
			});
			
		});
		
		
		$("#modifyDatatype").ajaxForm({
				url: 'ajax.php',
				type: 'post',
				success: showResponse
			});
			
			
		
		$("#blabla").click(function(){
			//alert($("#otherattributes").val());
			
			$.ajax({
			type: "POST",
			url: "ajax.php",
			data: { 
			  	mod: 'addAttribute2Datatype',
				data_id: $("#id").val(),
				attr_id: $("#otherattributes").val(),
			}
			}).done(function( msg ) {
				$("#content").html(msg);
			});
		});
		
		
	</script>