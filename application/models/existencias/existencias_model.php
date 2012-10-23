<?php
class Existencias_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function nuevas_existencias($idbodegas, $mspn, $cantidad) {
		$this -> db -> set('id_bodega', $idbodegas);
		$this -> db -> set('llantas_MSPN', $mspn);
		$this -> db -> set('cantidad', $cantidad);
		$this -> db -> insert('existencias');
	}

	function get_bodegas() {
		$result = $this -> db -> select('idbodegas,bodega') -> get('bodegas') -> result_array();
		$dropdown = array();
		foreach ($result as $r) {
			$dropdown[$r['idbodegas']] = $r['bodega'];
		}
		return $dropdown;
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
	
	function actualizar($mspn,$cantidad,$bodega)
	{
		$query = 'select cantidad from existencias where llantas_mspn='.$mspn.' and id_bodega = '.$bodega;
		
		$result= $this->db->query($query);
		foreach($result->first_row() as $r){
			$result2= $r;	
		}
		
		$result2 = $result2 +$cantidad;
		
		$data=array('cantidad'=>$result2);
		
		$this->db->where('llantas_mspn', $mspn);
		$this->db->where('id_bodega', $bodega);
		$this->db->update('existencias',$data);
		
		
	}
	
	
	function actualizar_menos($bodega,$mspn,$cantidad)
	{
		
		
		$query = 'select cantidad from existencias where llantas_mspn='.$mspn.' and id_bodega = '.$bodega;
		
		$result= $this->db->query($query);
		foreach($result->first_row() as $r){
			$result2= $r;	
		}
		
		$result2 = $result2-$cantidad;
		
		$data=array('cantidad'=>$result2);
		
		$this->db->where('llantas_mspn', $mspn);
		$this->db->where('id_bodega', $bodega);
		$this->db->update('existencias',$data);
		
		
	}
	
	function prueba($bodega,$mspn,$cantidad)
	{
		$query = 'select cantidad from existencias where llantas_mspn='.$mspn.' and id_bodega = '.$bodega;
		
		$result= $this->db->query($query);
		foreach($result->first_row() as $r){
			$result2= $r;	
		}
		
		$result2 = $result2-$cantidad;
		
		echo $result2;
	}
	
	function check_existencias($cantidad,$mspn,$bodega)
	{
		$query = 'select * from existencias where cantidad>'.$cantidad.' and llantas_mspn = '.$mspn.' and id_bodega ='.$bodega.'';
		
		$result = $this->db->query($query);
		
		if($result->num_rows()>=0)
		{
			return TRUE;
		}
		
		else{
			return FALSE;
		}
	}
}
?>