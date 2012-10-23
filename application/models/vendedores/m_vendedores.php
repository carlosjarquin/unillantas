<?php 
	class M_vendedores extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function nuevo_vendedor($nombre,$apellido)
		{
			$this->db->set('nombre',$nombre);
			$this->db->set('apellido',$apellido);
		}
	}
?>