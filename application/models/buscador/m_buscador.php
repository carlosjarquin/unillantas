<?php
	class M_buscador extends CI_Model
	{
		function __construct()
		{
			parent::__construc();
		}
		
		function buscar($dato)
		{
			$query = 'select MSPN from llantas where MSPN='.$dato.'';
			$result = $this->db->query($query);
			
			return $result;
			
		}
	}
?>