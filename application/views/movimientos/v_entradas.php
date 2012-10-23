<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?= $form_title; ?></h1>
		<h4></h4></div>
		<div id="gradient">
<?=form_open('movimientos/entradas')?>
	<?php 
		$cantidad = array
		(
			'id'	=>	'cantidad',
			'name'	=>	'cantidad',
			'value'	=>	'',
		);
		
		$concepto = array(
			'Factura'=>'Factura',
			'Vale'=>'Vale'
		);
		
		$folio= array(
			'id'=>'folio',
			'name'=>'folio',
			'value'=>'');
		
		$submit = array(
			'id'=>'submit',
			'name'=>'submit',
			'value'=>'Enviar');
	
	?>
	
	<?php
		echo form_label('Entrada por: ');
		echo form_dropdown('concepto',$concepto);
	?>
	<br/><br/>
	<?php 
		echo form_label('MSPN: ');
		echo form_dropdown('mspn', $mspn);
	?>
	
	<br/><br/>
	<?php 
		echo form_label('Cantidad: ');
		echo form_input($cantidad);
		echo form_error('cantidad');
	?>
	<br/><br/>
	
	<?=form_label('Fecha: ')?>
	<input type="text" name="fecha" id="fecha" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("d/m/Y");?>" size="10" onfocus="this.blur()" />
	<br/><br/>
	
	<?php 
		echo form_label('Folio: ');
		echo form_input($folio);
	?>
	<br/><br/>
	
	<?php 
		echo form_label('Bodega: ');
		echo form_dropdown('bodega',$bodega);
	?>
	<br/><br/>
	<?=form_label('Hora: ')?>
	<input type="text" name="hora" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("H:i:s");?>" size="20" onfocus="this.blur()" />
	<br/><br/>
	<?=form_submit($submit)?>
	
	
<?=form_close() ?>
</div>
</div>
</div>
</div>