<?php
class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this -> load -> library('form_validation');
		$this -> load -> model('user_model', 'user');
	}

	function index() {
		// en caso contrario cargamos la vista principal
		if ($this -> session -> userdata('usuario_id')) {

			// redirigimos a la función login
			redirect(base_url());

		} else {

			// si no existe la sesión con la variable 'usuario_id'

			redirect('users/login_form', 'refresh');

		}
	}

	function new_user() {
		$data['main_content'] = 'usuarios/new_user';
		$data['title'] = 'Nuevo Usuario';
		$data['form_title'] = 'Nuevo usuario.';
		$data['back'] = 'new_user';

		$this -> form_validation -> set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[10]');
		$this -> form_validation -> set_rules('apellido', 'Apellido', 'required|trim|min_length[3]|max_length[40]');
		$this -> form_validation -> set_rules('username', 'Usuario', 'required|trim|min_length[3]|strtolower|max_length[10]|callback_username_not_exist');
		$this -> form_validation -> set_rules('password', 'Password', 'required|trim|min_length[5]|strtolower|max_length[10]');
		$this -> form_validation -> set_rules('repass', 'Repetir password', 'required|trim|min_length[5]|matches[password]|strtolower');

		$this -> form_validation -> set_rules('puesto', 'Puesto', 'required|trim|min_length[4]');

		if ($this -> form_validation -> run() == FALSE) {

			$this -> load -> view('includes/template', $data);

		} else {
			//posteando los datos para que los cache el modelo new_user
			$nombre = $this -> input -> post('nombre');
			$apellido = $this -> input -> post('apellido');
			$username = $this -> input -> post('username');
			$password = $this -> input -> post('password');
			$tipo = $this -> input -> post('tipo');
			$puesto = $this -> input -> post('puesto');

			$this -> user -> nuevo($nombre, $apellido, $username, $password, $tipo, $puesto);
			$this -> load -> view('done', $data);

		}
	}

	function username_not_exist($username) {
		//confirmar si el usuario no existe
		if ($this -> user -> check_user($username)) {
			$this -> form_validation -> set_message('username_not_exist', 'Usuario existente.');
			return FALSE;
		} else {
			return TRUE;
		}

	}

	function login_form() {
		$data['main_content'] = 'usuarios/login';
		$data['title'] = 'Login.';
		$data['form_title'] = 'Login.';
		if ($this -> session -> userdata('usuario_id')) {
			redirect(base_url());
		} else {
			$this -> load -> view('includes/template', $data);
		}

	}

	function login() {

		$data['back'] = base_url();
		$this -> form_validation -> set_rules('username', 'Nombre de usuario:', 'required');
		$this -> form_validation -> set_rules('password', 'Password:', 'required');

		//si se enviaron los datos del formulario
		if ($this -> input -> post('username')) {
			//recogemos los datos
			$usuario = $this -> input -> post('username');
			$password = sha1($this -> input -> post('password'));
			//como ya cargamos el modelo, solo enviamos los datos para verificar que el usuario y password sean los correctos

			$this -> user -> login($usuario, $password);

			if ($this -> user -> login($usuario, $password)) {

				$datasession = array('usuario_id' => $usuario, 'login_ok' => TRUE);
				$this -> session -> set_userdata($datasession);
				//direct('Inicio', 'refresh');

				$this -> load -> view('done', $data);
			} else {
				$this -> load -> view('usuarios/loginerror');
			}

		}

	}

	function logout() {
		// creamos un array con las variables de sesión en blanco
		$datasession = array('usuario_id' => '', 'logged_in' => '');
		// y eliminamos la sesión
		$this -> session -> unset_userdata($datasession);
		// redirigimos al controlador principal
		redirect(base_url(), 'refresh');
	}

}
?>