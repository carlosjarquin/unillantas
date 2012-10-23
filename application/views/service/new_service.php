<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
		
		<?=form_open('servicios/new_service')?>
		<?php 
			$submit = array(
				'id'	=>	'submit',
				'name'	=>	'submit',
				'value' =>	'Enviar'
			);
			
		?>
		<?php 
			echo form_label('trabajardor: ');
			echo form_dropdown('trabajadores', $trabajadores);
		 ?>
		 <br />
		 <br />
		 <?php 
		 	echo form_label('Folio de O.S.: ');
			echo form_dropdown('folios', $folios);
		 ?>
		 <br />
		 <br />
		<textarea name="servicio" rows="4" cols= "30">
		
		</textarea>
		<br />
		<br />
		<?=form_submit($submit)?>
</div></div></div></div>