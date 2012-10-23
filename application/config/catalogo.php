<?php
	class Catalogo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('catalogo/m_catalogo','ca');
			
		}
		
		function catalogo_llantas()
		{
		/*$data['main_content'] = 'catalogo/v_catalogo';
		$data['title']='Catálogo.';
		$data['form_title'] = 'Catalogo';
		$data['catalogo'] = ;
		$this->load->view('includes/template',$data);*/
		$data=$this->ca->catalogo();
		foreach($data as $r)
		{
			echo $r.'<br>';
		}
		
		}	
	}
?>