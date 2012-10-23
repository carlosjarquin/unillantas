<?php
	class Ordenes extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('osfact/os', 'os');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			
		}
		
		function nueva_orden()
		{
			$this->load->model('osfact/facturas_model', 'factura');
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$data['main_content'] = 'ordenes/nueva_orden';
			$data['title'] = 'Nueva orden de servicio.';
			$data['form_title'] = 'Nueva orden de servicio.';
			$data['vendedor'] = $this->factura->get_vendedor($usuario);
			$data['back'] ='nueva_orden';
			$this->form_validation->set_rules('folio','Folio','required|trim|callback_check_folio');
			
			if(!$this->form_validation->run())
			{
				$this->load->view('includes/template_login',$data);
			}

			else 
			{
			$folio = $this->input->post('folio');
			$fecha = $this->input->post('date1');
			$vendedor = $this->input->post('vendedor');
			$estatus = 'activo';
			$this->os->nueva_orden($folio,$fecha,$vendedor,$estatus);
			$this->load->view('done', $data);
			}
			
			
		}
		
		function check_folio($folio)
		{
			
			if($this->os->check_folio($folio))
			{
				$this->form_validation->set_message('check_folio','Folio existente.');
				return FALSE;
			}
			
			else{
				return TRUE;
			}
		}
		
		 function editar_eliminar()
		 {
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
		 if (!$this -> session -> userdata('usuario_id')) {
			// redirigimos a la función login
			redirect('users/login_form', 'refresh');}
			
		$data['main_content'] = 'ordenes/v_editar_eliminar';
		$data['title'] = 'Editar o eliminar';
		$data['form_title'] = 'Editar o eliminar orden de servicio.';
		 if (!$this -> session -> userdata('usuario_id')) {
		 	
			$this->load->view('includes/template',$data);

			} else {

			

			$this->load->view('includes/template_login',$data);

			}
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('orden_servicios');
			
			
			$crud->display_as('folio_fct','Folio de la Factura');
			$output= $crud->render();
			$this->_output_crud($output);
		 }
		 
		 function _output_crud($output = NULL)
		 {
		 	$this->load->view('crud', $output);
		 }
	}
?>