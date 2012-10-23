<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?= $form_title; ?></h1>
		<h4></h4></div>
		<div id="gradient">
<?=form_open('movimientos/salidas')?>
	<?php 
		
		$cantidad = array
		(
			'id'	=>	'cantidad',
			'name'	=>	'cantidad',
			'value'	=>	'',
		);
		
		$concepto = array 
		(
			'0' =>'Factura',
			'1'=>'Orden de servicio',
			'2'=>'Vale'
		);
		
		$folio = array
		(
			'id'=>'folio',
			'name'=>'folio',
			'value'=>''
		);
		
				
		$cerrar = array(
			'1' =>'activo',
			'0'=>'cerrar'
		);
		
		$submit = array('id'=>'submit','name'=>'submit','value'=>'Enviar');
		
	?>
	
	<?php 
		echo form_label('Concepto: ');
		echo form_dropdown('concepto',$concepto,'Factura');
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
		echo form_error('folio');
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
	<?php 
		echo form_label('Cerrar factura/os');
		echo form_dropdown('cerrar',$cerrar,'activo');
	?>
	<br/><br/>
	<?=form_submit($submit)?>
	
	
<?=form_close() ?>
</div>
</div>
</div>
</div>