<div class="container_12" id="cuerpo">

		<div id="titulo"><h1><?php echo $form_title; echo '<br>'.date('d-m-y');?></h1>
		<h4></h4></div>
	<div class="grid_10 prefix_1">
	<table class="zebra" border="1">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">Tipo</th>
            <th scope="col">Concepto</th>
            <th scope="col">MSPN</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha</th>
			<th scope="col">Hora</th>
            <th scope="col">Folio OS</th>
			<th scope="col">Bodega</th>
			<th scope="col">Usuario</th>

        </tr>
    </thead>
    <tbody>
    	<?php
    	foreach($resultado->result() as $row){?>
    		<tr>
			<td><?=$row -> tipo; ?></td>
			<td><?=$row -> concepto; ?></td>
			<td><?=$row -> mspn_llanta; ?></td>
			<td><?=$row -> cantidad; ?></td>
			<td><?=$row -> fecha; ?></td>
			<td><?=$row -> hora; ?></td>
			<td><?=$row -> folio_os; ?></td>
			<td><?=$row -> bodega; ?></td>
			<td><?=$row -> usuario; ?></td>
			
			</tr>
    		   		
    	<?
		}
    	?>    	    
    </tbody>
    
</table>

<input type="button" value="Imprimir reporte" onclick="window.open('<?=base_url('assets/pdfs/'.$pdf)?>')" />
</div>	
</div>