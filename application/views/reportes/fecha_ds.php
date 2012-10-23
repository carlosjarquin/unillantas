<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?php echo 'Reporte de Servicios';?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('reportes/detalle_os')?>
		<?php
			$submit= array
			(
				'id'=>'submit',
				'name'=>'submit',
				'value'=>'Consultar'
			);
			
		?>
		<?=form_label('Fecha: ')?>
		<input type="text" id="date1" name="date1" onfocus="this.blur()"/>
		<?=form_error('datepicker');?>
		<br/><br/>
		<?php 

		?>
		<br/><br/>
		<?=form_submit($submit);?>
		<?=form_close();?>
</div></div></div></div>