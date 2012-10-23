<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('detalle_os/new_detalle')?>
		<?php 
			$submit = array(
				'id'	=>	'submit',
				'name'	=>	'submit',
				'value' =>	'Agregar Servicio'
			);
				
			
		?>
		
		<?php 
			echo form_label('Folio OS: ');
			echo form_dropdown('folio_os',$folio_os);
		 ?>
		 <br />
		 <br />
		 <?php 
		 	echo form_label('Servicio: ');
			echo form_dropdown('servicio',$servicio);
			echo form_error('servicio');
		 ?>
		 <br />
		 <br />
		 <?php 
		 	echo form_label('Trabajador: ');
			echo form_dropdown('trabajador',$nombre);
		 ?>
		
		<br />
		<br />
		<?=form_submit($submit)?>
</div></div></div></div>