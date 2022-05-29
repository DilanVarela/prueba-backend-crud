
	<script>
		// old = old data selected
		// old_reference_value = old data selected in parent select i.e : the parent of city is state
		// id = for identify what select is trigger the function and provide the correct data
		function setSelectedOld(old, old_reference_value, id){
			if(id == 'state'){
				//Take the info of the states by country selected
				$.get("/state/"+old_reference_value, function(data){
					setOptionsState(data, old);
				});
			}
			if(id== 'city'){
				//Take the info of the cities by state selected
				$.get("/city/"+old_reference_value, function(data){
					setOptionsCity(data, old);
				});
			}
		}
	</script>
	<form action="<?= route_to('users_insert') ?>" method="post">
		<label for="gender">Sexo</label>
		<select name="gender" id="gender">
			<option value="select" <?=old('gender') == 'select' ? 'selected' : ''?>>Sexo*</option>
			<option value="hombre" <?=old('gender') == 'hombre' ? 'selected' : ''?>>Hombre</option>
			<option value="mujer" <?=old('gender') == 'mujer' ? 'selected' : ''?>>Mujer</option>
			<option value="otro" <?=old('gender') == 'otro' ? 'selected' : ''?>>Otro</option>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('gender')?></label>
		<?php endif?>

		<br>
		
		<input type="text"  placeholder="Fecha de nacimiento*" value="<?=!empty(old('age')) ? old('age') : ''; ?>"name="age" id="age">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('age')?></label>
		<?php endif?>

		<br>

		<label for="name">Nombre</label>
		<input type="text" name="name" id="name" value="<?=old('name')?>">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('name')?></label>
		<?php endif?>

		<br>

		<label for="lastname">Apellido</label>
		<input type="text" name="lastname" id="lastname" value="<?=old('lastname')?>">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('lastname')?></label>
		<?php endif?>

		<br>

		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?=old('email')?>">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('email')?></label>
		<?php endif?>

		<br>

		<label for="address">Direccion</label>
		<input type="text" name="address" id="address" value="<?=old('address')?>">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('address')?></label>
		<?php endif?>

		<br>

		<label for="type_resident">Casa/Apartamento</label>
		<select name="type_resident" id="type_resident">
			<option value='N/A' <?=old('type_resident') == 'N/A' ? 'selected' : ''?>>Casa/Apartamento</option>
			<option value="Casa" <?=old('type_resident') == 'Casa' ? 'selected' : ''?>>Casa</option>
			<option value="Apartamento" <?=old('type_resident') == 'Apartamento' ? 'selected' : ''?>>Apartamento</option>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('type_resident')?></label>
		<?php endif?>

		<br>

		<label for="country">Pais</label>
		<select name="country" id="country">
			<option value='select'>Select</option>
			<?php foreach ($countries as $country) :?>
				<?php if($country['id'] == old('country')) : ?>
					<option value="<?=$country['id']?>" selected><?=$country['name']?></option>
				<?php else: ?>
					<option value="<?=$country['id']?>"><?=$country['name']?></option>
				<?php endif ?>
			<?php endforeach?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('country')?></label>
		<?php endif?>

		<br>

		<label for="state">Departmento</label>
		<select  name="state" id="state">
			<option value="select">Select a country first</option>
			<!-- The dynamic selects, reset when ocurrs a error validation. Then select have only the select default -->
			<!--And the system no can't take back the info without trigger the event change-->
			<!--Then a make a function what trigger the info with old information (info in an input previous to error validation-->
			<!--Her own info, parent's info and her id for take the same data and 'selected' the same value-->
			<?php if(old('state')):?>
				<?= "<script>setSelectedOld(". old('state') .",".old('country').",'state')</script>"?>
			<?php endif?>

		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('state')?></label>
		<?php endif?>

		<br>

		<label for="city">Ciudad</label>
		<select  name="city" id="city">
			<option value="select">Select a State first</option>
			<!-- The dynamic selects, reset when ocurrs a error validation. Then select have only the select default -->
			<!--And the system no can't take back the info without trigger the event change-->
			<!--Then a make a function what trigger the info with old information (info in an input previous to error validation-->
			<!--Her own info, parent's info and her id for take the same data and 'selected' the same value-->
			<?php if(old('city')):?>
				<?= "<script>setSelectedOld(". old('city') ."," . old('state') .",'city')</script>"?>
			<?php endif?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('city')?></label>
		<?php endif?>

		<br>

		<label for="comment">Comentarios</label>
		<input type="text" name="comment" id="comment" value="<?=old('comment')?>">
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('comment')?></label>
		<?php endif?>

		<br>

		<input type="submit" value="Enviar">

	</form>


