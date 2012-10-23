<?php
	class Detalle_os extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('servicios/detalle_model', 'detalle');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			$this->load->model('user_model','tipo');
			
		}
		
		
		
		function new_detalle()
		{
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo'] = $this->tipo->tipo_user($usuario);
			$data['main_content'] = 'service/new_detalle';
			$data['title'] = 'Detalle de Orden de servicios.';
			$data['form_title'] = 'Cargar servicios';
			$data['back'] = 'new_detalle';
			$data['folio_os'] = $this->detalle->get_os();
			$data['servicio'] = $this->detalle->get_servicio();
			$data['nombre']= $this->detalle->get_trabajador();
			$this->form_validation->set_rules('servicio','servicio','trim|xss_clean|callback_check_detalle['.$this->input->post('folio_os').']');
			
			if(!$this->form_validation->run())
			{
				$this->load->view('includes/template_login', $data);
			}
			
			else
			{
						
			
			$id_os = $this->input->post('folio_os');
			$id_servicios = $this->input->post('servicio');
			$id_trabajadores = $this->input->post('trabajador');
			
			$this->detalle->nuevo_detalle($id_os, $id_servicios, $id_trabajadores);
			$this->load->view('done',$data);
			}
				
					
			}
			
			
			function check_detalle($id_servicios,$id_os)
		{
			if($this->detalle->check_detalle($id_servicios,$id_os))
			{
				$this->form_validation->set_message('check_detalle', 'Este servicio ya fue incluido.');
				return FALSE;
			}	
			
			else
			{
				return TRUE;
			}
		}
			
		
	}
?>