<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?php echo 'Reportes E/S';?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('reportes')?>
		<?php
			$submit= array
			(
				'id'=>'submit',
				'name'=>'submit',
				'value'=>'Consultar'
			);
			
			$metodo = array(
				'1'=>'Entradas por Factura',
				'2'=>'Entradas por vale',
				'3'=>'Salidas por Factura',
				'4'=>'Salidas por OS',
			)
		?>
		<?=form_label('Fecha: ')?>
		<input type="text" id="date1" name="date1" onfocus="this.blur()"/>
		<?=form_error('datepicker');?>
		<br/><br/>
		<?php 
			echo form_label('Elija el reporte:');
			echo form_dropdown('metodo',$metodo,'Entradas');
		?>
		<br/><br/>
		<?=form_submit($submit);?>
		<?=form_close();?>
</div></div></div></div>