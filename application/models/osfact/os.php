<?php
	class Os extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			
		}
		
		function nueva_orden($folio,$fecha,$vendedor,$estatus)
		{
			$this->db->set('folio_os',$folio);
			$this->db->set('fecha',$fecha);
			$this->db->set('estatus',$estatus);
			$this->db->set('vendedor',$vendedor);
			$this->db->insert('orden_servicios');
		}
		
		function check_folio($folio)
		{
			$query_str = "SELECT * FROM orden_servicios WHERE folio_os= ?";
			$result = $this->db->query($query_str, $folio);
			
			if($result->num_rows()>0)
			{
				//Retorna verdadero si hay folios iguales
				return TRUE;
			}
			
			else
			{
				return FALSE;	
			}
		}
		
	
		function close_os($folio_os)
		{
			$estatus = array('estatus'=>'cerrado');
			
			$this->db->where('folio_os',$folio_os);
			$this->db->update('orden_servicios',$estatus);
		}
		
	}
?>