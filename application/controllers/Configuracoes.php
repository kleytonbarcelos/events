<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Configuracoes_model');
	}
	public function index()
	{
		$data['Configuracoes'] = array_to_row($this->Configuracoes_model->get());
		$this->template->load('produtor/index', 'configuracoes/index', $data);
	}
	public function salvar()
	{
		$this->form_validation->set_rules('txtReceberNotificacoes', strong('Notificacoes'), 'trim|required');

		if( $this->form_validation->run() == true )
		{
			$data = array(
				'receber_notificacoes'=>$this->input->post('txtReceberNotificacoes'),
			);
			$this->Configuracoes_model->update_all($data);

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
/* End of file Configuracoes.php */
/* Location: ./application/controllers/Configuracoes.php */