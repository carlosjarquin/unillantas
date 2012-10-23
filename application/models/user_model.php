<?php
	class User_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		
		
		function nuevo($nombre,$apellido,$username,$password,$tipo,$puesto){
			
			$pass= sha1($password);
			$this->db->set('nombre',$nombre);
			$this->db->set('apellido',$apellido);
			$this->db->set('username', $username);
			$this->db->set('password',$pass);
			$this->db->set('tipo',$tipo);
			$this->db->set('puesto',$puesto);
			$this->db->insert('usuarios');
		}
		
		function check_user($username)
		{
			$query_str= "SELECT username FROM usuarios WHERE username= ?";
			$result = $this->db->query($query_str, $username);
			
			
			if ($result->num_rows()>0){
				//nombre de usuario existe
				return TRUE;
			}
			
			else{
				//nombre de usuario no existe	
				return FALSE;
			}
		}
		function login($username,$password)
		{
			
			$this->db->select('idusuarios, username');
			$this->db->where('username', $username);
			$this->db->where('password',$password);
			$this->db->limit(1);
			$query = $this->db->get('usuarios');
			
			if($query->num_rows()>0)
			{
				return TRUE;
			}
			
			else{
				return FALSE;
			}
		
		}
		
		function tipo_user($usuario)
		{
			$query = 'select tipo from usuarios where username ="'.$usuario.'"';
			$result = $this->db->query($query);
			
			foreach($result->first_row() as $r)
			{
				$tipo = $r;
			}
			
			return $tipo;
		}
	}
?>