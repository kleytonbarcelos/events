<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cliente_model');
		$this->load->model('evento_model');
		$this->load->model('boleto_model');
		$this->load->model('fatura_model');
	}
	public function evento($evento_id=null)
	{
		if($evento_id)
		{
			$data['evento_id'] = $evento_id;
			$this->template->load('evento/index', 'eventos/inscricao', $data);
		}
		else
		{
			echo 'O evento não foi informado.';
		}
	}
	public function salvar()
	{
		$this->form_validation->set_rules('txtNome', strong('Nome'), 'trim|required|min_length[8]');
		$this->form_validation->set_rules('txtDataNascimento', strong('Data nascimento'), 'trim|required');

		if($this->input->post('id')){ $this->form_validation->set_rules('txtEmail', strong('E-mail'), 'trim|required|valid_email|min_length[8]|is_unique[clientes.email.id.'.$this->input->post('id').']', array('is_unique'=>'O campo %s já existe em nossa base, tente outro valor.')); }else{ $this->form_validation->set_rules('txtEmail', strong('E-mail'), 'trim|required|valid_email|min_length[8]|is_unique[clientes.email]'); }

		$this->form_validation->set_rules('txtSenha', strong('Senha'), 'trim|required|min_length[8]');
		$this->form_validation->set_rules('txtSenhaRepetir', strong('Confirmação de Senha'), 'trim|required|min_length[8]|matches[txtSenha]');

		$this->form_validation->set_rules('txtCpf', strong('Cpf'), 'trim|required');


		$this->form_validation->set_rules('txtAsma', strong('Asma'), 'trim|required');
		$this->form_validation->set_rules('txtDiabetes', strong('Diabetes'), 'trim|required');
		$this->form_validation->set_rules('txtDisturbioCardiaco', strong('Distúrbio Cardiaco'), 'trim|required');
		$this->form_validation->set_rules('txtDisturbioPressaoAlta', strong('Distúrbio de Pressão Alta'), 'trim|required');
		$this->form_validation->set_rules('txtDisturbioGastrico', strong('Distúrbio Gástrico'), 'trim|required');
		$this->form_validation->set_rules('txtDisturbioUrinario', strong('Distúrbio Urinário'), 'trim|required');
		$this->form_validation->set_rules('txtConvulcoes', strong('Convulções'), 'trim|required');
		$this->form_validation->set_rules('txtPerdaConciencia', strong('Perda de Conciência'), 'trim|required');
		$this->form_validation->set_rules('txtAlergiaMedicamento', strong('Alergia à Medicamento'), 'trim|required');

		$this->form_validation->set_rules('txtCamisa', strong('Camisa'), 'trim|required');

		if( $this->input->post('txtAlergiaMedicamento') == 'sim' ){ $this->form_validation->set_rules('txtAlergiaMedicamentoResposta', strong('Alergia à Medicamento Resposta'), 'trim|required'); }
		$this->form_validation->set_rules('txtOutrasDoencas', strong('Outras Doêncas'), 'trim|required');
		if( $this->input->post('txtOutrasDoencas') == 'sim' ){ $this->form_validation->set_rules('txtOutrasDoencasResposta', strong('Outras Doençaas Resposta'), 'trim|required'); }
		$this->form_validation->set_rules('txtUsoRegularMedicamento', strong('Uso Regular de Medicamento'), 'trim|required');
		if( $this->input->post('txtUsoRegularMedicamento') == 'sim' ){ $this->form_validation->set_rules('txtUsoRegularMedicamentoResposta', strong('Uso Regular Medicamento Resposta'), 'trim|required'); }
		$this->form_validation->set_rules('txtRestricaoAlimentar', strong('Restrição Alimentar'), 'trim|required');
		if( $this->input->post('txtRestricaoAlimentar') == 'sim' ){ $this->form_validation->set_rules('txtRestricaoAlimentarResposta', strong('Restrição Alimentar Resposta'), 'trim|required'); }


		if( $this->form_validation->run() == true )
		{
			$data = array(
					'nome'=>$this->input->post('txtNome'),
					'datanascimento'=>date_to_us($this->input->post('txtDataNascimento')),
					'sexo'=>$this->input->post('txtSexo'),
					'email'=>$this->input->post('txtEmail'),
					'senha'=>$this->input->post('txtSenha'),
					'password'=>base64_encode($this->input->post('txtSenha')),
					'cpf'=>$this->input->post('txtCpf'),
					'rg'=>$this->input->post('txtRg'),
					'celular'=>$this->input->post('txtCelular'),
					'telefone'=>$this->input->post('txtTelefone'),
					'telefonetrabalho'=>$this->input->post('txtTelefoneTrabalho'),
					'cep'=>$this->input->post('txtCep'),
					'endereco'=>$this->input->post('txtEndereco'),
					'numero'=>$this->input->post('txtNumero'),
					'complemento'=>$this->input->post('txtComplemento'),
					'bairro'=>$this->input->post('txtBairro'),
					'cidade'=>$this->input->post('txtCidade'),
					'uf'=>$this->input->post('txtUf'),
					'observacao'=>$this->input->post('txtObservacao'),

					'asma'=>$this->input->post('txtAsma'),
					'diabetes'=>$this->input->post('txtDiabetes'),
					'disturbiocardiaco'=>$this->input->post('txtDisturbioCardiaco'),
					'disturbiopressaoalta'=>$this->input->post('txtDisturbioPressaoAlta'),
					'disturbiogastrico'=>$this->input->post('txtDisturbioGastrico'),
					'disturbiourinario'=>$this->input->post('txtDisturbioUrinario'),
					'convulcoes'=>$this->input->post('txtConvulcoes'),
					'perdaconciencia'=>$this->input->post('txtPerdaConciencia'),
					'alergiamedicamento'=>$this->input->post('txtAlergiaMedicamento'),
					'alergiamedicamentoresposta'=>$this->input->post('txtAlergiaMedicamentoResposta'),
					'outrasdoencas'=>$this->input->post('txtOutrasDoencas'),
					'outrasdoencasresposta'=>$this->input->post('txtOutrasDoencasResposta'),
					'usoregularmedicamento'=>$this->input->post('txtUsoRegularMedicamento'),
					'usoregularmedicamentoresposta'=>$this->input->post('txtUsoRegularMedicamentoResposta'),
					'restricaoalimentar'=>$this->input->post('txtRestricaoAlimentar'),
					'restricaoalimentarresposta'=>$this->input->post('txtRestricaoAlimentarResposta'),

					'tiposanguineo'=>$this->input->post('txtTipoSanguineo'),
					'planosaude'=>$this->input->post('txtPlanoSaude'),
					'planosauderesposta'=>$this->input->post('txtPlanoSaudeResposta'),
					'pessoaproxima'=>$this->input->post('txtPessoaProxima'),
					'pessoaproximatelefone'=>$this->input->post('txtPessoaProximaTelefone'),
					'pessoaproximacelular'=>$this->input->post('txtPessoaProximaCelular'),

					'tipo'=>'cliente',

					'camisa'=>$this->input->post('txtCamisa'),
			);

			if(!$this->input->post('id'))
			{
				$fatura_tipo = 'boleto';
				$cliente_id = $this->cliente_model->insert($data);
				$dados_fatura = $this->gera_fatura($cliente_id, $this->input->post('evento_id'), $fatura_tipo);
				#############################################################################################
				##############################  GERAÇÃO DE BOLETOS (fim) ####################################
				#############################################################################################
				$response['fatura_id'] = $dados_fatura['fatura_id'];
				$response['fatura_tipo'] = $dados_fatura['fatura_tipo'];
				$response['status'] = 1;
				$response['msg'] = 'Registro adicionado com sucesso!';
			}
			else
			{
				$this->cliente_model->update($this->input->post('id'), $data);

				$response['fatura_tipo'] = $fatura_tipo;
				$response['status'] = 1;
				$response['msg'] = 'Registro atualizado com sucesso!';
			}
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
		}
		echo json_encode($response);
	}
	public function inscreverse()
	{
		$dados_fatura = $this->gera_fatura($this->input->post('cliente_id'), $this->input->post('evento_id'), $this->input->post('fatura_tipo'));
		echo json_encode($dados_fatura);
	}
	public function gera_fatura($cliente_id, $evento_id, $fatura_tipo='boleto')
	{
		$dados_cliente = array_to_row( $this->cliente_model->get( $cliente_id ) );
		$dados_evento = array_to_row( $this->evento_model->get($evento_id) );

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
		if($fatura_tipo=='boleto')
		{

		}
		else //PAYPAL
		{

		}
		$response['fatura_tipo'] = $fatura_tipo;
		$response['fatura_id'] = $fatura_id;
		return $response;
	}
}
/* End of file Cadastro.php */
/* Location: ./application/controllers/Cadastro.php */
