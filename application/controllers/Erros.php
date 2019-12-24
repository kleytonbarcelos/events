<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Erros extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->uri->total_segments() === 1)
		{
			$url = $this->uri->segment(1);
			$this->load->model('evento_model');

			$data['evento'] = $this->evento_model->get( array('url'=>$url) );

			if($data['evento'])
			{
				$data['evento'] = $data['evento'][0];
				$this->load->view('eventos/evento', $data);
			}
			else
			{
				$this->load->view('erros/404');
			}
		}
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */