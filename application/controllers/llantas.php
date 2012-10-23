<?php
class Llantas extends CI_Controller {
	function __construct() {
		parent::__construct();
			// en caso contrario cargamos la vista principal
		if (!$this -> session -> userdata('usuario_id')) {

			redirect('users/login_form', 'refresh');
			}
		$this -> load -> library('form_validation');
		$this -> load -> model('llantas/llantas_model', 'llanta');
		$this->load->library('grocery_CRUD');
		$usuario= $this->session->userdata('usuario_id');
			//$data['tipo'] = $this->tipo->tipo_user($usuario);
	}

	
	function nueva_llanta() {
		$this->load->model('user_model','tipo');
		$usuario= $this->session->userdata('usuario_id');
		$data['tipo']=$this->tipo->tipo_user($usuario);
		$data['main_content'] = 'llantas/nueva_llanta';
		$data['title'] = 'Nueva Llanta.';
		$data['back'] = 'nueva_llanta';
		$data['drop'] = $this -> llanta -> get_modelo();

		$this -> form_validation -> set_rules('mspn', 'MSPN', 'required|callback_mspn_check');
		$this -> form_validation -> set_rules('existencia_min', 'required|integer');
		$this->form_validation->set_rules('modelo','Modelo','required');

		if (!$this -> form_validation -> run()) {
			$this -> load -> view('includes/template_login', $data);
		} else {
			$mspn = $this -> input -> post('mspn');
			$medida = $this -> input -> post('medida');
			$rcv = $this -> input -> post('rcv');
			$costado = $this -> input -> post('costado');
			$precio = $this -> input -> post('precio');
			$ccodigo = $this -> input -> post('ccodigo');
			$ext_min = $this -> input -> post('existencia_min');
			$modelo = $this -> input -> post('modelo');

			$this -> llanta -> new_tire($mspn, $medida, $rcv, $costado, $precio, $ccodigo, $ext_min, $modelo);
			$this -> load -> view('done', $data);
		}

	}

	function mspn_check($mspn) {
		if ($this -> llanta -> mspn_check($mspn)) {
			$this -> form_validation -> set_message('mspn_check', '%s existente.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function editar_eliminar()
		 {	
		 	$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
		 	$data['main_content'] = 'llantas/v_editar_eliminar';
			$data['title'] = 'Editar o eliminar';
			$data['form_title'] = 'Editar o eliminar llantas.';
			$this->load->view('includes/template_login',$data);
		 }
		 
		 function crud()
		 {
		 	$crud= new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('llantas');
			$crud->columns('mspn','medida','rcv','costado','precio','c_barras','modelo');
			$crud->unset_add();
			$crud->set_relation('modelo','modelos','modelo');
			$crud->display_as('mspn','MSPN')->display_as('rcv','RCV');
			$output= $crud->render();
			$this->_output_crud($output);
		 }
		 
		 function _output_crud($output = NULL)
		 {
		 	$this->load->view('crud', $output);
		 }
		 
	

}
?>