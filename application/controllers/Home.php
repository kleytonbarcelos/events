<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('fatura_model');
			$this->load->model('cliente_model');

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
		public function sleep($seconds=1)
		{
			sleep($seconds);
			echo 'OK';
		}
		public function index()
		{
			if($this->session->dados_usuario)
			{
				if( $this->session->dados_usuario->tipo == 'cliente' )
				{
					$this->template->load('cliente/index', 'home/index');
				}
				else
				{
					$this->template->load('produtor/index', 'home/index');
				}
			}
			else
			{
				redirect('login','refresh');
			}
		}
		public function lembretedepagamento()
		{
			$faturas =  $this->fatura_model->select('cliente_id')->get( array('status'=>'pendente') );
			if($faturas)
			{
				foreach ($faturas as $boleto)
				{
					$cliente = $this->cliente_model->select('nome, email')->get($boleto->cliente_id);
					if($cliente)
					{
						$cliente = array_to_row($cliente);

						$data = array(
							'nome' => $cliente->nome,
							'email' => $cliente->email,
						);
						$template = $this->load->view('templates/email/lembretedepagamento', $data, true);

						$this->email->clear();
						$this->email->bcc('kleytonbarcelos@gmail.com, contatoecotrilhas@gmail.com');
						//$this->email->reply_to('you@example.com', 'Your Name');
						$this->email->to($cliente->email, $cliente->nome);
						$this->email->from('nao-responda@inscricaosegura.com', 'Inscrição Segura');
						$this->email->subject('Lembrete de pagamento');
						$this->email->message($template);
						$this->email->send();
					}
				}
			}
			redirect('home','refresh');
		}
		public function confirmacao_de_inscricao()
		{
			$this->load->model('fatura_model');
			$this->load->model('cliente_model');

			$faturas =  $this->fatura_model->get( array('status'=>'regular') );
			foreach ($faturas as $value)
			{
				$cliente = $this->cliente_model->get($value->cliente_id);
				if($cliente)
				{
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
	}