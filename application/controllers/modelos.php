<?php
	class Modelos extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this -> session -> userdata('usuario_id')) {
			// redirigimos a la función login
			redirect('users/login_form', 'refresh');}
			$this->load->library('form_validation');
			$this->load->model('modelos/modelos_model', 'modelos');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			$this->load->model('user_model','tipo');
			
		}
		
		
		
		//se inserta un nuevo modelo.
		function new_model()
		{
		$usuario= $this->session->userdata('usuario_id');
		$data['tipo'] = $this->tipo->tipo_user($usuario);
		$data['main_content'] = 'modelos/new_model';
		$data['title'] = 'Nuevo modelo.';
		$data['form_title'] = 'Nuevo modelo.';
		$data['back'] = 'new_model';
		$config['upload_path'] = 'images/catalogo/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '512';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('modelo','Modelo', 'required|callback_check_model');
		if(!$this->form_validation->run())
		{
			$this->load->view('includes/template_login',$data);
		}
		else{
			
		
		if ($this->upload->do_upload('userfile'))
		{
			$data2= $this->upload->data();
			$name= $data2['file_name'];
			//$extension = $data2['image_type'];
			$path = 'images/catalogo/';
			$url_image = $path.$name;
			$modelo= $this->input->post('modelo');
			$marca = $this->input->post('marca');
			$this->modelos->new_model($modelo, $marca, $url_image);
			$this->load->view('done', $data);
		}
		
		else
		{	
			echo $this->upload->display_errors();
		}
			
		}		
		}
		
		
//verificar que el modelo no se este repitiendo, se hace la llamada a través del callback hacia el metodo
		function check_model($modelo)
		{
			if($this->modelos->check_model($modelo))
			{
				$this->form_validation->set_message('check_model', 'Modelo existente.');
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
		
		//aplicando crud
		
		function editar_eliminar()
		 {
		 	$usuario= $this->session->userdata('usuario_id');
			$data['tipo'] = $this->tipo->tipo_user($usuario);
		 	$data['main_content'] = 'modelos/v_editar_eliminar';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar modelos.';
			$this->load->view('includes/template_login',$data);
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('modelos');
			$crud->display_as('url_image','Imagen');
			$crud->unset_add();
			$crud->set_field_upload('url_image');
			$output= $crud->render();
			$this->_output_crud($output);
		 }
		 
		 function _output_crud($output = NULL)
		 {
		 	$this->load->view('crud', $output);
		 }
	}
?>