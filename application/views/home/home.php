<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5">	
		
		
		
<div class="cuadro">
					<div id="textbox">  
	<!--Esta area es exclusiva para el buscador-->
	<?=form_open('home/index')?>
	<?php 
		
		
		$submit = array
		(
			'name' => 'submit', 
			'id' => 'submit', 
			'value' => 'Buscar'
		);
	?>
			<?php 
			echo form_submit($submit); 
			?>
			<input value="MSPN..." name="buscar" id="buscar" size="35" onclick="this.value=''" />
			<?=form_error('buscar');?>
			
	<?=form_close()?> 

	</div>
</div>
				
</div></div></div>