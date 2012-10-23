<?php
	class Prueba2 extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('prueba_model');
		}	
		
		function index()
		{
			
			$this->load->view('view_prueba');
		}
		
		function base(){
			$this->form_validation->set_rules('prueba', 'Texto', 'required|trim|min_length[3]|max_length[10]');
			
			if($this->form_validation->run() == FALSE)
			{
			 $this->load->view('view_prueba');	
			}
			
			else
			{
				$prueba = $this->input->post('prueba');
				$this->prueba_model->base($prueba);
				$this->load->view('done');
			}
		}
	}
?>