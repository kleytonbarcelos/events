<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Inscricoes extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('inscricoes_model');
			$this->load->model('evento_model');
			$this->load->model('cliente_model');
		}
		public function index() // Lista o index
		{
			$sql = '
				SELECT
					F.status as status,
					F.id as inscricao,
					E.id,
					E.nome,
					E.url,
					E.valor,
					E.banner,
					E.logo,
					E.local,
					E.data,
					E.comprovanteinscricao
				FROM
					faturas as F,
					eventos as E
				WHERE
					(F.evento_id=E.id)
					AND
					(F.cliente_id='.$this->session->dados_usuario->id.');
			';

			$data['eventos'] = $this->db->query($sql)->result();
			$data['cliente'] = $this->cliente_model->get($this->session->dados_usuario->id);
			$this->template->load('cliente/index', 'inscricoes/index', $data);
		}
		public function get() // Busca um registro através do ID
		{
			$data['Inscricao'] = $this->inscricoes_model->get($this->input->post('id'));
			echo json_encode($data);
		}
		public function excluir()
		{
			$ids = explode(',', $this->input->post('id'));
			foreach ($ids as $key => $value)
			{
				$return = $this->inscricoes_model->delete($value);
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
		public function getvaluesinputs()
		{
			$data['inputs'] = $this->inscricoes_model->get($this->input->post('id'));
			foreach ($data['inputs'] as $key => $value)
			{
				$data_temp[sha1($this->inscricoes_model->table().'.'.$key)] = $value;
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
				$sql = '
						SELECT faturas.*, eventos.nome AS nome
						FROM faturas
						INNER JOIN eventos
						ON (faturas.evento_id=eventos.id)
						WHERE
						faturas.cliente_id='.$this->session->dados_usuario->id.'
				';
				$customers = $this->db->query($sql)->result();
				//$customers = $this->inscricoes_model->order_by($sort, $order)->get( array('cliente_id'=>$this->input->post('id')) );
			}
			else
			{
				if( $_GET['like_search'] == 'all' )
				{
					$campos = $this->db->query('DESC '.$this->inscricoes_model->order_by($sort, $order)->_table)->result();
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
				$customers = $this->inscricoes_model->order_by($sort, $order)->like($arraySearch)->get(array('cliente_id'=>$this->session->dados_usuario->id));
			}
			
			$count = sizeof($customers);
			$customers = array_slice($customers, $offset, $limit);

			echo "{";
				echo '"total": ' . $count . ',';
				echo '"rows": ';
				echo json_encode($customers);
			echo "}";
		}
		//######################################### 			DEMAIS MÉTODOS 			########################################
		//######################################################################################################################
		//######################################################################################################################
		//######################################################################################################################
		//######################################################################################################################
		//######################################################################################################################
		public function typeahead() // Para Plugin TypeaHead (busca no input)
		{
			$data['Inscricoes'] = $this->inscricoes_model->like( array('nome'=>$this->input->post('query')) )->get();
			$data['status'] = ($data['Inscricoes']) ? 1 : 0;
			echo json_encode($data);
		}
		public function inscricoes() // Lista dos inscricoes (retorno ajax)
		{
			$data['Inscricoes'] = $this->inscricoes_model->get();
			echo json_encode($data);
		}
		public function cadastrar() // Load no html cadastrar (sem ajax)
		{
			$data['dados'] = (object) $this->inscricoes_model->desc_table(); //Preenche as variáveis com valores em branco
			$this->template->load('evento/index', 'inscricoes/formulario', $data);
		}
		// public function verifica_url()
		// {
		// 	$data['url'] = $this->inscricoes_model->get( array('url'=>$this->input->post('url')) );
		// 	$data['status'] = ($data['url']) ? 1 : 0;
		// 	echo json_encode($data);
		// }
	}
	/* End of file Inscricoes.php */
	/* Location: ./application/controllers/Inscricoes.php */