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
				<form class="row g-3 mt-3" action="<?= route_to('users_insert') ?>" method="post">
					<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
					<div class="row">
						<div class="col-md-6">
							<select name="gender" id="gender" class="form-select">
								<option value="select" <?=old('gender') == 'select' ? 'selected' : ''?>>Sexo*</option>
								<option value="hombre" <?=old('gender') == 'hombre' ? 'selected' : ''?>>Hombre</option>
								<option value="mujer" <?=old('gender') == 'mujer' ? 'selected' : ''?>>Mujer</option>
								<option value="otro" <?=old('gender') == 'otro' ? 'selected' : ''?>>Otro</option>
							</select>
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('gender')?>
								</div>
							<?php endif?>
						</div>

						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Fecha de nacimiento*" value="<?=!empty(old('age')) ? old('age') : ''; ?>"name="age" id="age">
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('age')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" id="name" placeholder="Nombre*" value="<?=!empty(old('name')) ? old('name') : ''?>">
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('name')?>
								</div>
							<?php endif?>
						</div>

						<div class="col-md-6">
							<input type="text" class="form-control" name="lastname" placeholder="Apellido*" id="lastname" value="<?=old('lastname')?>">
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('lastname')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<input type="email" name="email" class="form-control" placeholder="Email*" id="email" value="<?=old('email')?>">
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('email')?>
								</div>
							<?php endif?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<input type="text" name="address" class="form-control" placeholder="Dirección*" id="address" value="<?=old('address')?>">
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
								<option value='N/A' <?=old('type_resident') == 'N/A' ? 'selected' : ''?>>Casa/Apartamento</option>
								<option value="Casa" <?=old('type_resident') == 'Casa' ? 'selected' : ''?>>Casa</option>
								<option value="Apartamento" <?=old('type_resident') == 'Apartamento' ? 'selected' : ''?>>Apartamento</option>
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
								<?php foreach ($countries as $country) :?>
									<?php if($country['id'] == old('country')) : ?>
										<option value="<?=$country['id']?>" selected><?=$country['name']?></option>
									<?php else: ?>
										<option value="<?=$country['id']?>"><?=$country['name']?></option>
									<?php endif ?>
								<?php endforeach?>
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
							<select  name="state" class="form-select" id="state">
								<option value="select">Seleccione un pais</option>
								<!-- The dynamic selects, reset when ocurrs a error validation. Then select have only the select default -->
								<!--And the system no can't take back the info without trigger the event change-->
								<!--Then a make a function what trigger the info with old information (info in an input previous to error validation-->
								<!--Her own info, parent's info and her id for take the same data and 'selected' the same value-->
								<?php if(old('state')):?>
									<?= "<script>setSelectedOld(". old('state') .",".old('country').",'state')</script>"?>
								<?php endif?>
							</select>
							<?php if($validation_error->getErrors() > 0):?>
								<div class="invalid-feedback" style="display: block;">
									<?= $validation_error->getError('state')?>
								</div>
							<?php endif?>
						</div>
	
						<div class="col-md-6">
							<select  name="city" class="form-select" id="city">
								<option value="select">Seleccione un departamento</option>
								<!-- The dynamic selects, reset when ocurrs a error validation. Then select have only the select default -->
								<!--And the system no can't take back the info without trigger the event change-->
								<!--Then a make a function what trigger the info with old information (info in an input previous to error validation-->
								<!--Her own info, parent's info and her id for take the same data and 'selected' the same value-->
								<?php if(old('city')):?>
									<?= "<script>setSelectedOld(". old('city') ."," . old('state') .",'city')</script>"?>
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
							<textarea name="comment" class="form-control"  placeholder="Comentarios*" id="comment" ><?=old('comment')?></textarea>
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
