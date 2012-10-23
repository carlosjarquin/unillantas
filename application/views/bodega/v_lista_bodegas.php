<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">

		<div id="titulo"><h1><?$form_title?></h1>
		<h4></h4></div>
	
			
	<center>
	<?php
		$tmpl = array ('table_open' => '<table border = "1">');
		$this->table->set_template($tmpl);
		$this->table->set_heading(' ID', 'Bodega', 'Dirección');
		echo $this->table->generate($lista_bodegas);
	?>
	</center>
</div></div>
