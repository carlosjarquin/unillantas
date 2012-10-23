<?php
	class M_reportes extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function rep_os($fecha)
		{
			
			$query = 'SELECT m.tipo, m.concepto, m.mspn_llanta, m.cantidad, m.fecha, m.folio_os, b.bodega, m.usuario, m.hora FROM movimientos m, bodegas b WHERE m.tipo = "Salida" AND m.fecha =  "'.$fecha.'" AND m.concepto = "Orden de servicio" AND m.bodega = 	b.idbodegas ORDER BY hora';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		
		function rep_fct_s($fecha)
		{
			$query = 'SELECT m.tipo, m.concepto, m.mspn_llanta, m.cantidad, m.fecha, m.folio_fct, b.bodega, m.usuario, m.hora FROM movimientos m, bodegas b WHERE m.tipo = "Salida" AND m.fecha =  "'.$fecha.'" AND m.concepto = "Factura" AND m.bodega = 	b.idbodegas ORDER BY hora';
			
			
	$result = $this->db->query($query);
	
	return $result;

		}
		
		function rep_fct_e($fecha)
		{
			$tipo='Entrada';
			$concepto = 'Factura';
			$query = 'select * from movimientos where tipo="'.$tipo.'" and concepto="'.$concepto.'" and fecha="'.$fecha.'"';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		function rep_vt($fecha)
		{
			$tipo='Entrada';
			$concepto = 'Vale';
			$query = 'select * from movimientos where tipo="'.$tipo.'" and concepto="'.$concepto.'" and fecha="'.$fecha.'"';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		function rep_ex()
		{
			
			$query = 'SELECT bodega b, llantas_mspn e, cantidad s from existencias as e inner join bodegas as b where id_bodega = idbodegas and cantidad>0 order by idbodegas';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		
		function rep_ds($fecha)
		{
			
			$query = 'select o.folio_os, s.servicio, t.nombre, o.fecha from detalle_servicios as d, servicios as s, trabajadores as t, orden_servicios as o where d.id_servicios = s.id_servicios and d.id_trabajadores = t.id_trabajadores and d.id_os = o.id_os and o.fecha="'.$fecha.'" order by folio_os';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		function rep_vnt_fct($fecha1, $fecha2)
		{
			
			$query = 'select vendedor, folio_fct, fecha from factura where fecha between "'.$fecha1.'" and "'.$fecha2.'" order by vendedor';
			
	$result = $this->db->query($query);
	
	return $result;

		}
		function rep_vnt_os($fecha1,$fecha2)
		{
		
			
			$query = 'select vendedor, folio_os, fecha from orden_servicios where fecha between "'.$fecha1.'" and "'.$fecha2.'" order by vendedor';
			
	$result = $this->db->query($query);
	
	return $result;
		}
		
	}
?>