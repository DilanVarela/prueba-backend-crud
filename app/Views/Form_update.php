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

	<form action="<?= route_to('users_update', $data_update[0]['id']) ?>" method="post">
		<input type="hidden" name="_method" value="PUT" />
		<label for="gender">Sexo</label>
		<select name="gender" id="gender">
			<option value="select">Select</option>
			<?php if(!empty(old('gender'))):?>
				<?php foreach ($genders as $gender) :?>
					<?php if(old('gender') == $gender) : ?>
						<option value="<?=$gender?>" selected><?= ucfirst($gender)?></option>
					<?php else: ?>
						<option value="<?= $gender?>"><?= ucfirst($gender)?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php else: ?>
				<?php foreach($genders as $gender) : ?>
					<?php if($data_update[0]['gender'] == $gender) :?>
						<option value="<?=$data_update[0]['gender']?>" selected><?= ucfirst($data_update[0]['gender'])?></option>
					<?php else :?>
						<option value="<?= $gender?>"><?= ucfirst($gender)?></option>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('gender')?></label>
		<?php endif?>

		<br>

		<label for="age">Fecha de nacimiento</label>
		<?php if(!empty(old('age')) && old('age') != $data_update[0]['age']) :?>
			<input type="text" placeholder="Fecha de nacimiento*" name="age" id="age" value="<?=old('age')?>">	
		<?php else:?>		
			<input type="text"  placeholder="Fecha de nacimiento*" name="age" id="age" value="<?=$data_update[0]['age'];?>">
		<?php endif?>

		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('age')?></label>
		<?php endif?>
		
		<br>

		<label for="name">Nombre</label>
		<?php if(!empty(old('name')) && old('name') != $data_update[0]['name']):?>
			<input type="text" name="name" id="name" value="<?=old('name');?>">
		<?php else:?>
			<input type="text" name="name" id="name" value="<?=$data_update[0]['name'];?>">
		<?php endif?>
		
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('name')?></label>
		<?php endif?>

		<br>

		<label for="lastname">Apellido</label>
		<?php if(!empty(old('lastname')) && old('lastname') != $data_update[0]['lastname']) :?>
			<input type="text" name="lastname" id="lastname" value="<?=old('lastname');?>">
		<?php else:?>
			<input type="text" name="lastname" id="lastname" value="<?=$data_update[0]['lastname'];?>">
		<?php endif?>

		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('lastname')?></label>
		<?php endif?>

		<br>

		<label for="email">Email</label>
		<?php if(!empty(old('email')) && old('email') != $data_update[0]['email']) :?>
			<input type="email" name="email" id="email" value="<?=old('email');?>">
		<?php else:?>
			<input type="email" name="email" id="email" value="<?=$data_update[0]['email']?>">
		<?php endif?>

		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('email')?></label>
		<?php endif?>
		
		<br>

		<label for="address">Direccion</label>
		<?php if(!empty(old('address'))  && old('address') != $data_update[0]['address']) :?>
			<input type="text" name="address" id="address" value="<?=old('address')?>">
		<?php else:?>
			<input type="text" name="address" id="address" value="<?=$data_update[0]['address'] ?>">
		<?php endif?>

		<?php if($validation_error->getErrors() > 0):?><label for="">
			<?= $validation_error->getError('address')?></label>
		<?php endif?>

		<br>

		<label for="type_resident">Casa/Apartamento</label>
		<select name="type_resident" id="type_resident">
			<?php if(!empty(old('type_resident'))):?>
				<?php foreach ($type_resident as $resident) :?>
					<?php if(old('type_resident') == $resident) : ?>
						<option value="<?=$resident?>" selected><?= $resident?></option>
					<?php else: ?>
						<option value="<?= $resident?>"><?= $resident?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php else: ?>
				<?php foreach($type_resident as $resident) : ?>
					<?php if($data_update[0]['type_resident'] == $resident) :?>
						<option value="<?=$data_update[0]['type_resident']?>" selected><?= ucfirst($data_update[0]['type_resident'])?></option>
					<?php else :?>
						<option value="<?= $resident?>"><?= ucfirst($resident)?></option>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('type_resident')?></label>
		<?php endif?>

		<br>

		<label for="country">Pais</label>
		<select name="country" id="country">
			<option value='select'>Select</option>
			<?php if(!empty(old('country'))):?>
				<?php foreach ($countries as $country) :?>
					<?php if(old('country') == $country['id']) : ?>
						<option value="<?=$country['id']?>" selected><?=$country['name']?></option>
					<?php else: ?>
						<option value="<?=$country['id']?>"><?=$country['name']?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php else: ?>
				<?php foreach ($countries as $country) :?>
					<?php if($data_update[0]['country'] == $country['id']) : ?>
						<option value="<?=$country['id']?>" selected><?=$country['name']?></option>
					<?php else: ?>
						<option value="<?=$country['id']?>"><?=$country['name']?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php endif ?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('country')?></label>
		<?php endif?>

		<br>

		<label for="state">Departmento</label>
		<select name="state" id="state">
			<option value='select'>Select</option>
			<?php if(!empty(old('state'))):?>
				<?= "<script>setSelectedOld(". old('state') .",".old('country').",'state')</script>"?>
			<?php else: ?>
				<?php foreach ($states as $state) :?>
					<?php if($data_update[0]['state'] == $state['id']) : ?>
						<option value="<?=$state['id']?>" selected><?=$state['name']?></option>
					<?php else: ?>
						<option value="<?=$state['id']?>"><?=$state['name']?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php endif?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('state')?></label>
		<?php endif?>

		<br>

		<label for="city">Ciudad</label>
		<select name="city" id="city">
			<option value='select'>Select</option>
			<?php if(!empty(old('city'))):?>
				<?= "<script>setSelectedOld(". old('city') .",".old('state').",'city')</script>"?>
			<?php else: ?>
				<?=$data_update[0]['city']?>
				<?php foreach ($cities as $city) :?>
					<?php if($data_update[0]['city'] == $city['id']) : ?>
						<option value="<?=$city['id']?>" selected><?=$city['name']?></option>
					<?php else: ?>
						<option value="<?=$city['id']?>"><?=$city['name']?></option>
					<?php endif ?>
				<?php endforeach?>
			<?php endif?>
		</select>
		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('city')?></label>
		<?php endif?>

		<br>

		<label for="comment">Comentarios</label>
		<?php if(!empty(old('comment'))  && old('comment') != $data_update[0]['comment']) :?>
			<input type="text" name="comment" id="comment" value="<?=old('comment')?>">
		<?php else:?>
			<input type="text" name="comment" id="comment" value="<?=$data_update[0]['comment'] ?>">
		<?php endif?>

		<?php if($validation_error->getErrors() > 0):?>
			<label for=""><?= $validation_error->getError('comment')?></label>
		<?php endif?>

		<br>

		<input type="submit" value="Enviar">

	</form>