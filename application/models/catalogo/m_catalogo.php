<?php
	class M_catalogo extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function catalogo()
		{
			$query = 'select l.mspn, l.medida, l.rcv, l.costado,l.precio, m.modelo, m.url_image from llantas as l, modelos as m where l.modelo = m.idmodelos order by m.idmodelos';
			
			$result = $this->db->query($query);
			
			return $result;
		}
		
		function buscar($buscar)
		{
		$query = 'select l.mspn, l.medida,l.rcv, l.costado, l.precio, m.modelo,m.url_image, e.cantidad, b.bodega from llantas as l, modelos as m, existencias as e, bodegas as b where l.mspn = '.$buscar.' and l.modelo = m.idmodelos and l.mspn = e.llantas_mspn and b.idbodegas = e.id_bodega order by m.idmodelos';
			
		$result = $this->db->query($query);
			
		return $result;
		
		}
	}
?>