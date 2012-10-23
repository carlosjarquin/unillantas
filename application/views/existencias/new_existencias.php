<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('existencias/new_existencias')?>
		<?php 
			$submit = array(
				'id'	=>	'submit',
				'name'	=>	'submit',
				'value' =>	'Enviar'
			);
				
			$cantidad = array
					(
						'name'	=>	'cantidad',      	
						'id'	=>	'cantidad',
						'value'	=>	set_value('cantidad')
					);
		?>
		
		<?php 
			echo form_label('Cantidad: ');
			echo form_input($cantidad);
			echo form_error('cantidad');
		?>
		<br/><br/>
		<?php 
			echo form_label('Bodega: ');
			echo form_dropdown('bodegas', $bodegas);
		 ?>
		 <br />
		 <br />
		 <?php 
		 	echo form_label('Llanta: ');
			echo form_dropdown('mspn', $llantas);
		 ?>
		 <br />
		 <br />
		
		<br />
		<br />
		<?=form_submit($submit)?>
</div></div></div></div>