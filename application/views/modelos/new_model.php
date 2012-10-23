<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?= $form_title; ?></h1>
		<h4></h4></div>
		<div id="gradient">

<?php
	echo form_open_multipart('modelos/new_model');
	
	$modelo = array(
		'name'	=>	'modelo',
		'id'	=>	'modelo',
		'value'	=>	set_value('modelo')
	);
	
	$marca = array(
	
		'Michelin'	=> 'Michelin',
		'BF Goodrich'	=>	'BF Goodrich',
		'Uniroyal'	=>	'Uniroyal',
		'Classic' => 'Classic',
		'Milenia' => 'Milenia',
		'Raptor' => 'Raptor',
		'Sport King' => 'Sport King'
	);
	
	
	
	$submit = array(
		'name'	=>	'submit',
		'id'	=>	'submit',
		'value'	=>	'Nuevo modelo'
	
	);
?>


	<?php 
		echo form_label('Modelo: ');
		echo form_input($modelo);
		echo form_error('modelo');
	?>
	<br />
	<br />
	
	
	
	<?php echo form_label('', 'userfile') ?>
    <?php echo form_upload('userfile') ?>
	<br />
	<br />
	<?php 
		echo form_label('Marca: ');
		echo form_dropdown('marca',$marca, 'Michelin');
	
	?>
	<br />
	<br />
	<?php 
	
		echo form_submit($submit);
	?>
</div>
</div>
</div>
</div>