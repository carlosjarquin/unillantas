<?php
	class Vales extends CI_Controller
	{
		function __construct()	
		{
			parent::__construct();
			if(!$this->session->userdata('usuario_id'))
			{
				redirect('users/login_form', 'refresh');
			}
			
			$this->load->model('osfact/m_vale','vales');
		}
		
		function new_vale()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] = 'vales/v_nuevo_vale';
			$data['title'] = 'Nuevo Vale.';
			$data['back'] = 'new_vale';
			$this->load->model('osfact/facturas_model', 'factura');
			$data['vendedor'] = $this->factura->get_vendedor($usuario);
			//checar la existencia de vale, si existe uno con el mismo folio, provoca error.
			$this->form_validation->set_rules('folio', 'Folio', 'required|callback_check_vale');
			if(!$this->form_validation->run())
			{
								
				$this->load->view('includes/template_login', $data );
				
			}
			
			else
			{
				$folio = $this->input->post('folio');
				$fecha = $this->input->post('date1');
				$vendedor = $this->input->post('vendedor');
				$estatus = 'Activo';
				$this->vales->nuevo_vale($folio,$fecha, $vendedor, $estatus);
				$this->load->view('done', $data);
			}
		}
		
		function check_vale($folio)
		{
			if($this->vale->check_folio($folio))
			{
				$this->form_validation->set_message('check_vale', 'El %s ya existe.');
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
		 	$data['main_content'] = 'vales/v_editar_eliminar';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar vales.';
			$this->load->view('includes/template_login',$data);

					
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('vale_traspaso');
			
			$crud->display_as('folio_vale','Folio del Vale');
			$output= $crud->render();
			$this->_output_crud($output);
		 }
		 
		 function _output_crud($output = NULL)
		 {
		 	$this->load->view('crud', $output);
		 }
	}
?>