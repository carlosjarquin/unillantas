<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?=$title?></h1>
		<h4></h4></div>
		<div id="gradient">

<?php
echo form_open('llantas/nueva_llanta');

$mspn = array('name' => 'mspn', 'id' => 'mspn', 'value' => set_value('mspn'));

$medida = array('name' => 'medida', 'id' => 'medida', 'value' => set_value('medida'));

$rcv = array('name' => 'rcv', 'id' => 'rcv', 'value' => set_value('rcv'));

$costado = array('name' => 'costado', 'id' => 'costado', 'value' => set_value('costado'));

$precio = array('name' => 'precio', 'id' => 'precio', 'value' => set_value('precio'));

$c_barras = array('name' => 'ccodigo', 'id' => 'codigo', 'value' => set_value('codigo'));

$existencia_min = array('name' => 'existencia_min', 'id' => 'existencia_min', 'value' => set_value('existencia_min'));

$submit = array('name' => 'submit', 'id' => 'submit', 'value' => 'Enviar');
?>

		<?php
	echo form_label('*MSPN: ');
	echo form_input($mspn);
	echo form_error('mspn');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*Medida: ');
			echo form_input($medida);
			echo form_error('medida');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*RCV: ');
			echo form_input($rcv);
			echo form_error('rcv');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*Costado: ');
			echo form_input($costado);
			echo form_error('');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*Precio: ');
			echo form_input($precio);
			echo form_error('precio');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*Codigo de barras: ');
			echo form_input($c_barras);
			echo form_error('ccodigo');
		?>
		<br />
		<br />
		
		<?php
			echo form_label('*Existencia minima: ');
			echo form_input($existencia_min);
			echo form_error('existencia_min');
		?>
		<br />
		<br />
		
		<?php 
			echo form_label('Modelo: ');
			echo form_dropdown('modelo', $drop); 
			echo form_error('modelo');
			?>
			
		<br />
		<br />
		 
		<?php

			echo form_submit($submit);
		?> 
<?php echo form_close(); ?>
</div>
		</div>
</div>
</div>