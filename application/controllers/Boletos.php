<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Boletos extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('cliente_model');
			$this->load->model('evento_model');
			$this->load->model('boleto_model');
			$this->load->model('fatura_model');			
		}
		public function index()
		{
			redirect('home','refresh');
		}
		public function imprimir($fatura_id=null)
		{
			//$dados_fatura = array_to_row($this->boleto_model->get(array('id'=>$fatura_id)));
			$dados_fatura = array_to_row($this->fatura_model->get($fatura_id));
			if(!$dados_fatura)
			{
				echo '<script>alert("Boleto inválido!")</script>';
				redirect('home','refresh');
				exit;
			}
			$dados_cliente = array_to_row( $this->cliente_model->get( $dados_fatura->cliente_id ) );
			$dados_evento = array_to_row( $this->evento_model->get( $dados_fatura->evento_id ) );

			if( date_interval($dados_fatura->datavencimento, date('Y-m-d')) > 0 )
			{
				$dias_de_prazo_para_pagamento = 0;
			}
			else
			{
				$dias_de_prazo_para_pagamento = date_interval(date('Y-m-d'), $dados_fatura->datavencimento);
			}

			if( $dados_cliente->nome )
			{
				$this->load->library('boleto');
				$dados = array(
					// Informações necessárias para todos os bancos
					'banco'=> 'cef_sigcb',
					'dias_de_prazo_para_pagamento' => $dias_de_prazo_para_pagamento,
					'taxa_boleto'                  => 0,
					'pedido'                       => array(
						'nome'           => 'Inscrição evento: '.$dados_evento->nome,
						'quantidade'     => '1',
						'valor_unitario' => $dados_fatura->valor,
						'numero'         => $dados_fatura->id, //10000000025,
						'aceite'         => 'N',
						'especie'        => 'R$',
						'especie_doc'    => 'DM',
					),
					'sacado'       => array(
						'nome'     => $dados_cliente->nome,
						'endereco' => $dados_cliente->endereco.', '.$dados_cliente->numero.', '.$dados_cliente->complemento.', '.$dados_cliente->bairro,
						'cidade'   => $dados_cliente->cidade,
						'uf'       => $dados_cliente->uf,
						'cep'      => $dados_cliente->cep,
					),
					'demonstrativo'=>array(
						'linha1'=>'- Evento: '.$dados_evento->nome,
						'linha2'=>'- Número de inscrição: '.$dados_fatura->id,
						'linha3'=>'- www.ecotrilhasbrasil.com.br',
					),
					'instrucoes'=>array(
						'linha1'=>'<br>- Não receber após o vencimento',
						'linha2'=>'',
						'linha3'=>'- Em caso de dúvidas entre em contato conosco: contatoecotrilhas@gmail.com',
						'linha4'=>'',
					),
					'cedente'=>array(
						'nome'    => 'ECOTRILHAS BRASIL',
						'cpf_cnpj'    => '',
						'agencia' => '0557-6',
						'conta'  => '7134-7',
						'conta_cedente'  => '313950',
						'carteira'  => 'SR',
						'nosso_numero'  => $dados_fatura->id,
						'endereco' => '',
						'cidade' => 'Guaçuí',
						'uf' => 'ES',
					),
					// Informações necessárias que são específicas do Banco do Brasil
					'variacao_carteira'            => '019',
					'contrato'                     => 999999,
					'convenio'                     => 7777777,
				);
				$this->boleto->cef_sigcb($dados);







				// $this->load->library('boleto');
				// $dados = array(
				// 	// Informações necessárias para todos os bancos
				// 	'banco'=> 'bb',
				// 	'dias_de_prazo_para_pagamento' => $dias_de_prazo_para_pagamento,
				// 	'taxa_boleto'                  => 0,
				// 	'pedido'                       => array(
				// 		'nome'           => 'Inscrição evento: '.$dados_evento->nome,
				// 		'quantidade'     => '1',
				// 		'valor_unitario' => $dados_fatura->valor,
				// 		'numero'         => $dados_fatura->id, //10000000025,
				// 		'aceite'         => 'N',
				// 		'especie'        => 'R$',
				// 		'especie_doc'    => 'DM',
				// 	),
				// 	'sacado'       => array(
				// 		'nome'     => $dados_cliente->nome,
				// 		'endereco' => $dados_cliente->endereco.', '.$dados_cliente->numero.', '.$dados_cliente->complemento.', '.$dados_cliente->bairro,
				// 		'cidade'   => $dados_cliente->cidade,
				// 		'uf'       => $dados_cliente->uf,
				// 		'cep'      => $dados_cliente->cep,
				// 	),
				// 	'demonstrativo'=>array(
				// 		'linha1'=>'- Evento: '.$dados_evento->nome,
				// 		'linha2'=>'- Número de inscrição: '.$dados_fatura->id,
				// 		'linha3'=>'- www.ecotrilhasbrasil.com.br',
				// 	),
				// 	'instrucoes'=>array(
				// 		'linha1'=>'<br>- Não receber após o vencimento',
				// 		'linha2'=>'',
				// 		'linha3'=>'- Em caso de dúvidas entre em contato conosco: contatoecotrilhas@gmail.com',
				// 		'linha4'=>'',
				// 	),
				// 	'cedente'=>array(
				// 		'nome'    => 'ECOTRILHAS BRASIL',
				// 		'cpf_cnpj'    => '',
				// 		'agencia' => '0370-0',
				// 		'conta'  => '12534-2',
				// 		//'conta_cedente'  => '313950',
				// 		'carteira'  => '17',
				// 		'nosso_numero'  => $dados_fatura->id,
				// 		'endereco' => '',
				// 		'cidade' => 'Guaçuí',
				// 		'uf' => 'ES',
				// 	),
				// 	// Informações necessárias que são específicas do Banco do Brasil
				// 	'variacao_carteira'            => '051',
				// 	'contrato'                     => 19842222,
				// 	'convenio'                     => 3054158,
				// 	//07.157.187/0001-80
				// 	//07157187000180
				// 	//JORGE ADRIANO PEIXOTO DE OLIVEIRA - ME
				// );
				// $this->boleto->bb($dados);



				
			}
		}
	}
