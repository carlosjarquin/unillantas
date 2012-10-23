<?php
	class Facturas extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('usuario_id'))
			{
				redirect('users/login_form', 'refresh');
			}
			$this->load->library('form_validation');
			$this->load->model('osfact/facturas_model', 'factura');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			
			
		}
		
		function nueva_factura()
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] = 'facturas/nueva_factura';
			$data['title'] = 'Nueva Factura.';
			$data['form_title'] = 'Nueva Factura.';
			$data['back'] = 'nueva_factura';
			$data['vendedor'] = $this->factura->get_vendedor($usuario);
			
			$this->form_validation->set_rules('folio', 'Folio', 'required|callback_check_factura');
			if(!$this->form_validation->run())
			{
								
				$this->load->view('includes/template_login', $data );
				
			}
			
			else
			{
				$folio = $this->input->post('folio');
				$fecha = $this->input->post('date1');
				$vendedor = $this->input->post('vendedor');
				$estatus = 'activo';
				$this->factura->nueva_factura($folio,$fecha, $vendedor, $estatus);
				$this->load->view('done', $data);
			}
		}
		
		function check_factura($folio)
		{
			if($this->factura->check_factura($folio))
			{
				$this->form_validation->set_message('check_factura', 'El %s ya existe.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			
			
		}
		
		 function editar_eliminar()
		 {
		 	

			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);	
		 	$data['main_content'] = 'facturas/v_editar_eliminar';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar facturas.';
			$this->load->view('includes/template_login',$data);

					
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('factura');
			
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