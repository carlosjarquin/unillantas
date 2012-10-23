<?php
	class Servicios extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this -> session -> userdata('usuario_id')) {
			// redirigimos a la función login
			redirect('users/login_form', 'refresh');}
			$this->load->library('form_validation');
			$this->load->model('servicios/servicios_model', 'servicios');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo'] = $this->tipo->tipo_user($usuario);
		}
		
		
		
		function new_service()
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$data['main_content'] = 'service/new_service';
			$data['title'] = 'Nuevo servicio.';
			$data['form_title'] = 'Nuevo servicio.';
			$data['back'] = 'new_service';
			$data['trabajadores'] = $this->servicios->get_trabajadores();
			$data['folios']= $this->servicios->get_folio_os();
			$this->form_validation->set_rules('servicio','required|min_length[10]|max_length[100]');
			if(!$this->form_validation->run())
			{
				$this->load->view('includes/template', $data);
			}
			
			else
			{
				$idtrabajador = $this->input->post('trabajadores');
				$folios = $this->input->post('folios');
				$servicio = $this->input->post('servicio');
				
				$this->servicios->nuevo_servicio($idtrabajador, $folios, $servicio);
			}
		}
	}
?>