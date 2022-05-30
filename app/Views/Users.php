<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" integrity="sha512-okE4owXD0kfXzgVXBzCDIiSSlpXn3tJbNodngsTnIYPJWjuYhtJ+qMoc0+WUwLHeOwns0wm57Ka903FqQKM1sA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js" integrity="sha512-C92U8X5fKxCN7C6A/AttDsqXQiB7gxwvg/9JCxcqR6KV+F0nvMBwL4wuQc+PwCfQGfazIe7Cm5g0VaHaoZ/BOQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/v4-shims.min.js" integrity="sha512-jV9c9TgJKs4VzfA+DtPAXJqOMs0gsEmfhKEgtT4TqE7SPjwXiDmtDKsh1FXIPX/gDFcckXaVB7xNKD+LIS5GmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- STYLES -->
	</style>
</head>
<body>

<style>
	.icons{
		font-size: 20px;
	}

	.social-icons{
		--bs-bg-opacity: 1;
		background-color: #5ee1e1;
		border-radius: 62px;
		text-align: center;
		width: 11%;
		margin: 0 5px;
		padding: 5px;
	}
</style>
<!-- CONTENT -->
<?php $session = \Config\Services::session();?>
<?php if($session->getFlashdata('fail')):?>
	<div id="success" class="alert alert-fail" role="alert">
		<?php echo $session->getFlashdata('fail')?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif?>
<div class="mt-2 me-4 ms-4">
	<h1 class="display-4 text-center">Formulario de contacto</h1>
</div>

<div class="mt-2 me-5 ms-5 p-3" >

	<?php if($form_update == false): ?>
		<?= $this->include($form_add);?>
	<?php elseif($form_add == false): ?>
		<?= $this->include($form_update);?>
	<?php endif ?>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<!-- SCRIPTS -->
<script>

	//Set options by id country
	function setOptionsState(states, old_value=null){
		var states = JSON.parse(states);
		$('#state').empty();
		$('#state').append($('<option>', { 
			value: 'select',
			text : 'Departamento*'
		}));
		states.forEach(element => {
			if(old_value != null && element.id == old_value){
				console.log(old_value);
				$('#state').append($('<option >', { 
					value: element.id,
					text : element.name,
					selected: true
				}));
			}else{
				$('#state').append($('<option>', { 
					value: element.id,
					text : element.name 
				}));
			}
		});
	}
	//

	//Set options by id state
	function setOptionsCity(cities, old_value = null){
		var cities = JSON.parse(cities);
		$('#city').empty();
		$('#city').append($('<option>', { 
			value: 'select',
			text : 'Ciudad*'
		}));
		cities.forEach(element => {
			if(old_value != null && element.id == old_value){
				$('#city').append($('<option>', { 
					value: element.id,
					text : element.name,
					selected: true
				}));

			}else{
				$('#city').append($('<option>', { 
					value: element.id,
					text : element.name,
				}));
			}
		});
	}

	//Invoke info for the children select and provide info
		$('#country').on('change',function(){	
			var country = $('#country').val();
			$.get("/state/"+country, function(data){
				if(data.length === 2){
					//If in db no have data about states for the selected country then city and states are unable
					$('#state').empty();
					$('#state').append($('<option>', { 
						value: 'N/A',
						text : 'No hay ciudades disponibles',
					}));
					$('#city').empty();
					$('#city').append($('<option>', { 
						value: 'N/A',
						text : 'No hay ciudades disponibles',
					}));
					//
				}else{
					setOptionsState(data);

					//If the country change and the state equal, then cities select return a default state
					$('#city').empty();
					$('#city').append($('<option>', { 
						value: 'select',
						text : 'Seleccione un departamento',
					}));
				}
			});
		});


		$('#state').on('change',function(){
			var state = $('#state').val();
			console.log(state);
			$.get("/city/"+state, function(data){
				if(data.length === 2){
					$('#city').empty();
					$('#city').append($('<option>', { 
						value: 'N/A',
						text : 'No available Cities',
					}));
				}else{
					setOptionsCity(data);
				}
			});
		});
	//
</script>
<script>
		$(function() {
			$("#age").datepicker({
				changeYear: true,
				changeMonth: true,
				yearRange: '1950:2100',
				format: 'dd-mm-yyyy'
			});
		});
	</script>

<!-- -->

</body>
</html>
