<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" integrity="sha512-okE4owXD0kfXzgVXBzCDIiSSlpXn3tJbNodngsTnIYPJWjuYhtJ+qMoc0+WUwLHeOwns0wm57Ka903FqQKM1sA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


	<!-- STYLES -->

	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		},
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}
		.further {
			background-color: rgba(247, 248, 249, 1);
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			border-top: 1px solid rgba(242, 242, 242, 1);
			margin: 20px;
    		padding: 20px;
		}
		.further h2:first-of-type {
			padding-top: 0;
		}
		footer {
			background-color: rgba(221, 72, 20, .8);
			text-align: center;
		}
		footer .environment {
			color: rgba(255, 255, 255, 1);
			padding: 2rem 1.75rem;
		}
		footer .copyrights {
			background-color: rgba(62, 62, 62, 1);
			color: rgba(200, 200, 200, 1);
			padding: .25rem 1.75rem;
		}
	</style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>



</header>

<!-- CONTENT -->


<div class="further">
	<?php $session = \Config\Services::session();?>
	<?php if($session->getFlashdata('success')):?>
		<div id="success" class="alert alert-success" role="alert">
			<?php echo $session->getFlashdata('success')?>
			<button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif?>
	<?php if($session->getFlashdata('fail')):?>
		<div id="success" class="alert alert-fail" role="alert">
			<?php echo $session->getFlashdata('fail')?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif?>
	<div>
		5 Ciudades mas registradas : 
		<?php foreach($mostRegistersCities as $cityRegister):?>
			<span class="badge text-bg-primary">
				<?=$cityRegister['city'] ?>:  <span class="badge text-bg-danger"> <?=$cityRegister['Num cities']?></span>
			</span>
		<?php endforeach?>
		</div>
	
	
	<!-- <a class="btn btn-primary" role="button" href="<?= route_to('users') ?>">Añadir nuevo usuario</a> -->
	<div class="table-responsive">
		<table class="table table-bordered caption-top align-middle">
			<caption>
				Lista de usuarios registrados
				<a style="vertical-align: baseline; float: right; margin: 0 5px;" class="btn btn-primary" role="button" href="<?= route_to('users') ?>">Añadir nuevo usuario</a>
				<a style="vertical-align: baseline; float: right; margin: 0 5px;" class="btn btn-primary" role="button" href="<?= route_to('users_json')?>">Usuarios Json</a>
			</caption>
			<thead>
				<tr>
					<th scope="col">Sexo</th>
					<th scope="col">Fecha de nacimiento</th>
					<th scope="col">Nombre Completo</th>
					<th scope="col">Email</th>
					<th scope="col">Direccion</th>
					<th scope="col">Tipo de residencia</th>
					<th scope="col">Pais</th>
					<th scope="col">Departamento</th>
					<th scope="col">Ciudad</th>
					<th scope="col">Comentarios</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				<?php if($allData) :?>
					<?php foreach($allData as $user) :?>
						<tr>
							<td><?= $user['gender']?></td>
							<td><?= $user['age']?></td>
							<td><?= $user['name'] . ' '. $user['lastname']?></td>
							<td><?= $user['email']?></td>
							<td><?= $user['address']?></td>
							<td><?= $user['type_resident']?></td>
							<td><?= $user['country']?></td>
							<td><?= $user['state']?></td>
							<td><?= $user['city']?></td>
							<td><?= $user['comment']?></td>
							<td>
								<a class="btn btn-warning" role="button" href="<?= route_to('user_to_update', $user['id']) ?>">
									Editar Usuario
								</a>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertDeleteUser">
									Eliminar usuario
								</button>

								<!-- Modal -->
								<div class="modal fade" id="alertDeleteUser" tabindex="-1" aria-labelledby="alertDeleteUserLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="alertDeleteUserLabel">¿Quiere eliminar este usuario?</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												Esta accion es definitiva y no podra revertirse. 
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<a class="btn btn-danger" role="button" href="<?= route_to('users_delete', $user['id']) ?>">
													Eliminar usuario
												</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
					<?php if ($pager) :?>
						<div id="page">
							<?php $pager->setPath('/'); ?>
							<?= $pager->links()?>
						</div>

							<script>
								console.log($('.navigation').children().addClass('page-item'));
								$('#page').children('nav').children('ul').children('li').attr('class', 'page-item');
								$('#page').children('nav').children('ul').children('li').children('a').attr('class', 'page-link');
								$('#page').children('nav').children('ul').addClass('justify-content-center');
								$('#page').insertAfter('table');
							</script>
					<?php endif?>
				<?php else: ?>
					<tr>
						<td colspan="10">No hay informacion disponible</td>
					</tr>
				<?php  endif?> 
			</tbody>
		</div>
		</table>
	</div>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<!-- SCRIPTS -->
<!-- -->

</body>
</html>
