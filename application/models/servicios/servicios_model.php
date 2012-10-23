<?php
	class Servicios_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function nuevo_servicio($idtrabajador, $folios, $servicio)
		{
			$this->db->set('trabajadores_idtrabajadores',$idtrabajador);
			$this->db->set('orden_servicio_folio_os',$folios);
			$this->db->set('servicio',$servicio);
			$this->db->insert('servicios');
		}
		
		function get_trabajadores()
		{
			$result = $this->db->select('idtrabajadores, nombre')->get('trabajadores')->result_array();
			$dropdown = array();
			foreach($result as $r)
			{
				$dropdown[$r['idtrabajadores']]= $r['nombre'];
			}
			return $dropdown;
		}
		
		function get_folio_os()
		{
			$result = $this->db->select('folio_os')->get('orden_servicio')->result_array();
			$dropdown = array();
			foreach($result as $r)
			{
				$dropdown[$r['folio_os']]= $r['folio_os'];
			}
			return $dropdown;
		}
		
	}
?>