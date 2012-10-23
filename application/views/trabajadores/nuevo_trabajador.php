<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$title?></h1>
		<h4></h4></div>
		<div id="gradient">

		<?php
				echo form_open('workers/reg_worker'); 
				
				$nombre = array
				(
					'name'	=>	'nombre',      	
					'id'	=>	'nombre',
					'value'	=>	set_value('nombre')
				);
				
				$puesto = array(
					'Alineador'	=>	'Alineador',
					'Suspensionista'	=>	'Suspensionista',
					'Técnico en llantas'	=>	'Técnico en llantas',
				);
				
				$direccion = array 
				(
					'id' => 'direccion',
					'name'	 => 'direccion',
					'value'	=>	set_value('direccion')
				);
				
				$telefono = array 
				(
					'id' => 'telefono',
					'name'	 => 'telefono',
					'value'	=>	set_value('telefono')
				);
				
				$submit = array(
					'name'	=>	'submit',
					 'id'	=>	'submit',
					 'value'	=>	'Registrar'
				);
		?>
		
		<?php 
				echo form_label('Nombre(s): ');
				echo form_input($nombre);
				echo form_error('nombre');
		?>
		
		<br />
		<br />
		
		<?php 
			echo form_label('Puesto: ');
			echo form_dropdown('puesto', $puesto, 'Alineador');
		?>
		<br />
		<br />
		<?php 
				echo form_label('Direccion: ');
				echo form_input($direccion);
				echo form_error('direccion');
		?>
		<br />
		<br />
		<?php 
				echo form_label('Telefono: ');
				echo form_input($telefono);
				echo form_error('telefono');
		?>
		<br />
		<br />
		<?php 
			echo form_submit($submit);
			
			echo form_close();
		?>


</div></div></div></div>