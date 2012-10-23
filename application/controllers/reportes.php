<?php
	class Reportes extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this -> session -> userdata('usuario_id')) {

			redirect('users/login_form', 'refresh');
			}
			
			$this->load->model('reportes/m_reportes','reportes');
			$this->load->library('html2pdf');
			
			
		}
		
		function index()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content']='reportes/fecha';
			$data['title']='Reportes';
			$data['form_title']='Reportes.';
			
			$this->form_validation->set_rules('date1','Fecha','required');
			if(!$this->form_validation->run()){
				$this->load->view('includes/template_login',$data);	
			}
			
			
			
			elseif($this->input->post('metodo')==1)
			{
				$fecha=$this->input->post('date1');
				$this->entrada_fct($fecha);
			}
			elseif($this->input->post('metodo')==2)
			{
				$fecha=$this->input->post('date1');
				$this->entrada_vt($fecha);
			}
			elseif($this->input->post('metodo')==3)
			{
				$fecha=$this->input->post('date1');
				$this->salida_fct($fecha);
			}
			
			elseif($this->input->post('metodo')==4)
			{
				$fecha=$this->input->post('date1');
				$this->salida_os($fecha);
			}
			
		}
		
		function salida_fct($fecha)
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] ='reportes/rep_fct_s';
			$data['title']='Reporte de Salidas por Factura';
			$data['form_title'] = 'Reporte de Facturas';
			$data['resultado'] = $this->reportes->rep_fct_s($fecha);
			
			$date = date('d-m-y');
			$data['pdf']= 'rep_fct_s-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_fct_s-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_fct_s',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_fct_s';
			$this->load->view('includes/template_login',$data);
			}
		}
		
		function salida_os($fecha)
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['title']='Reporte de Ordenes de servicio.';
			$data['form_title'] = 'Reporte de Orden de Servicio';
			$data['resultado'] = $this->reportes->rep_os($fecha);
			$date = date('d-m-y');
			$data['pdf']= 'repo_os-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('repo_os-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_os',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_os';
	    	$this->load->view('includes/template_login',$data);
	    }
		}
		
		function entrada_fct($fecha)
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] ='reportes/rep_fct_e';
			$data['title']='Reporte de Entradas';
			$data['form_title'] = 'Reporte de Entradas';
			$data['resultado'] = $this->reportes->rep_fct_e($fecha);
			
			$date = date('d-m-y');
			$data['pdf']= 'rep_fct_e-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_fct_e-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_fct_e',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_fct_e';
	    	$this->load->view('includes/template_login',$data);
			}
		
		}
		function entrada_vt($fecha)
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$data['main_content'] ='reportes/rep_vt';
			$data['title']='Reporte de Entradas por Vale';
			$data['form_title'] = 'Reporte de Entradas por Vale';
			$data['resultado'] = $this->reportes->rep_vt($fecha);
			
			$date = date('d-m-y');
			$data['pdf']= 'rep_vt'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_vt-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_vt',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_vt';
	    	$this->load->view('includes/template_login',$data);
			}
		
		}
		function existencias()
		{	
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$data['main_content'] ='reportes/rep_ex';
			$data['title']='Reporte de Existencias';
			$data['form_title'] = 'Reporte de Existencias';
			$data['resultado'] = $this->reportes->rep_ex();
			
			$date = date('d-m-y');
			$data['pdf']= 'rep_ex-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_ex-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_ex',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_ex';
			$this->load->view('includes/template_login',$data);
			}
		}
		function detalle_os()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			$fecha = $this->input->post('date1');
			
			$data['title']='Reporte de servicios';
			$data['form_title'] = 'Reporte de Servicios';
			$data['resultado'] = $this->reportes->rep_ds($fecha);
			
			$this->form_validation->set_rules('datepicker','Fecha','required');
			
			
			if(!$this->form_validation->run()){
			$data['main_content'] ='reportes/fecha_ds';
				$this->load->view('includes/template_login',$data);	
			}
			
			else
			{
			$date = date('d-m-y');
			$data['pdf']= 'rep_ds-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_ds-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_ds',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_ds';
			$this->load->view('includes/template_login',$data);
			}
			}
			}
			
			
			function detalle_ventas_fct()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$fecha1 = $this->input->post('date1');
			$fecha2 = $this->input->post('date2');
			
			$data['title']='Reporte de Ventas';
			$data['form_title'] = 'Reporte de Ventas por Factura';
			$data['resultado'] = $this->reportes->rep_vnt_fct($fecha1, $fecha2);
			
			$this->form_validation->set_rules('date1','Fecha inicial','required');	
			$this->form_validation->set_rules('date2','Fecha final','required');
			
			
			if(!$this->form_validation->run()){
			$data['main_content'] ='reportes/fecha_vt_fct';
				$this->load->view('includes/template_login',$data);	
			}
			
			else
			{
			$date = date('d-m-y');
			$data['pdf']= 'rep_vnt_fct-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_vnt_fct-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_vnt_fct',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_vnt_fct';
			$this->load->view('includes/template_login',$data);
			}
			}
				
		}
		function detalle_ventas_os()
		{
			$this->load->model('user_model','tipo');
			$usuario= $this->session->userdata('usuario_id');
			$data['tipo']=$this->tipo->tipo_user($usuario);
			
			$fecha1 = $this->input->post('date1');
			$fecha2 = $this->input->post('date2');
			
			$data['title']='Reporte de Ventas';
			$data['form_title'] = 'Reporte de Ventas por Orden de Servicios';
			$data['resultado'] = $this->reportes->rep_vnt_os($fecha1, $fecha2);
			
			$this->form_validation->set_rules('date1','Fecha inicial','required');	
			$this->form_validation->set_rules('date2','Fecha final','required');
			
			
			if(!$this->form_validation->run()){
			$data['main_content'] ='reportes/fecha_vt_os';
				$this->load->view('includes/template_login',$data);	
			}
			
			else
			{
			$date = date('d-m-y');
			$data['pdf']= 'rep_vnt_os-'.$date.'.pdf';
			//Set folder to save PDF to
	    	$this->html2pdf->folder('./assets/pdfs/');
	    
		    //Set the filename to save/download as
		    $this->html2pdf->filename('rep_vnt_os-'.$date.'.pdf');
		    
		    //Set the paper defaults
		    $this->html2pdf->paper('a4', 'portrait');
			
			
			
			$this->html2pdf->html($this->load->view('reportes/rep_vnt_os',$data,TRUE));
			if($this->html2pdf->create('save')) {
			$data['main_content'] ='reportes/rep_vnt_os';
			$this->load->view('includes/template_login',$data);
			}
			}
				
		}
		
			
		}
		
?>