<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cliente_model');
	}
	public function index()
	{
		$this->template->load('AdminLTE/index', 'clientes/index');
	}
	public function cadastrar()
	{
		$data['dados'] = (object) $this->cliente_model->desc_table(); //Preenche as variáveis com valores em branco
		$this->template->load('AdminLTE/index', 'clientes/formulario', $data);
	}
	public function editar($id)
	{
		$data['dados'] = $this->cliente_model->get($id);
		$this->template->load('AdminLTE/index', 'clientes/formulario', $data);
	}
	public function check_email_existente()
	{
		$email = $this->cliente_model->get( array('email'=>$this->input->post('txtEmail')) );
		if($email)
		{
			$response['msg'] = 'Este e-mail já está cadastrado. <span class="font-bold cursor-pointer font-13" style="border-bottom:1px dotted;" onclick="$(\'#modalCadastro\').modal(\'hide\');">clique aqui</span> e faça seu login!';
			$response['status'] = 1;
		}
		else
		{
			$response['status'] = 0;
		}
		echo json_encode($response);
	}
	public function salvar()
	{
		if($this->input->post('id')){ $this->form_validation->set_rules('txtEmail', strong('E-mail'), 'trim|required|valid_email|min_length[8]|is_unique[clientes.email.id.'.$this->input->post('id').']', array('is_unique'=>'O campo %s já existe em nossa base, tente outro valor.')); }else{ $this->form_validation->set_rules('txtEmail', strong('E-mail'), 'trim|required|valid_email|min_length[8]|is_unique[clientes.email]'); }

		$this->form_validation->set_rules('txtNome', strong('Nome'), 'trim|required|min_length[8]');
		$this->form_validation->set_rules('txtDataNascimento', strong('Data nascimento'), 'trim|required');

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

		//$this->form_validation->set_rules('txtCamisa', strong('Camisa'), 'trim|required');

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
				$insert_id = $this->cliente_model->insert($data);
				//#########################################################################
				$cliente = array_to_row($this->cliente_model->get($insert_id));

				$tmp = explode(' ', $cliente->nome, 2);
				$cliente->primeironome = $tmp[0];
				$cliente->sobrenome = $tmp[1];

				$response['cliente_id'] = $cliente->id;
				$response['cliente_nome'] = $cliente->nome;
				$response['cliente_primeironome'] = $cliente->primeironome;
				$response['cliente_sobrenome'] = $cliente->sobrenome;
				$response['cliente_email'] = $cliente->email;
				$response['cliente_tipo'] = $cliente->tipo;
				$response['cliente_endereco'] = $cliente->endereco;
				$response['cliente_numero'] = $cliente->numero;
				$response['cliente_complemento'] = $cliente->complemento;
				$response['cliente_bairro'] = $cliente->bairro;
				$response['cliente_cidade'] = $cliente->cidade;
				$response['cliente_uf'] = $cliente->uf;
				$response['cliente_cep'] = $cliente->cep;
				$response['cliente_celular'] = $cliente->celular;
				$response['cliente_telefone'] = $cliente->telefone;
				$response['cliente_telefonetrabalho'] = $cliente->telefonetrabalho;
				
				$response['acao'] = 'cadastrar';
				$response['status'] = 1;
				$response['msg'] = 'Registro adicionado com sucesso!';
			}
			else
			{
				$this->cliente_model->update($this->input->post('id'), $data);

				$response['acao'] = 'editar';
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
	public function excluir()
	{
		$ids = explode(',', $this->input->post('id'));
		foreach ($ids as $key => $value)
		{
			$return = $this->cliente_model->delete($value);
		}
		if($return)
		{
			$response['status'] = 1;
			$response['msg'] = 'Registro(s) excluído(s) com sucesso!';
		}
		else
		{
			$response['status'] = 0;
			$response['msg'] = 'Erro ocorrido na operação!';
		}
		echo json_encode($response);
	}
	public function get()
	{
		$data['clientes'] = $this->cliente_model->select('id, nome, texto')->get($this->input->post('id'));
		echo json_encode($data);
	}
	public function registrosans()
	{
		$this->load->model('registroans_model');
		$data['registrosans'] = $this->registroans_model->get();
		echo json_encode($data);
	}
	public function typeahead()
	{
		$data['Clientes'] = $this->cliente_model->like( array('nome'=>$this->input->post('query')) )->get();
		$data['status'] = ($data['Clientes']) ? 1 : 0;
		echo json_encode($data);
	}
	//##############################################################################################
	//##############################################################################################
	//##############################################################################################
	public function Clientes()
	{
		$data['clientes'] = $this->cliente_model->select('id, nome')->get();
		echo json_encode($data);
	}
	public function getvaluesinputs()
	{
		$data['inputs'] = $this->cliente_model->get($this->input->post('id'));
		foreach ($data['inputs'] as $key => $value)
		{
			$data_temp[sha1($this->cliente_model->table().'.'.$key)] = $value;
		}
		$data['inputs'] = $data_temp;
		echo json_encode($data);
	}
	public function bootstrap_table()
	{
		$limit  = (isset($_GET['limit']))  ? $_GET['limit']  : 10;
		$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
		$sort   = (isset($_GET['sort']))   ? $_GET['sort']   : '';
		$order  = (isset($_GET['order']))  ? $_GET['order']  : "asc";
		$search = (isset($_GET['search'])) ? $_GET['search'] : "";

		$customers = array();
		if ($search == "")
		{
			$customers = $this->cliente_model->order_by($sort, $order)->get( array('usuario_id'=>$this->session->dados_usuario->id) );
		}
		else
		{
			if( $_GET['like_search'] == 'all' )
			{
				$campos = $this->db->query('DESC '.$this->cliente_model->order_by($sort, $order)->_table)->result();
	            foreach ($campos as $campo)
	            {
	            	$arraySearch[$campo->Field] = "".$search."";
	            }
	        }
	        else
	        {
	        	$campos = explode('|', $_GET['like_search']);
	        	foreach ($campos as $campo)
	        	{
					$arraySearch[$campo] = "".$search."";
	        	}
	        }
			$customers = $this->cliente_model->order_by($sort, $order)->like($arraySearch)->get(array('usuario_id'=>$this->session->dados_usuario->id));
		}
		
		$count = sizeof($customers);
		$customers = array_slice($customers, $offset, $limit);

		echo "{";
			echo '"total": ' . $count . ',';
			echo '"rows": ';
			echo json_encode($customers);
		echo "}";
	}
}
/* End of file Clientes.php */
/* Location: ./application/controllers/Clientes.php */