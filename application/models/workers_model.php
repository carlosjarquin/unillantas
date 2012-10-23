<?php
	class Workers_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function registrar($nombre,$puesto, $direccion, $telefono)
		{
			$this->db->set('nombre', $nombre);
			$this->db->set('puesto', $puesto);
			$this->db->set('direccion', $direccion);
			$this->db->set('telefono', $telefono);
			$this->db->insert('trabajadores');
		}
	}
?>