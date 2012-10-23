
<div class="container_12" id="cuerpo">
<div class="grid_5 prefix_3">
<div class= "grid_5" id="registro">	
		<div id="titulo"><h1><?$form_title?></h1>
		<h4></h4></div>
		<div id="gradient">
<?php
	echo form_open('users/login');
	
	$username = array
	(
		'name'	=>	'username',
		'id'	=>	'username',
		'value'	=>	set_value('username')
	);
	
	$password = array
	(
		'name'	=>	'password',
		'id'	=>	'password',
		'value'	=>	''
	);
	
	$submit = array
	(
		'name'	=>	'submit',
		'id'	=>	'submit',
		'value'	=>	'Login'
	);
?>

	<?php 
		echo form_label('Nombre de usuario: ');
		echo form_input($username);
		echo form_error('username');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_label('Password: ');
		echo form_password($password);
		echo form_error('password');
	?>
	
	<br />
	<br />
	
	<?php 
		echo form_submit($submit);
		echo anchor('users/new_user', 'Nuevo usuario.');
	
	?>


</div>
</div>
</div>
</div>