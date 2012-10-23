<?php
	class M_vale extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function nuevo_vale($folio,$fecha,$estatus,$vendedor)
		{
			$this->db->set('folio_vale',$folio);
			$this->db->set('fecha',$fecha);
			$this->db->set('estatus',$estatus);
			$this->db->set('vendedor', $vendedor);
			$this->db->insert('vale_traspaso');
		}
		
		function check_folio($folio)
		{
			$query = 'select * from vale_traspaso WHERE folio_vale = '."$folio".'';
			
			$result = $this->db->query($query);
			
			if($result->num_rows()>0)
			{
				return TRUE;
			}
			
			else
			{
				return FALSE;
			}
		}
		
		function close_vale($folio_vale)
		{
			$estatus = array('estatus'=>'cerrado');
			
			$this->db->where('folio_vale',$folio_vale);
			$this->db->update('vale_traspaso	',$estatus);
		}
	}
?>