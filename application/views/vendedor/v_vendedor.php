<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">	
	<?php
		echo form_open('c_clientes/nuevo_cliente');
		
		$nombre= array
		(
			'id'	=>	'nombre',
			'name'	=>	'nombre',
			'value'	=>	set_value('nombre')
		);
		
		$apellidos = array
		(
			'id'	=>	'apellidos',
			'name'	=>	'apellidos',
			'value'	=>	set_value('apellidos')
		);
		
		$submit= array
		(
			'id'	=>	'submit',
			'name'	=>	'submit',
			'value'	=>	'Registrar'
		);

	?>
			
	<?php 
		echo form_label('Nombre(s): ');
		echo form_input($nombre);
		echo form_error('nombre');
	?>
	<br/><br/>		
	<?php 
		echo form_label('Apellido(s): ');
		echo form_input($apellidos);
		echo form_error('apellidos');
	?>
	<br/><br/>	
		
	<?php echo form_submit($submit) ?>
	<?=form_close()?>
	
</div></div></div></div>