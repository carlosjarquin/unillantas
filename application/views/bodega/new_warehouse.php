<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
	<?=form_open('bodegas/new_warehouse');?>
	<?php 
		$bodega = array
		(
			'name'	=>	'bodega',
			'id'	=>	'bodega',
			'value'	=>	set_value('bodega')
		);
		$direccion = array
		(
			'name'	=>	'direccion',
			'id'	=>	'direccion',
			'value'	=>	set_value('direccion')
		);
		
		$submit = array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Enviar'
		);
	?>
	
	<?php
		echo form_label('Bodega: ');
		echo form_input($bodega);
		echo form_error('bodega');
	?>
	<br />
	<br />
	<?php 
		echo form_label('Dirección: ');
		echo form_input($direccion);
	?>
	<br />
	<br />
	<?php 
		echo form_submit($submit);
	?>
			
</div></div></div></div>