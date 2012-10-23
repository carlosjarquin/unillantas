<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?= $title; ?></h1>
		<h4></h4></div>
		<div id="gradient">
	<?=form_open('vales/new_vale')?>
	<?php 
		$folio_vale=array
		(
			'id'	=>	'folio',
			'name'	=>	'folio',
			'value'	=>	set_value('folio')
		);
		
		$submit = array
		(
			'id'	=>	'submit',
			'name'	=>	'submit',
			'value'	=>	'Nuevo vale'
		);
	?>
	
	
	<?php 
		echo form_label('Folio: ');
		echo form_input($folio_vale);
		echo form_error('folio');
	?>
	
	<br />
	<br />
	<?=form_label('Fecha: ')?>
	<input type="text" name="fecha" id="date1" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("d/m/Y");?>" size="10"  />
	<br/><br/>
	<?php 
		echo form_submit($submit);
	?>
	<?=form_close()?>
</div>
</div>
</div>
</div>