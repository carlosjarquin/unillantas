<?php
	class Existencias extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			if (!$this -> session -> userdata('usuario_id')) {
			// redirigimos a la función login
			redirect('users/login_form', 'refresh');
		} 
			$this->load->library('form_validation');
			$this->load->model('existencias/existencias_model', 'existencias');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			
		}
		
		
		
		function new_existencias()
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] = 'existencias/new_existencias';
			$data['title'] = 'Existencias.';
			$data['form_title'] = 'Actualizar existencias';
			$data['back'] = 'new_existencias';
			$data['bodegas'] = $this->existencias->get_bodegas();
			$data['llantas']= $this->existencias->get_llantas();
			$this->form_validation->set_rules('cantidad','required|integer');
			
			if(!$this->form_validation->run())
			{
				$this->load->view('includes/template_login', $data);
			}
			
			else
			{
				$bodegas = $this->input->post('bodegas');
				$mspn = $this->input->post('mspn');
				$cantidad = $this->input->post('cantidad');
				
				$this->existencias->nuevas_existencias($bodegas, $mspn, $cantidad);
				$this->load->view('done',$data);
			}
		}	
		function editar_eliminar()
		 {	
		 	$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
		 	$data['main_content'] = 'existencias/v_editar_eliminar';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar existencias.';
			$this->load->view('includes/template_login',$data);
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('existencias');
			$crud->columns('llantas_mspn','cantidad','id_bodega');
			$crud->display_as('llantas_mspn','MSPN')->display_as('id_bodega','Bodega');
			$crud->set_relation('llantas_mspn','llantas','mspn');
			$crud->set_relation('id_bodega','bodegas','bodega');
			$output= $crud->render();
			$this->_output_crud($output);
		 }
		 
		 function _output_crud($output = NULL)
		 {
		 	$this->load->view('crud', $output);
		 }
		 
	

}
?>