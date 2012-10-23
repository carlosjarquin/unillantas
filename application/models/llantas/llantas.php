<?php
	class Llantas extends CI_Model{
		function __construct(){
			parent::__construct();
			
		}
		
		
		function new_tire($mspn,$medida,$rcv,$costado,$precio,$ccodigo,$existencia_min,$modelo)
		{
			$this->db->set('mspn', $mspn);
			$this->db->set('medida', $medida);
			$this->db->set('rcv', $rcv);
			$this->db->set('costado', $costado);
			$this->db->set('precio', $precio);
			$this->db->set('c_barras', $ccodigo);
			$this->db->set('existencia_min', $existencia_min);
			$this->db->set('modelo', $modelo);
			$this->db->insert('llantas');
		
		
		}
		
		function get_modelo()
		{
		 $sql = "SELECT modelo FROM modelo";
			$query = $this->db->query($sql);
			$data = array();
			if ($query->num_rows() > 0) {
			$data[""] = "- Seleccione un modelo -";
			foreach ($query->result_array() as $row) {
			$data[$row['modelo']] = $row['modelo'];
			}
			return $data;
			}
			return $data;
			$query->free_result();
			
		}
	}
?>