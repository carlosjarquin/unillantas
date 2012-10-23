<div class="container_12" id="cuerpo">

		<div id="titulo"><h1><?= $form_title; echo '<br>'.date('d-m-y')?></h1>
		<h4></h4></div>
	<div class="grid_10 prefix_1">
	<table class="zebra" border="1">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">Bodega</th>
            <th scope="col">MSPN</th>
            <th scope="col">Existencias</th>

        </tr>
    </thead>
    <tbody>
    	<?php
    	foreach($resultado->result() as $row){?>
    		<tr>
			<td><?=$row -> b; ?></td>
			<td><?=$row -> e; ?></td>
			<td><?=$row -> s; ?></td>
			
			</tr>
    		   		
    	<?
		}
    	?>    	    
    </tbody>
    
</table>
<input type="button" value="Imprimir reporte" onclick="window.open('<?=base_url('assets/pdfs/'.$pdf)?>')" />
</div>	
</div>