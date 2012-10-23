<?php
class detalle_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function nuevo_detalle($id_os, $id_servicio, $id_trabajadores) {
		$this -> db -> set('id_os', $id_os);
		$this -> db -> set('id_servicios', $id_servicio);
		$this -> db -> set('id_trabajadores', $id_trabajadores);
		$this -> db -> insert('detalle_servicios');
	}

	function get_os() {
		$result = $this -> db -> select('id_os,folio_os') -> get('orden_servicios') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['id_os']] = $r['folio_os'];
		}
		return $dropdown;
	}

	function get_servicio() 
	{
		$result = $this -> db -> select('id_servicios,servicio') -> get('servicios') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['id_servicios']] = $r['servicio'];
		}
		return $dropdown;
	}
	
	
	function get_trabajador() 
	{
		$result = $this -> db -> select('id_trabajadores,nombre') -> get('trabajadores') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['id_trabajadores']] = $r['nombre'];
		}
		return $dropdown;
	}
	
	function check_detalle($id_servicios,$id_os)
	{
    	$query_str= 'SELECT id_os,id_servicios FROM detalle_servicios WHERE id_os='.$id_os.' and id_servicios='.$id_servicios;
		$result = $this->db->query($query_str);
			
			
		if ($result->num_rows()>0){
			//el servicio esta registrado existe
			return TRUE;
		}
			
		else{
			//el servicio aun no esta registrado	
			return FALSE;
			}
	}
	
	
}
?>