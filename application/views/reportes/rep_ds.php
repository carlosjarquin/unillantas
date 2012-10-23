<div class="container_12" id="cuerpo">

		<div id="titulo"><h1><?= $form_title;echo '<br>'.date('d-m-y') ?></h1>
		<h4></h4></div>
	<div class="grid_10 prefix_1">
	<table class="zebra" border="1">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">Folio OS</th>
            <th scope="col">Servicio</th>
            <th scope="col">Trabajador</th>
			<th scope="col">Fecha</th>

        </tr>
    </thead>
    <tbody>
    	<?php
    	foreach($resultado->result() as $row){?>
    		<tr>
			<td><?=$row -> folio_os; ?></td>
			<td><?=$row -> servicio; ?></td>
			<td><?=$row -> nombre; ?></td>
			<td><?=$row -> fecha; ?></td>
			
			</tr>
    		   		
    	<?
		}
    	?>    	    
    </tbody>
    
</table>
<input type="button" value="Imprimir reporte" onclick="window.open('<?=base_url('assets/pdfs/'.$pdf)?>')" />
</div>	
</div>