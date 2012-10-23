<?php
	class Bodegas extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			
			// en caso contrario cargamos la vista principal
		if (!$this -> session -> userdata('usuario_id')) {

			// redirigimos a la función login
			redirect('users/login_form', 'refresh');
			}
			
			$this->load->library('form_validation');
			$this->load->library('table');
			$this->load->model('warehouse_model', 'warehouse');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			$this->load->model('user_model','tipo');
			
			
		}
		
		
		
		function new_warehouse()
		{
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] = 'bodega/new_warehouse';
			$data['title'] = 'Nueva bodega';
			$data['form_title'] = 'Nueva bodega.';
			$data['back'] = 'new_warehouse';
			$data['tipo'] = $this->tipo->tipo_user($usuario);
			$this->form_validation->set_rules('bodega','Bodega: ', 'required|callback_check_warehouse');
			$this->form_validation->set_rules('direccion','Dirección: ','required');
			if($this->form_validation->run()== FALSE)
			{
				$this->load->view('includes/template_login', $data);			}
			
			else
			{
				$bodega= $this->input->post('bodega');
				$direccion= $this->input->post('direccion');
				
				$this->warehouse->new_warehouse($bodega, $direccion);
				$this->load->view('done', $data);
			}
		}
		
		function check_warehouse($bodega)
		{
			if($this->warehouse->check_warehouse($bodega))
			{
				$this->form_validation->set_message('check_warehouse', 'Bodega existente.');
				return FALSE;
			}	
			
			else
			{
				return TRUE;
			}
		}
		
		function editar_eliminar()
		{
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content']='bodega/v_editar_bodega';
			$data['title'] = 'Editar o eliminar bodega';
			$data['form_title']='Editar o eliminar bodega.';
			$this->load->view('includes/template_login',$data);
		}
		
		function crud()
		{
			$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud-> set_table('bodegas');
			$crud->columns('bodega','direccion');
			$crud->display_as('direccion', 'Direccón');
			$output= $crud->render();
			$this->_output_crud($output);
		}
		
		function _output_crud($output = NULL)
		{
			$this->load->view('crud',$output);
		}
		
	}
?>