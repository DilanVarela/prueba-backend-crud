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
	<div class="container">
		<div class="row g-3 justify-content-center">
			<div class="col-4" style="display: flex;align-items: center;">
				<div class="row">
					<div class="row">
						<div class="col-md-1 icons"><i class="fas fa-envelope"></i></div>
						<div class="col-md-9">consultas@correo.com</div>
					</div>

					<div class="row">
						<div class="col-md-1 icons"><i class="fas fa-map-marker-alt"></i></div>
						<div class="col-md-9">Av. 16 de Julio Nro 8 - Ciudad Pais</div>
					</div>

					<div class="row">
						<div class="col-md-1 icons"><i class="fas fa-phone"></i></div>
						<div class="col-md-9">
							(01) 3453-645
							<br>
							(01) 3433-452
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-md-1 icons social-icons"><i class="fa-brands fa-facebook-f"></i></div>
						<div class="col-md-1 icons social-icons"><i class="fa-brands fa-twitter"></i></div>
						<div class="col-md-1 icons social-icons"><i class="fa-brands fa-instagram"></i></div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<p class="fs-2">Contacto</p>
				<form class="row g-3 mt-3" action="<?= route_to('users_update', $data_update[0]['id']) ?>" method="post">
					<input type="hidden" name="_method" value="PUT" />
					<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

					<div class="row">
						<div class="col-md-6">
							<select name="gender" id="gender" class="form-select">
								<option value="select">Sexo*</option>
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
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('gender')?>
								</div>
							<?php endif?>
						</div>
						<div class="col-md-6">
							<?php if(!empty(old('age')) && old('age') != $data_update[0]['age']) :?>
								<input type="text" class="form-control" placeholder="Fecha de nacimiento*" name="age" id="age" value="<?=old('age')?>">	
							<?php else:?>		
								<input type="text"  class="form-control" placeholder="Fecha de nacimiento*" name="age" id="age" value="<?=$data_update[0]['age'];?>">
							<?php endif?>

							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('age')?>
								</div>
							<?php endif?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<?php if(!empty(old('name')) && old('name') != $data_update[0]['name']):?>
								<input type="text" name="name" class="form-control" placeholder="Nombre*" id="name" value="<?=old('name');?>">
							<?php else:?>
								<input type="text" name="name" class="form-control" placeholder="Nombre*" id="name" value="<?=$data_update[0]['name'];?>">
							<?php endif?>
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('name')?>
								</div>
							<?php endif?>
						</div>
						<div class="col-md-6">
							<?php if(!empty(old('lastname')) && old('lastname') != $data_update[0]['lastname']) :?>
								<input type="text" name="lastname" class="form-control" placeholder="Apellido*" id="lastname" value="<?=old('lastname');?>">
							<?php else:?>
								<input type="text" name="lastname" class="form-control" placeholder="Apellido*" id="lastname" value="<?=$data_update[0]['lastname'];?>">
							<?php endif?>
		
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('lastname')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md 12">
							<?php if(!empty(old('email')) && old('email') != $data_update[0]['email']) :?>
								<input type="email" name="email" class="form-control" placeholder="Email*" id="email" value="<?=old('email');?>">
							<?php else:?>
								<input type="email" name="email" class="form-control" placeholder="Email*" id="email" value="<?=$data_update[0]['email']?>">
							<?php endif?>
		
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('email')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md 12">
							<?php if(!empty(old('address'))  && old('address') != $data_update[0]['address']) :?>
								<input type="text" name="address" class="form-control" placeholder="Direccion*" id="address" value="<?=old('address')?>">
							<?php else:?>
								<input type="text" name="address" class="form-control" placeholder="Direccion*" id="address" value="<?=$data_update[0]['address'] ?>">
							<?php endif?>
		
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('address')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<select name="type_resident" class="form-select" id="type_resident">
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
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('type_resident')?>
								</div>
							<?php endif?>
						</div>
						<div class="col-md-6">
							<select name="country" class="form-select" id="country">
								<option value='select'>Pais*</option>
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
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('country')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<select name="state" class="form-select" id="state">
								<option value='select'>Departamento*</option>
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
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('state')?>
								</div>
							<?php endif?>
						</div>
						<div class="col-md-6">
							<select name="city" class="form-select" id="city">
								<option value='select'>Ciudad*</option>
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
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('city')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<?php if(!empty(old('comment'))  && old('comment') != $data_update[0]['comment']) :?>
								<textarea name="comment" class="form-control"  placeholder="Comentarios*" id="comment" ><?=old('comment')?></textarea>
							<?php else:?>
								<textarea name="comment" class="form-control"  placeholder="Comentarios*" id="comment" ><?=$data_update[0]['comment'] ?></textarea>
							<?php endif?>
		
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('comment')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row align-items-end">
						<div class="col-md-12">
							<a class="btn btn-primary" style="float:right; margin: 0 5px" role="button" href="<?= route_to('list_users'); ?>">Cancelar</a>
							<button type="submit" class="btn btn-primary" style="float:right">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>