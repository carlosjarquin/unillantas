<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?php echo 'Reporte de Ordenes de Servicio';?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('reportes/detalle_ventas_os')?>
		<?php
			$submit= array
			(
				'id'=>'submit',
				'name'=>'submit',
				'value'=>'Consultar'
			);
			
		?>
		<?=form_label('Fecha inicial: ')?>
		<input type="text" id="date1" name="date1" onfocus="this.blur()"/> <br/><br/>
		<?=form_label('Fecha final: ')?>
		<input type="text" id="date2" name="date2" onfocus="this.blur()"/>
		<?=form_error('datepicker');?>
		<br/><br/>
		<?php 
		echo form_submit($submit);
		?>
</div></div></div></div>