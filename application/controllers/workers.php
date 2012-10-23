<?php
	class Workers extends CI_Controller{
		function __construct()
		{
			parent::__construct();
			if (!$this -> session -> userdata('usuario_id')) {
			// redirigimos a la función login
			redirect('users/login_form', 'refresh');}
			$this->load->library('form_validation');
			$this->load->model('workers_model', 'trabajadores');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			
		}
		
		function reg_worker()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$data ['main_content'] = 'trabajadores/nuevo_trabajador';
			$data ['title'] = 'Registro de trabajadores';
			$data ['form_title'] = 'Registro de nuevo usuario.';
			$data ['back'] = 'reg_worker';
			
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]');
			
			
			if(!$this->form_validation->run())
			{
				$this->load->view('includes/template_login', $data);
			}
			
			else
			{
					$nombre = $this->input->post('nombre');
					$puesto = $this->input->post('puesto');
					$direccion = $this ->input->post('direccion');
					$telefono = $this ->input->post('telefono');
					$this->trabajadores->registrar($nombre,$puesto, $direccion, $telefono);
					$this->load->view('done', $data);
			}
			
		}
		function trabajadores()
		{
			$data['main_content'] = 'trabajadores/table';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar trabajadores';
			$this->load->view('includes/template_login',$data);
		}
		
		function crud()
		{
		$crud= new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud-> set_table('trabajadores');
		$crud->columns('nombre','puesto','direccion','telefono');
		$output= $crud->render();
		$this->_output_crud($output);
		}		
		
		function _output_crud($output = NULL)
		{
			$this->load->view('crud', $output);
		}
	}
?>