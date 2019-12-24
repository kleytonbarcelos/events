<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faturas extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cliente_model');
		$this->load->model('evento_model');
		$this->load->model('boleto_model');
		$this->load->model('fatura_model');
	}
	public function exibir($fatura_id, $fatura_tipo)
	{
		echo '<pre>';	
			print_r($fatura_id);
			print_r($fatura_tipo);
		echo '</pre>';
	}
	public function criarfatura()
	{
		$dados_fatura = $this->salvafatura($this->input->post('cliente_id'), $this->input->post('evento_id'), $this->input->post('fatura_tipo'));
		echo json_encode($dados_fatura);
	}
	public function check_inscricao()
	{
		$fatura = array_to_row( $this->fatura_model->get( array('cliente_id'=>$this->input->post('cliente_id'), 'evento_id'=>$this->input->post('evento_id')) ) );
		if($fatura)
		{
			$response['fatura_status'] = $fatura->status;
			$response['inscricao'] = 1;
			$response['msg'] = ($response['fatura_status']=='pendente') ? 'Você já se inscreveu neste evento, porém ainda não finalizou o pedido. Faça isso nessa tela.' : 'Você já está inscrito neste evento.';
		}
		else
		{
			$response['inscricao'] = 0;
		}
		echo json_encode($response);
	}
	public function salvafatura($cliente_id, $evento_id, $fatura_tipo='boleto')
	{
		$fatura = array_to_row( $this->fatura_model->get( array('cliente_id'=>$cliente_id, 'evento_id'=>$evento_id) ) );
		if($fatura) // Fatura já existente
		{
			if($fatura->status=='regular')
			{
				$response['status'] = 0;
				$response['fatura_created'] = 0;
				$response['fatura_tipo'] = $fatura->tipo;
				$response['fatura_id'] = $fatura->id;

				$response['msg'] = 'Você já está inscrito neste evento.';
			}
			else
			{
				$response['status'] = 1;
				$response['fatura_created'] = 0;
				$response['fatura_tipo'] = $fatura->tipo;
				$response['fatura_id'] = $fatura->id;
			}
		}
		else
		{
			$dados_cliente = array_to_row( $this->cliente_model->get( $cliente_id ) );
			$dados_evento = array_to_row( $this->evento_model->get( $evento_id ) );

			$farura_datavencimento = date_to_us( date('d/m/Y', time() + (2 * 86400)) );
			$fatura_datageracao = date('Y-m-d');
			//######################################################################################################
			$data_fatura = array(
				'cliente_id'=>$dados_cliente->id,
				'evento_id'=>$dados_evento->id,
				'datageracao'=>$fatura_datageracao,
				'datavencimento'=>$farura_datavencimento,
				'valor'=>$dados_evento->valor,
				'status'=>"pendente",

				'tipo'=>$fatura_tipo,
			);
			$fatura_id = $this->fatura_model->insert($data_fatura);
			//######################################################################################################
			$response['status'] = 1;
			$response['fatura_created'] = 1;
			$response['fatura_tipo'] = $fatura_tipo;
			$response['fatura_id'] = $fatura_id;
		}
		return $response;
	}
}
/* End of file Cadastro.php */
/* Location: ./application/controllers/Cadastro.php */
