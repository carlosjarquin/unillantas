<?php
	class Llantas_model extends CI_Model{
		function __construct(){
			parent::__construct();
			
		}
		
		
		function new_tire($mspn, $medida, $rcv, $costado, $precio, $ccodigo, $ext_min, $modelo)
		{
			$this->db->set('mspn', $mspn);
			$this->db->set('medida', $medida);
			$this->db->set('rcv', $rcv);
			$this->db->set('costado', $costado);
			$this->db->set('precio', $precio);
			$this->db->set('c_barras', $ccodigo);
			$this->db->set('existencia_min', $ext_min);
			$this->db->set('modelo', $modelo);
			$this->db->insert('llantas');
		
		
		}
		
		public function get_modelo()
		{
		 	$result = $this->db->select('idmodelos,modelo')->get('modelos')->result_array();
			$dropdown = array();
			foreach($result as $r)
			{
				$dropdown[$r['idmodelos']]= $r['modelo'];
			}
			return $dropdown;
		}
		
		function mspn_check($mspn)
		{
			$query_str = "select mspn from llantas where mspn = ?";
			$result = $this->db->query($query_str, $mspn);
			
			if($result->num_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
?>