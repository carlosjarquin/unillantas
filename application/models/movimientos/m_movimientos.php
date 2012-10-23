<?php
	class M_movimientos extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function nuevo_movimiento($tipo,$concepto,$mspn,$cantidad,$fecha,$folio,$bodega,$usuario,$hora)
		{
			$this->db->set('tipo',$tipo);
			$this->db->set('concepto',$concepto);
			$this->db->set('mspn_llanta',$mspn);
			$this->db->set('cantidad',$cantidad);
			$this->db->set('fecha',$fecha);
			if($concepto == 'Factura')
			{
				$this->db->set('folio_fct',$folio);	
			}
			else
			{
				$this->db->set('folio_vale',$folio);	
			}
			$this->db->set('bodega',$bodega);
			$this->db->set('usuario',$usuario);
			$this->db->set('hora',$hora);
			$this->db->insert('movimientos');
		}
		
		
		
		function get_llantas() 
		{
		$result = $this -> db -> select('mspn') -> get('llantas') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['mspn']] = $r['mspn'];
		}
		return $dropdown;
		}
		
		function get_bodega() 
		{
		$result = $this -> db -> select('idbodegas,bodega') -> get('bodegas') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['idbodegas']] = $r['bodega'];
		}
		return $dropdown;
		}
		
		function os_activos($folio)
		{
			$query = 'select * from orden_servicios where folio_os = '.$folio.' and estatus = "activo"';
			
			$result = $this->db->query($query);
			
			if($result->num_rows() < 1){
				return true;
			}
			
			else{
				return FALSE;
			}
		}
		
		public function fct_activa($folio_fct)
		{
		 	$query = 'select * from factura where folio_fct = '.$folio_fct.' and estatus = "activo"';
			
			$result = $this->db->query($query);
			
			if($result->num_rows() < 1){
				return true;
			}
			
			else{
				return FALSE;
			}
		}
		
		
		function mov_salida_fact($tipo,$concepto,$mspn,$cantidad,$fecha,$folio_fct,$bodega,$usuario,$hora)
		{
			$this->db->set('tipo',$tipo);
			$this->db->set('concepto',$concepto);
			$this->db->set('mspn_llanta',$mspn);
			$this->db->set('cantidad',$cantidad);
			$this->db->set('fecha',$fecha);
			$this->db->set('folio_fct',$folio_fct);
			$this->db->set('bodega',$bodega);
			$this->db->set('hora',$hora);
			$this->db->set('usuario',$usuario);
			$this->db->insert('movimientos');
			
		}
		
		function mov_salida_os($tipo,$concepto,$mspn,$cantidad,$fecha,$folio_os,$bodega,$usuario,$hora)
		{
			$this->db->set('tipo',$tipo);
			$this->db->set('concepto',$concepto);
			$this->db->set('mspn_llanta',$mspn);
			$this->db->set('cantidad',$cantidad);
			$this->db->set('fecha',$fecha);
			$this->db->set('folio_os',$folio_os);
			$this->db->set('bodega',$bodega);
			$this->db->set('usuario',$usuario);
			$this->db->set('hora',$hora);
			$this->db->insert('movimientos');
			
		}
		
		function vale($vale_os)
		{
			$query = 'select * from '
		}
	}
?>