<div class="container_12" id="cuerpo">

		<div id="titulo"><h1><?= $form_title; ?></h1>
		<h4></h4></div>
	<div class="grid_10 prefix_1">
	<table class="zebra">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">MSPN</th>
            <th scope="col">Medida</th>
            <th scope="col">RCV</th>
            <th scope="col">Costado</th>
            <th scope="col">Precio de lista</th>
			<th scope="col">Modelo</th>
            <th scope="col">Imagen</th>

        </tr>
    </thead>
    <tbody>
    	<?php
    	foreach($catalogo->result() as $row){?>
    		<tr><td><?=$row -> mspn; ?></td>
			<td><?=$row -> medida; ?></td>
			<td><?=$row -> rcv; ?></td>
    		<td><?=$row -> costado; ?></td>
			<td>$<?=$row -> precio; ?></td>
			<td><?=$row -> modelo; ?></td>
    		<td><a  href="<?=base_url(); ?>
			<?=$row -> url_image; ?>" rel="shadowbox">
			<img class="border" src="<?=base_url();?>
			<?=$row -> url_image; ?>" width=80 height=80 /></a></td></tr>
    		   		
    	<?
		}
    	?>    	    
    </tbody>
    
</table>
</div>	
</div>