<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Controller extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->form_validation->set_error_delimiters('', '');
			date_default_timezone_set('America/Sao_Paulo');

			$this->base_url_controller = base_url().$this->router->fetch_class().'/';
			$this->controller = $this->router->fetch_class();

			$controllers_nao_protegidos = array(
				'cadastro',
				'boletos',
				'faturas',
				'paypal',
				'clientes',
			);
			if( !in_array($this->controller, $controllers_nao_protegidos) )
			{
				if( !$this->session->dados_usuario )
				{
					$controller = ($this->controller) ? $this->controller : 'home';
					$this->session->url_redirect = base_url().$controller;
					redirect('login','refresh');
				}
			}
		}
	}
	/* End of file MY_Controller.php */
	/* Location: ./application/core/MY_Controller.php */