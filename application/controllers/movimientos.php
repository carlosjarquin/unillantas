<?php
class Movimientos extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('movimientos/m_movimientos','movimientos');
		$this->load->library('form_validation');
		}
	
	
	
	function entradas()
	{
		$this->load->model('user_model','tipo');
		$usuario= $this->session->userdata('usuario_id');
		$data['tipo']=$this->tipo->tipo_user($usuario);
		
		$data['main_content'] = 'movimientos/v_entradas';
		$data['title'] = 'Entradas';
		$data['form_title'] = 'Entradas';
		$data['mspn']= $this->movimientos->get_llantas();
		$data['bodega']= $this->movimientos->get_bodega();
		$data['back'] = base_url('movimientos/entradas');
		
		
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'required|integer');
		if(!$this->form_validation->run())
		{
			$this->load->view('includes/template_login',$data);
		}
		
		else
		{
			$tipo='entrada';
			$concepto= $this->input->post('concepto');
			$mspn = $this->input->post('mspn');
			$cantidad = $this->input->post('cantidad');
			$fecha = $this->input->post('fecha');
			$folio= $this->input->post('folio');
			$bodega = $this->input->post('bodega');
			$usuario = $this->session->userdata('usuario_id');
			$hora = $this->input->post('hora');
			
			$this->movimientos->nuevo_movimiento($tipo,$concepto,$mspn,$cantidad,$fecha,$folio,$bodega,$usuario,$hora);
			
			$this->load->model('existencias/existencias_model','existencias');
			$this->existencias->actualizar($mspn,$cantidad,$bodega);
			$this->load->view('done',$data);
		}
	}
	
	function salidas()
	{	
		$this->load->model('user_model','tipo');
		$usuario= $this->session->userdata('usuario_id');
		$data['tipo']=$this->tipo->tipo_user($usuario);
		$data['main_content'] = 'movimientos/v_salidas';
		$data['title']= 'Salidas';
		$data['form_title'] = 'Salidas';
		$data['back'] = base_url('movimientos/salidas');
		$data['mspn'] = $this->movimientos->get_llantas();
		$data['bodega'] = $this->movimientos->get_bodega();
		
		if($this->input->post('concepto')==0)
		{
			$this->form_validation->set_rules('folio','Folio','required|callback_check_factura');	
		}
				
		if($this->input->post('concepto')==1)
		{
			$this->form_validation->set_rules('folio','Folio','required|callback_check_os');	
		}
		
		if($this->input->post('concepto')==2)
		{
			$this->form_validation->set_rules('folio','Folio','required|callback_check_vale');
		}
		
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'required|integer|is_natural|is_natural_no_zero');
		
		
		if(!$this->form_validation->run())
		{
			$this->load->view('includes/template_login', $data);
		}
		
		else
		{
			
			$tipo = 'Salida';
			$mspn = $this->input->post('mspn');
			$cantidad = $this->input->post('cantidad');
			$fecha = $this->input->post('fecha');
			$bodega = $this->input->post('bodega');
			$usuario = $this->session->userdata('usuario_id');
			$hora = $this->input->post('hora');
			
			$this->load->model('existencias/existencias_model','existencias');
			$validar= $this->existencias->check_existencias($cantidad,$mspn,$bodega);	
		if($validar){
			
	
			if($this->input->post('concepto')==0)
			{
				
				$concepto = 'Factura';
				$folio_fct = $this->input->post('folio');
							
				$this->movimientos->mov_salida_fact($tipo,$concepto,$mspn,$cantidad,$fecha,$folio_fct,$bodega,$usuario,$hora);
				
				$this->existencias->actualizar_menos($bodega,$mspn,$cantidad);
							
				if($this->input->post('cerrar')==0)
				{
					
					$folio_fct = $this->input->post('folio');
					$this->load->model('osfact/facturas_model','facturas');
					$this->facturas->close_fct($folio_fct);
				}
				$this->load->view('done',$data);
			
			}
			elseif($this->input->post('concepto')==1)
			{						
				$concepto = 'Orden de servicio';
				$folio_os = $this->input->post('folio');							
				$this->movimientos->mov_salida_os($tipo,$concepto,$mspn,$cantidad,$fecha,$folio_os,$bodega,$usuario,$hora);
				
				$this->load->model('existencias/existencias_model','existencias');
				$this->existencias->actualizar_menos($bodega,$mspn,$cantidad);
			if($this->input->post('cerrar')==0)
				{
					
					$folio_os = $this->input->post('folio');
					$this->load->model('osfact/os','os');
					$this->os->close_os($folio_os);
				}
				$this->load->view('done',$data);
			}
			
			elseif($this->input->post('concepto')==2)
			{						
				$concepto = 'Vale de traspaso';
				$folio_vale = $this->input->post('folio');							
				$this->movimientos->mov_salida_os($tipo,$concepto,$mspn,$cantidad,$fecha,$folio_vale,$bodega,$usuario,$hora);
				
				$this->load->model('existencias/existencias_model','existencias');
				$this->existencias->actualizar_menos($bodega,$mspn,$cantidad);
			if($this->input->post('cerrar')==0)
				{
					
					$folio_vale = $this->input->post('folio');
					$this->load->model('osfact/m_vale','vale');
					$this->vale->close_vale($folio_vale);
				}
				$this->load->view('done',$data);
			}
			}
			
			else
			{
				$this->load->view('ins');
			}
		}
		
	}
	
	function check_factura($folio_fct)
	{
		if($this->movimientos->fct_activa($folio_fct))
		{
			$this->form_validation->set_message('check_factura','Factura cerrada.');
			return FALSE;
		}
		
		else{
			return TRUE;
		}
	}
	
	
	function check_os($folio_os)
	{
		if($this->movimientos->os_activos($folio_os))
		{
			$this->form_validation->set_message('check_os','Orden de servicio cerrado.');
			return FALSE;
		}
		
		else{
			return TRUE;
		}
	}
	
	function check_vale($folio_vale)
	{
	if($this->movimientos->vale($folio_vale))	
	{
		$this->form_validation->set_message('check_vale','Vale de traspaso');
		return FALSE;
	}
	
	else
	{
		return TRUE;	
	}
	}
}
?>
