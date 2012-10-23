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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/shadowbox.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery-ui-1.7.2.custom.css');?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=base_url('css/tabla.css')?>" media="screen" />

<script type="text/javascript" src="<?=base_url('js/jquery-1.8.1.min.js')?>"></script>


<script type="text/javascript" src="<?=base_url('js/shadowbox.js')?>"></script>
<script type="text/javascript">
Shadowbox.init({
				handleOversize : "drag",
				modal : true
			});
</script>
</head>
<body id="fondo">
		<div id="header" class="container_12">
			<div class="grid_4 suffix_4" id="logo"><a href='<?php echo base_url(); ?>'><img src="<?php echo base_url('images/logo/logo.png'); ?>" width="300" height="116" /></a></div>
			
			<div class="grid_4" id="buscar">
			<div class="log"><?php echo anchor('users/login_form','Iniciar sesión...');?></div>
				
				</div>
		</div>
		<!---------------------inicia menu------------------->
		<div class="clear"></div>
		<div id="menu" class="container_12">
			<div class="cssmenu">
				<ul>
   				<li class='active '><?= anchor(base_url(), 'Inicio');?></li>
				
				<!----------------finaliza menu OS----------------->
      			</ul>
         		
				</div>
		</div>
		<div class="clear"></div>
		<!--------------------------------finaliza menu-------------------------------->