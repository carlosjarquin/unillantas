<?php
	class Facturas_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function nueva_factura($folio,$fecha, $vendedor,$estatus)
		{
			$this->db->set('folio_fct',$folio);
			$this->db->set('fecha',$fecha);
			$this->db->set('estatus',$estatus);
			$this->db->set('vendedor', $vendedor);
			$this->db->insert('factura');
		}
		
		function check_factura($folio)
		{
			$query_str= 'select * from factura WHERE folio_fct = '.$folio.'';
			$result = $this->db->query($query_str);
			
			if($result->num_rows() >0)
			{
				//retorna un valor booleano indicando que se ha repetido el folio
				return TRUE;	
			}
			
			else{
				return FALSE;
			}
		}
		
		
		
		function close_fct($folio_fct)
		{
			$estatus = array('estatus'=>'cerrado');
			
			$this->db->where('folio_fct',$folio_fct);
			$this->db->update('factura',$estatus);
		}
		
		function get_vendedor($usuario)
		{
			$query= 'select nombre from usuarios where username="'.$usuario.'"';
			$query2= 'select apellido from usuarios where username="'.$usuario.'"';
			
			$result = $this->db->query($query);
			$result2 = $this->db->query($query2);
			
			foreach($result->first_row() as $r)
			{
				$nombre = $r;
			}
			foreach($result2->first_row() as $r)
			{
				$apellido = $r;
			}
			
		return	$result = $nombre.' '.$apellido;
			
			
			
		}
	}
?>