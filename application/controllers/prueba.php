<?php
	class Prueba extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data=$this->tipo->tipo_user($usuario);
		}
		
		function index()
		{
			
			
			echo $data;
			
		}
	}
?>