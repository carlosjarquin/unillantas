<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">

<?php
	echo form_open('users/new_user');

	$nombre1 =  array
	(
		'name'	=>	'nombre',
		'id'	=>	'nombre',
		'value'	=>	set_value('nombre')
	);
	
	$apellido1 =  array
	(
		'name'	=>	'apellido',
		'id'	=>	'apellido',
		'value'	=>	set_value('apellido')
	);
	
	$username1 =  array
	(
		'name'	=>	'username',
		'id'	=>	'username',
		'value'	=>	set_value('username')
	);
	
	$password1 =  array
	(
		'name'	=>	'password',
		'id'	=>	'password',
		'value'	=>	''
	);
	
	$repass1 =  array
	(
		'name'	=>	'repass',
		'id'	=>	'repass',
		'value'	=>	''
	);
	
	$tipo =  array
	(
		'Administrador'	=>	'Administrador',
		'Ventas'	=>	'Ventas',
		'Bodegas'	=>	'Bodegas',
		'Servicios'	=>	'Servicios'
		
	);
	
	$puesto1 =  array
	(
		'name'	=>	'puesto',
		'id'	=>	'puesto',
		'value'	=>	set_value('puesto')
	);
	
		
	$submit = array
	(
		'name'	=>	'submit',
		'id'	=>	'submit',
		'value'	=>	'Resgistrar'
	);

?>

	<?php 
		echo form_label('Nombre: ');
		echo form_input($nombre1);
		echo form_error('nombre');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Apellido: ');
		echo form_input($apellido1);
		echo form_error('apellido');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Nombre de usuario: ');
		echo form_input($username1);
		echo form_error('username');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Password: ');
		echo form_password($password1);
		echo form_error('password');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Repetir password: ');
		echo form_password($repass1);
		echo form_error('repass');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Tipo: ');
		echo form_dropdown('tipo', $tipo, 'Editor');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Puesto: ');
		echo form_input($puesto1);
	?>
	
	<br />
	<br />
	
	<?php 
		
		echo form_submit($submit);
	?>
	
	<br />
	<br />

<?=form_close()?>

</div>
		</div>
</div>
</div>