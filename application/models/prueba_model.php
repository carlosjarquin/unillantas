<?php
	class Prueba_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function base($prueba)
		{
			$this->db->set('prueba',$prueba);
			$this->db->insert('prueba');
		}
	}
?>