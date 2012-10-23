<?php
class Warehouse_model extends CI_Model {
	function __construct() {
		parent::__construct();

	}

	function new_warehouse($bodega, $direccion) {
		$this -> db -> set('bodega', $bodega);
		$this -> db -> set('direccion', $direccion);
		$this -> db -> insert('bodegas');
	}

	function check_warehouse($bodega) {

		$query = "SELECT bodega FROM bodegas WHERE bodega=?";
		$result = $this -> db -> query($query, $bodega);
		if ($result -> num_rows() > 0) {
			//bodega existente

			return TRUE;
		}

		//bodega no existe
		else {
			return FALSE;
		}

	}
	
	function listar_bodegas(){
		$query=$this->db->query("select * from bodegas");
		return $query;
	}
	
	function editar_bodega($id){
		$query=$this->db->query("select * from bodegas where idbodegas=".$id);
		return $query;
	}

}
?>