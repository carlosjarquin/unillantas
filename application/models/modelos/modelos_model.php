<?php
	class Modelos_model extends CI_Model
	{
		function __contruct()
		{
			parent::__construct();
		}
		
		function new_model($modelo,$marca,$image_url)
		{
			$this->db->set('modelo',$modelo);
			$this->db->set('marca', $marca);
			$this->db->set('url_image', $image_url);
			$this->db->insert('modelos');
		}
		
		function check_model($modelo)
		{
			$query_str="select * from modelos where modelo = ?";
			$result = $this->db->query($query_str, $modelo);
			
			if($result->num_rows()>0)
			{
				//si existen modelos iguales
				return TRUE;
			}
			else
			{	
				return FALSE;
			}
		}
	}
?>