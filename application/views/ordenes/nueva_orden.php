<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
<?=form_open('ordenes/nueva_orden')?>
	<?php
		$folio = array
		(
			'id'	=>	'folio',
			'name'	=>	'folio',
			'value'	=>	set_value('folio')
		);
		
		
		
		$submit = array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Enviar'
		);
			
	?>
	
	<?php
		echo form_label('Folio de la Orden de Servicio: ');
		echo form_input($folio);
		echo form_error('folio');
	?>
	<br />
	<br />
	<?=form_label('Fecha: ')?>
	<input type="text" name="date1" id="date1" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("d/m/Y");?>" size="10"  />
	<br/><br/>
	<?=form_label('Vendedor: ')?>
	<input type="text" name='vendedor' id="vendedor" value="<?=$vendedor?>"onfocus="this.blur()" />
	<br/>	<br/>	
	<?php 
		echo form_submit($submit);
	?>
	<?=form_close()?>
</div></div></div></div>