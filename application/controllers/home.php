<?php
	class Home extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('catalogo/m_catalogo','ca');
			$this->load->library('form_validation');
		}
		
		function index()
		{
			$data['main_content'] = 'home/home';
			$data['title']='Inicio.';
			
			$this->form_validation->set_rules('buscar','Buscar', 'required|numeric|integer|is_natural_no_zero');
			
			$this->form_validation->set_message('numeric','Este buscador solo admite numeros');
			$this->form_validation->set_message('integer','Este buscador solo admite numeros enteros');
			$this->form_validation->set_message('is_natural_no_zero','Este buscador solo admite numeros enteros mayores a cero');
			if(!$this->form_validation->run())
			{
				
			
			if(!$this->session->userdata('usuario_id')){
				$this->load->view('includes/template',$data);
			}
			else
			{
				$this->load->model('user_model','tipo');
				$usuario= $this->session->userdata('usuario_id');
				$data['tipo']=$this->tipo->tipo_user($usuario);
				$this->load->view('includes/template_login',$data);
			}
				}
			
			else{
				$buscar = $this->input->post('buscar');
				$data['main_content'] = 'home/resultado';
				$data['title']='Inicio.';
				$data['form_title'] = 'Resultado de la busqueda.';
				$data['resultado'] = $this->ca->buscar($buscar);
				
				if(!$this->session->userdata('usuario_id')){
				$this->load->view('includes/template',$data);
			}
			else{
				$this->load->model('user_model','tipo');
				$usuario= $this->session->userdata('usuario_id');
				$data['tipo']=$this->tipo->tipo_user($usuario);
				$this->load->view('includes/template_login',$data);
				}
				}
		}
		
		function buscar()
		{
			
		}
		
	}
?>