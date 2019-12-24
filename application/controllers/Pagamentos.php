<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamentos extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fatura_model');
		$this->load->model('cliente_model');
		$this->load->model('evento_model');

		$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'protocol' => 'sendmail',
				'smtp_host' => 'srv194.prodns.com.br',
				'smtp_port' => 465,
				'smtp_user' => 'nao-responda@inscricaosegura.com',
				'smtp_pass' => 'x152535x',
				'charset'   => 'utf-8',
		);
		$this->load->library('email', $config);
	}
	public function index() // Lista o index
	{
		$this->template->load('produtor/index', 'pagamentos/baixaboleto');
	}
	public function deposito($fatura_id) // Lista o index
	{
		$dados_fatura = array_to_row($this->fatura_model->get($fatura_id));
		if(!$dados_fatura)
		{
			echo '<script>alert("Boleto inválido!")</script>';
			redirect('home','refresh');
			exit;
		}
		$data['dados_cliente'] = array_to_row( $this->cliente_model->get( $dados_fatura->cliente_id ) );
		$data['dados_evento'] = array_to_row( $this->evento_model->get( $dados_fatura->evento_id ) );
		$data['dados_fatura'] = $dados_fatura;

		if( $data['dados_cliente']->nome )
		{
			$this->load->view('pagamentos/deposito', $data);
		}
	}
	public function salvabaixaboleto()
	{
		$diretorio = 'assets/uploads/';
		$arquivo = strtolower($diretorio.strtolower($_FILES['txtArquivo']['name']));
		@copy($_FILES['txtArquivo']['tmp_name'], $arquivo);
		########################################################
		$tmp = array();
		$data = array();
		$contador_linha = 1;
		if($abre_arquivo = fopen($arquivo, "r"))
		{
			while (!feof($abre_arquivo))
			{
				$linha = fgets($abre_arquivo);
				$linha = trim($linha); // remove espaço em branco
				if( !empty($linha) )
				{
					if( $contador_linha >= 3 ) // Lendo apartir da linha 3 - excluindo assim o cabeçalho do arquivo de retorno
					{
						#############################################################################################
						if( substr($linha, 13, 1) == 'T' ) // Pega número documento e valor
						{
							$fatura_id = intval(substr($linha, 51, 5)); // COM NUMERO DO DOCUMENTO COM 5 DIGITOS
							$valor = intval(substr($linha, 90, 4));
							if( intval(substr($linha, 94, 2)) != 0 ){ $valor = $valor.'.'.substr($linha, 94, 2); }else{ $valor = $valor.'.00'; }

							$tmp['valor'] = $valor;
							$tmp['fatura_id'] = $fatura_id;
						}
						else if( substr($linha, 13, 1) == 'U' ) // Pega outros dados
						{
							$datageracao = substr($linha, 137, 8);
							$datageracao = substr($datageracao, 0, 2).'/'.substr($datageracao, 2, 2).'/'.substr($datageracao, -4);
							$datapagamento = substr($linha, 145, 8);
							$datapagamento = substr($datapagamento, 0, 2).'/'.substr($datapagamento, 2, 2).'/'.substr($datapagamento, -4);

							$tmp['datageracao'] = $datageracao;
							$tmp['datapagamento'] = $datapagamento;

							array_push($data, $tmp);
						}
					}
					$contador_linha++;
				}
			}
			fclose ($abre_arquivo);
		}
		$tmp2 = array();
		foreach ($data as $key => $value)
		{
			$fatura = $this->fatura_model->get($value['fatura_id']);
			if($fatura)
			{
				$fatura = array_to_row($fatura);
				$fatura->datapagamento = date_to_us($value['datapagamento']);
				$fatura->valor = br_to_decimal($value['valor']);

				$data_fatura = array(
					'status' => 'regular',
					'datapagamento' => date_to_us($value['datapagamento']),
					'valor' => br_to_decimal($value['valor']),
				);
				$this->fatura_model->update($fatura->id, $data_fatura);

				$cliente = $this->cliente_model->get($fatura->cliente_id);
				if($cliente)
				{
					$cliente = array_to_row($cliente);
					$cliente->{'dados_fatura'} = $fatura;
					array_push($tmp2, $cliente);

					$data = array(
						'nome' => $cliente->nome,
						'email' => $cliente->email,
					);
					$template = $this->load->view('templates/email/confirmacao_de_inscricao', $data, true);

					$this->email->clear();
					$this->email->bcc('kleytonbarcelos@gmail.com, contatoecotrilhas@gmail.com');
					//$this->email->reply_to('you@example.com', 'Your Name');
					$this->email->to($cliente->email, $cliente->nome);
					$this->email->from('nao-responda@inscricaosegura.com', 'Inscrição Segura');
					$this->email->subject('Confirmação de pagamento');
					$this->email->message($template);
					$this->email->send();
				}
			}
		}

		$data['dados'] = $tmp2;
		$this->template->load('produtor/index', 'pagamentos/confirmacao', $data);
	}
	public function baixafatura()
	{
		$this->template->load('produtor/index', 'pagamentos/baixafaturamanualmente');
	}
	public function salvabaixafatura()
	{
		$tmp2 = array();
		$fatura =  array_to_row( $this->fatura_model->get( $this->input->post('txtNumeroDocumento') ) );
		if($fatura)
		{
			$valor = ($this->input->post('txtValor')) ? br_to_decimal($this->input->post('txtValor')) : '0.00';
			$fatura->datapagamento = date('Y-m-d');
			$fatura->valor = br_to_decimal($this->input->post('txtValor'));
			$data_fatura = array(
				'status' => 'regular',
				'datapagamento' => date('Y-m-d'),
				'valor' => $valor,
			);

			if( $valor != '0.00' )
			{
				$data_fatura = array_merge($data_fatura, array('valor'=>$valor));
			}

			$this->fatura_model->update($fatura->id, $data_fatura);

			$cliente = $this->cliente_model->get($fatura->cliente_id);
			if($cliente)
			{
				$cliente = array_to_row($cliente);

				$cliente->{'dados_fatura'} = $fatura;
				array_push($tmp2, $cliente);

				$data = array(
					'nome' => $cliente->nome,
					'email' => $cliente->email,
				);
				$template = $this->load->view('templates/email/confirmacao_de_inscricao', $data, true);

				$this->email->clear();
				$this->email->bcc('kleytonbarcelos@gmail.com, contatoecotrilhas@gmail.com');
				//$this->email->reply_to('you@example.com', 'Your Name');
				$this->email->to($cliente->email, $cliente->nome);
				$this->email->from('nao-responda@inscricaosegura.com', 'Inscrição Segura');
				$this->email->subject('Confirmação de pagamento');
				$this->email->message($template);
				$this->email->send();
			}
			$data['dados'] = $tmp2;
			$this->template->load('produtor/index', 'pagamentos/confirmacao', $data);
		}
	}
}