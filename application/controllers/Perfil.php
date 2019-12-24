<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perfil_model');
	}
	public function index()
	{
		// redirect('home','refresh');
		// exit;
		$data['Perfil'] = $this->Perfil_model->get( $this->session->dados_usuario->id );
		if( $this->session->dados_usuario->tipo == 'cliente' )
		{
			$this->template->load('cliente/index', 'perfil/formulario', $data);
		}
		else
		{
			$this->template->load('produtor/index', 'perfil/formulario', $data);
		}
	}
	public function salvar()
	{
		$this->form_validation->set_rules('txtNome', strong('Nome'), 'trim|required');
		$this->form_validation->set_rules('txtEmail', strong('E-mail'), 'trim|required');

		if( $this->form_validation->run() == true )
		{
			$id = $this->session->dados_usuario->id;
			$data = array(
				'nome'=>$this->input->post('txtNome'),
				'email'=>$this->input->post('txtEmail'),
			);
			$this->Perfil_model->update($id, $data);

			$response['status'] = 1;
			$response['msg'] = 'Dados atualizados com sucesso';
			echo json_encode($response);
		}
		else
		{
			$erros = array();
			foreach ($this->input->post() as $key => $value)
			{
				$erros[$key] = form_error($key);
			}
			$response['erros'] = array_filter($erros);
			$response['status'] = 0;
			echo json_encode($response);
		}
	}
}
/* End of file Perfil.php */
/* Location: ./application/controllers/Perfil.php */