

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title><?php echo $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style1.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style2.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/reset.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/reset2.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/structure.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/text.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/menu.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/android.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/default.css'); ?>" media="screen" />

<link rel="stylesheet" type="text/css" href="<?=base_url('css/tabla.css')?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery-ui-1.7.2.custom.css');?> " />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.ui.all.css');?> " />

<script type="text/javascript" src="<?=base_url('js/jquery-1.8.1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/jquery-1.8.1.min.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/jquery.ui.core.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/jquery.ui.datepicker.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/jquery.ui.widget.js')?>"></script>
		

<script>

$(function() {
		$( "#date1" ).datepicker();
	});
</script>

<script>

$(function() {
		$( "#date2" ).datepicker();
	});
</script>
		
</head>
<body id="fondo">
		<div id="header" class="container_12">
			<div class="grid_4 suffix_4" id="logo"><a href='<?php echo base_url(); ?>'><img src="<?php echo base_url('images/logo'); ?>/logo.png" width="300" height="116" /></a></div>
			
			<div class="grid_4" id="buscar">
			<div class="log"><?php 
				echo 'Bienvenido '.$this->session->userdata('usuario_id');
				echo anchor('users/logout','<br>Cerrar sesión...');?></div>
				
				<br />
				</div>
		</div>
		<div class="clear"></div>
		<div id="menu" class="container_12">
			<div class="cssmenu">
				<?php if($tipo == 'Administrador'){?>
				<ul>
			<!--menu inicio-->
   				<li class='active'><a href="<?=base_url('home')?>"><span>Inicio</span></a></li>
			<!--menu inicio fin-->				
			
			<!--Menu llantas fin-->
				<li><a href='#'><span>Llantas</span></a>
      			<ul>
         		<li><a href='<?=base_url('modelos/new_model')?>'><span>Nuevo modelo</span></a></li>
				<li><a href='<?=base_url('modelos/editar_eliminar')?>'><span>Editar o eliminar modelo</span></a></li>
				<li><a href='<?=base_url('llantas/nueva_llanta')?>'><span>Nueva llanta</span></a></li>
				<li><a href='<?=base_url('llantas/editar_eliminar')?>'><span>Editar o eliminar llanta</span></a></li>
				
				</ul></li>
			<!----------------------Menu llantas fin------------------->
		
			
			
			<!----------------------Menu Facturas--------------------->	
				<li><a href='#'><span>Facturas</span></a>
				<ul>
				<li><a href='<?=base_url('facturas/nueva_factura')?>'><span>Nueva Factura</span></a></li>
				<li><a href='<?=base_url('facturas/editar_eliminar')?>'><span>Editar o Eliminar Factura</span></a></li>
				</ul>
   				</li>
			<!------------------Menu Facturas fin--------------------->	
			
			<!----------------------Menu Orden de servicio--------------------->	
				<li><a href='#'><span>Ordenes de Servicio</span></a>
				<ul>
				<li><a href='<?=base_url('ordenes/nueva_orden')?>'><span>Nueva OS</span></a></li>
				<li><a href='<?=base_url('ordenes/editar_eliminar')?>'><span>Editar o Eliminar OS</span></a></li>
				</ul>
   				</li>
			<!--Menu orden de servicio fin--------------------->	
				
				
				<!---------------------Menu Detalle Servicios--------------------->
				<li><a href='#'><span>Detalle de Servicios</span></a>
      			<ul>
         		<li><a href='<?=base_url('detalle_os/new_detalle')?>'><span>Agregar Servicios</span></a></li>
         		</ul></li>
				<!---------------------Menu Detalle de SErvicios fin--------------------->
				
				<!---------------------Menu bodegas--------------------->
				<li><a href='#'><span>Bodegas</span></a>
      			<ul>
         		<li><a href='<?=base_url('bodegas/new_warehouse')?>'><span>Nueva bodega</span></a></li>
				<li><a href='<?=base_url('bodegas/editar_eliminar')?>'><span>Editar o eliminar bodega</span></a></li>
				<li><a href='<?=base_url('movimientos/entradas')?>'><span>Registrar nueva entrada</span></a></li>
				<li><a href='<?=base_url('movimientos/salidas')?>'><span>Registrar nueva salida</span></a></li>
				<li><a href='<?=base_url('existencias/new_existencias')?>'><span>Existencias</span></a></li>
				<li><a href='<?=base_url('existencias/editar_eliminar')?>'><span>Editar Existencias</span></a></li>
         		</ul></li>
			<!----------------------Menu bodegas fin------------------->
					
			
			
			<!---------------------Menu Personal--------------------->
			
			<li><a href='#'><span>Personal</span></a>
				<ul>
				<li><a href='<?=base_url('workers/reg_worker')?>'><span>Nuevo Trabajador</span></a></li>
				<li><a href='<?=base_url('users/new_user')?>'><span>Nuevo Usuario</span></a></li>
				</ul>
				</li>
			<!----------------------Menu Personal fin------------------->	
									
   				<li><a href='#'><span>Reportes</span></a>
				<ul>
				<li><a href='<?=base_url('reportes')?>'><span>Reportes E/S</span></a></li>
				<li><a href='<?=base_url('reportes/existencias')?>'><span>Reporte de Existencias</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_os')?>'><span>Reporte de Servicios</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_fct')?>'><span>Reporte de Facturas</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_os')?>'><span>Reporte de O/S</span></a></li>
				</ul>
				</li>
				</ul>
				<?php }?>
				
				
				<?php if($tipo == 'Ventas'){?>
					<ul>
					
			<!--menu inicio-->
   			<li class='active'><a href="<?=base_url('home')?>"><span>Inicio</span></a></li>
			<!--menu inicio fin-->
			
			
			<!----------------------Menu Facturas--------------------->	
				<li><a href='#'><span>Facturas</span></a>
				<ul>
				<li><a href='<?=base_url('facturas/nueva_factura')?>'><span>Nueva Factura</span></a></li>
				
				</ul>
   				</li>
			<!------------------Menu Facturas fin--------------------->	
			
			<!----------------------Menu Orden de servicio--------------------->	
				<li><a href='#'><span>Ordenes de Servicio</span></a>
				<ul>
				<li><a href='<?=base_url('ordenes/nueva_orden')?>'><span>Nueva OS</span></a></li>
				</ul>
   				</li>
			<!--Menu orden de servicio fin--------------------->	
			
			<!---------------------Menu bodegas--------------------->
				<li><a href='#'><span>Salidas</span></a>
      			<ul>
         		<li><a href='<?=base_url('movimientos/salidas')?>'><span>Registrar nueva salida</span></a></li>
				</ul></li>
			<!----------------------Menu bodegas fin------------------->
			
					</ul>
				<?php }?>
				
				<?php if($tipo == 'Bodegas'){?>
				<ul>
			<!--menu inicio-->
   				<li class='active'><a href="<?=base_url('home')?>"><span>Inicio</span></a></li>
			<!--menu inicio fin-->				
			
			<!--Menu llantas fin-->
				<li><a href='#'><span>Llantas</span></a>
      			<ul>
         		<li><a href='<?=base_url('modelos/new_model')?>'><span>Nuevo modelo</span></a></li>
				<li><a href='<?=base_url('modelos/editar_eliminar')?>'><span>Editar o eliminar modelo</span></a></li>
				<li><a href='<?=base_url('llantas/nueva_llanta')?>'><span>Nueva llanta</span></a></li>
				<li><a href='<?=base_url('llantas/editar_eliminar')?>'><span>Editar o eliminar llanta</span></a></li>
				
				</ul></li>
			<!----------------------Menu llantas fin------------------->
		
		<!----------------------Menu Orden de servicio--------------------->	
				<li><a href='#'><span>Ordenes de Servicio</span></a>
				<ul>
				<li><a href='<?=base_url('ordenes/nueva_orden')?>'><span>Nueva OS</span></a></li>
				</ul>
   				</li>
			<!--Menu orden de servicio fin--------------------->
			
							
				<!---------------------Menu bodegas--------------------->
				<li><a href='#'><span>Bodegas</span></a>
      			<ul>
         		<li><a href='<?=base_url('bodegas/new_warehouse')?>'><span>Nueva bodega</span></a></li>
				<li><a href='<?=base_url('bodegas/editar_eliminar')?>'><span>Editar o eliminar bodega</span></a></li>
				<li><a href='<?=base_url('movimientos/entradas')?>'><span>Registrar nueva entrada</span></a></li>
				<li><a href='<?=base_url('movimientos/salidas')?>'><span>Registrar nueva salida</span></a></li>
				<li><a href='<?=base_url('existencias/new_existencias')?>'><span>Existencias</span></a></li>
				<li><a href='<?=base_url('existencias/editar_eliminar')?>'><span>Editar Existencias</span></a></li>
         		</ul></li>
			<!----------------------Menu bodegas fin------------------->
					
			
									
   				<li><a href='#'><span>Reportes</span></a>
				<ul>
				<li><a href='<?=base_url('reportes')?>'><span>Reportes E/S</span></a></li>
				<li><a href='<?=base_url('reportes/existencias')?>'><span>Reporte de Existencias</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_os')?>'><span>Reporte de Servicios</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_fct')?>'><span>Reporte de Facturas</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_os')?>'><span>Reporte de O/S</span></a></li>
				</ul>
				</li>
				</ul>
				<?php }?>
				
				
				<?php if($tipo == 'Servicios'){?>
				<ul>
				<!--menu inicio-->
   				<li class='active'><a href="<?=base_url('home')?>"><span>Inicio</span></a></li>
			<!--menu inicio fin-->				
				<!---------------------Menu Detalle Servicios--------------------->
				<li><a href='#'><span>Detalle de Servicios</span></a>
      			<ul>
         		<li><a href='<?=base_url('detalle_os/new_detalle')?>'><span>Agregar Servicios</span></a></li>
         		</ul></li>
			<!----------------------Menu bodegas fin------------------->	
				
				
   				<li><a href='#'><span>Reportes</span></a>
				<ul>
				<li><a href='<?=base_url('reportes')?>'><span>Reportes E/S</span></a></li>
				<li><a href='<?=base_url('reportes/existencias')?>'><span>Reporte de Existencias</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_os')?>'><span>Reporte de Servicios</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_fct')?>'><span>Reporte de Facturas</span></a></li>
				<li><a href='<?=base_url('reportes/detalle_ventas_os')?>'><span>Reporte de O/S</span></a></li>
				</ul>
				</li>
				
					
					
				<?php }?>
				
				</div>
		</div>
		<div class="clear"></div>