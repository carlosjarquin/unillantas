<?php
	class Estatus extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function check_fct($folio)
		{
			
			$query = 'select folio_fct from factura where folio_fct='.$folio.' and estatus = "cerrado"';
			
			$result= $this->db->query($query);
			
			if($result->num_rows()>0)
			{
				return TRUE;
			}
			
			else
			{
				return FALSE;	
			}
		}
		
		function check_os($folio)
		{
			$query = 'select folio_os from orden_servicios where folio_os='.$folio.' and estatus = "cerrado"';
			
			$result= $this->db->query($query);
			
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